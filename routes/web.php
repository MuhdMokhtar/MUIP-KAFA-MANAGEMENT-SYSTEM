<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagePaymentController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        if (auth()->user()->hasRole('parent')) {
            return view('parent_home');
        } elseif (auth()->user()->hasRole('admin')) {
            return view('admin_home');
        } else {
            abort(403); 
        }
    })->name('home');
});



Route::middleware(['auth', 'role:parent'])->group(function () {
    Route::get('/payment-details', [ManagePaymentController::class, 'paymentDetails']);
    Route::get('/payment-history', [ManagePaymentController::class, 'paymentHistory']);
    Route::post('/students', [StudentController::class, 'store'])->name('students.store');
    
 });


    


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
