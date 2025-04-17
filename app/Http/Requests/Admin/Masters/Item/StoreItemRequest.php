<?php

namespace App\Http\Requests\Admin\Masters\Item;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
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
            'description' => 'required|unique:items,description,NULL,NULL,deleted_at,NULL',
            'initial' => 'required',
            'item_category_id' => 'required',
            'item_sub_category_id' => 'required',
            'rate' => 'required|numeric',
            'unit_id' => 'required',
            'status'  => 'required'
        ];
    }


    public function messages(): array
    {
        return [
            'item_category_id.required' => 'Please select a item category.',
            'item_sub_category_id.required' => 'Please select a sub item category.',
            'unit_id' => 'Please select a unit.',
        ];
    }
}
