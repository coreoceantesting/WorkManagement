<?php

namespace App\Http\Requests\admin\masters\BGSD;

use Illuminate\Foundation\Http\FormRequest;

class StoreBgsdRequest extends FormRequest
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
            'defectliabilityperiod' => "required",
            'securitydeposit' => 'required',
            'bankname' => 'required',
            'securitydepositvalidity' => 'required',
            'securitydepositamount' => 'required',
            'extentiondate' => 'required',
            'completiondate' => 'required',
            'oldtendorvalue' => 'required',
            'tenderdate' => 'required',
            'tap' => 'required',
        ];
    }
}
