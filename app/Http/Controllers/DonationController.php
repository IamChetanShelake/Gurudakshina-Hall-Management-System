<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index()
    {
        // Retrieve all donations from the database
        $donations = Donation::all();

        // Pass the donations to the view
        return view('admin.Donation.DonationTable', compact('donations'));
    }
    public function create()
    {
        return view('admin.Donation.AddDonation');
    }
    public function store(Request $request)
    {
        // Validate the donation data
        // $validatedData = $request->validate([
        //     'donar_name' => 'required',
        //     'email' => 'required|email',
        //     'amount' => 'required|numeric',
        // ]);

        // Create a new donation record in the database
        $donation = new Donation();
        $donation->donar_name = $request->donar_name;
        $donation->amount = $request->amount;
        $donation->payment_method = $request->payment_method;
        $donation->check_number = $request->check_number;
        $donation->bank_name = $request->bank_name;
        $donation->upi_id = $request->upi_id;
        $donation->transaction_id = $request->transaction_id;
        $donation->message = $request->message;

        $donation->save();

        // Redirect to the donation list page
        return redirect('/donation')->with('success', 'Donation added successfully');

        // Process the donation




    }

    public function delete($id){
        // Retrieve the donation ID from the request
        $donation = Donation::find($id);

        // Delete the donation from the database
        $donation->delete();

        if($donation){
            // Redirect to the donation list page
            return redirect('/donation')->with('success', 'Donation deleted successfully');
        }
        else{
            // Redirect to the donation list page
            return redirect('/donation')->with('error', 'Donation not found');
        }

    }
    public function view($id){
        $donation = Donation::findOrFail($id);

        return view('admin.Donation.ViewDonation', compact('donation'));

    }
}
