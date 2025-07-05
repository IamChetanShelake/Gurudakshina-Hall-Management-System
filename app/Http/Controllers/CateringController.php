<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class CateringController extends Controller
{
    public function index()
    {
        $caterings = User::where('role','catering')->get();
        return view('admin.CateringCrud.CateringTable', compact('caterings'));
    }

    public function create()
    {
        return view('admin.CateringCrud.AddCatering');
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

        $catering = new User();
        $catering->name = $request->name;
        $catering->mobile = $request->mobile;
        $catering->alternate_mobile = $request->alternate_mobile;
        $catering->email = $request->email;
        $catering->password = Hash::make($request->password);
        $catering->role = 'catering';
        $catering->firm_name = $request->firm_name;
        $catering->address = $request->address;
        $catering->city = $request->city;

        if ($request->hasFile('adhar_card')) {
            $imageName = time() . '_adhar.' . $request->adhar_card->extension();
            $request->adhar_card->move('CateringVendor_images', $imageName);
        } else {
            $imageName = '';
        }
        $catering->adhar_card = $imageName;

        if ($request->hasFile('pan_card')) {
            $imageName = time() . '_pan.' . $request->pan_card->extension();
            $request->pan_card->move('CateringVendor_images', $imageName);
        } else {
            $imageName = '';
        }
        $catering->pan_card = $imageName;

        if ($request->hasFile('qr_code')) {
            $imageName = time() . '_qr.' . $request->qr_code->extension();
            $request->qr_code->move('CateringVendor_images', $imageName);
        } else {
            $imageName = '';
        }
        $catering->qr_code = $imageName;

        $catering->upi_id = $request->upi_id;
        $catering->bank_name = $request->bank_name;
        $catering->bank_holder_name = $request->bank_holder_name;
        $catering->account_number = $request->account_number;
        $catering->ifsc = $request->ifsc;

        $catering->save();

        return redirect('/catering')->with('success', 'Catering Vendor Registered Successfully');
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

        $catering = User::findOrFail($id);
        $catering->name = $request->name;
        $catering->mobile = $request->mobile;
        $catering->alternate_mobile = $request->alternate_mobile;
        $catering->email = $request->email;
        $catering->firm_name = $request->firm_name;
        $catering->address = $request->address;
        $catering->city = $request->city;
        $catering->upi_id = $request->upi_id;
        $catering->bank_name = $request->bank_name;
        $catering->bank_holder_name = $request->bank_holder_name;
        $catering->account_number = $request->account_number;
        $catering->ifsc = $request->ifsc;

        if ($request->hasFile('adhar_card')) {
            $imageName = time() . '_adhar.' . $request->adhar_card->extension();
            $request->adhar_card->move('CateringVendor_images', $imageName);
            $filePath = public_path('CateringVendor_images/' . $catering->adhar_card);
            if (is_file($filePath)) {
                unlink($filePath);
            }
            $catering->adhar_card = $imageName;
        }

        if ($request->hasFile('pan_card')) {
            $imageName = time() . '_pan.' . $request->pan_card->extension();
            $request->pan_card->move('CateringVendor_images', $imageName);
            $filePath = public_path('CateringVendor_images/' . $catering->pan_card);
            if (is_file($filePath)) {
                unlink($filePath);
            }
            $catering->pan_card = $imageName;
        }

        if ($request->hasFile('qr_code')) {
            $imageName = time() . '_qr.' . $request->qr_code->extension();
            $request->qr_code->move('CateringVendor_images', $imageName);
            $filePath = public_path('CateringVendor_images/' . $catering->qr_code);
            if (is_file($filePath)) {
                unlink($filePath);
            }
            $catering->qr_code = $imageName;
        }

        $catering->save();

        return redirect('/catering')->with('success', 'Catering Vendor Updated Successfully');
    }

    public function edit($id)
    {
        $catering = User::findOrFail($id);
        return view('admin.CateringCrud.UpdateCatering', compact('catering'));
    }

    public function view($id)
    {
        $catering = User::findOrFail($id);
        return view('admin.CateringCrud.ViewCatering', compact('catering'));
    }

    public function delete($id)
    {
        $catering = User::findOrFail($id);

        if ($catering->adhar_card) {
            $imagePath = public_path('CateringVendor_images/' . $catering->adhar_card);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        if ($catering->pan_card) {
            $imagePath = public_path('CateringVendor_images/' . $catering->pan_card);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        if ($catering->qr_code) {
            $imagePath = public_path('CateringVendor_images/' . $catering->qr_code);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        $catering->delete();

        return redirect('/catering')->with('success', 'Catering Vendor Deleted Successfully');
    }
}