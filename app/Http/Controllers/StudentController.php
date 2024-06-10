<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;
use Illuminate\Support\Facades\Session;
use App\Models\Fee;


class StudentController extends Controller
{

    public function viewRegister()
    {

        return view('ManageUser.register');
    }


    public function store(Request $request)

    {
        //Create a new student record
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'date_of_birth' => 'nullable|date',
            'darjah' => 'nullable|string|max:255',
        ]);

        $student = new Student($validatedData);
        $student->parent_id = auth()->id(); // Associate the student with the logged-in parent
        $student->save();

         // Create a new fee record for the student
         $fee = new Fee([
            'tuition_fee' => config('app.default_tuition_fee'), // Get default tuition fee from config
            'activity_fee' => config('app.default_activity_fee'), // Get default activity fee from config
            'total_fee' => config('app.default_tuition_fee') + config('app.default_activity_fee'),
            'due_date' => now()->addDays(30), // due date (30 days from now)
            'status' => 'pending',
        ]);

        $student->fees()->save($fee);

        return redirect()->back()->with('success', 'Student added successfully.');

    }

    
}