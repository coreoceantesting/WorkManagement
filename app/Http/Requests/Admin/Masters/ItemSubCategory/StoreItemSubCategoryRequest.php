<?php

namespace App\Http\Requests\Admin\Masters\ItemSubCategory;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemSubCategoryRequest extends FormRequest
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
            'name' => 'required|unique:item_categories,name,NULL,NULL,deleted_at,NULL',
            'item_category_id' => 'required',
            'initial' => 'required',
            'status'  => 'required'
        ];
    }


    public function messages(): array
    {
        return [
            'item_category_id.required' => 'Please select a item category.',
        ];
    }
}
