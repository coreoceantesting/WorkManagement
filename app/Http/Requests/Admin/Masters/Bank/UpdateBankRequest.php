<?php

namespace App\Http\Requests\Admin\Masters\Bank;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBankRequest extends FormRequest
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
            'bank_name' => "required|unique:banks,bank_name,$this->edit_model_id,id,deleted_at,NULL",
            'initial' => 'required',
        ];
    }
}
