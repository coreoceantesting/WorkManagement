<?php

namespace App\Http\Requests\admin\masters\fund;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMajorFundRequest extends FormRequest
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
            'major_fund_code' => 'nullable',
            'major_fund_code_description' => 'required',
            'status'=>'required',
        ];
    }
}
