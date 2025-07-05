<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BillController;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Models\Hall;
use Barryvdh\DomPDF\PDF;
use App\Models\Accessorie;
use App\Models\BookedHall;
use App\Models\HallEnquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class HallEnquiryController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'contact_no' => 'required|digits:10|regex:/^[6-9]\d{9}$/',
            'event_type' => 'required',
            'event_date' => 'required|date|after:today',
            'duration' => 'required',
            'hall' => 'required',
            'expected_audience' => 'required|integer|min:1|max:10000',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
        ]);

            $isBooked = BookedHall::where('hall_name', $request->hall)
            ->where('event_date', $request->event_date)
            ->exists();

            if ($isBooked) {
            return redirect()->back()->withErrors(['event_date' => 'This hall is already booked on the selected date.']);
            }

            $hall = Hall::where('name', $request->hall)->first();
            // Store data in the database
            $hallenquiry = new HallEnquiry();
            $hallenquiry->name = $request->name;
            $hallenquiry->organization = $request->organization;
            $hallenquiry->gst_no = $request->gst_no;
            $hallenquiry->email = $request->email;
            $hallenquiry->contact_no = $request->contact_no;
            $hallenquiry->address = $request->address;
            $hallenquiry->referred_by = $request->referred_by;
            $hallenquiry->event_type = $request->event_type;
            $hallenquiry->event_date = $request->event_date;

            $hallenquiry->hall = $request->hall;
            $hallenquiry->hall_id = $request->hall_id;

            $hallenquiry->duration = $request->duration;
            $hallenquiry->vendor = json_encode($request->vendor ?? []);

            $hallenquiry->expected_audience = $request->expected_audience;
            $hallenquiry->status = 'pending';
            $hallenquiry->accessorie = json_encode($request->accessorie ?? []);
            $hallenquiry->hall_id = $request->hall_id;
            $hallenquiry->start_time = $request->start_time;
            $hallenquiry->end_time = $request->end_time;

            $hallenquiry->save();




            $adminEmail = "kshatriyashivam34@gmail.com"; // Change this to your admin email

           
            $this->sendWhatsappMessage($hallenquiry);
            $this->sendWhatsappMessageForAdmin($hallenquiry);
        return redirect()->back()->with('success', 'Enquiry submitted successfully! A confirmation email has been sent.');
    }

  

    private function sendWhatsappMessage($hallenquiry)
        {
            $apiUrl = config('oneclick.api_url') . "/" . config('oneclick.api_version') . "/" . config('oneclick.phone_id') . "/messages";
            $token = trim(config('oneclick.api_token'));

            // Clean user's contact number
            $contactNumber = "+91" . $hallenquiry->contact_no;

            // 🧠 Fetch admin mobile number from users table
            $admin = \App\Models\User::where('role', 'admin')->first();

            $payloadArray = [
                "to" => $contactNumber,
                "recipient_type" => "individual",
                "type" => "template",
                "template" => [
                    "name" => "template1",
                    "language" => [
                        "policy" => "deterministic",
                        "code" => "en"
                    ],
                    "components" => [
                        [
                            "type" => "body",
                            "parameters" => [
                                ["type" => "text", "text" => $hallenquiry->name],
                                ["type" => "text", "text" => $hallenquiry->hall],
                                ["type" => "text", "text" => $admin->mobile ?? 'Not Provided']
                            ]
                        ]
                    ]
                ]
            ];

            $payload = json_encode($payloadArray);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                "Authorization: Bearer " . $token,
                "Content-Type: application/json"
            ]);

            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $curlError = curl_error($ch);
            curl_close($ch);

            // Logging
            Log::info("📤 WhatsApp API Request Sent", [
                "URL" => $apiUrl,
                "Payload (raw JSON)" => $payload,
                "Payload (array)" => $payloadArray,
                "HTTP Code" => $httpCode,
                "Response" => $response,
                "cURL Error" => $curlError,
            ]);

            if ($httpCode == 200) {
                Log::info("✅ WhatsApp message sent to {$contactNumber}.");
            } else {
                Log::error("❌ WhatsApp message failed for {$contactNumber}. HTTP {$httpCode} - {$response}");
            }
        }

    private function sendWhatsappMessageForAdmin($hallenquiry)
        {
            $apiUrl = config('oneclick.api_url') . "/" . config('oneclick.api_version') . "/" . config('oneclick.phone_id') . "/messages";
            $token = trim(config('oneclick.api_token'));
        
            // 🧠 Fetch admin from the users table
            $admin = \App\Models\User::where('role', 'admin')->first();
        
            if (!$admin || !$admin->mobile) {
                Log::error("❌ Admin not found or mobile number is missing.");
                return;
            }
        
            $adminPhone = "+91" . $admin->mobile;
        
            // ⚙️ Construct payload as per your template2
            $payloadArray = [
                "to" => $adminPhone,
                "recipient_type" => "individual",
                "type" => "template",
                "template" => [
                    "language" => [
                        "policy" => "deterministic",
                        "code" => "en"
                    ],
                    "name" => "template2",
                    "components" => [
                        [
                            "type" => "body",
                            "parameters" => [
                                ["type" => "text", "text" => $hallenquiry->name],
                                ["type" => "text", "text" => $hallenquiry->hall],
                                ["type" => "text", "text" => $hallenquiry->event_date]
                            ]
                        ]
                    ]
                ]
            ];
        
            $payload = json_encode($payloadArray);
        
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                "Authorization: Bearer " . $token,
                "Content-Type: application/json"
            ]);
        
            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $curlError = curl_error($ch);
            curl_close($ch);
        
            // 🧾 Log for debugging
            Log::info("📤 WhatsApp Admin Message Sent", [
                "URL" => $apiUrl,
                "Payload" => $payload,
                "HTTP Code" => $httpCode,
                "Response" => $response,
                "cURL Error" => $curlError,
            ]);
        
            if ($httpCode == 200) {
                Log::info("✅ Admin WhatsApp message sent to {$adminPhone}.");
            } else {
                Log::error("❌ Admin WhatsApp message failed. HTTP {$httpCode} - {$response}");
            }
        }
        
    public function index()
    {
        $hallenquiries = HallEnquiry::whereIn('status', ['Viewed', 'pending'])->get();
        return view('admin.AdminHallEnquiry.HallEnquiryTable', compact('hallenquiries'));
    }


    public function view($id){
        $hallenquirie = HallEnquiry::find($id);
        $accessories = Accessorie::all();
        return view('admin.AdminHallEnquiry.ViewHallEnquiry', compact('hallenquirie','accessories'));
    }



    public function storeOffice(Request $request, $id)
        {
            $hallEnquiry = HallEnquiry::find($id);
            $hallEnquiry->rent_amount  = $request->rent_amount;
            $hallEnquiry->deposit = $request->deposit;
            $hallEnquiry->special_note = $request->special_note;
            $hallEnquiry->id_proof = $request->id_proof;
            $hallEnquiry->event_setup  = $request->event_setup;
            $hallEnquiry->status = 'Viewed';
            $hallEnquiry->accessorie = json_encode($request->accessorie ?? []);
            $hallEnquiry->save();

            // ✅ Generate Bill using BillController
            $billController = new BillController();
            return $billController->generateBill($id);

            // return redirect()->route('AdminHallEnquiry')->with('success', 'Enquiry details saved successfully.');


        }




}
