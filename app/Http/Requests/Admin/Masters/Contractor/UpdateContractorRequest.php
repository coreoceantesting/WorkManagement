<?php

namespace App\Http\Requests\Admin\Masters\Contractor;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContractorRequest extends FormRequest
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
            'name' => 'required',
            'company_name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'mobile_no' => 'required|digits:10|numeric',
            'aadhaar_no' => 'required|digits:12|numeric',
            'gst_no' => 'required',
            'vat_no' => 'nullable',
            'pan_no' => 'required|alpha_num',
            'bank_name' => 'required',
            'ifsc_code' => 'required',
            'bank_account_no' => 'required',
            'bank_branch_name' => 'required',
            'contractor_type_id' => 'required',
            'contractor_sub_type_id' => 'required',
            'status' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'contractor_type_id.required' => 'Please select a contractor type.',
            'contractor_sub_type_id.required' => 'Please select a contractor sub type.',
        ];
    }
}
