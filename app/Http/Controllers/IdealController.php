<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use App\Models\Ideal;
use Illuminate\Http\Request;

class IdealController extends Controller
{
    public function index(){
        $ideals = Ideal::with('hall')->get(); // Fetch ideals along with hall data
        return view('admin.IdealCrud.IdealTable', compact('ideals'));
    }


    public function create(){
        $halls = Hall::all(); // Fetch all halls
        return view('admin.IdealCrud.AddIdeal', compact('halls'));
    }
    public function add(Request $request){
        $request->validate([
            'hall_id' => 'required|exists:halls,id',
            'title' => 'required|string|max:255',
        ]);

        $ideal = new Ideal();
        $ideal->hall_id = $request->hall_id;
        $ideal->title = $request->title;


        $ideal->save();

        if($ideal){
        return redirect('/ideals')->with('success','Ideal For has been Added');
        }
        else{
            return redirect('/addviewideals')->with('fail','Opration failed');
        }


    }
    public function edit(Request $request,$id){
        $ideal = Ideal::find($id);
        $halls = Hall::all(); // Fetch all halls
        return view('admin.IdealCrud.UpdateIdeal', compact('ideal', 'halls'));


    }
    public function update(Request $request,$id){

        $request->validate([
            'hall_id' => 'required|exists:halls,id',
            'title' => 'required|string|max:255',
        ]);

        $ideal = Ideal::find($id);

        $ideal->hall_id = $request->hall_id;
        $ideal->title = $request->title;




        $ideal->save();

        if($ideal){
        return redirect('/ideals')->with('success','Ideal For has been updated');
        }
        else{
            return redirect('/addviewideals')->with('fail','Opration failed');
        }


    }

    public function view($id){
        $ideal = Ideal::with('hall')->find($id);
        return view('admin.IdealCrud.ViewIdeal', compact('ideal'));
      }
    public function delete($id){
        $ideal = Ideal::findOrFail($id);
        $ideal->delete();
            if($ideal){
            return redirect('/ideals')->with('success','Ideal For has been deleted');
            }
            else{
                return redirect('/addviewideals')->with('fail','Opration failed');
            }

    }
}
