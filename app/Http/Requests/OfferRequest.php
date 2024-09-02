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
            'name' => 'required|min:3|max:100|unique:offers,name',
            'description' => 'required|min:5|string',
            'price' => 'required|numeric|decimal:2',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => __('offers.name.required'),
            'description.required' => __('offers.description.required'),
            'price.required' =>  __('offers.price.required'),
        ];
    }
}
