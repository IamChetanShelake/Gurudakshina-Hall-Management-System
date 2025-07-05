<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::all();
        return view('admin.contactCrud.ContactTable',compact('contacts'));
    }


    public function create(){
        return view('admin.contactCrud.AddContact');
    }
    public function addContact(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $contact = new Contact();
        $contact->title = $request->title;
        $contact->description = $request->description;

        $contact->save();

        if($contact){
        return redirect('/admincontacts')->with('success','contact has been Added');
        }
        else{
            return redirect('/addviewcontact')->with('fail','Opration failed');
        }


    }
    public function editContact(Request $request,$id){
        $contact = contact::find($id);
        return view('admin.contactCrud.Updatecontact',compact('contact'));


    }
    public function updateContact(Request $request,$id){

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        $contact = contact::find($id);


        $contact->title = $request->title;
        $contact->description = $request->description;



        $contact->save();

        if($contact){
        return redirect('/admincontacts')->with('success','contact has been updated');
        }
        else{
            return redirect('/addviewcontact')->with('fail','Opration failed');
        }


    }

    public function viewContact($id){
        $contact = contact::find($id);
        return view('admin.contactCrud.ViewContact',compact('contact'));
      }
    public function deleteContact($id){
        $contact = contact::findOrFail($id);
        $contact->delete();
            if($contact){
            return redirect('/admincontacts')->with('success','contact has been deleted');
            }
            else{
                return redirect('/addviewcontact')->with('fail','Opration failed');
            }

    }
}
