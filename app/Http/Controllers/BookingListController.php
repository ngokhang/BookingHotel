<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingListController extends Controller
{
    public function index()
    {
        $bookingPendingList = Booking::with(['hotel', 'customer'])->paginate(5);
        return $bookingPendingList;
    }
}
