<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUserRequest;
use App\Models\Avatar;
use App\Models\ProfileUser;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;

class ProfileUserController extends Controller
{
    public function edit(Request $request)
    {
        //
        $user = User::with(['userInfo', 'avatar'])->where('id', 1)->first();
        $avatar = $user->avatar->name . '.' . $user->avatar->extension;
        $fullname = $user->userInfo->first_name . ' ' . $user->userInfo->last_name;
        return view('user.account-settings', ['dataUser' => $user, 'fullname' => $fullname, 'avatar' => $avatar]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProfileUser  $profileUser
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileUserRequest $request)
    {

        $res = UserInfo::where('id', $request->user_id)->update($request->except(['_token', '_method', 'avatar', 'email']));
        User::where('id', $request->user_id)->update(['email' => $request->email]);
        $fileAvatar = $request->file('avatar');
        if ($fileAvatar) {
            $fileAvatarName = implode('', array($request->first_name, $request->last_name)) . '.' . $fileAvatar->getClientOriginalExtension();
            Avatar::updateOrCreate(['user_id' => $request->user_id], [
                'path' => 'uploads/avatar',
                'name' => $request->first_name . '' . $request->last_name,
                'extension' => $fileAvatar->getClientOriginalExtension()
            ]);
            $path = $fileAvatar->move('uploads/avatar', $fileAvatarName);
        }
        if ($res) {
            return redirect()->back()->with('success', 'Created successfully!');
        }
        return redirect()->back()->with('error', 'Update failed! Check your infomation');
    }

    public function updateAvatar()
    {
    }
}
