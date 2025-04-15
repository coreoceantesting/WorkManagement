<?php

namespace App\Http\Requests\Admin\Masters\StandardScheduleRate;

use Illuminate\Foundation\Http\FormRequest;

class StoreStandardScheduleRateRequest extends FormRequest
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
            'name' => 'required|unique:standard_schedule_rates,name,NULL,id,deleted_at,NULL',
            'initial' => 'required',
            'from_date' => 'required|date|before:end_date',
            'end_date' => 'required|date|after:from_date',
            'status'  => 'required',
        ];

    }
}
