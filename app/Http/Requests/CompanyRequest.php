<?php

namespace App\Http\Requests;

use App\Models\Company;
use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
        $company = Company::find(decrypt_helper($this->company));
        return [
            'name' => 'required|string|unique:companies,name,' . $company->id . ',id',
            'administrator_id' => 'required|integer|exists:auditors,id'
        ];
    }
}
