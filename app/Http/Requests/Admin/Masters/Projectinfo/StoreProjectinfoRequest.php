<?php

namespace App\Http\Requests\admin\masters\Projectinfo;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectinfoRequest extends FormRequest
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
            'projectno' => 'required',
            'department'     => 'required',
            'projectnameenglish'     => 'required',
            'projectnameregional'    => 'required',
            'projectdescription'    => 'required',
            'projecttimeline'    => 'required',
            'projectstartdate'    => 'required',
            'projectenddate'    => 'required',
            'schemename'    => 'nullable',
            'approvalnumber'    => 'nullable',
            'approvaldate'    => 'required',
            'status'    => 'nullable',
            'document_no'=>'nullable',
            'document_name'=>'nullable',
            'document'=>'nullable',
            'title'=>'nullable',
            'budgetamount'=>'nullable',
            'field_name'=>'nullable',
            'remark' => 'nullable',
            'ip_address'=>'nullable'
        ];
    }
}
