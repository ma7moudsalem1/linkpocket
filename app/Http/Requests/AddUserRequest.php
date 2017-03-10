<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'name' => 'required|min:4|max:255',
            'email' => 'required|email|max:255|unique:users',
            'username' => 'required|min:4|max:32|regex:/^\S*$/u|regex:/([A-Za-z0-9 ])+/|unique:users',
            'gender' => 'required|integer',
            'bio' => 'max:255',
            'password' => 'required|min:6|confirmed',
        ];
    }
}
