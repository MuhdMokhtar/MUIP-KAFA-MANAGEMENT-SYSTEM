<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentResultController extends Controller
{
    public function viewStudentResult()
    {
        return view('ManageStudentResults.studentList');
    }
}
