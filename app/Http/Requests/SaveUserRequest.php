<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules;
use App\Account;
use Illuminate\Foundation\Http\FormRequest;

class SaveUserRequest extends FormRequest
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
            'names' => ['required', 'string', 'max:50'],
            'lastnames' => ['required', 'string', 'max:50'],
            'phone' => ['required', 'string', 'max:11'],
            'address' => ['required', 'string', 'max:255'],
            'birth' => ['required', 'date'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ];
    }

    public function messages()
    {
        return [
            'names.required' => 'Nombres requeridos.'
        ];
    }
}
