<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    public function index(){
        $teams = Team::all();
        return view('admin.teamCrud.TeamTable',compact('teams'));
    }

    public function addTeam(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            // 'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $team = new Team();
        $team->name = $request->name;
        $team->designation = $request->designation;
        // $team->description = $request->description;

        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $imageName = time() . '.' . $image->getClientOriginalExtension();
        //     $image->move(public_path('Team_images'), $imageName);
        //     $team->image = $imageName;
        // }
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move('Team_images', $imageName);
        } else {
            $imageName = '';
        }
        $team->image = $imageName;


        $team->save();

        if($team){
        return redirect('/team')->with('success','Team has been Added');
        }
        else{
            return redirect('/ViewAdd')->with('fail','Opration failed');
        }


    }
    public function editTeam($id){
        $team = Team::find($id);
        return view('admin.teamCrud.UpdateTeam',compact('team'));
    }

    public function updateTeam(Request $request,$id){

        $request->validate([
            'name' => 'required|string|max:255',
            // 'description' => 'required|string',
            'designation'=>'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif'
        ]);

        $team = Team::find($id);

        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $imageName = time() . '.' . $image->getClientOriginalExtension();
        //     $image->move(public_path('Team_images'), $imageName);
        //     $team->image = $imageName;
        // }
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move('Team_images', $imageName);
            $filePath = public_path('Team_images/' . $team->image);
            if (is_file($filePath)) {
                unlink($filePath);
            }
            $team->image = $imageName;
        }

        $team->name = $request->name;
        $team->designation = $request->designation;
        // $team->description = $request->description;


        $team->save();

        if($team){
        return redirect('/team')->with('success','team has been updated');
        }
        else{
            return redirect('/addview')->with('fail','Opration failed');
        }


    }

    public function ViewTeam($id){
        $team = Team::find($id);
        return view('admin.teamCrud.ViewTeam',compact('team'));
      }
    public function deleteTeam($id){
        $team = Team::findOrFail($id);

        // Step 1: Delete the image stored in the 'image' column
        if ($team->image) {
            $imagePath = public_path('Team_images/' . $team->image); // Get full image path

            if (File::exists($imagePath)) {
                File::delete($imagePath); // Delete image file from storage
            }
        }
        $team->delete();
            if($team){
            return redirect('/team')->with('success','Team has been deleted');
            }
            else{
                return redirect('/addview')->with('fail','Opration failed');
            }

    }
}
