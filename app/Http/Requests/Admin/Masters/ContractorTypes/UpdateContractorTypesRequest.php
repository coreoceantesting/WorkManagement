<?php

namespace App\Http\Requests\Admin\Masters\ContractorTypes;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContractorTypesRequest extends FormRequest
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
            'contractor_type_name' => "required|unique:contractor_types,contractor_type_name,$this->edit_model_id,id,deleted_at,NULL",
            'initial' => 'required',
        ];
    }
}
