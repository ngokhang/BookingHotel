<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingListController extends Controller
{
    public function index()
    {
        $ownerId = 1; // Auth::user()->id;

        $bookingPendingList = Booking::with(['hotel', 'customer'])
            ->whereHas('hotel', function ($query) use ($ownerId) {
                $query->where('owner_id', $ownerId);
            })
            ->paginate(5);

        return view('owner.booking-list', compact('bookingPendingList'));
    }
}
