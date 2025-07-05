<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use App\Models\HallPage;
use Illuminate\Http\Request;

class HallPageController extends Controller
{
    public function index()
    {
        // $halls = Hall::all();
        // $hallpages = HallPage::all();
        $hallpages = HallPage::with('hall')->get();
        return view('admin.HallPagesCrud.HallPageTable', compact('hallpages'));
    }

    public function create()
    {
        $halls = Hall::all(); // Fetch all halls for dropdown
        return view('admin.HallPagesCrud.AddHallPage', compact('halls'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'hall_id' => 'required|exists:halls,id',
        ]);

        $hallPage = new HallPage();
        $hallPage->title = $request->title;
        $hallPage->description = $request->description;
        $hallPage->hall_id = $request->hall_id;
        $hallPage->save();

        return redirect()->route('HallPage.Table')->with('success', 'Hall Page added successfully');
    }

    public function edit($id)
    {
        $halls = Hall::all();
        $hallpage = HallPage::find($id);
        return view('admin.HallPagesCrud.UpdateHallPage', compact('hallpage', 'halls'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'hall_id' => 'required|exists:halls,id',
        ]);

        $hallPage = HallPage::find($id);
        $hallPage->title = $request->title;
        $hallPage->description = $request->description;
        $hallPage->hall_id = $request->hall_id;
        $hallPage->save();

        return redirect()->route('HallPage.Table')->with('success', 'Hall Page updated successfully');
    }

    public function view($id)
    {

        $hallpage = HallPage::with('hall')->find($id);
        return view('admin.HallPagesCrud.ViewHallPage', compact('hallpage'));
    }

    public function delete($id)
    {
        $hallpage = HallPage::findOrFail($id);
        $hallpage->delete();

        return redirect()->route('HallPage.Table')->with('success', 'Hall Page has been deleted');
    }
}
