<?php

namespace App\Http\Requests\admin\masters\TenderExecution;

use Illuminate\Foundation\Http\FormRequest;

class StoreTenderExecutionRequest extends FormRequest
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
            'department' =>'required',
            'projectname' => 'required',
            'resolution' => 'required',
            'resolution_date' =>'required',
            'pre_bid_meeting_date' => 'required',
            'meeting_location' => 'required',
            'issue_from_date' => 'required',
            'issue_till_date' => 'required',
            'publish_date' => 'required',
            'technical_bid_open_date' =>'required',
            'financial_bid_open_date' => 'required',
            'tender_category' =>'required',
            'validity_of_tender' => 'required',
            'bank_guarantee' => 'required',
            'addition_performance_sd' =>'required',
            'provisional_sum' => 'required',
            'devaluation_percentage' => 'required|numeric|between:0,100',
            'upload_document' => 'required',
            'ip_address'=>'nullable'
        ];
    }
}
