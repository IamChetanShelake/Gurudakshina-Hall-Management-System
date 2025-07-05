<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();

        return view('admin.imagesCrud.ImagesTable', compact('images'));
    }


    public function create()
    {

        return view('admin.imagesCrud.AddImages');
    }


    // public function addImage(Request $request)
    // {

    //     $imagee = new Image();

    //     if ($request->hasFile('image')) {
    //         $image = $request->file('image');
    //         $imageName = time() . '.' . $image->getClientOriginalExtension();
    //         $image->move(public_path('Gallery'), $imageName);
    //         $imagee->image = $imageName;
    //     }
    //     $imagee->save();

    //     return redirect('/image')->with('success', 'Image added successfully');
    // }
    public function addImage(Request $request)
{
    // $request->validate([
    //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
    // ]);

    $imagee = new Image();

    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('Gallery'), $imageName);
        $imagee->image = $imageName;
    }

    $imagee->save();

    return redirect('/image')->with('success', 'Image added successfully');
}



    public function editImage($id)
    {
        $image = Image::find($id);
        return view('admin.imagesCrud.UpdateImages', compact('image'));
    }


    // public function updateImage(Request $request, $id)
    // {


    //     $imagee = Image::find($id);

    //     if ($request->hasFile('image')) {
    //         $image = $request->file('image');
    //         $imageName = time() . '.' . $image->getClientOriginalExtension();
    //         $image->move(public_path('Gallery'), $imageName);
    //         $imagee->image = $imageName;
    //     }
    //     $imagee->save();

    //     return redirect()->route('Image.Table')->with('success', 'Image added successfully');
    // }
    public function updateImage(Request $request, $id)
{
    // $request->validate([
    //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
    // ]);

    $imagee = Image::find($id);

    // if ($request->hasFile('image')) {
    //     // Delete old image
    //     $oldPath = public_path('Gallery/'.$imagee->image);
    //     if (is_file($oldPath)) {
    //         unlink($oldPath);
    //     }

    //     // Upload new image
    //     $imageName = time() . '.' . $request->image->extension();
    //     $request->image->move(public_path('Gallery'), $imageName);
    //     $imagee->image = $imageName;
    // }
    if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move('Gallery', $imageName);
            $filePath = public_path('Gallery/'.$imagee->image);
            if (is_file($filePath)) {
                unlink($filePath);
            }
            $imagee->image = $imageName;
        }

    $imagee->save();

    return redirect()->route('Image.Table')->with('success', 'Image updated successfully');
}



    public function viewImage($id)
    {
      //  $type = Type::get(); // Fetch the type
      $image = Image::find($id);
      return view('admin.imagesCrud.ViewImages',compact('image'));
    }



    public function deleteImage($id)
    {
        $image = Image::findOrFail($id);

        // Step 1: Delete the image stored in the 'image' column
        if ($image->image) {
            $imagePath = public_path('Gallery/' . $image->image); // Get full image path

            if (File::exists($imagePath)) {
                File::delete($imagePath); // Delete image file from storage
            }
        }
        $image->delete();
            if($image){
            return redirect('/image')->with('success','image has been deleted');
            }
            else{
                return redirect('/viewimageadd')->with('fail','Opration failed');
            }
    }
}
