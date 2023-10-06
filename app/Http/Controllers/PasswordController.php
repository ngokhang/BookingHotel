<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;

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
        $avatar = $user->avatar->name . '.' . $user->avatar->extension;
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
        $newPassword = $request->new_password;
        $res = User::find($request->user_id)->update(['password' => bcrypt($newPassword)]);
        if ($res) {
            return redirect()->back()->with('success', "Your password has changed");
        } else {
            return redirect()->back()->with('error', "Oops!!An error has occurred");
        }
    }
}
