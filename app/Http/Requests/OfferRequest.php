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
            'name_ar' => 'required|min:3|max:100',
            'name_en' => 'required|min:3|max:100',
            'description_ar' => 'required|min:5|string',
            'description_en' => 'required|min:5|string',
            'image' => 'nullable|image|max:1048576|dimensions:min_height:100,min_width:100',
            'price' => 'required|numeric',
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
