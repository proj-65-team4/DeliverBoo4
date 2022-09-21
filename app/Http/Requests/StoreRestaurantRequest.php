<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRestaurantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "restaurant_name" => "required|max:50",
            "address" => "required|max:50",
            "city" => "required|max:50",
            "VAT" => "required|max:11|min:11",
            "image" => "nullable|image",
            "categories" => "nullable|exists:categories,id"
        ];
    }

    public function messages() {
        return[
            "restaurant_name.required"=>"Inserire il nome del ristorante",
            "restaurant_name.max"=>"Massimo 50 caratteri consentiti",
            "address.max"=>"Massimo 50 caratteri consentiti",
            "address.required"=>"Inserire indirizzo",
            "city.required"=>"Inserire città",
            "city.max"=>"Massimo 50 caratteri consentiti",
            "VAT.required"=>"Inserire numero P.IVA",
            "VAT.min"=>"Minimo 11 cifre consentite",
            "VAT.max"=>"Massimo 11 cifre consentite",
            "image.image"=>"Formato file non supportato",
        ];
    }
}
