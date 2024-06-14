<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Result;

class StudentResultController extends Controller
{
    public function viewStudentResult()
    {
        $results = Result::all(); // Fetch all results
        return view('ManageStudentResults.studentList', compact('results'));
    }

    public function addStudentResult(Request $request)
    {
        $validatedData = $request->validate([
            'student_name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'grade' => 'required|string|max:255', // Adjust validation if grade is numerical
            'score' => 'nullable|numeric', // Adjust validation if score has a range
            'status' => 'required|string|max:255',
            'comment' => 'nullable|string', // Optional comment/feedback field
        ]);

        // Create a new student result record
        $result = Result::create([
            'student_name' => $validatedData['student_name'],
            'subject' => $validatedData['subject'],
            'grade' => $validatedData['grade'],
            'score' => $validatedData['score'],
            'status' => $validatedData['status'],
            'comment' => $validatedData['comment'], // Include comment if provided
        ]);

        // Redirect to a success page or relevant view with a success message
        return redirect()->route('manage-student-results')->with('success', 'Student result added successfully!');
    }

}