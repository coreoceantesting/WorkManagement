<?php

namespace App\Http\Requests\Admin\Masters\Departments;

use Illuminate\Foundation\Http\FormRequest;

class StoreDepartmentRequest extends FormRequest
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
            'department_name' => 'required|unique:departments,department_name,NULL,NULL,deleted_at,NULL',
            'initial' => 'required',
            'status'  => 'required'
        ];
    }
}
