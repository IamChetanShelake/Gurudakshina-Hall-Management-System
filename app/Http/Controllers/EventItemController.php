<?php

namespace App\Http\Controllers;

use App\Models\Eventitem;

use Illuminate\Http\Request;

class EventItemController extends Controller
{
    public function index(){
        $items = Eventitem::all();
        return view('Event.EventItemCrud.ItemTable',compact('items'));

    }

    public function create(){
        return view('Event.EventItemCrud.AddItem');
    }


        public function add(Request $request){
        // $request->validate([
        //     'title' => 'required|string|max:255|nullable',
        //     'description' => 'required|string|nullable',
        // ]);

        $item = new Eventitem();
        $item->item_name = $request->item_name;
        $item->description = $request->description;
        $item->quantity = $request->quantity;
        $item->price = $request->price;




        $item->save();

        if($item){
        return redirect('/item')->with('success','Event Item has been Added');
        }
        else{
            return redirect('/item')->with('fail','Opration failed');
        }


    }
    public function edit(Request $request,$id){
        $item = Eventitem::find($id);
        return view('Event.EventItemCrud.UpdateItem',compact('item'));


    }
    public function update(Request $request,$id){

        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     'description' => 'required|string',
        // ]);

        $item = Eventitem::find($id);
        $item->item_name = $request->item_name;
        $item->description = $request->description;
        $item->quantity = $request->quantity;
        $item->price = $request->price;
        $item->save();

        if($item){
        return redirect('/item')->with('success','Event Item has been updated');
        }
        else{
            return redirect('/item')->with('fail','Opration failed');
        }
    }

    public function view($id){
        $item = Eventitem::find($id);
        return view('Event.EventItemCrud.ViewItem',compact('item'));
      }
    public function delete($id){
        $item = Eventitem::findOrFail($id);

        // Step 1: Delete the image stored in the 'image' column

        $item->delete();
            if($item){
            return redirect('/item')->with('success','Event Items has been deleted');
            }
            else{
                return redirect('/item')->with('fail','Opration failed');
            }

    }
}
