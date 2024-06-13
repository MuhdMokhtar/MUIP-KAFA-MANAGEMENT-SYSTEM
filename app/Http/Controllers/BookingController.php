<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activities;
use App\Models\Bookings;

class BookingController extends Controller
{
    public function store(Request $request, Activities $activity)
    {
        $request->user()->bookings()->create([
            'activities_id' => $activity->id,
        ]);

        return redirect()->back()->with('success', 'Activity booked successfully!');
    }

    public function destroy(Request $request, Activities $activity)
    {
        // Find and delete the booking
        $booking = Bookings::where('user_id', $request->user()->id)
                          ->where('activities_id', $activity->id)
                          ->first();

        if ($booking) {
            $booking->delete();
            return redirect()->back()->with('success', 'Activity unbooked successfully!');
        }

        return redirect()->back()->withErrors('Booking not found.');
    }
}
