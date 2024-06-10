<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bulletins;

class BulletinDashboardController extends Controller
{

    public function storeBulletin(Request $request)
    {

        $validatedData = $request->validate([
            'bulletin_title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $activity = Bulletins::create([
            'bulletin_title' => $validatedData['bulletin_title'],
            'description' => $validatedData['description'],
        ]);

        return redirect()->route('manage-dashboard')->with('success', 'Activity created successfully.');
    }

    public function viewDashboard(){
        $bulletins = Bulletins::all();
        return view('ManageBulletinDashboard.viewDashboard', compact('bulletins'));
    }

    public function viewAddPost(){
        return view('ManageBulletinDashboard.addBulletin');
    }

    public function show($id)
    {
        $bulletin = Bulletins::findOrFail($id);
        return response()->json($bulletin);
    }

    public function deleteBulletin($id)
    {
        $bulletin = Bulletins::findOrFail($id);
        $bulletin->delete();

        return redirect()->route('manage-dashboard')->with('success', 'Bulletin deleted successfully.');
    }

    public function editBulletin($id)
    {
        $bulletin = Bulletins::findOrFail($id);
        return view('ManageBulletinDashboard.editBulletin', compact('bulletin'));
    }

    public function updateBulletin(Request $request, $id)
    {
        $bulletin = Bulletins::findOrFail($id);
        
        $bulletin->update($request->all());

        return redirect()->route('manage-dashboard')->with('success', 'Bulletin updated successfully.');
    }

}
