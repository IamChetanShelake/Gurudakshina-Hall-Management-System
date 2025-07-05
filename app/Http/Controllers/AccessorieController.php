<?php

namespace App\Http\Controllers;

use App\Models\Accessorie;
use Illuminate\Http\Request;

class AccessorieController extends Controller
{
    public function index(){
        $accessories = Accessorie::all();
        return view('admin.AccessorieCrud.AccessorieTable',compact('accessories'));

    }


    public function add(){
        return view('admin.AccessorieCrud.AddAccessorie');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255|nullable',
            'quantity' => 'string|nullable',
            'price' => 'string|nullable',
            'hours' => 'string|nullable',
        ]);

        $accessorie = new Accessorie();
        $accessorie->name = $request->name;
        $accessorie->quantity = $request->quantity;
        $accessorie->price = $request->price;
        $accessorie->hours = $request->hours;



        $accessorie->save();

        if($accessorie){
        return redirect('/accessories')->with('success','accessorie has been Added');
        }
        else{
            return redirect('/addAccessorieview')->with('fail','Opration failed');
        }


    }
    public function edit(Request $request,$id){
        $accessorie = Accessorie::find($id);
        return view('admin.AccessorieCrud.UpdateAccessorie',compact('accessorie'));


    }
    public function update(Request $request,$id){

        $request->validate([
            'name' => 'required|string|max:255|nullable',
            'quantity' => 'string|nullable',
            'price' => 'string|nullable',
            'hours' => 'string|nullable',
        ]);

        $accessorie = Accessorie::find($id);



        $accessorie->name = $request->name;
        $accessorie->quantity = $request->quantity;
        $accessorie->price = $request->price;
        $accessorie->hours = $request->hours;



        $accessorie->save();

        if($accessorie){
        return redirect('/accessories')->with('success','Accessorie has been updated');
        }
        else{
            return redirect('/addAccessorieview')->with('fail','Opration failed');
        }


    }

    public function view($id){
        $accessorie = Accessorie::find($id);
        return view('admin.AccessorieCrud.ViewAccessories',compact('accessorie'));
      }
    public function delete($id){
        $accessorie = Accessorie::findOrFail($id);

        // Step 1: Delete the image stored in the 'image' column

        $accessorie->delete();
            if($accessorie){
            return redirect('/accessories')->with('success','Accessorie has been deleted');
            }
            else{
                return redirect('/addAccessorieview')->with('fail','Opration failed');
            }

    }
}
