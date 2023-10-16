<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $country = $request->input('country'); // Lấy giá trị country từ request
        $city = $request->input('city'); // Lấy giá trị city từ request
        $price = $request->input('price'); // Lấy giá trị price từ request
        $keyword = $request->input('keyword'); // Lấy giá trị từ khóa từ request

        // Bắt đầu với một truy vấn dựng sẵn cho model Hotel
        $query = Hotel::query();

        // Thêm điều kiện tìm kiếm dựa trên từ khóa (nếu có)
        if ($keyword) {
            $query->where(function ($query) use ($keyword) {
                $query->orWhere('name', 'like', '%' . $keyword . '%')
                    ->orWhere('city', 'like', '%' . $keyword . '%')
                    ->orWhere('country', 'like', '%' . $keyword . '%');
            });
        }

        // Thêm điều kiện tìm kiếm dựa trên country (nếu có)
        if ($country) {
            $query->where('country', $country);
        }

        $priceString = '';
        if ($price) {
            if ($price === 'under100') {
                $query->where('price', '<', 100);
                $priceString = '$0 - $100';
            } elseif ($price === '100to200') {
                $query->whereBetween('price', [100, 200]);
                $priceString = '$100 - $200';
            } elseif ($price === '200to300') {
                $query->whereBetween('price', [200, 300]);
                $priceString = '$200 - $300';
            } elseif ($price === 'over300') {
                $query->where('price', '>', 300);
                $priceString = 'Trên $300';
            }
        }

        // Lấy kết quả tìm kiếm
        $hotels = $query->get();

        if ($hotels->isEmpty()) {
            return view('no_results', compact('hotels', 'keyword', 'country','price', 'priceString'));
        } else {
            return view('search_results', compact('hotels', 'keyword', 'country', 'price', 'priceString'));
        }
    }
}
