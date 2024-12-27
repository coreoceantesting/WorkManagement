<?php

namespace App\Http\Requests\Admin\Masters\Budgethead;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBudgetheadRequest extends FormRequest
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
            'budgetyear' =>'required',
            'department'=>'required',
            'budgethead' => 'required',
            'budgetamount' => 'required',
        ];
    }
}
