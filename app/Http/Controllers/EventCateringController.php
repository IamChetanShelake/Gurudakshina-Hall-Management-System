<?php

namespace App\Http\Controllers;

use App\Models\BookedHall;
use App\Models\Cateringitem;
use App\Models\EventService;
use Illuminate\Http\Request;
use App\Models\CateringService;
use App\Models\Eventitem;
use Illuminate\Support\Facades\Auth;

class EventCateringController extends Controller
{

    // public function eventBookedHalls()
    // {

    //     $eventBookings = BookedHall::where('event_flag', 1)
    //     ->with('eventServices')
    //     ->get();


    //     return view('Event.EventTable', compact('eventBookings'));
    // }
    public function eventBookedHalls()
    {
        // Ensure the user is logged in
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'You must be logged in to view bookings.');
        }

        // Get the logged-in vendor's ID
        $vendorId = Auth::id();

        // Fetch bookings where:
        // - `event_flag = 1` (for event-related bookings)
        // - `booked_by` is NULL (unbooked halls)
        // - OR `booked_by` matches the logged-in vendor (vendor sees only their own bookings)
        $eventBookings = BookedHall::where('event_flag', 1)
        ->where(function ($query) use ($vendorId) {
            $query->whereNull('event_booked_by')  // Show unbooked halls
                  ->orWhere('event_booked_by', $vendorId); // Show only vendor's own bookings
        })
        ->with('eventServices')
        ->get();

        return view('Event.VendorEventCrud.EventTable', compact('eventBookings'));
    }

    public function viewEventBooking($id){
        $eventBooking = BookedHall::with('eventServices')->findOrFail($id);
         // ✅ Update `booked_by` field in `booked_halls` table
         foreach ($eventBooking->eventServices as $service) {
            $itemIds = json_decode($service->Item_id, true); // Decode stored JSON array

            // Fetch item names based on IDs and store in a new attribute
            $service->item_names = Eventitem::whereIn('id', $itemIds)->pluck('item_name')->toArray();
        }



        // Pass data to the view
        return view('Event.VendorEventCrud.EventViewBooking', compact('eventBooking'));
    }

    public function CreateEventService($booked_hall_id){
        $eventitems = Eventitem::all();
        return view('Event.VendorEventCrud.AddEventService', compact('booked_hall_id','eventitems'));
    }
    public function AddEventService(Request $request,$booked_hall_id){

        // $validated = $request->validate([
        //     'booked_hall_id' => 'required|exists:booked_halls,id',
        //     'service_name' => 'required|string|max:255',
        //     'service_price' => 'required|numeric',
        //     'quantity' => 'required|integer|min:1',
        //     'total_price' => 'required|numeric'
        // ]);

        if (!Auth::check()) {
            return redirect()->back()->with('error', 'You must be logged in to book an event.');
        }

           // Get the logged-in vendor's ID (or use name if needed)
            $vendorId = Auth::id(); // Get vendor ID
            $vendorName = Auth::user()->name; // Get vendor name

        // Retrieve booked_hall_id from the URL
        $booked_hall_id = request('booked_hall_id');

        // Ensure booked_hall_id is not null
        if (!$booked_hall_id) {
            return redirect()->back()->with('error', 'Booked Hall ID is required.');
        }
         // ✅ Update `booked_by` field in `booked_halls` table
         BookedHall::where('id', $booked_hall_id)->update([
            'event_booked_by' => $vendorId, // or use $vendorName if you want the name
        ]);

        $eventBooking = new EventService();
        $eventBooking->booked_hall_id = $booked_hall_id; // Assign booked_hall_id
        $eventBooking->Item_id = json_encode($request->Item_id ?? []);
        $eventBooking->total_price = $request->total_price;
        $eventBooking->status = 'viewed';


        // ✅ Update `booked_by` field in `booked_halls` table
        BookedHall::where('id', $booked_hall_id)->update([
            'event_booked_by' => $vendorId, // or use $vendorName if you want the name
        ]);


        $eventBooking->save();
        $this->sendEventWhatsAppMessage($booked_hall_id, $vendorName);
        return redirect('/event-booked-halls')->with('success', 'Event Price Added Successfully');
    }

    private function sendEventWhatsAppMessage($bookedHallId, $vendorName)
    {
       
        $bookedHall = \App\Models\BookedHall::find($bookedHallId);
  
        if (!$bookedHall) {
            \Log::error("❌ Booked hall not found for ID: {$bookedHallId}");
            return;
        }
    
        $apiUrl = config('oneclick.api_url') . "/" . config('oneclick.api_version') . "/" . config('oneclick.phone_id') . "/messages";
        $token = trim(config('oneclick.api_token'));
    
        $contactNumber =  $bookedHall->customer_phone;
       
        $customerName = $bookedHall->customer_name ?? 'Customer';
        $hallName = $bookedHall->hall_name ?? 'Event Hall';

        $payloadArray = [
            "to" => $contactNumber,
            "recipient_type" => "individual",
            "type" => "template",
            "template" => [
                "name" => "template6",
                "language" => [
                    "policy" => "deterministic",
                    "code" => "en"
                ],
                "components" => [
                    [
                        "type" => "body",
                        "parameters" => [
                            ["type" => "text", "text" => $customerName], // {{1}}
                            ["type" => "text", "text" => $vendorName],   // {{2}}
                            ["type" => "text", "text" => $hallName],     // {{3}}
                        ]
                    ]
                ]
            ]
        ];
    
        $payload = json_encode($payloadArray);
    
        // 🛜 Send via cURL
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
    
        // 🧾 Log everything
        \Log::info("📤 Catering WhatsApp Message Log", [
            'contact' => $contactNumber,
            'http_code' => $httpCode,
            'payload' => $payloadArray,
            'response' => $response,
            'error' => $curlError
        ]);
    
        if ($httpCode == 200) {
            \Log::info("✅ WhatsApp catering message sent to {$contactNumber}.");
        } else {
            \Log::error("❌ WhatsApp catering message failed for {$contactNumber}. HTTP {$httpCode} - {$response}");
        }
    }
    

    // Confirm Event Booking
    // public function confirmEvent($eventId)
    // {
    //     // return $eventId;
    //     $eventBooking = EventService::where('booked_hall_id',$eventId)->first();
    //     // if ($eventBooking) {
    //         $eventBooking->status = 'confirmed' ;

    //         $eventBooking->save();


    //     return redirect()->back()->with('success', 'Event booking confirmed successfully!');
    // }

    public function confirmEvent($eventId)
        {
            $eventBooking = EventService::where('booked_hall_id', $eventId)->first();
            if ($eventBooking) {
                $eventBooking->status = 'confirmed';
                $eventBooking->save();

                $vendorName = Auth::user()->name ?? 'Vendor'; // vendor's name
                $this->sendBookingConfirmedMessage($eventId, $vendorName, 'event');
                $this->sendBookingConfirmedMessageToAdmin($eventId, $vendorName);

                
            }

            return redirect()->back()->with('success', 'Event booking confirmed successfully!');
        }

        private function sendBookingConfirmedMessageToAdmin($bookedHallId, $vendorName)
            {
                // Fetch booked hall data
                $bookedHall = \App\Models\BookedHall::find($bookedHallId);

                if (!$bookedHall) {
                    \Log::error("❌ Booked hall not found for ID: {$bookedHallId}");
                    return;
                }

                // Fetch admin user (role = admin)
                $admin = \App\Models\User::where('role', 'admin')->first();

                if (!$admin || !$admin->mobile) {
                    \Log::error("❌ Admin user or mobile number not found.");
                    return;
                }

                // Prepare values for message
                $adminContact = $admin->mobile;
                $customerName = $bookedHall->customer_name ?? 'Customer';
                $eventDate = $bookedHall->event_date ?? 'N/A';
                $hallName = $bookedHall->hall_name ?? 'Event Hall';

                // WhatsApp API details from config
                $apiUrl = config('oneclick.api_url') . "/" . config('oneclick.api_version') . "/" . config('oneclick.phone_id') . "/messages";
                $token = trim(config('oneclick.api_token'));

                // Create the payload
                $payloadArray = [
                    "to" => $adminContact,
                    "recipient_type" => "individual",
                    "type" => "template",
                    "template" => [
                        "name" => "template8", // your admin template name
                        "language" => [
                            "policy" => "deterministic",
                            "code" => "en"
                        ],
                        "components" => [
                            [
                                "type" => "body",
                                "parameters" => [
                                    ["type" => "text", "text" => $vendorName],    // {{1}} Vendor Name
                                    ["type" => "text", "text" => $customerName],  // {{2}} Customer Name
                                    ["type" => "text", "text" => $eventDate],     // {{3}} Event Date
                                    ["type" => "text", "text" => $hallName],      // {{4}} Hall Name
                                ]
                            ]
                        ]
                    ]
                ];

                $payload = json_encode($payloadArray);

                // Send using cURL
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

                // Log response for debugging
                \Log::info("📤 Admin WhatsApp Booking Message Log", [
                    'admin_contact' => $adminContact,
                    'http_code' => $httpCode,
                    'payload' => $payloadArray,
                    'response' => $response,
                    'error' => $curlError
                ]);

                // Handle success/failure
                if ($httpCode == 200) {
                    \Log::info("✅ Booking confirmation message sent to admin: {$adminContact}.");
                } else {
                    \Log::error("❌ Failed to send booking message to admin. HTTP {$httpCode} - {$response}");
                }
            }

























    // public function cateringBookedHalls()
    // {
    //     // Fetch records where catering_flag = 1
    //     $cateringBookings = BookedHall::where('catering_flag', 1)->get();

    //     // Pass data to the view
    //     return view('Catering.CateringTable', compact('cateringBookings'));
    // }

    public function cateringBookedHalls()
    {
        // Ensure the user is logged in
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'You must be logged in to view bookings.');
        }

        // Get the logged-in vendor's ID
        $vendorId = Auth::id();

        // Fetch bookings where:
        // - `event_flag = 1` (for event-related bookings)
        // - `booked_by` is NULL (unbooked halls)
        // - OR `booked_by` matches the logged-in vendor (vendor sees only their own bookings)
        $cateringBookings = BookedHall::where('catering_flag', 1)
        ->where(function ($query) use ($vendorId) {
            $query->whereNull('catering_booked_by')  // Show unbooked halls
                  ->orWhere('catering_booked_by', $vendorId); // Show only vendor's own bookings
        })
        ->with('cateringServices')
        ->get();

        return view('Catering.CateringTable', compact('cateringBookings'));
    }




    public function viewCateringBooking($id){
        $cateringBooking = BookedHall::findOrFail($id);

         // ✅ Update `booked_by` field in `booked_halls` table
         foreach ($cateringBooking->cateringServices as $service) {
            $itemIds = json_decode($service->Item_id, true); // Decode stored JSON array

            // Fetch item names based on IDs and store in a new attribute
            $service->item_names = Cateringitem::whereIn('id', $itemIds)->pluck('item_name')->toArray();
        }


        // Pass data to the view
        return view('Catering.CateringViewBooking', compact('cateringBooking'));
    }


    public function CreateCateringService($booked_hall_id){
        $cateringitems = Cateringitem::all();
        return view('Catering.AddCateringService', compact('booked_hall_id','cateringitems'));
    }


    public function AddCateringService(Request $request,$booked_hall_id){

        // $validated = $request->validate([
        //     'booked_hall_id' => 'required|exists:booked_halls,id',
        //     'service_name' => 'required|string|max:255',
        //     'service_price' => 'required|numeric',
        //     'quantity' => 'required|integer|min:1',
        //     'total_price' => 'required|numeric'
        // ]);

        if (!Auth::check()) {
            return redirect()->back()->with('error', 'You must be logged in to book an event.');
        }

        // Get the logged-in vendor's ID (or use name if needed)
        $vendorId = Auth::id(); // Get vendor ID
        $vendorName = Auth::user()->name; // Get vendor name



        // Retrieve booked_hall_id from the URL
        $booked_hall_id = request('booked_hall_id');

        // Ensure booked_hall_id is not null
        if (!$booked_hall_id) {
            return redirect()->back()->with('error', 'Booked Hall ID is required.');
        }

        $cateringBooking = new CateringService();
        $cateringBooking->booked_hall_id = $booked_hall_id; // Assign booked_hall_id
        $cateringBooking->Item_id = json_encode($request->Item_id ?? []);
        $cateringBooking->total_price = $request->total_price;
        $cateringBooking->status = 'viewed';

        // ✅ Update `booked_by` field in `booked_halls` table
        BookedHall::where('id', $booked_hall_id)->update([
            'catering_booked_by' => $vendorId, // or use $vendorName if you want the name
        ]);



        $cateringBooking->save();

        $this->sendCateringWhatsAppMessage($booked_hall_id, $vendorName);
        return redirect('/catering-booked-halls')->with('success', 'Catering Service Added Successfully');
    }



        private function sendCateringWhatsAppMessage($bookedHallId, $vendorName)
            {
               
                $bookedHall = \App\Models\BookedHall::find($bookedHallId);
          
                if (!$bookedHall) {
                    \Log::error("❌ Booked hall not found for ID: {$bookedHallId}");
                    return;
                }
            
                $apiUrl = config('oneclick.api_url') . "/" . config('oneclick.api_version') . "/" . config('oneclick.phone_id') . "/messages";
                $token = trim(config('oneclick.api_token'));
            
                $contactNumber =  $bookedHall->customer_phone;
               
                $customerName = $bookedHall->customer_name ?? 'Customer';
                $hallName = $bookedHall->hall_name ?? 'Event Hall';
        
                $payloadArray = [
                    "to" => $contactNumber,
                    "recipient_type" => "individual",
                    "type" => "template",
                    "template" => [
                        "name" => "template6",
                        "language" => [
                            "policy" => "deterministic",
                            "code" => "en"
                        ],
                        "components" => [
                            [
                                "type" => "body",
                                "parameters" => [
                                    ["type" => "text", "text" => $customerName], // {{1}}
                                    ["type" => "text", "text" => $vendorName],   // {{2}}
                                    ["type" => "text", "text" => $hallName],     // {{3}}
                                ]
                            ]
                        ]
                    ]
                ];
            
                $payload = json_encode($payloadArray);
            
                // 🛜 Send via cURL
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
            
                // 🧾 Log everything
                \Log::info("📤 Catering WhatsApp Message Log", [
                    'contact' => $contactNumber,
                    'http_code' => $httpCode,
                    'payload' => $payloadArray,
                    'response' => $response,
                    'error' => $curlError
                ]);
            
                if ($httpCode == 200) {
                    \Log::info("✅ WhatsApp catering message sent to {$contactNumber}.");
                } else {
                    \Log::error("❌ WhatsApp catering message failed for {$contactNumber}. HTTP {$httpCode} - {$response}");
                }
            }
        






    // public function confirmCatering($cateringId)
    // {

    //     $cateringBooking = CateringService::where('booked_hall_id',$cateringId)->first();
    //     if ($cateringBooking) {
    //         $cateringBooking->status = 'confirmed';
    //         $cateringBooking->save();
    //     }

    //     return redirect()->back()->with('success', 'Catering booking confirmed successfully!');
    // }

    public function confirmCatering($cateringId)
        {
            $cateringBooking = CateringService::where('booked_hall_id', $cateringId)->first();
            if ($cateringBooking) {
                $cateringBooking->status = 'confirmed';
                $cateringBooking->save();

                $vendorName = Auth::user()->name ?? 'Vendor';
                $this->sendBookingConfirmedMessage($cateringId, $vendorName, 'catering');
                $this->sendBookingConfirmedMessageToAdminForCatering($cateringId, $vendorName);

            }

            return redirect()->back()->with('success', 'Catering booking confirmed successfully!');
        }

        private function sendBookingConfirmedMessageToAdminForCatering($bookedHallId, $vendorName)
            {
                // Fetch booked hall data
                $bookedHall = \App\Models\BookedHall::find($bookedHallId);

                if (!$bookedHall) {
                    \Log::error("❌ Booked hall not found for ID: {$bookedHallId}");
                    return;
                }

                // Fetch admin user (role = admin)
                $admin = \App\Models\User::where('role', 'admin')->first();

                if (!$admin || !$admin->mobile) {
                    \Log::error("❌ Admin user or mobile number not found.");
                    return;
                }

                // Prepare values for message
                $adminContact = $admin->mobile;
                $customerName = $bookedHall->customer_name ?? 'Customer';
                $eventDate = $bookedHall->event_date ?? 'N/A';
                $hallName = $bookedHall->hall_name ?? 'Catering Hall';

                // WhatsApp API details from config
                $apiUrl = config('oneclick.api_url') . "/" . config('oneclick.api_version') . "/" . config('oneclick.phone_id') . "/messages";
                $token = trim(config('oneclick.api_token'));

                // Create the payload
                $payloadArray = [
                    "to" => $adminContact,
                    "recipient_type" => "individual",
                    "type" => "template",
                    "template" => [
                        "name" => "template8", // admin message template name
                        "language" => [
                            "policy" => "deterministic",
                            "code" => "en"
                        ],
                        "components" => [
                            [
                                "type" => "body",
                                "parameters" => [
                                    ["type" => "text", "text" => $vendorName],    // {{1}} Vendor Name
                                    ["type" => "text", "text" => $customerName],  // {{2}} Customer Name
                                    ["type" => "text", "text" => $eventDate],     // {{3}} Event Date
                                    ["type" => "text", "text" => $hallName],      // {{4}} Hall Name
                                ]
                            ]
                        ]
                    ]
                ];

                $payload = json_encode($payloadArray);

                // Send using cURL
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

                // Log response for debugging
                \Log::info("📤 Admin WhatsApp Catering Message Log", [
                    'admin_contact' => $adminContact,
                    'http_code' => $httpCode,
                    'payload' => $payloadArray,
                    'response' => $response,
                    'error' => $curlError
                ]);

                // Handle success/failure
                if ($httpCode == 200) {
                    \Log::info("✅ Catering confirmation message sent to admin: {$adminContact}.");
                } else {
                    \Log::error("❌ Failed to send catering message to admin. HTTP {$httpCode} - {$response}");
                }
            }








    private function sendBookingConfirmedMessage($bookedHallId, $vendorName, $type = 'event')
            {
                $bookedHall = \App\Models\BookedHall::find($bookedHallId);

                if (!$bookedHall) {
                    \Log::error("❌ Booked hall not found for ID: {$bookedHallId}");
                    return;
                }

                $apiUrl = config('oneclick.api_url') . "/" . config('oneclick.api_version') . "/" . config('oneclick.phone_id') . "/messages";
                $token = trim(config('oneclick.api_token'));

                $contactNumber = $bookedHall->customer_phone;
                $customerName = $bookedHall->customer_name ?? 'Customer';
                $hallName = $bookedHall->hall_name ?? 'Event Hall';
                $eventDate = $bookedHall->event_date ?? 'N/A';

                $payloadArray = [
                    "to" => $contactNumber,
                    "recipient_type" => "individual",
                    "type" => "template",
                    "template" => [
                        "name" => "template7",
                        "language" => [
                            "policy" => "deterministic",
                            "code" => "en"
                        ],
                        "components" => [
                            [
                                "type" => "body",
                                "parameters" => [
                                    ["type" => "text", "text" => $customerName],   // {{1}}
                                    ["type" => "text", "text" => $hallName],       // {{2}}
                                    ["type" => "text", "text" => $eventDate],      // {{3}}
                                    ["type" => "text", "text" => $vendorName],     // {{4}}
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

                \Log::info("📤 Vendor Booking Confirmed WhatsApp Message Log", [
                    'contact' => $contactNumber,
                    'http_code' => $httpCode,
                    'payload' => $payloadArray,
                    'response' => $response,
                    'error' => $curlError
                ]);

                if ($httpCode == 200) {
                    \Log::info("✅ Vendor booking confirmation message sent to {$contactNumber}.");
                } else {
                    \Log::error("❌ Vendor booking confirmation failed for {$contactNumber}. HTTP {$httpCode} - {$response}");
                }
            }



}
