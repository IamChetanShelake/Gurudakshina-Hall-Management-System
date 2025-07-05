<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use App\Models\Page;
use App\Models\Contact;
use App\Models\HallPage;
use App\Models\Hall_Image;
use App\Models\HallEnquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HallController extends Controller
{
    public function index()
    {
        $halls = Hall::with('images')->get();
        return view('admin.hallCrud.HallTable', compact('halls'));
    }

    // Show create form
    public function create()
    {
        return view('admin.hallCrud.AddHall');
    }

    // Store a new hall with multiple images
    // public function store(Request $request)
    // {
    //     // $request->validate([
    //     //     'name' => 'required|string|max:255',
    //     //     'short_description' => 'required|string',
    //     //     'full_description' => 'required|string',
    //     //     'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048'
    //     // ]);

    //     // Create hall entry
    //     $hall = new Hall();
    //     $hall->name = $request->name;
    //     $hall->short_description = $request->short_description;
    //     $hall->description = $request->description;
    //     $hall->capacity = $request->capacity;
    //     $hall->area = $request->area;


    //     if ($request->hasFile('image')) {
    //         $image = $request->file('image');
    //         $imageName = time() . '.' . $image->getClientOriginalExtension();
    //         $image->move(public_path('Hall_images'), $imageName);
    //         $hall->image = $imageName;
    //     }



    //     $hall->save();
    //      // Upload multiple images
    //      if ($request->hasFile('images')) {
    //         foreach ($request->file('images') as $image) {
    //             $imageName = time() . '_' . $image->getClientOriginalName();
    //             $image->move(public_path('hall_images'), $imageName);
    //             $hallimage= new Hall_Image;
    //             $hallimage->hall_id = $hall->id;
    //             $hallimage->image_path = $imageName;
    //             $hallimage->save();
    //         }
    //     }

    //     return redirect('/adminhalls')->with('success', 'Hall has been added');
    // }
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'short_description' => 'required|string',
        //     'full_description' => 'required|string',
        //     'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        // ]);

        $hall = new Hall();
        $hall->name = $request->name;
        $hall->short_description = $request->short_description;
        $hall->description = $request->description;
        $hall->capacity = $request->capacity;
        $hall->area = $request->area;

        // Main image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move('Hall_images', $imageName);
            $hall->image = $imageName;
        }

        $hall->save();

        // Upload multiple images
        if ($request->hasFile('images')) {
        // Delete old hall images
        Hall_Image::where('hall_id', $hall->id)->delete();

        foreach ($request->file('images') as $image) {
            $imageName = time() . rand(1, 1000) . '.' . $image->extension(); // avoid name collision
            $image->move('Hall_images', $imageName);

            $hallImage = new Hall_Image;
            $hallImage->hall_id = $hall->id;
            $hallImage->image_path = $imageName;
            $hallImage->save();
        }
    }
        return redirect('/adminhalls')->with('success', 'Hall has been added');
    }

    // Show edit form
    public function edit($id)
    {
        $hall = Hall::with('images')->findOrFail($id);
        return view('admin.hallCrud.UpdateHall', compact('hall'));
    }

    // Update hall details
    // public function update(Request $request, $id)
    // {
    //     // $request->validate([
    //     //     'name' => 'required|string|max:255',
    //     //     'short_description' => 'required|string',
    //     //     'description' => 'required|string',
    //     //     'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    //     // ]);

    //     $hall = Hall::findOrFail($id);
    //     $hall->name = $request->name;
    //     $hall->short_description = $request->short_description;
    //     $hall->description = $request->description;
    //     $hall->capacity = $request->capacity;
    //     $hall->area = $request->area;


    //     if ($request->hasFile('image')) {
    //         $image = $request->file('image');
    //         $imageName = time() . '.' . $image->getClientOriginalExtension();
    //         $image->move(public_path('Hall_images'), $imageName);
    //         $filePath = public_path('Hall_images/' . $hall->image);
    //         if (is_file($filePath)) {
    //             unlink($filePath);
    //         }
    //         $hall->image = $imageName;
    //     }
    //     $hall->save();
    //     // Upload new images (if provided)
    //      // Upload multiple images
    //      if ($request->hasFile('images')) {
    //        $hall_images=Hall_Image::where('hall_id',$hall->id)->delete();
    //         foreach ($request->file('images') as $image) {

    //             $imageName = time() . '_' . $image->getClientOriginalName();
    //             $image->move(public_path('hall_images'), $imageName);

    //             $hallimage= new Hall_Image;
    //             $hallimage->hall_id = $hall->id;
    //             $hallimage->image_path = $imageName;
    //             $hallimage->save();
    //         }
    //     }

    //     return redirect('/adminhalls')->with('success', 'Hall has been updated');
    // }
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'short_description' => 'required|string',
        //     'description' => 'required|string',
        //     'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        // ]);

        $hall = Hall::findOrFail($id);
        $hall->name = $request->name;
        $hall->short_description = $request->short_description;
        $hall->description = $request->description;
        $hall->capacity = $request->capacity;
        $hall->area = $request->area;

        // Update main image
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move('Hall_images', $imageName);

            // Delete old image
            $oldPath = public_path('Hall_images/' . $hall->image);
            if (is_file($oldPath)) {
                unlink($oldPath);
            }

            $hall->image = $imageName;
        }

        $hall->save();

        // Replace multiple images if uploaded
        if ($request->hasFile('images')) {
        // Delete old hall images
        Hall_Image::where('hall_id', $hall->id)->delete();

        foreach ($request->file('images') as $image) {
            $imageName = time() . rand(1, 1000) . '.' . $image->extension(); // avoid name collision
            $image->move('Hall_images', $imageName);

            $hallImage = new Hall_Image;
            $hallImage->hall_id = $hall->id;
            $hallImage->image_path = $imageName;
            $hallImage->save();
        }
    }



        return redirect('/adminhalls')->with('success', 'Hall has been updated');
    }

    // View single hall details
    public function show($id)
    {
        $hall = Hall::with('images')->findOrFail($id);
        $hall_images = Hall_Image::where('hall_id', $id)->get();
        return view('admin.hallCrud.ViewHall', compact('hall', 'hall_images'));
    }

    // Delete hall and its images
    public function destroy($id)
    {
        $hall = Hall::findOrFail($id);

        // Delete associated images from storage
        foreach ($hall->images as $image) {
            $imagePath = public_path('hall_images/' . $image->image_path);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
            $image->delete(); // Remove image from database
        }

        // Delete hall record
        $hall->delete();

        return redirect()->route('halls.index')->with('success', 'Hall has been deleted');
    }
}
