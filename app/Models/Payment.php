<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public function markPaymentAsPaid(Request $request)
{
    $paymentId = $request->input('payment_id'); 

    $payment = Payment::findOrFail($paymentId);

    // Perform payment validation here (e.g., check against payment gateway)

    if ($paymentIsValid) {
        $payment->status = 'paid';
        $payment->save();

        // Additional actions (e.g., send email, update balances)
    } else {
        // Handle invalid payment (e.g., show error message)
    }
}

}
 