<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingListController extends Controller
{
    public function index()
    {
        $bookingPendingList = Booking::with(['hotel' => function ($query) {
            $ownerId = 1; // Auth::user()->id
            return $query->where('owner_id', $ownerId);
        }, 'customer'])->withTrashed()->paginate(5);
        return $bookingPendingList;
    }
}
