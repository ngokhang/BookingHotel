<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\HotelUser;
use App\Models\User;
use Illuminate\Http\Request;

class UserBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $userBookingData = User::with('hotels')->where('id', 4)->first()->hotels()->where('deleted_at', null)->paginate(5);
        $historyBookingData = User::with('hotels')->where('id', 4)->first()->hotels()->where('deleted_at', '!=', null)->get();
        return view('user.booking-list', compact('userBookingData', 'historyBookingData'));
        // $userBookingData = HotelUser::withTrashed()->where('id', 4)->get();
        // return $historyBookingData;
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
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $query = HotelUser::query();
        $result = $query->where('id', $id)->forceDelete();
        if ($result) {
            return redirect()->back()->with('success', 'Huỷ đặt phòng thành công');
        }
        return redirect()->back()->with('error', 'Huỷ đặt phòng thất bại');
        // return $result;
    }
}
