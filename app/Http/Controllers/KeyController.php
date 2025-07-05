<?php

namespace App\Http\Controllers;

use App\Models\Key;
use App\Models\Hall;
use Illuminate\Http\Request;

class KeyController extends Controller
{
    public function index(){
        $keys = Key::all();

        return view('admin.KeyCrud.KeyTable',compact('keys'));
    }


    public function create(){
        $halls = Hall::all(); // Fetch all halls from the database
        return view('admin.KeyCrud.AddKey', compact('halls'));
    }
    public function add(Request $request){
        $request->validate([
            'hall_id' => 'required|exists:halls,id',
            'title' => 'required|string|max:255',
        ]);

        $key = new Key();
        $key->hall_id = $request->hall_id;
        $key->title = $request->title;


        $key->save();

        if($key){
        return redirect('/keys')->with('success','Key Feature has been Added');
        }
        else{
            return redirect('/addviewkeys')->with('fail','Opration failed');
        }


    }
    public function edit(Request $request,$id){
        $key = Key::findOrFail($id);
        $halls = Hall::all(); // Fetch halls for dropdown
        return view('admin.KeyCrud.UpdateKey', compact('key', 'halls'));


    }
    public function update(Request $request,$id){

        $request->validate([
            'hall_id' => 'required|exists:halls,id',

            'title' => 'required|string|max:255',
        ]);

        $key = Key::find($id);

        $key->hall_id = $request->hall_id;
        $key->title = $request->title;




        $key->save();

        if($key){
        return redirect('/keys')->with('success','Key Feature has been updated');
        }
        else{
            return redirect('/addviewkeys')->with('fail','Opration failed');
        }


    }

    public function view($id){
        $key = Key::with('hall')->findOrFail($id);
        return view('admin.KeyCrud.ViewKey', compact('key'));
      }
    public function delete($id){
        $key = Key::findOrFail($id);
        $key->delete();
            if($key){
            return redirect('/keys')->with('success','Key has been deleted');
            }
            else{
                return redirect('/addviewkeys')->with('fail','Opration failed');
            }

    }
}
