<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
        return [
            //
            'current_password' => 'required|string|max:255|min:6|alpha_dash',
            'new_password' => 'required|string|max:255|min:6|confirmed|alpha_dash',
            'new_password_confirmation' => 'required|string|max:255|min:6|alpha_dash',
        ];
    }

    public function messages()
    {
        return [
            'current_password.required' => 'Mật khẩu hiện tại không được để trống',
            'current_password.max' => 'Độ dài mật khẩu vượt quá độ dài cho phép',
            'current_password.min' => 'Độ dài mật khẩu phải lớn hơn 6 ký tự',
            'current_password.alpha_dash' => 'Mật khẩu không được chứa ký tự khoảng trắng',

            'new_password.required' => 'Mật khẩu hiện tại không được để trống',
            'new_password.max' => 'Độ dài mật khẩu vượt quá độ dài cho phép',
            'new_password.min' => 'Độ dài mật khẩu phải lớn hơn 6 ký tự',
            'new_password.alpha_dash' => 'Mật khẩu không được chứa ký tự khoảng trắng',
            'new_password.confirmed' => 'Nhập lại mật khẩu mới không khớp',

            'new_password_confirmation.required' => 'Mật khẩu hiện tại không được để trống',
            'new_password_confirmation.max' => 'Độ dài mật khẩu vượt quá độ dài cho phép',
            'new_password_confirmation.min' => 'Độ dài mật khẩu phải lớn hơn 6 ký tự',
            'new_password_confirmation.alpha_dash' => 'Mật khẩu không được chứa ký tự khoảng trắng',
        ];
    }
}
