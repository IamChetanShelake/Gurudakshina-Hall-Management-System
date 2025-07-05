<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Hall;
use App\Models\Donation;
use App\Models\Accessorie;
use App\Models\HallEnquiry;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BillController extends Controller
{
    public function generateBill($id)
    {
        // Fetch hall enquiry details
        $enquiry = HallEnquiry::with('halll')->where('id', $id)->firstOrFail();

        // Fetch accessories using stored IDs
        $accessoryIds = json_decode($enquiry->accessorie, true) ?? [];
        $accessories = Accessorie::whereIn('id', $accessoryIds)->get();

        // Calculate total accessories price (excluding free accessories)
        $totalAccessoriesPrice = $accessories->sum(function ($accessory) {
            return $accessory->price ?? 0;
        });

        // Calculate total amount (Hall Rent + Paid Accessories)
        $totalAmount = ($enquiry->rent_amount ?? 0) + $totalAccessoriesPrice;
        $gst = $totalAmount * 0.18; // Assuming 18% GST
        $finalAmount = $totalAmount + $gst;

        $pdf = app(PDF::class);
        $pdf = $pdf->loadView('bill.invoice', compact('enquiry', 'accessories', 'totalAccessoriesPrice', 'totalAmount', 'gst', 'finalAmount'));

        // Define file name like "quotation_1.pdf"
        $fileName = 'quotation_' . $enquiry->id . '.pdf';
        $directory = public_path('quotation');
        $filePath = $directory . '/' . $fileName;

        // Ensure the directory exists
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        // Save the PDF
        $pdf->save($filePath);

        // Store only the file name in the database
        $enquiry->quotation_file = $fileName;
        $enquiry->save();

        session()->flash('pdf_download', $filePath);
        $this->sendQuotationMessage($enquiry);

        // Redirect with success message
        return redirect()->route('AdminHallEnquiry')->with('success', 'Enquiry details and quotation is generated successfully.');
    }

    private function sendQuotationMessage($enquiry)
    {
        if (!$enquiry->quotation_file) {
            \Log::error("❌ Quotation file missing for ID: {$enquiry->id}");
            return;
        }

        $admin = User::where('role', 'admin')->first();
        $quotationUrl = url('public/quotation/' . $enquiry->quotation_file);
        $adminMobile = $admin->mobile ?? 'Not Provided';
        $text = $adminMobile . " | Click here to view: " . $quotationUrl;

        $apiUrl = config('oneclick.api_url') . "/" . config('oneclick.api_version') . "/" . config('oneclick.phone_id') . "/messages";
        $token = config('oneclick.api_token');

        $payload = json_encode([
            "to" => $enquiry->contact_no,
            "recipient_type" => "individual",
            "type" => "template",
            "template" => [
                "name" => "template3",
                "language" => [
                    "policy" => "deterministic",
                    "code" => "en"
                ],
                "components" => [
                    [
                        "type" => "body",
                        "parameters" => [
                            [
                                "type" => "text",
                                "text" => $enquiry->name
                            ],
                            [
                                "type" => "text",
                                "text" => $enquiry->halll->name
                            ],
                            [
                                "type" => "text",
                                "text" => $text
                            ]
                        ]
                    ]
                ]
            ]
        ]);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer " . trim($token),
            "Content-Type: application/json"
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode == 200) {
            \Log::info("✅ Quotation WhatsApp sent to {$enquiry->contact_no}: $response");
        } else {
            \Log::error("❌ Failed to send quotation WhatsApp to {$enquiry->contact_no}: [$httpCode] $response");
        }
    }

    public function DonationQuotation($id)
    {
        $donation = Donation::findOrFail($id);
        $pdf = app(PDF::class);
        $pdf = $pdf->loadView('bill.DonationQuotation', compact('donation'));
        return $pdf->stream('DonationQuotation.pdf');
    }
}