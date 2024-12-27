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
            'pannumber' => 'required',
            'gstnumber' => 'required',
            'epfnumber' => 'required',
            'bank' => 'required',
            'contactnumber' => 'required|digits:10',
            'accountnumber' => 'required',
            'accountname' => 'required',
            'ifsccode' => 'required',
            'vendorname'=>'required',
            'address' => 'required',
            'labourwelfarescheme' => 'required',
        ];
    }
}
