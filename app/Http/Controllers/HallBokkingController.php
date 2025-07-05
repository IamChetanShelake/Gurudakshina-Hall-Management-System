<?php

namespace App\Http\Controllers;

use App\Models\Eventitem;
use App\Models\BookedHall;
use App\Models\HallEnquiry;
use App\Models\Cateringitem;
use App\Models\EventService;
use Illuminate\Http\Request;
use App\Models\CateringService;

class HallBokkingController extends Controller
{
    public function index(){
        // Fetch all booked halls
        $bookedHalls = BookedHall::all();
        $eventServices = EventService::all();
        $cateringServices = CateringService::all();
        return view('admin.BookedHall.bookedHall', compact('bookedHalls','eventServices','cateringServices'));
    }

    public function view($id){
        // Fetch the booked hall record by ID
        $bookedHall = BookedHall::findOrFail($id);

        // Return the view with the booked hall data
        return view('admin.BookedHall.ViewBooked', compact('bookedHall'));

    }


    public function confirmBooking($id, Request $request)
    {
        // Fetch hall enquiry record
        $hallenquiry = HallEnquiry::findOrFail($id);

        // Extract vendor data (convert JSON string to array)
        $vendorServices = json_decode($hallenquiry->vendor, true) ?? [];

        // Initialize event and catering flags
        $eventFlag = in_array('event', $vendorServices) ? '1' : '0';
        $cateringFlag = in_array('catering', $vendorServices) ? '1' : '0';

        // Fetch total rent from hallenquirys table
        $totalRent = $hallenquiry->rent_amount;
        $totalDeposit = $hallenquiry->deposit;

        // Store payment details as NULL for now
        $paidAmount = null;
        $remainingAmount = null;

        // Generate a unique 6-digit booking code
        do {
            $bookingCode = mt_rand(100000, 999999);
        } while (BookedHall::where('booking_code', $bookingCode)->exists());

        // Create a new booked hall entry
        $bookedHall = new BookedHall();
        $bookedHall->hall_enquiry_id = $hallenquiry->id;
        $bookedHall->customer_name = $hallenquiry->name;
        $bookedHall->customer_phone = $hallenquiry->contact_no;
        $bookedHall->customer_email = $hallenquiry->email;
        $bookedHall->event_date = $hallenquiry->event_date;
        // $bookedHall->event_time = $hallenquiry->event_time;
        $bookedHall->event_type = $hallenquiry->event_type;
        $bookedHall->hall_name = $hallenquiry->hall;
        $bookedHall->duration = $hallenquiry->duration;
        $bookedHall->start_time = $hallenquiry->start_time;
        $bookedHall->end_time = $hallenquiry->end_time;
        $bookedHall->catering_flag = $cateringFlag;
        $bookedHall->event_flag = $eventFlag;
        $bookedHall->total_rent = $totalRent;
        $bookedHall->total_deposit = $totalDeposit;
        $bookedHall->paid_amount = $paidAmount; // NULL for now
        $bookedHall->remaining_amount = $remainingAmount; // NULL for now
        $bookedHall->booking_code = $bookingCode; // Store the unique booking code
        $bookedHall->save();  // Save the data

        // Update the status of hall enquiry to "confirmed"
        $hallenquiry->status = 'confirmed';
        $hallenquiry->save();

        $this->sendWhatsappMessage($hallenquiry, $bookingCode);
        $this->sendWhatsappToVendors($hallenquiry);    

        return redirect('/AdminHallEnquiry')->with('success', 'Booking Confirmed Successfully');
    }

    private function sendWhatsappMessage($hallenquiry, $bookingCode)
    {
        $apiUrl = config('oneclick.api_url') . "/" . config('oneclick.api_version') . "/" . config('oneclick.phone_id') . "/messages";
        $token = trim(config('oneclick.api_token'));

        // Format contact number
        $contactNumber = "+91" . $hallenquiry->contact_no;

        // Fetch admin mobile number
        $admin = \App\Models\User::where('role', 'admin')->first();
        $adminMobile = $admin->mobile ?? 'Not Provided';

        // Build payload for the WhatsApp API
        $payloadArray = [
            "to" => $contactNumber,
            "recipient_type" => "individual",
            "type" => "template",
            "template" => [
                "name" => "test11",
                "language" => [
                    "policy" => "deterministic",
                    "code" => "en"
                ],
                "components" => [
                    [
                        "type" => "body",
                        "parameters" => [
                            ["type" => "text", "text" => $hallenquiry->name],               // {{1}} - Customer Name
                            ["type" => "text", "text" => $hallenquiry->hall],               // {{2}} - Hall Name
                            ["type" => "text", "text" => $adminMobile],                    // {{3}} - Admin Mobile
                            ["type" => "text", "text" => $bookingCode]                     // {{4}} - Booking Code
                        ]
                    ]
                ]
            ]
        ];

        $payload = json_encode($payloadArray);

        // Send request via cURL
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

        // 📝 Log everything
        \Log::info("📤 WhatsApp Message Sent", [
            'contact' => $contactNumber,
            'code' => $httpCode,
            'response' => $response,
            'payload' => $payloadArray,
            'curl_error' => $curlError
        ]);

        if ($httpCode == 200) {
            \Log::info("✅ WhatsApp confirmation sent to {$contactNumber}.");
        } else {
            \Log::error("❌ WhatsApp message failed for {$contactNumber}. HTTP {$httpCode} - {$response}");
        }
    }

    private function sendWhatsappToVendors($hallenquiry)
    {
        $vendorsSelected = json_decode($hallenquiry->vendor, true) ?? [];

        if (empty($vendorsSelected)) {
            \Log::info("🚫 No vendors selected for enquiry ID {$hallenquiry->id}");
            return;
        }

        foreach ($vendorsSelected as $vendorType) {
            $vendors = \App\Models\User::where('role', $vendorType)->get();

            foreach ($vendors as $vendor) {
                $vendorName = $vendor->name;
                $customerName = $hallenquiry->name;
                $eventType = $hallenquiry->hall;

                $payload = [
                    "to" => "+91" . $vendor->mobile,
                    "recipient_type" => "individual",
                    "type" => "template",
                    "template" => [
                        "language" => [
                            "policy" => "deterministic",
                            "code" => "en"
                        ],
                        "name" => "template5",
                        "components" => [
                            [
                                "type" => "body",
                                "parameters" => [
                                    ["type" => "text", "text" => $vendorName],     // {{1}} Vendor Name
                                    ["type" => "text", "text" => $customerName],   // {{2}} Customer Name
                                    ["type" => "text", "text" => $eventType]       // {{3}} Event Type
                                ]
                            ]
                        ]
                    ]
                ];

                // Send cURL request
                $this->sendWhatsAppCurlRequest($payload);
            }
        }
    }

    private function sendWhatsAppCurlRequest($payloadArray)
    {
        $apiUrl = config('oneclick.api_url') . "/" . config('oneclick.api_version') . "/" . config('oneclick.phone_id') . "/messages";
        $token = trim(config('oneclick.api_token'));

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

        \Log::info("📩 Vendor WhatsApp Message", [
            'payload' => $payloadArray,
            'response' => $response,
            'http_code' => $httpCode,
            'curl_error' => $curlError
        ]);

        if ($httpCode == 200) {
            \Log::info("✅ Message sent to vendor successfully.");
        } else {
            \Log::error("❌ Failed to send message to vendor. HTTP {$httpCode} - {$response}");
        }
    }

    public function updateStatus(Request $request)
    {
        $serviceType = $request->service_type;
        $serviceId = $request->service_id;
        $status = $request->status;

        if ($serviceType === 'event') {
            $service = EventService::find($serviceId);
        } else {
            $service = CateringService::find($serviceId);
        }

        if ($service) {
            $service->status = $status;
            $service->save();
            // Call sendWhatsappMessageToVendors and sendWhatsappMessageToUser when the status is approved
            if ($status === 'approved') {
                $this->sendWhatsappMessageToVendors($service);
                $this->sendWhatsappMessageToUser($service);
            }
            return back()->with('success', 'Status updated successfully.');
        }

        return back()->with('fail', 'Service not found.');
    }

    private function sendWhatsappMessageToVendors($service)
    {
        // Determine the service type and fetch related booked hall
        $bookedHall = BookedHall::find($service->booked_hall_id);
        if (!$bookedHall) {
            \Log::error("❌ No booked hall found for service ID {$service->id}");
            return;
        }

        // Fetch hall enquiry to get hall name and event date
        $hallEnquiry = HallEnquiry::find($bookedHall->hall_enquiry_id);
        if (!$hallEnquiry) {
            \Log::error("❌ No hall enquiry found for booked hall ID {$bookedHall->id}");
            return;
        }

        // Determine vendor role based on service type
        $vendorRole = $service instanceof EventService ? 'event' : 'catering';

        // Fetch vendors with the specified role
        $vendors = \App\Models\User::where('role', $vendorRole)->get();

        if ($vendors->isEmpty()) {
            \Log::info("🚫 No vendors found for role {$vendorRole} for service ID {$service->id}");
            return;
        }

        foreach ($vendors as $vendor) {
            $vendorName = $vendor->name;
            $hallName = $hallEnquiry->hall;
            $eventDate = $hallEnquiry->event_date;

            // Build payload for WhatsApp API
            $payload = [
                "to" => "+91" . $vendor->mobile,
                "recipient_type" => "individual",
                "type" => "template",
                "template" => [
                    "language" => [
                        "policy" => "deterministic",
                        "code" => "en"
                    ],
                    "name" => "template9",
                    "components" => [
                        [
                            "type" => "body",
                            "parameters" => [
                                ["type" => "text", "text" => $vendorName],    // {{1}} Vendor Name
                                ["type" => "text", "text" => $hallName],      // {{2}} Hall Name
                                ["type" => "text", "text" => $eventDate]      // {{3}} Event Date
                            ]
                        ]
                    ]
                ]
            ];

            // Send cURL request using existing method
            $this->sendWhatsAppCurlRequest($payload);
        }
    }

    private function sendWhatsappMessageToUser($service)
    {
        // Fetch related booked hall
        $bookedHall = BookedHall::find($service->booked_hall_id);
        if (!$bookedHall) {
            \Log::error("❌ No booked hall found for service ID {$service->id}");
            return;
        }

        // Fetch hall enquiry to get customer details, hall name, and event date
        $hallEnquiry = HallEnquiry::find($bookedHall->hall_enquiry_id);
        if (!$hallEnquiry) {
            \Log::error("❌ No hall enquiry found for booked hall ID {$bookedHall->id}");
            return;
        }

        // Format contact number
        $contactNumber = "+91" . $hallEnquiry->contact_no;
        $customerName = $hallEnquiry->name;
        $hallName = $hallEnquiry->hall;
        $eventDate = $hallEnquiry->event_date;

        // Build payload for WhatsApp API
        $payload = [
            "to" => $contactNumber,
            "recipient_type" => "individual",
            "type" => "template",
            "template" => [
                "language" => [
                    "policy" => "deterministic",
                    "code" => "en"
                ],
                "name" => "template10",
                "components" => [
                    [
                        "type" => "body",
                        "parameters" => [
                            ["type" => "text", "text" => $customerName],    // {{1}} Customer Name
                            ["type" => "text", "text" => $hallName],       // {{2}} Hall Name
                            ["type" => "text", "text" => $eventDate]       // {{3}} Event Date
                        ]
                    ]
                ]
            ]
        ];

        // Send cURL request using existing method
        $this->sendWhatsAppCurlRequest($payload);
    }

    public function ViewEventCatering($id)
    {
        $eventServices = EventService::where('booked_hall_id', $id)->get();
        $cateringServices = CateringService::where('booked_hall_id', $id)->get();

        foreach ($eventServices as $serviceEvent) {
            $itemIds = json_decode($serviceEvent->Item_id, true); // Decode stored JSON array

            // Fetch item names based on IDs and store in a new attribute
            $serviceEvent->item_names = Eventitem::whereIn('id', $itemIds)->pluck('item_name')->toArray();
        }

        foreach ($cateringServices as $serviceCatering) {
            $itemIds = json_decode($serviceCatering->Item_id, true); // Decode stored JSON array

            // Fetch item names based on IDs and store in a new attribute
            $serviceCatering->item_names = Cateringitem::whereIn('id', $itemIds)->pluck('item_name')->toArray();
        }

        return view('admin.BookedHall.ViewEventCatering', compact('eventServices', 'cateringServices'));
    }
}