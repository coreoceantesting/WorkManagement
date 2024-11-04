<?php

namespace App\Http\Requests\Admin\Masters\Contractor;

use Illuminate\Foundation\Http\FormRequest;

class StoreContractorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'contractor_name' => 'required|unique:contractors,contractor_name',
            'company_name' => 'required',
            'email' => 'required|email',
            'contact_no' => 'required|digits:10',
        ];
    }
}
