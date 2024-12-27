<?php

namespace App\Http\Requests\admin\Form;

use Illuminate\Foundation\Http\FormRequest;

class StoreFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'race' => 'required',
            'residence' => 'required',
            'fathername' => 'required',
            'fatherresidence' => 'required',
            'dob' => 'required',
            'height' => 'required',
            'identification' => 'required',
            'education' => 'required',
            'signofgov' => 'required',
            'signofhead' => 'required',
            'designationofhead' => 'required',
            'report' => 'required',
            'certifiacteno' => 'required',
            'certificatedate' => 'required',
            'authorityname' => 'required',
            'authoritydesignation' => 'required',
        ];
    }
}
