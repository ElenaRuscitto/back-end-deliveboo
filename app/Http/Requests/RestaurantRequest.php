<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Restaurant;
class RestaurantRequest extends FormRequest
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
        // $restaurantId = $this->route('restaurants');
        return [
            'name' => 'required|min:3|max:100',
            //! Controllo che l'email e l'indirizzo siano univoci e che se modifico devo ignorare questo record
            'email' => 'required|email|max:255|unique:restaurants' ,
            // 'email' => 'required|email|max:255|unique:restaurants,email' . $restaurantId,
            'address' => 'required|min:5|max:100|unique:restaurants',
            'vat' => 'required|size:11|unique:restaurants',
            'desc' => 'max:500',
            // 'email' => 'required|email|max:255|unique:restaurants',
            // 'address' => 'required|min:5|max:100|unique:restaurants',
            // 'vat' => 'required|size:10|unique:restaurant',
        ];
    }

    public function messages(): array
    {
        return [
            //? Nome ristorante
            'name.required' => 'Il nome è obbligatorio',
            'name.min' => 'Il nome deve avere almeno :min caratteri',
            'name.max' => 'Il nome deve può avere un massimo di :max caratteri',
            //? Email ristorante
            'email.required' => 'L\'email è obbligatoria.',
            'email.email' => 'L\'email deve essere valida.',
            'email.max' => 'L\'email può avere un massimo di :max caratteri',
            'email.unique' => 'L\'email già utilizzata.',
            //? address ristorante
            'address.required' => 'L\'indirizzo è obbligatorio.',
            'address.min' => 'L\'indirizzo deve avere almeno :min caratteri.',
            'address.max' => 'L\'indirizzo può avere un massimo di :max caratteri',
            'address.unique' => 'L\'indirizzo già utilizzato.',
            //? P.Iva ristorante
            'vat.required' => 'La P.Iva è obbligatoria.',
            'vat.size' => 'La P.Iva deve avere :size caratteri.',
            'vat.unique' => 'La P.Iva è già utilizzata.',
            // ? Descrizione
            'desc.max' => 'La descrizione può avere massimo :max caratteri.'
        ];
    }
}
