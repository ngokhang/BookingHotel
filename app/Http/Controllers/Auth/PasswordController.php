<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class PasswordController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $user = User::with(['userInfo', 'avatar'])->where('id', 1)->first();
        $avatar = $user->avatar ? $user->avatar->name . '.' . $user->avatar->extension : 'not_upload';
        $fullname = $user->userInfo->first_name . ' ' . $user->userInfo->last_name;
        return view('user.change-password', ['dataUser' => $user, 'fullname' => $fullname, 'avatar' => $avatar]);
    }

    /** 
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PasswordRequest $request)
    {
        //
        $user = User::find(1);
        $validPassword = Hash::check($request->current_password, $user->password);
        if ($validPassword) {
            $newPassword = $request->new_password;
            $res = $user->update(['password' => bcrypt($newPassword)]);
            if ($res) {
                return redirect()->back()->with('success', "Your password has changed");
            } else {
                return redirect()->back()->with('error', "Oops!!An error has occurred");
            }
        } else {
            return redirect()->back()->with('error', "Oops!!Your current password is invalid");
        }
    }
}
