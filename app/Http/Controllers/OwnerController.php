<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUserRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Avatar;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ownerList = User::withTrashed()->where('role', 'owner')->paginate(10);
        return $ownerList;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "Đây là trang tạo tài khoản của admin cho chủ khách sạn";
    }

    /**
     * Store a newly created resource in storage.
     *
     * Đặt name, id input theo mẫu sau: 
     * username -> name = "username" id=....
     * password -> name="password" id=....
     * password confirm -> name="password_confirmation" id=....
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request)
    {
        $newOwner = new User;
        $newOwner->fill($request->all());

        return $newOwner->save() ? Alert::success('Tạo tài khoản thành công', 'Ok để tiếp tục') : Alert::error('Tạo tài khoản thất bại', 'Vui lòng thử lại sau');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $owner = User::find($id);

        return $owner;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileUserRequest $request, $id)
    {
        $res = UserInfo::updateOrCreate(['user_id', $id], $request->except(['_token', '_method', 'avatar', 'email']));
        User::where('id', $request->user_id)->update(['email' => $request->email]);
        $fileAvatar = $request->file('avatar');
        if ($fileAvatar) {
            $fileAvatarName = implode('', array($request->first_name, $request->last_name)) . '.' . $fileAvatar->getClientOriginalExtension();
            Avatar::updateOrCreate(['name' => $request->first_name . '' . $request->last_name], [
                'user_id' => $id,
                'path' => 'uploads/avatar',
                'name' => $request->first_name . '' . $request->last_name,
                'extension' => $fileAvatar->getClientOriginalExtension()
            ]);
            $fileAvatar->move('uploads/avatar', $fileAvatarName);
        }
        if ($res) {
            return redirect()->back()->with('success', 'Cập nhật thông tin thành công!');
        }
        return redirect()->back()->with('error', 'Cập nhật thông tin thất bại');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $result = User::find($id)->forceDelete();
        return $result ? redirect()->back()->with('success', 'Xoá thành công!') : redirect()->back()->with('error', 'Xoá thất bại');
    }
}
