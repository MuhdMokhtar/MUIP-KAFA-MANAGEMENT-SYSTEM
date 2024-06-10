<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activities;

class ActivitiesController extends Controller
{
    public function storeActivities(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'activity_type' => 'required|string|max:255',
            'activity_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_date' => 'required|date',
            'end_time' => 'required|date_format:H:i',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string|max:50',
        ]);

        // Create a new activity record
        $activity = Activities::create([
            'activity_type' => $validatedData['activity_type'],
            'activity_name' => $validatedData['activity_name'],
            'start_date' => $validatedData['start_date'],
            'start_time' => $validatedData['start_time'],
            'end_date' => $validatedData['end_date'],
            'end_time' => $validatedData['end_time'],
            'location' => $validatedData['location'],
            'description' => $validatedData['description'],
            'status' => $validatedData['status'],
        ]);

        // Redirect to the activities management view with a success message
        return redirect()->route('manage-activity')->with('success', 'Activity created successfully.');
    }

    public function viewManageActivities(){
        $activities = Activities::all();
        return view('ManageKafaActivities.AdminManageActivities', compact('activities'));
    }

    public function viewAddActivities(){
        return view('ManageKafaActivities.AdminAddActivities');
    }

    public function editActivity($id)
    {
        $activity = Activities::findOrFail($id);
        return view('ManageKafaActivities.AdminEditActivities', compact('activity'));
    }

    public function deleteActivity($id)
    {
        $activity = Activities::findOrFail($id);
        $activity->delete();

        return redirect()->route('manage-activity')->with('success', 'Activity deleted successfully.');
    }

    public function viewActivity($id)
    {
        $activity = Activities::findOrFail($id);
        return view('ManageKafaActivities.AdminViewActivities', compact('activity'));
    }

    public function updateActivity(Request $request, $id)
    {
        $activity = Activities::findOrFail($id);
        
        $activity->update($request->all());

        return redirect()->route('manage-activity')->with('success', 'Activity updated successfully.');
    }

    public function viewParentManageActivities(){
        $activities = Activities::all();
        return view('ManageKafaActivities.ParentsActivities', compact('activities'));
    }

}
