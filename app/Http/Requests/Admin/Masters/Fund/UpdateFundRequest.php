<?php

namespace App\Http\Requests\Admin\Masters\Fund;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFundRequest extends FormRequest
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
            'major_fund_code' => 'required',
            'major_fund_code_description' => 'required',
            'minor_fund_code' => 'required',
            'minor_fund_code_description' => 'required',
            'status'=>'required'
        ];
    }
}
