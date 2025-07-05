<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        $testss = Test::all();
        return view('admin.testimonialCrud.TestTable',compact('testss'));

    }


    public function add(){
        return view('admin.testimonialCrud.AddTest');
    }
    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|max:255|nullable',
            'description' => 'required|string|nullable',
        ]);

        $test = new Test();
        $test->title = $request->title;
        $test->description = $request->description;


        $test->save();

        if($test){
        return redirect('/testimonials')->with('success','Testimonial has been Added');
        }
        else{
            return redirect('/addTestimonialsview')->with('fail','Opration failed');
        }


    }
    public function edit(Request $request,$id){
        $test = Test::find($id);
        return view('admin.testimonialCrud.UpdateTest',compact('test'));


    }
    public function update(Request $request,$id){

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $test = Test::find($id);
        $test->title = $request->title;
        $test->description = $request->description;
        $test->save();

        if($test){
        return redirect('/testimonials')->with('success','Testimonial has been updated');
        }
        else{
            return redirect('/addTestimonialsview')->with('fail','Opration failed');
        }
    }

    public function view($id){
        $test = Test::find($id);
        return view('admin.testimonialCrud.ViewTest',compact('test'));
      }
    public function delete($id){
        $test = test::findOrFail($id);

        // Step 1: Delete the image stored in the 'image' column

        $test->delete();
            if($test){
            return redirect('/testimonials')->with('success','Testimonial has been deleted');
            }
            else{
                return redirect('/addTestimonialsview')->with('fail','Opration failed');
            }

    }
}
