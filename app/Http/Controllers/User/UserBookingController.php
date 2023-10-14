<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\EvaluationRequest;
use App\Models\Evaluation;
use App\Models\HotelUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $historyBookingData = User::with('hotels')->where('id', 4)->first()->hotels()->where('deleted_at', '!=', null)->where('accepted', 1)->paginate(5);
        return view('user.booking-list', compact('userBookingData', 'historyBookingData'));
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
    public function update(EvaluationRequest $request, $hotel_id)
    {
        //
        $pointRate = $request->quality_input;
        $feedbackContent = $request->feedback_input;
        $result = Evaluation::updateOrCreate(
            ['hotel_id' => $hotel_id],
            ['user_id' => 4, 'feedback' => $feedbackContent, 'point' => $pointRate]
        );

        if ($result) {
            return redirect()->back()->with('success', 'Cảm ơn bạn đã đánh giá!');
        } else {
            return redirect()->back()->with('error', 'Nội dung không hợp lệ');
        }
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
