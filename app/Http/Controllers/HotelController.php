<?php

namespace App\Http\Controllers;

use App\Http\Requests\HotelRequest;
use App\Models\Avatar;
use App\Models\Hotel;
use Illuminate\Http\Request;


class HotelController extends Controller
{

    public function edit(Hotel $hotel)
    {
        $hotelInfo = $hotel;
        return view('test', compact('hotelInfo'));
    }

    public function update(HotelRequest $request, Hotel $hotel)
    {
        $ownerId = 1;
        if ($request->image) {
            foreach ($request->image as $index => $image) {
                ++$index;
                $imageName = str_replace(' ', '', (str_replace('.', '', mb_strtolower($request->name . $index)))) . '.' . $image->getClientOriginalExtension();
                Avatar::create([
                    'user_id' => $ownerId,
                    'path' => 'uploads/images/hotels/' . $imageName,
                    'name' => 'imghotel',
                    'extension' => $image->getClientOriginalExtension()
                ]);
                $image->move('uploads/images/hotels/', $imageName);
            }
        }

        $result = $hotel->update([
            'name' => $request->name,
            'city' => $request->city,
            'country' => $request->country,
            'description' => $request->description,
            'check_in_date' => $request->check_in_date,
            'price' => $request->price,
            'num_guest' => $request->num_guest,
            'image1' => str_replace(' ', '', (mb_strtolower($request->name))) . '1',
            'image2' => str_replace(' ', '', (mb_strtolower($request->name))) . '2',
            'image3' => str_replace(' ', '', (mb_strtolower($request->name))) . '3',
        ]);

        return $result;
    }

    public function show($id)
    {
        $hotel = Hotel::find($id); // Lấy thông tin của khách sạn dựa trên $id
        if (!$hotel) {
            return abort(404); // Xử lý trường hợp không tìm thấy khách sạn
        }

        return view('user.hotel', compact('hotel'));
    }
}
