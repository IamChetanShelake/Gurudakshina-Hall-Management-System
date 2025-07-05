<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $pages = Page::all();
        return view('admin.pagesCrud.PageTable',compact('pages'));
    }


    public function create(){
        return view('admin.pagesCrud.AddPage');
    }
    public function addPage(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $page = new Page();
        $page->title = $request->title;
        $page->description = $request->description;



        $page->save();

        if($page){
        return redirect('/page')->with('success','Page has been Added');
        }
        else{
            return redirect('/addpageview')->with('fail','Opration failed');
        }


    }
    public function editPage(Request $request,$id){
        $page = Page::find($id);
        return view('admin.pagesCrud.UpdatePage',compact('page'));


    }
    public function updatePage(Request $request,$id){

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $page = Page::find($id);

        $page->title = $request->title;
        $page->description = $request->description;



        $page->save();

        if($page){
        return redirect('/page')->with('success','Page has been updated');
        }
        else{
            return redirect('/addpageview')->with('fail','Opration failed');
        }


    }

    public function ViewPage($id){
        $page = Page::find($id);
        return view('admin.pagesCrud.ViewPage',compact('page'));
      }
    public function deletePage($id){
        $page = Page::findOrFail($id);

        // Step 1: Delete the image stored in the 'image' column
        $page->delete();
            if($page){
            return redirect('/page')->with('success','Page has been deleted');
            }
            else{
                return redirect('/addpageview')->with('fail','Opration failed');
            }

    }
}
