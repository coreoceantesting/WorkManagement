<?php

namespace App\Http\Requests\Admin\Masters\PaymentMode;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentModeRequest extends FormRequest
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
            'payment_mode_name' => 'required|unique:payment_modes,payment_mode_name',
            'initial' => 'required',
        ];
    }
}
