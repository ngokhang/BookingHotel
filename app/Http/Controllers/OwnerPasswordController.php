<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerPasswordController extends Controller
{
    public function edit()
    {
        return view('owner.change-password');
    }
}
