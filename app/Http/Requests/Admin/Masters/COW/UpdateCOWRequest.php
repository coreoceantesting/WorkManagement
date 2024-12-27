<?php

namespace App\Http\Requests\admin\masters\COW;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCOWRequest extends FormRequest
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
            'cow_name' => "required|unique:cow,cow_name,$this->edit_model_id,id,deleted_at,NULL",
            'initial' => 'required',
        ];
    }
}
