<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Hotel;

class BookingListController extends Controller
{
    public function index(Hotel $hotel)
    {
        $bookingPendingList = Booking::where('hotel_id', $hotel->id)
            ->with(['hotel', 'customer'])
            ->withTrashed()
            ->paginate(5);

        return view('owner.booking-list', compact('bookingPendingList', 'hotel'));
    }
}
