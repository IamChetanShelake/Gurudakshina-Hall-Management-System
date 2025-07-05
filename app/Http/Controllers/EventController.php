<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class EventController extends Controller
{
    public function index()
    {
        $events = User::where('role','event')->get();
        return view('admin.EventCrud.EventTable', compact('events'));
    }

    public function create()
    {
        return view('admin.EventCrud.AddEvent');
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'alternate_mobile' => 'nullable|string|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'adhar_card' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
            'pan_card' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
            'qr_code' => 'required|image|mimes:jpeg,png,jpg,gif,webp'
        ]);

        $event = new User();
        $event->name = $request->name;
        $event->mobile = $request->mobile;
        $event->alternate_mobile = $request->alternate_mobile;
        $event->email = $request->email;
        $event->password = Hash::make($request->password);
        $event->role = 'event';
        $event->firm_name = $request->firm_name;
        $event->address = $request->address;
        $event->city = $request->city;

        // Aadhar
        if ($request->hasFile('adhar_card')) {
            $imageName = time() . '_adhar.' . $request->adhar_card->extension();
            $request->adhar_card->move('EventVendor_images', $imageName);
        } else {
            $imageName = '';
        }
        $event->adhar_card = $imageName;

        // PAN
        if ($request->hasFile('pan_card')) {
            $imageName = time() . '_pan.' . $request->pan_card->extension();
            $request->pan_card->move('EventVendor_images', $imageName);
        } else {
            $imageName = '';
        }
        $event->pan_card = $imageName;

        // QR Code
        if ($request->hasFile('qr_code')) {
            $imageName = time() . '_qr.' . $request->qr_code->extension();
            $request->qr_code->move('EventVendor_images', $imageName);
        } else {
            $imageName = '';
        }
        $event->qr_code = $imageName;

        $event->upi_id = $request->upi_id;
        $event->bank_name = $request->bank_name;
        $event->bank_holder_name = $request->bank_holder_name;
        $event->account_number = $request->account_number;
        $event->ifsc = $request->ifsc;

        $event->save();

        return redirect('/event')->with('success', 'Event Vendor Registered Successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'alternate_mobile' => 'nullable|string|max:20',
            'email' => 'required|email|unique:users,email,' . $id,
            'adhar_card' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'pan_card' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'qr_code' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp'
        ]);

        $event = User::findOrFail($id);
        $event->name = $request->name;
        $event->mobile = $request->mobile;
        $event->alternate_mobile = $request->alternate_mobile;
        $event->email = $request->email;
        $event->firm_name = $request->firm_name;
        $event->address = $request->address;
        $event->city = $request->city;
        $event->upi_id = $request->upi_id;
        $event->bank_name = $request->bank_name;
        $event->bank_holder_name = $request->bank_holder_name;
        $event->account_number = $request->account_number;
        $event->ifsc = $request->ifsc;

        // Update Aadhar
        if ($request->hasFile('adhar_card')) {
            $imageName = time() . '_adhar.' . $request->adhar_card->extension();
            $request->adhar_card->move('EventVendor_images', $imageName);
            $filePath = public_path('EventVendor_images/' . $event->adhar_card);
            if (is_file($filePath)) {
                unlink($filePath);
            }
            $event->adhar_card = $imageName;
        }

        // Update PAN
        if ($request->hasFile('pan_card')) {
            $imageName = time() . '_pan.' . $request->pan_card->extension();
            $request->pan_card->move('EventVendor_images', $imageName);
            $filePath = public_path('EventVendor_images/' . $event->pan_card);
            if (is_file($filePath)) {
                unlink($filePath);
            }
            $event->pan_card = $imageName;
        }

        // Update QR
        if ($request->hasFile('qr_code')) {
            $imageName = time() . '_qr.' . $request->qr_code->extension();
            $request->qr_code->move('EventVendor_images', $imageName);
            $filePath = public_path('EventVendor_images/' . $event->qr_code);
            if (is_file($filePath)) {
                unlink($filePath);
            }
            $event->qr_code = $imageName;
        }

        $event->save();

        return redirect('/event')->with('success', 'Event Vendor Updated Successfully');
    }

    public function edit($id)
    {
        $event = User::findOrFail($id);
        return view('admin.EventCrud.UpdateEvent', compact('event'));
    }

    public function view($id)
    {
        $event = User::findOrFail($id);
        return view('admin.EventCrud.ViewEvent', compact('event'));
    }

    public function delete($id)
    {
        $event = User::findOrFail($id);

        // Delete Aadhar Card Image
        if ($event->adhar_card) {
            $imagePath = public_path('EventVendor_images/' . $event->adhar_card);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        // Delete PAN Card Image
        if ($event->pan_card) {
            $imagePath = public_path('EventVendor_images/' . $event->pan_card);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        // Delete QR Code Image
        if ($event->qr_code) {
            $imagePath = public_path('EventVendor_images/' . $event->qr_code);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        // Delete user from database
        $event->delete();

        return redirect('/event')->with('success', 'Event Vendor Deleted Successfully');
    }
}