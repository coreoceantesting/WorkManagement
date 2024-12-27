<?php

namespace App\Http\Requests\admin\masters\Bid;

use Illuminate\Foundation\Http\FormRequest;

class StoreBidRequest extends FormRequest
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
            // protected $fillable = ['projectname','work_code_no','bidid', 'biddername', 'tech_evaluation_status', 'financial_evaluation_status','rank','ip_address'];
            'projectname' => 'required',
            'work_code_no' => 'required',
            'bidid' => 'required',
            'biddername' => 'required',
            'tech_evaluation_status' => 'required',
            'financial_evaluation_status' => 'required',
            'rank' => 'required',
            'ip_address' => 'nullable',
        ];
    }
}
