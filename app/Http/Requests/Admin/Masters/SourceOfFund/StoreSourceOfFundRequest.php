<?php

namespace App\Http\Requests\Admin\Masters\SourceOfFund;

use Illuminate\Foundation\Http\FormRequest;

class StoreSourceOfFundRequest extends FormRequest
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
            'name' => 'required|unique:source_of_funds,name,NULL,NULL,deleted_at,NULL',
            'initial' => 'required',
        ];
    }
}
