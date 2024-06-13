<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Fee;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Log;
use Stripe\PaymentIntent;


class ManagePaymentController extends Controller
{
    public function paymentDetails(Request $request)
    {
        $user = $request->user();
        $students = $user->students->load('fees');

        $selectedStudent = null;  // Initialize $selectedStudent
        $fee = null;              // Initialize $fee

        if ($request->has('student_id')) {
            $selectedStudent = $students->firstWhere('id', $request->input('student_id'));

            // Check if a student was found
            if ($selectedStudent) {
                $fee = $selectedStudent->fees->sortByDesc('created_at')->first();
            }
        }

        return view('ManagePayment.paymentDetails', compact('students', 'selectedStudent', 'fee'));
    }


    public function paymentHistory()
    {
        $user = auth()->user();

        $fees = Fee::whereHas('student', function ($query) use ($user) {
            $query->where('parent_id', $user->id);
        })
            ->where('status', 'paid')
            ->get();

        return view('ManagePayment.paymentHistory', compact('fees'));
    }


    public function session(Request $request, Fee $fee)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'myr',
                            'unit_amount' => ($fee->tuition_fee + $fee->activity_fee) * 100, // Total fee in cents
                            'product_data' => [
                                'name' => 'Tuition and Activity Fee for ' . $fee->student->name,
                                'description' => 'Tuition and Activity Fee for ' . $fee->student->name,

                            ],
                        ],
                        'quantity' => 1,
                    ]
                ],
            'metadata' => ['fee_id' => $fee->id],
            'mode' => 'payment',
            'success_url' => url('/payment/success?session_id={CHECKOUT_SESSION_ID}&fee_id=' . $fee->id),
            'cancel_url' => url('/payment/cancel?fee_id=' . $fee->id),
        ]);

        $fee->stripe_payment_intent_id = $session->id;
        $fee->save();

        return redirect()->away($session->url);
    }



    public function handlePaymentSuccess(Request $request)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $sessionId = $request->query('session_id');
        $feeId = $request->query('fee_id');

        // Error Handling: Check if session or fee IDs are present
        if (!$sessionId || !$feeId) {
            Log::error('Stripe Session Retrieval Error: Missing session ID or fee ID');
            return redirect()->route('payment-details')->with('error', 'Payment verification failed.');
        }

        try {
            $session = \Stripe\Checkout\Session::retrieve($sessionId);
            // Ensure payment was successful
            if ($session->payment_status !== 'paid') {
                Log::error('Stripe payment not successful for session ID: ' . $sessionId);
                return redirect()->route('payment-details', $feeId)->with('error', 'Payment not successful.');
            }

            $fee = Fee::findOrFail($feeId);

        } catch (\Exception $e) {
            Log::error('Stripe Session Retrieval Error:', ['error' => $e->getMessage()]);
            return redirect()->route('payment-details', $feeId)->with('error', 'Payment verification failed.');
        }

        $fee->update(['status' => 'paid']); // Update status 
        $fee->save(); // Refresh the fee model to reflect the changes

        // Redirect to payment details page with success message
        return redirect()->route('payment-details', ['student_id' => $fee->student_id])->with('success', 'Payment successful!');
    }


    public function handlePaymentCancel(Request $request)
    {
        // Get the fee ID from the query string
        $feeId = $request->query('fee_id');
        // Error Handling: Check if fee ID is present
        $fee = Fee::findOrFail($feeId);

        return redirect()->route('payment-details', $fee->student_id)->with('error', 'Payment was cancelled.');
    }

    public function showPaymentInfo(Fee $fee)
    {

        $paymentIntentId = $fee->stripe_payment_intent_id;

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $paymentIntent = PaymentIntent::retrieve($paymentIntentId);

        $paymentData = [
            'fee_id' => $fee->id,
            'student_name' => $fee->student->name,
            'tuition_fee' => $fee->tuition_fee,
            'activity_fee' => $fee->activity_fee,
            'total_paid' => $fee->tuition_fee + $fee->activity_fee,
            'payment_date' => date('Y-m-d H:i:s', $paymentIntent->created),
        ];


        return view('/ManagePayment/paymentinfo', compact('fee'));
    }

}








