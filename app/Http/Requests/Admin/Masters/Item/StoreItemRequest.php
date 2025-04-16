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
            'name' => 'required|unique:item_categories,name,NULL,NULL,deleted_at,NULL',
            'initial' => 'required',
            'status'  => 'required'
        ];
    }
}
