<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordResetRequest extends FormRequest
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
        $rules = [];

        if ($this->isMethod('post')) {
            $rules =  [
                'former_password' => 'required|string',
                'new_password' => 'required|string|min:6',
                'password_confirmation' => 'required|string|same:new_password'
            ];
        }

        return $rules;
    }
}
