<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class ApproveHotelController extends Controller
{
    public function index()
    {
        $unapprovedHotels = Hotel::where('admin_accepted', false)->get();
        return view('admin.admin_manage-hotel', compact('unapprovedHotels'));
    }

    public function approve(Hotel $hotel)
    {
        $hotel->update(['admin_accepted' => true]);
        return redirect()->route('admin.approve_hotels')->with('success', 'Khách sạn đã được duyệt.');
    }
}