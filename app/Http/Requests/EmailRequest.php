<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class EmailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
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
                'subject' => 'required|string|max:255',
                'message' => 'required|string',
                'copy' => 'nullable|string',
                'attachment' => 'nullable|max:2048',
            ];
        }
        return $rules;
    }


    public function messages()
    {
        return [
            'attachment.max' => 'File size must not be greater than :max MB'
        ];
    }
}
