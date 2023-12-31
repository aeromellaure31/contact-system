<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email:rfc,dns|unique:users,email',
            'name' => 'required|max:50,name',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'
        ];
    }
}