<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Rules\StringValidRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateOwnerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $currentEmail = User::find(9)->email; //Auth::user()->email;
        $userId = 9;
        return [
            'username' => ['required', new StringValidRule("Tên đăng nhập"), 'regex:/^[a-zA-Z0-9]+$/i'],
            'email' => ['required', 'email', "unique:users,email,$userId"],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email đang để trống',
            'email.unique' => 'Email đã được sử dụng',
            'username.regex' => 'Tên đăng nhập không hợp lệ'
        ];
    }
}
