<?php

namespace App\Http\Requests\Admin\Prefix\prefixdetail;

use Illuminate\Foundation\Http\FormRequest;

class UpdateprefixdetailRequest extends FormRequest
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
            'prefixdescription'  => 'required',
            'mainprefix_id'        => 'required',
            'ip_address'         => 'nullable',
            'descriptionregional'=> 'required',
            'value'              => 'required',
            'othervalue'         => 'nullable',
            'default'            => 'required',
        ];
    }
}
