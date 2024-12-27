<?php

namespace App\Http\Requests\admin\masters\TenderEntry;

use Illuminate\Foundation\Http\FormRequest;

class StoreTenderEntryRequest extends FormRequest
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
            'projectname' =>'required',
            'workname' => 'required',
            'vendorname' => 'required',
            'tender_accepted_cost' =>'required',
            'work_code_no' => 'required',
            'tenderentry' => 'required',
            'budgetdate' => 'required',
            'proposalcost' =>'required',
            'tendercost' => 'required',
            'ip_address'=>'nullable'
        ];
    }
}
