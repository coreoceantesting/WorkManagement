<?php

namespace App\Http\Requests\admin\masters\Workdefinition;

use Illuminate\Foundation\Http\FormRequest;

class StoreWorkdefinitionRequest extends FormRequest
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
            'workcode' => 'nullable',
            'projectname'     => 'required',
            'workname'     => 'required',
            'department'    => 'required',
            'typeofwork'    => 'required',
            'proposalnumber'    => 'required',
            'categoryofwork'    => 'required',
            'probablecompletiondate'    => 'nullable',
            'projectphase'    => 'required',
            'workdone'    => 'required',
            'probablecommencementdate'    => 'required',
            'subtype'    => 'required',
            'ip_address' =>'nullable'
        ];
    }
}
