<?php

namespace App\Http\Controllers;

use App\Models\Cateringitem;
use Illuminate\Http\Request;

class CateringItemController extends Controller
{
    public function index(){
        $items = Cateringitem::all();
        return view('Catering.CateringItemCrud.ItemTable',compact('items'));

    }



    public function add(Request $request){
        // $request->validate([
        //     'title' => 'required|string|max:255|nullable',
        //     'description' => 'required|string|nullable',
        // ]);

        $item = new Cateringitem();
        $item->item_name = $request->item_name;
        $item->description = $request->description;
        $item->quantity = $request->quantity;
        $item->price = $request->price;




        $item->save();

        if($item){
        return redirect('/itemC')->with('success','Catering Item has been Added');
        }
        else{
            return redirect('/itemC')->with('fail','Opration failed');
        }


    }
    public function edit(Request $request,$id){
        $item = Cateringitem::find($id);
        return view('Catering.CateringItemCrud.UpdateItem',compact('item'));


    }
    public function update(Request $request,$id){

        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     'description' => 'required|string',
        // ]);

        $item = Cateringitem::find($id);
        $item->item_name = $request->item_name;
        $item->description = $request->description;
        $item->quantity = $request->quantity;
        $item->price = $request->price;
        $item->save();

        if($item){
        return redirect('/itemC')->with('success','Catering Item has been updated');
        }
        else{
            return redirect('/itemC')->with('fail','Opration failed');
        }
    }

    public function view($id){
        $item = Cateringitem::find($id);
        return view('Catering.CateringItemCrud.ViewItem',compact('item'));
      }
    public function delete($id){
        $item = Cateringitem::findOrFail($id);

        // Step 1: Delete the image stored in the 'image' column

        $item->delete();
            if($item){
            return redirect('/itemC')->with('success','Catering Items has been deleted');
            }
            else{
                return redirect('/itemC')->with('fail','Opration failed');
            }

    }
}
