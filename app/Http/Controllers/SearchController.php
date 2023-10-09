<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Hotel; // Thay thế bằng tên model của bạn

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $country = $request->input('country'); // Lấy giá trị country từ request
        $price = $request->input('price'); // Lấy giá trị price từ request

        // Bắt đầu với một truy vấn dựng sẵn cho model Hotel
        $query = Hotel::query();

        // Thêm điều kiện tìm kiếm dựa trên country (nếu có)
        if ($country) {
            $query->where('country', $country);
        }

        // Thêm điều kiện tìm kiếm dựa trên price (nếu có)
        if ($price) {
            $query->where('price', $price);
        }

        // Lấy kết quả tìm kiếm
        $hotels = $query->get();

        return view('search_results', compact('hotels', 'country', 'price'));
    }
}
