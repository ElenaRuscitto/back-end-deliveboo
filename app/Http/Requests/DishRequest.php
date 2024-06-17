<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DishRequest extends FormRequest
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
                'name' => 'required|string|max:100',
                'desc' => 'nullable|string',
                'price' => 'required|numeric|between:0,99.99',
                'visibility' => 'required|boolean',
                'image' => 'nullable|string|max:100',
                'vegan' => 'nullable|boolean',
        ];
    }

    public function messages(): array{
        return [
            'name.required' => 'Il nome è richiesto',
            'name.max' => 'La lunghezza massima è :max',
            'price.required' => 'Il prezzo è richiesto',
            'price.max' => 'Il prezzo massimo è 999',
            'visibility.required' => 'La visibilità è richiesta',
        ];
    }
}
