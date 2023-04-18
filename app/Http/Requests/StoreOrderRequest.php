<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class StoreOrderRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:2', 'max:55'],
            'surname' => ['required', 'min:2', 'max:55'],
            'phone' => ['required'],
            'email' => ['email'],
            'address' => ['required'],
            'label' => ['nullable'],
            'entrance' => ['nullable'],
            'floor' => ['nullable'],
            'total_price' => ['required'],
            'status' => ['required', 'integer'],

            'cart_number' => ['required_if:status,==,2'],
            'cart_deadline' => ['required_if:status,==,2', 'date_format:dd/yy'],
            'cvc_code' => ['required_if:status,==,2'],
        ];
    }

    public function withValidator($validator) {
        $cartNumber = str_replace(['-', '_'], '', $this->cart_number);
        $cvcCode = str_replace('_', '', $this->cvc_code);

        if ($this->status == 2){
            $validator->after(function ($validator) use ($cartNumber, $cvcCode) {
                if (strlen($cartNumber) != 16) {
                    $validator->errors()->add('cart_number', 'Номер карты не может быть меньше 16 цифр');
                }

                if (strlen($cvcCode) != 3) {
                    $validator->errors()->add('cart_number', 'CVC номер карты не может быть меньше 16 цифр');
                }
            });
        }

        return $validator;
    }
}
