<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;


class HotelController extends Controller
{
    public function show($id)
    {
        $hotel = Hotel::find($id); // Lấy thông tin của khách sạn dựa trên $id
        if (!$hotel) {
            return abort(404); // Xử lý trường hợp không tìm thấy khách sạn
        }

        return view('layout.user.hotel', compact('hotel'));
    }

}
