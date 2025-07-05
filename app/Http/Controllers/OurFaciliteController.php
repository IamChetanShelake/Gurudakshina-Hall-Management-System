<?php

namespace App\Http\Controllers;

use App\Models\OurFacilite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class OurFaciliteController extends Controller
{
    public function index(){
        $ourfacilites = OurFacilite::all();
        return view('admin.FCrud.Ftable',compact('ourfacilites'));
    }


    public function add(){
        return view('admin.FCrud.AddF');
    }
    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|max:255|nullable',
            'description' => 'required|string|nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048|nullable'
        ]);

        $ourfacilites = new OurFacilite();
        $ourfacilites->title = $request->title;
        $ourfacilites->description = $request->description;

        if ($request->hasFile('image')) {
    $imageName = time() . '.' . $request->image->extension();
    $request->image->move('OurFacilite_images', $imageName);
} else {
    $imageName = '';
}
$ourfacilites->image = $imageName;


        $ourfacilites->save();

        if($ourfacilites){
        return redirect('/ourfacilitie')->with('success','Our Facilite Page has been Added');
        }
        else{
            return redirect('/viewOurFacilitiesadd')->with('fail','Opration failed');
        }


    }
    public function edit(Request $request,$id){
        $ourfacilite = OurFacilite::find($id);
        return view('admin.FCrud.UpdateF',compact('ourfacilite'));


    }
    public function update(Request $request,$id){

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $ourfacilite = OurFacilite::find($id);

        if ($request->hasFile('image')) {
    $imageName = time() . '.' . $request->image->extension();
    $request->image->move('OurFacilite_images', $imageName);
    $filePath = public_path('OurFacilite_images/' . $ourfacilite->image);
    if (is_file($filePath)) {
        unlink($filePath);
    }
    $ourfacilite->image = $imageName;
}


        $ourfacilite->title = $request->title;
        $ourfacilite->description = $request->description;



        $ourfacilite->save();

        if($ourfacilite){
        return redirect('/ourfacilitie')->with('success','Our Facilite Page has been updated');
        }
        else{
            return redirect('/viewOurFacilitiesadd')->with('fail','Opration failed');
        }


    }

    public function view($id){
        $ourfacilite = OurFacilite::find($id);
        return view('admin.FCrud.ViewF',compact('ourfacilite'));
      }
    public function delete($id){
        $facilite = OurFacilite::findOrFail($id);

        // Step 1: Delete the image stored in the 'image' column
        if ($facilite->image) {
            $imagePath = public_path('OurFacilite_images/' . $facilite->image); // Get full image path

            if (File::exists($imagePath)) {
                File::delete($imagePath); // Delete image file from storage
            }
        }
        $facilite->delete();
            if($facilite){
            return redirect('/ourfacilitie')->with('success','Our Facilite has been deleted');
            }
            else{
                return redirect('/viewOurFacilitiesadd')->with('fail','Opration failed');
            }

    }
}
