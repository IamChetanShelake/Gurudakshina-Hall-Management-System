<?php

namespace App\Http\Controllers;

use App\Models\Landing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LandingController extends Controller
{
    public function index(){
        $landings = Landing::all();
        return view('admin.landingCrud.LandingTable',compact('landings'));
    }


    public function add(){
        return view('admin.landingCrud.AddLanding');
    }
    // public function store(Request $request){
    //     $request->validate([
    //         'title' => 'required|string|max:255|nullable',
    //         'description' => 'required|string|nullable',
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048|nullable'
    //     ]);

    //     $landing = new Landing();
    //     $landing->title = $request->title;
    //     $landing->description = $request->description;

    //     if ($request->hasFile('image')) {
    //         $image = $request->file('image');
    //         $imageName = time() . '.' . $image->getClientOriginalExtension();
    //         $image->move(public_path('Landing_images'), $imageName);
    //         $landing->image = $imageName;
    //     }

    //     $landing->save();

    //     if($landing){
    //     return redirect('/landing')->with('success','Landing Page has been Added');
    //     }
    //     else{
    //         return redirect('/addlandingview')->with('fail','Opration failed');
    //     }


    // }
   public function store(Request $request)
{
    $landing = new Landing();
    $landing->title = $request->title;
    $landing->description = $request->description;

    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move('Landing_images', $imageName);
    } else {
        $imageName = '';
    }
    $landing->image = $imageName;

    $landing->save();

    if ($landing) {
        return redirect('/landing')->with('success', 'Landing Page has been added');
    } else {
        return redirect('/addlandingview')->with('fail', 'Operation failed');
    }
}

    public function edit(Request $request,$id){
        $landing = Landing::find($id);
        return view('admin.landingCrud.UpdateLanding',compact('landing'));


    }
    // public function update(Request $request,$id){

    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'description' => 'required|string',
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    //     ]);

    //     $landing = Landing::find($id);

    //     if ($request->hasFile('image')) {
    //         $image = $request->file('image');
    //         $imageName = time() . '.' . $image->getClientOriginalExtension();
    //         $image->move(public_path('Landing_images'), $imageName);
    //         $landing->image = $imageName;
    //     }

    //     $landing->title = $request->title;
    //     $landing->description = $request->description;



    //     $landing->save();

    //     if($landing){
    //     return redirect('/landing')->with('success','Landing Page has been updated');
    //     }
    //     else{
    //         return redirect('/addlandingview')->with('fail','Opration failed');
    //     }


    // }
    public function update(Request $request, $id)
{
    $landing = Landing::findOrFail($id);
    $landing->title = $request->title;
    $landing->description = $request->description;

    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move('Landing_images', $imageName);

        $oldImagePath = public_path('Landing_images/' . $landing->image);
        if (is_file($oldImagePath)) {
            unlink($oldImagePath);
        }

        $landing->image = $imageName;
    }

    $landing->save();

    if ($landing) {
        return redirect('/landing')->with('success', 'Landing Page has been updated');
    } else {
        return redirect('/addlandingview')->with('fail', 'Operation failed');
    }
}



    public function view($id){
        $landing = Landing::find($id);
        return view('admin.landingCrud.ViewLanding',compact('landing'));
      }
    public function delete($id){
        $landing = Landing::findOrFail($id);

        // Step 1: Delete the image stored in the 'image' column
        if ($landing->image) {
            $imagePath = public_path('Landing_images/' . $landing->image); // Get full image path

            if (File::exists($imagePath)) {
                File::delete($imagePath); // Delete image file from storage
            }
        }
        $landing->delete();
            if($landing){
            return redirect('/landing')->with('success','Landing Page has been deleted');
            }
            else{
                return redirect('/addlandingview')->with('fail','Opration failed');
            }

    }
}
