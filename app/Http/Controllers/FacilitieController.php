<?php

namespace App\Http\Controllers;

use App\Models\Facilitie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FacilitieController extends Controller
{
    public function index(){
        $facilites = Facilitie::all();
        return view('admin.facilitiesCrud.FacilitiesTable',compact('facilites'));

    }


    public function add(){
        return view('admin.facilitiesCrud.AddFacilities');
    }
    // public function store(Request $request){
    //     $request->validate([
    //         'title' => 'required|string|max:255|nullable',
    //         'description' => 'required|string|nullable',
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048|nullable'
    //     ]);

    //     $facilite = new Facilitie();
    //     $facilite->title = $request->title;
    //     $facilite->description = $request->description;

    //     if ($request->hasFile('image')) {
    //         $image = $request->file('image');
    //         $imageName = time() . '.' . $image->getClientOriginalExtension();
    //         $image->move(public_path('Facilitie_images'), $imageName);
    //         $facilite->image = $imageName;
    //     }

    //     $facilite->save();

    //     if($facilite){
    //     return redirect('/facilitie')->with('success','Facilitie Page has been Added');
    //     }
    //     else{
    //         return redirect('/addFacilitieview')->with('fail','Opration failed');
    //     }


    // }
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
    ]);

    $facilite = new Facilitie();
    $facilite->title = $request->title;
    $facilite->description = $request->description;

    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move('Facilitie_images', $imageName);
    } else {
        $imageName = '';
    }
    $facilite->image = $imageName;

    $facilite->save();

    if ($facilite) {
        return redirect('/facilitie')->with('success', 'Facilitie Page has been Added');
    } else {
        return redirect('/addFacilitieview')->with('fail', 'Operation failed');
    }
}

    public function edit(Request $request,$id){
        $facilite = Facilitie::find($id);
        return view('admin.facilitiesCrud.UpdateFacilities',compact('facilite'));


    }
    // public function update(Request $request,$id){

    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'description' => 'required|string',
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    //     ]);

    //     $facilite = Facilitie::find($id);

    //     if ($request->hasFile('image')) {
    //         $image = $request->file('image');
    //         $imageName = time() . '.' . $image->getClientOriginalExtension();
    //         $image->move(public_path('Facilitie_images'), $imageName);
    //         $facilite->image = $imageName;
    //     }

    //     $facilite->title = $request->title;
    //     $facilite->description = $request->description;



    //     $facilite->save();

    //     if($facilite){
    //     return redirect('/facilitie')->with('success','Facilitie Page has been updated');
    //     }
    //     else{
    //         return redirect('/addFacilitieview')->with('fail','Opration failed');
    //     }


    // }
    public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
    ]);

    $facilite = Facilitie::find($id);

    // Handle image update with deletion of old image
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move('Facilitie_images', $imageName);

        $filePath = public_path('Facilitie_images/' . $facilite->image);
        if (is_file($filePath)) {
            unlink($filePath);
        }

        $facilite->image = $imageName;
    }


    $facilite->title = $request->title;
    $facilite->description = $request->description;

    $facilite->save();

    if ($facilite) {
        return redirect('/facilitie')->with('success', 'Facilitie Page has been updated');
    } else {
        return redirect('/addFacilitieview')->with('fail', 'Operation failed');
    }
}


    public function view($id){
        $facilite = Facilitie::find($id);
        return view('admin.facilitiesCrud.ViewFacilities',compact('facilite'));
      }
    public function delete($id){
        $facilite = Facilitie::findOrFail($id);

        // Step 1: Delete the image stored in the 'image' column
        if ($facilite->image) {
            $imagePath = public_path('Facilitie_images/' . $facilite->image); // Get full image path

            if (File::exists($imagePath)) {
                File::delete($imagePath); // Delete image file from storage
            }
        }
        $facilite->delete();
            if($facilite){
            return redirect('/facilitie')->with('success','Facilitie Page has been deleted');
            }
            else{
                return redirect('/addFacilitieview')->with('fail','Opration failed');
            }

    }
}
