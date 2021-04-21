<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
        $validatedEmail = auth()->check() ? 'required|email' : 'required|email|unique:users';

        return [
            'email' => $validatedEmail,
            'firstname' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'street' => 'required',
            'sector' => 'required',
            'city' => 'required',
            'country' => 'required',
            'phone' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'You already have an account with this email. Please <a href="/login">login</a> to continue.',
        ];
    }
}
