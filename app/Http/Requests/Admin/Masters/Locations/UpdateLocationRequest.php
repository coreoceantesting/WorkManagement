<?php

namespace App\Http\Requests\Admin\Masters\Locations;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLocationRequest extends FormRequest
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
            'location_name' => "required|unique:locations,location_name,$this->edit_model_id,id,deleted_at,NULL",
            'location_area' => 'required',
            'landmark' => 'required',
            'pincode' => 'required|digits:6',
            'latitude' => 'required',
            'longitude' => 'required',
            'status'  => 'required'
        ];
    }
}
