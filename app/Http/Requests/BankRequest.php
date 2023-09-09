<?php

namespace App\Http\Requests;

use App\Models\Bank;
use Illuminate\Foundation\Http\FormRequest;

class BankRequest extends FormRequest
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
        $rules = [
            'email' => 'required|email|unique:banks,email',
            'administrator_first_name' => 'required|string|max:255',
            'administrator_last_name' => 'required|string|max:255',
            'administrator_email' => 'required|email|unique:bankers,email',
        ];
        if ($this->isMethod('post')) {
            $rules['name'] = 'required|string|unique:banks,name';
            $rules['subdomain'] = 'required|string|unique:banks,subdomain';
        } elseif ($this->isMethod('patch')) {
            $bank = Bank::find(decrypt_helper($this->bank));
            $rules['name'] = 'required|string|unique:banks,name,' . $bank->id . ',id';
            $rules['subdomain'] = 'required|string|unique:banks,subdomain,' . $bank->id . ',id';
        }
        return $rules;
    }
}
