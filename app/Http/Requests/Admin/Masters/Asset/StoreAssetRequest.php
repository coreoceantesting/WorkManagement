<?php

namespace App\Http\Requests\admin\masters\Asset;

use Illuminate\Foundation\Http\FormRequest;

class StoreAssetRequest extends FormRequest
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
            'name' => 'required|unique:asset,name,NULL,NULL,deleted_at,NULL',
            'code' => 'required',
            'category' => 'required',
            'department' => 'required',
            'location' => 'required',
            'initial' => 'required',
        ];
    }
}
