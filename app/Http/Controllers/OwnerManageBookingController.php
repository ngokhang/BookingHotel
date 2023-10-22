<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Hotel;
use App\Models\Owner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OwnerManageBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::with(['hotels' => function ($query) {
            return $query->withTrashed();
        }])->where('id', 1)->first(); // Lấy thông tin của user
        return view('owner.owner_manage', compact('user')); // Truyền biến "$user" vào view
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $hotel_id, $booking_id)
    {
        DB::transaction(function () use ($hotel_id, $booking_id) {
            $resUpdateBookingTable = Booking::where('id', $booking_id)->update(['accepted' => 1]);
            $resUpdateHotelTable = Hotel::where('id', $hotel_id)->delete();

            if (!$resUpdateBookingTable || !$resUpdateHotelTable) {
                return redirect()->route('booking-list.index')->with('error', 'Yêu cầu không hợp lệ');
            }
            return redirect()->route('booking-list.index')->with('success', 'Yêu cầu đã được chấp nhận');
        });
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * Chức năng trả phòng
     */
    public function destroy($hotel_id, $booking_id)
    {
        DB::transaction(function () use ($hotel_id, $booking_id) {
            $resUpdateBookingTable = Booking::where('id', $booking_id)->delete();
            $resUpdateHotelTable = Hotel::withTrashed()->where('id', $hotel_id)->restore();

            if (!$resUpdateBookingTable || !$resUpdateHotelTable) {
                return redirect()->route('booking-list.index')->with('error', 'Trả phòng thành công');
            }
            return redirect()->route('booking-list.index')->with('success', 'Trả phòng thất bại');
        });
    }
}
