<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
    public function rules() {
      return [
        'name' => 'required|min:3|max:50',
        'description' => 'required',
        'price' => 'required|numeric|min:0|max:9990',
        'visible',
        'available',
      ];
    }

    public function messages() {
      return [
        'name.required' => 'Inserire il Nome',
        'name.min' => 'Il Nome deve avere più di 3 caratteri',
        'name.max' => 'il Nome può avere massimo 50 caratteri',
        'description.required' => 'Inserire la descrizione',
        'price.required' => 'Inserire il Prezzo',
        'price.min' => 'Il Prezzo deve essere maggiore di 0',
        'price.max' => 'Il Prezzo deve essere minore di 9990'
      ];
    }
}