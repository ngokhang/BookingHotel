<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Thực hiện logic để lấy dữ liệu từ bảng "hotels" và truyền nó vào view
        $hotels = DB::table('hotels')->get(); // Truy vấn tất cả dữ liệu từ bảng "hotels"
        return view('home', ['hotels' => $hotels]);
    }
}
