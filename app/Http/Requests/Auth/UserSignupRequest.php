<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\AbstractFormRequest;

class UserSignupRequest extends AbstractFormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|alpha_num|min:8',
            'user_type' => 'required|in:builder'
        ];
    }
}
