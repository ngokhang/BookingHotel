<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUserRequest;
use App\Models\Avatar;
use App\Models\ProfileUser;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;

class ProfileUserController extends Controller
{
    public function index()
    {
        $user = User::with(['userInfo', 'avatar'])->where('id', 1)->first();
        $avatar = $user->avatar ? $user->avatar->name . '.' . $user->avatar->extension : 'not_upload';
        $fullname = $user->userInfo->first_name . ' ' . $user->userInfo->last_name;
        return view('auth.account-settings', ['dataUser' => $user, 'fullname' => $fullname, 'avatar' => $avatar]);
        return User::with(['userInfo', 'avatar'])->where('id', 1)->first();
    }

    public function edit(Request $request)
    {
        //
        $user = User::with(['userInfo', 'avatar'])->where('id', 1)->first();
        $avatar = $user->avatar ? $user->avatar->name . '.' . $user->avatar->extension : 'not_upload';
        $fullname = $user->userInfo->first_name . ' ' . $user->userInfo->last_name;
        return view('auth.personal-info', ['dataUser' => $user, 'fullname' => $fullname, 'avatar' => $avatar]);
        // return $avatar;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProfileUser  $profileUser
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileUserRequest $request, $id)
    {
        $res = UserInfo::updateOrCreate(['user_id' => $id], [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'dob' => $request->dob,
            'address' => $request->address
        ]);
        User::where('id', $id)->update(['email' => $request->email]);
        $fileAvatar = $request->file('avatar');
        if ($fileAvatar) {
            $fileAvatarName = implode('', array($request->first_name, $request->last_name)) . '.' . $fileAvatar->getClientOriginalExtension();
            Avatar::updateOrCreate(['name' => $request->first_name . '' . $request->last_name], [
                'user_id' => $id,
                'path' => 'uploads/avatar',
                'name' => $request->first_name . '' . $request->last_name,
                'extension' => $fileAvatar->getClientOriginalExtension()
            ]);
            $path = $fileAvatar->move('uploads/avatar', $fileAvatarName);
        }
        if ($res) {
            return redirect()->back()->with('success', 'Cập nhật thông tin thành công!');
        }
        return redirect()->back()->with('error', 'Cập nhật thông tin thất bại');
    }

    public function updateAvatar()
    {
    }
}
