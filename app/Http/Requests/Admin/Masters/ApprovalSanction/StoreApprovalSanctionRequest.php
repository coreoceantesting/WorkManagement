<?php

namespace App\Http\Requests\admin\masters\ApprovalSanction;

use Illuminate\Foundation\Http\FormRequest;

class StoreApprovalSanctionRequest extends FormRequest
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
            'deputy_engineer_sanction' =>'required',
            'city_engineer_sanction'=>'required',
            'account_dept_sanction' => 'required',
            'additional_commissioner_sanction' => 'required',
            'commissioner_sanction' =>'required',
            'general_body_admin_sanction'=>'required',
            'standing_committee_sanction' => 'required',
            'resolution_no' => 'required',
            'work_order_date'=>'required',
            'work_order_no' => 'required',
            'work_order_duration_from' => 'required',
            'work_order_duration_to' =>'required',
            'role'=>'required',
            'rolename'=>'required',
            'ip_address'=> 'nullable'
        ];
    }
}
