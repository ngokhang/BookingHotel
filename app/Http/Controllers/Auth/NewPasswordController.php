<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\PasswordReset;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NewPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($token)
    {
        //
        return view('auth.reset-password', ['token' => $token]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ResetPasswordRequest $request, $email)
    {
        $tokenExisted = PasswordReset::where('email', $email)->first();
        $token = $tokenExisted->token;
        $expiredTime = Carbon::parse($tokenExisted->expired_at)->timestamp;
        $currentTime = Carbon::now()->timestamp;

        if ($currentTime > $expiredTime) {
            return redirect()->route('forgot.create')->with('error', 'Your token has expired');
        }

        if ($request->token_reset != $token) {
            return redirect()->back()->with('error', 'Your token is invalid');
        }

        $email = $tokenExisted->email;
        $newPassword = $request->new_password;
        $user = User::where('email', $email)->first();
        $user->password = bcrypt($newPassword);
        $user->save();

        $tokenExisted->delete();

        return redirect()->back()->with('success', 'Changed password');
        // return page login
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
    }
}
