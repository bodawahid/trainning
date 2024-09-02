<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
            'name_ar' => 'required|min:3|max:100|unique:offers,name_ar',
            'name_en' => 'required|min:3|max:100|unique:offers,name_en',
            'description_ar' => 'required|min:5|string',
            'description_en' => 'required|min:5|string',
            'price' => 'required|numeric|decimal:2',
            'feature_ar' => 'nullable|string|min:3|max:200',
            'feature_en' => 'nullable|string|min:3|max:200',
        ];
    }
    public function messages(): array
    {
        return [
            'name_ar.required' => __('offers.name_ar.required'),
            'name_en.required' => __('offers.name_en.required'),
            'description_ar.required' => __('offers.description_ar.required'),
            'description_en.required' => __('offers.description_en.required'),
            'price.required' =>  __('offers.price.required'),
        ];
    }
}
