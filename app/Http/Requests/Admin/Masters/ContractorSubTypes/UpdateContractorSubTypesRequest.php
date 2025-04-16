<?php

namespace App\Http\Requests\Admin\Masters\ContractorSubTypes;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContractorSubTypesRequest extends FormRequest
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
            'name' => "required|unique:contractor_sub_types,name,$this->edit_model_id,id,deleted_at,NULL",
            'contractor_type_id' => 'required',
            'initial' => 'required',
            'status'  => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'contractor_type_id.required' => 'Please select a contractor type.',
        ];
    }
}
