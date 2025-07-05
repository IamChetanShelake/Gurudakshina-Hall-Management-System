<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    public function index(){
        $abouts = About::all();
        return view('admin.aboutCrud.AboutTable',compact('abouts'));
    }


    public function create(){
        return view('admin.aboutCrud.AddAbout');
    }
    public function addAbout(Request $request){
        $request->validate([
            'title' => 'required|string|max:255|nullable',
            'description' => 'required|string|nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048|nullable'
        ]);

        $about = new About();
        $about->title = $request->title;
        $about->description = $request->description;

        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $imageName = time() . '.' . $image->getClientOriginalExtension();
        //     $image->move(public_path('About_images'), $imageName);
        //     $about->image = $imageName;
        // }
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->stud_image->move('About_images', $imageName);
        } else {
            $imageName = '';
        }
        $about->image=$imageName;

        $about->save();

        if($about){
        return redirect('/about')->with('success','About has been Added');
        }
        else{
            return redirect('/addview')->with('fail','Opration failed');
        }


    }
    public function editAbout(Request $request,$id){
        $about = About::find($id);
        return view('admin.aboutCrud.UpdateAbout',compact('about'));


    }
    public function updateAbout(Request $request,$id){

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $about = About::find($id);

        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $imageName = time() . '.' . $image->getClientOriginalExtension();
        //     $image->move(public_path('About_images'), $imageName);
        //     $about->image = $imageName;
        // }
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move('About_images', $imageName);
            $filePath = public_path('About_images/'.$about->image);
            if (is_file($filePath)) {
                unlink($filePath);
            }
            $about->image = $imageName;
        }



        $about->title = $request->title;
        $about->description = $request->description;



        $about->save();

        if($about){
        return redirect('/about')->with('success','About has been updated');
        }
        else{
            return redirect('/addview')->with('fail','Opration failed');
        }


    }

    public function ViewAbout($id){
        $about = About::find($id);
        return view('admin.aboutCrud.ViewAbout',compact('about'));
      }
    public function deleteAbout($id){
        $about = About::findOrFail($id);

        // Step 1: Delete the image stored in the 'image' column
        if ($about->image) {
            $imagePath = public_path('images/' . $about->image); // Get full image path

            if (File::exists($imagePath)) {
                File::delete($imagePath); // Delete image file from storage
            }
        }
        $about->delete();
            if($about){
            return redirect('/about')->with('success','About has been deleted');
            }
            else{
                return redirect('/addview')->with('fail','Opration failed');
            }

    }
}
