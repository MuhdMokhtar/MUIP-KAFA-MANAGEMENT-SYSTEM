<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
<<<<<<< Updated upstream
=======
use App\Http\Controllers\ManagePaymentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\StudentResultController;
>>>>>>> Stashed changes

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->hasRole('parent')) {
            return view('dashboard');
        } elseif (auth()->user()->hasRole('admin')) {
<<<<<<< Updated upstream
            return view('admin/admindashboard');
=======
            return view('admin_home');
        } elseif (auth()->user()->hasRole('teacher')) {
            return view('teacher_home');
>>>>>>> Stashed changes
        } else {
            abort(403);
        }
    })->name('dashboard');
});

<<<<<<< Updated upstream
=======
Route::middleware(['auth', 'role:parent'])->group(function () {
    Route::get('/register/view', [StudentController::class, 'viewRegister'])->name('register.view');
    Route::post('/register/store', [StudentController::class, 'store'])->name('register.store');
    Route::get('/payment-details', [ManagePaymentController::class, 'paymentDetails'])->name('payment-details');
    Route::get('/payment-history', [ManagePaymentController::class, 'paymentHistory']);
    Route::post('/session/{fee}', [ManagePaymentController::class, 'session'])->name('session');
    Route::get('/payment/success', [ManagePaymentController::class, 'handlePaymentSuccess'])->name('payment.success');
    Route::get('/payment/cancel', [ManagePaymentController::class, 'handlePaymentCancel'])->name('payment.cancel');
    Route::get('/payment-history/{fee}/info', [ManagePaymentController::class, 'showPaymentInfo'])->name('fees.info');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/manage-activity', [ActivitiesController::class, 'viewManageActivities'])->name('manage-activity');
    Route::get('/add-activity', [ActivitiesController::class, 'viewAddActivities'])->name('add-activity');
    Route::post('/store-activity', [ActivitiesController::class, 'storeActivities'])->name('store-activity');
    Route::get('/view-activity/{id}', [ActivitiesController::class, 'viewActivity'])->name('view-activity');
    Route::get('/edit-activity/{id}', [ActivitiesController::class, 'editActivity'])->name('edit-activity');
    Route::delete('/delete-activity/{id}', [ActivitiesController::class, 'deleteActivity'])->name('delete-activity');
    Route::put('/update-activity/{id}', [ActivitiesController::class, 'updateActivity'])->name('update-activity');
    Route::get('/view-student-result', [StudentResultController::class, 'viewStudentResult'])->name('student-result');
});




>>>>>>> Stashed changes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
