<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ResetPassword extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return bool
     */
    public function authorize() {
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
            'password' => ['required', 'max:255'],
            'confirm_password' => ['required','same:password'],
        ];
    }
}
