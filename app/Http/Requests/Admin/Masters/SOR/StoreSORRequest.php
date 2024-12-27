<?php

namespace App\Http\Requests\Admin\Masters\SOR;

use Illuminate\Foundation\Http\FormRequest;

class StoreSORRequest extends FormRequest
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
            'sor_name' => 'required|unique:sor,sor_name,NULL,NULL,deleted_at,NULL',
            'initial'   => 'required',
            'ip_address'=> 'nullable'
        ];
    }
}
