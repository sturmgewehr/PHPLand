<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => 'required|string|min:8|max:255|alpha_num|unique:users,name,'.$this->user()->id,
            'email' => 'required|string|email|max:255|unique:users,email,'.$this->user()->id,
            /*'password' => 'required|string|min:8|confirmed',*/
        ];
    }
}
