<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdsFormUpdateRequest extends FormRequest
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
            'name'=>'required|min:3|max:120',
            'description'=>'required|min:3',
            'category_id'=>'required',
            'country_id'=>'required',
            'price'=> "required|regex:/^\d+(\.\d{1,2})?$/",
            'or_price'=> "required|regex:/^\d+(\.\d{1,2})?$/",
            'sale_price'=> "required|regex:/^\d+(\.\d{1,2})?$/",
            'quantity'=>'required|numeric|min:1',
            'price_status'=>'required',
            'product_condition'=>'required',
           // 'phone_number'=>'numeric'
        ];
    }
}
