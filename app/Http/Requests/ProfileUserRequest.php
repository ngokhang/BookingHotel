<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUserRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            // 'last_name' => 'required|string|max:255',
            // 'profile_address' => 'required|string|max:255',
            // 'profile_phonenumber' => 'required|string|max:11',
        ];
    }

    public function messages()
    {
        return [
            'profile_firstname.required' => "Firstname field is empty",
            'profile_firstname.regex' => "Fields mustn't special characters"
        ];
    }
}
