<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class TransactionRequest extends FormRequest
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
        $rules = [];

        if ($this->isMethod('post')) {
            $rules = [
                'account_id' => 'required|string|exists:accounts,id',
                'type' => 'required|string|in:credit,debit',
                'show_transaction' => 'required|string|in:YES,NO',
                'created_at' => 'required|date',
                'amount' => 'required|numeric|between:0,9999999999.99',
                'narration' => 'required|string'
            ];
        }

        return $rules;
    }
}
