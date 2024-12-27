<?php

namespace App\Http\Requests\Admin\Prefix\mainprefix;

use Illuminate\Foundation\Http\FormRequest;

class UpdatemainprefixRequest extends FormRequest
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
            'name'        => "required|unique:mainprefix,name,$this->edit_model_id,id,deleted_at,NULL",
            'description' => 'required',
            'status'      => 'nullable',
        ];
    }
}