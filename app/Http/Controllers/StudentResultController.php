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

    public function handleSubjectSelection(Request $request)
    {
        $selectedSubject = $request->input('subject');

        // Logic to handle selected subject (e.g., redirect to filtered results page)

        return redirect()->route('student-results.view', ['subject' => $selectedSubject]); // Replace with actual route
    }
}