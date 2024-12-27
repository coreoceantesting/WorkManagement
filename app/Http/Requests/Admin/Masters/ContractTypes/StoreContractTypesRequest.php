<?php

namespace App\Http\Requests\Admin\Masters\ContractTypes;

use Illuminate\Foundation\Http\FormRequest;

class StoreContractTypesRequest extends FormRequest
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
            'contract_type_name' => 'required|unique:banks,bank_name,NULL,NULL,deleted_at,NULL',
            'initial' => 'required',
        ];
    }
}
