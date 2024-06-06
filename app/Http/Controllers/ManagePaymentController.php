<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Payment;


class ManagePaymentController extends Controller
{
    public function paymentDetails(Request $request) // Removed Student $student
{
    // Get the currently authenticated user
    $user = $request->user();
    
    // Get the authenticated parent's ID
    $parentId = $user->id;
    // Retrieve student information based on logged-in parent 
    $student = $user->students->first(); // Assuming a parent has one student for now
    if (!$student) {
       return redirect()->back()->with('error', 'You do not have any student record.');
    }

    // Eager load the fee relationship
    $student->load('fees');

    // Get the pending fee for this student (if available)
   
    $fee = $student->fees()->latest()->first();


    return view('ManagePayment/paymentDetails', compact('student', 'fee'));
}

    public function paymentHistory()
    {
        return view('ManagePayment/paymentHistory');
    }

    
}
