<?php

namespace App\Http\Controllers;

use App\Models\Key;
use App\Models\Hall;
use App\Models\Page;
use App\Models\Team;
use App\Models\Test;
use App\Models\About;
use App\Models\Ideal;
use App\Models\Image;
use App\Models\Contact;
use App\Models\Landing;
use App\Models\HallPage;
use App\Models\Facilitie;
use App\Models\BookedHall;
use App\Models\Hall_Image;
use App\Models\HallEnquiry;
use App\Models\OurFacilite;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index(){
        $pages= Page::get();
        $halls = Hall::all();
        $landings = Landing::all();
        $facilites  = Facilitie::all();
        $testss = Test::all();
        $contacts = Contact::all();
        $ourfacilities = OurFacilite::all();
        return view('website.index',compact('pages','halls','landings','facilites','testss','contacts','ourfacilities'));
    }

    public function about(){
        $about = About::latest()->first();
        $teams = Team::all();
        $pages= Page::get();
        $facilites  = Facilitie::all();
        $contacts = Contact::all();
        return view('website.about',compact('about','teams','pages','facilites','contacts'));
    }

    public function facilities(){
        return view('website.facilities');
    }

    public function contact(){
        $contacts = Contact::all();
        $pages= Page::get();
        return view('website.contact',compact('pages','contacts'));
    }

    public function gallery(){
       // return 'Hello world!';
       $images = Image::all();
       $pages= Page::get();
       $contacts = Contact::all();

        return view('website.gallery',compact('images','pages','contacts'));
    }

    public function hall(){
        $pages= Page::get();
        $halls = Hall::all();
        $contacts = Contact::all();

        return view('website.hall',compact('pages','halls','contacts'));
    }
    public function hallDetails($id){
        $pages= Page::get();
        $hall = Hall::with(['keys', 'ideals', 'images'])->findOrFail($id); // Fetch keys and ideals
        $hall_images=Hall_Image::where('hall_id',$id)->get();
        $halls = Hall::all();
        $contacts = Contact::all();


        return view('website.hall-detail',compact('pages','hall','hall_images','halls','contacts'));
    }

    public function enquiry(){
        $pages= Page::get();
        $contacts = Contact::all();
        $halls = Hall::all();
        return view('website.enquiry',compact('pages','contacts','halls'));
    }

    public function legal($id){
        $pages= Page::get();
        $page = Page::find($id);
        $contacts = Contact::all();
        return view('website.page-details',compact('pages','page','contacts'));
    }

    public function privacyPolicy($id)
    {
        $hall = Hall::findOrFail($id); // Fetch the hall details
        $hallpage = HallPage::where('hall_id', $id)->firstOrFail(); // Fetch the hall's privacy policy
        $pages= Page::get();
        $contacts = Contact::all();

        return view('website.PrivacyPolicyPage', compact('hall', 'hallpage','pages','contacts'));
    }

    // public function book_now(Request $request)
    // {


    //     $bookingCode = $request->input('booking_code');
    //         $contacts = Contact::all();
    //         $pages= Page::get();

    //         // Check if the booking code exists in the database
    //         $booking = HallEnquiry::where('booking_code', $bookingCode)
    //                 ->with('halll') // Eager load hall details
    //                 ->first();


    //                 if (!$booking) {
    //                     return redirect()->back()->with('error', 'Invalid Booking Code');
    //                 }

    //                 // If booking is found, return the view
    //                 return view('website.book-now', compact('booking', 'contacts', 'pages'));
    // }

    // public function checkBookingPin(Request $request)
    // {
    //     $pin = $request->input('pin');
    //     $contacts = Contact::all();
    //     $pages= Page::get();


    //     // Fetch the record where the booking_code matches the entered PIN
    //     //$booking = HallEnquiry::where('booking_code', $pin)->first();
    //     $booking = BookedHall::with(['enquiry'])->where('booking_code', $pin)->first();

    //     if ($booking) {
    //         $hall = \App\Models\Hall::where('id', $booking->enquiry->hall_id ?? null)->first();
    //         // Directly pass the $booking to the view
    //         return view('website.book-now', ['booking' => $booking],compact('contacts','pages',''));
    //     } else {
    //         return back()->with('error', 'Invalid PIN, please contact the admin.');
    //     }
    // }


    public function checkBookingPin(Request $request)
    {
        $pin = $request->input('pin');
        $contacts = Contact::all();
        $pages = Page::get();

        // Fetch the booked hall along with its hall enquiry
        $booking = BookedHall::with(['enquiry'])->where('booking_code', $pin)->first();


        if ($booking && $booking->enquiry) {
            // Find the hall based on the `hall_name` in `booked_halls`
            $hall = Hall::where('name', $booking->hall_name)->first(); // Fetch the hall details

            return view('website.book-now', compact('contacts', 'pages', 'booking', 'hall'));
        } else {
            return back()->with('error', 'Invalid PIN, please contact the admin.');
        }
    }



}
