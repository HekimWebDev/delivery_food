<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3', 'max:55'],
            'surname' => ['required', 'min:3', 'max:55'],
            'phone' => ['required'],
            'email' => ['email'],
            'address' => ['required'],
            'label' => ['nullable'],
            'entrance' => ['nullable'],
            'floor' => ['nullable'],
            'total_price' => ['required'],
            'status' => ['required', 'integer'],

            'cart_number' => ['nullable'],
            'cart_deadline' => ['nullable'],
            'cvc_code' => ['nullable', 'digits:3'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
