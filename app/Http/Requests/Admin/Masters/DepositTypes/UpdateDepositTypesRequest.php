<?php

namespace App\Http\Requests\Admin\Masters\DepositTypes;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDepositTypesRequest extends FormRequest
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
            'deposit_type_name' => 'required',
            'initial' => 'required',
        ];
    }
}
