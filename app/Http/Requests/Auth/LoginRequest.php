<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Validated;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
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
            'email' => 'required|string|email' ,
            'password' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email is Required',
            'email.string' => 'Email is must contain only alphabet',
            'email.email' => 'Email is not valid',
            'email.unique' => 'Email does not match our records',
            'password.required' => 'Password is Required',
            'password.string' => 'Password is Required',
        ];
    }

    public function login()
    {

        if (! Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);

        }


    }
}
