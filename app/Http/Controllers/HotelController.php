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
        return view('owner.edit-hotel', compact('hotelInfo'));
    }

    public function update(HotelRequest $request, Hotel $hotel)
    {
        // Đảm bảo rằng biến $hotelInfo đã được truyền vào view
        $hotelInfo = $hotel;

        $ownerId = 1;

        // Nếu người dùng đã tải lên hình ảnh
        if ($request->hasFile('image')) {
            $imagePaths = [];
            // Lặp qua từng hình ảnh và lưu chúng vào thư mục và cơ sở dữ liệu
            foreach ($request->file('image') as $index => $image) {
                $index++;
                $imageName = str_replace(' ', '', (str_replace('.', '', mb_strtolower($request->name . $index))) . '.' . $image->getClientOriginalExtension());
                $imagePath = 'uploads/images/hotels/' . $imageName;
                // Lưu hình ảnh vào thư mục
                $image->move('uploads/images/hotels/', $imageName);
                // Lưu thông tin hình ảnh vào cơ sở dữ liệu
                Avatar::updateOrCreate([
                    'user_id' => $ownerId,
                    'path' => $imagePath,
                    'name' => 'hotel-' . mb_strtolower($hotel->country) . '-' . mb_strtolower($hotel->city) . '-' . $imageName,
                    'extension' => $image->getClientOriginalExtension(),
                ]);
                // Thêm đường dẫn hình ảnh vào mảng
                $imagePaths[] = $imagePath;
            }
            // Cập nhật các trường hình ảnh trong cơ sở dữ liệu
            $hotel->update([
                'name' => $request->name,
                'city' => $request->city,
                'country' => $request->country,
                'description' => $request->description,
                'check_in_date' => $request->check_in_date,
                'price' => $request->price,
                'num_guest' => $request->num_guest,
                'image1' => $imagePaths[0] ?? null,
                'image2' => $imagePaths[1] ?? null,
                'image3' => $imagePaths[2] ?? null,
            ]);
            return redirect()->route('owner_manage.index')->with('success', 'Cập nhật thành công');
        } else {
            // Nếu không có hình ảnh mới được tải lên, cập nhật thông tin khách sạn mà không làm thay đổi hình ảnh
            $hotel->update([
                'name' => $request->name,
                'city' => $request->city,
                'country' => $request->country,
                'description' => $request->description,
                'check_in_date' => $request->check_in_date,
                'price' => $request->price,
                'num_guest' => $request->num_guest,
            ]);
            return redirect()->route('owner_manage.index')->with('success', 'Cập nhật thành công');
        }
    }

    public function store(HotelRequest $request)
    {
        $newHotel = new Hotel;
        $newHotel->fill($request->all());
        $newHotel->owner_id = 1; // Auth::user()->id

        if ($request->hasFile('image')) {
            $imagePaths = [];
            // Lặp qua từng hình ảnh và lưu chúng vào thư mục và cơ sở dữ liệu
            foreach ($request->file('image') as $index => $image) {
                $index++;
                $imageName = str_replace(' ', '', (str_replace('.', '', mb_strtolower($request->name . $index))) . '.' . $image->getClientOriginalExtension());
                $imagePath = 'uploads/images/hotels/' . $imageName;
                // Lưu hình ảnh vào thư mục
                $image->move('uploads/images/hotels/', $imageName);
                // Lưu thông tin hình ảnh vào cơ sở dữ liệu
                Avatar::updateOrCreate([
                    'user_id' => 1, // Auth::user()->id
                    'path' => $imagePath,
                    'name' => 'hotel-' . mb_strtolower($newHotel->country) . '-' . mb_strtolower($newHotel->city) . '-' . $imageName,
                    'extension' => $image->getClientOriginalExtension(),
                ]);
                // Thêm đường dẫn hình ảnh vào mảng
                array_push($imagePaths, $imagePath);
            }
            $newHotel->image1 = $imagePaths[0];
            $newHotel->image2 = $imagePaths[1];
            $newHotel->image3 = $imagePaths[2];
        }

        $resultCreate = $newHotel->save();
        return $resultCreate ? redirect()->back()->with('success', 'Tạo khách sạn thành công') : redirect()->back()->with('error', 'Tạo khách sạn thất bại');
    }

    public function destroy(Hotel $hotel)
    {
        // Kiểm tra xem khách sạn có đang được cho thuê hay không
        if ($hotel->deleted_at) {
            return redirect()->route('owner_manage.index')->with('error', 'Khách sạn đang được cho thuê, không thể xóa.');
        }
        $hotel->forceDelete();
        return redirect()->route('owner_manage.index')->with('success', 'Xóa khách sạn thành công.');
    }


    public function show($id)
    {
        $hotel = Hotel::withTrashed()->where('id', $id)->first(); // Lấy thông tin của khách sạn dựa trên $id
        if (!$hotel) {
            return abort(404);
        }

        return view('user.hotel', compact('hotel'));
    }
}
