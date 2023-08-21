<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\ValidationException;

class FAQRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'question' => 'required|string',
            'answer' => 'required|string'
        ];
    }


    protected function failedValidation(Validator $validator)
    {
        $errorAsString = null;
        $errors = $validator->errors()->messages();
        foreach ($errors as $error) {
            $errorAsString .= "\n" . $error[0];
        }

        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'message' => $errorAsString
            ])
        );
    }
}
