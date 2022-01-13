<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommande extends FormRequest
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
            'utilisateur_id' => 'required|integer|exists:utilisateurs,id',
            'service_id' => 'required|integer|exists:services,id',
            'prix' => 'integer',
            'status' => 'required|string',
            'quantite' => 'integer',
            'technicien_id' => 'integer|exists:utilisateurs,id',
            'prestataire_id' => 'integer|exists:utilisateurs,id',
            'product' => 'string',
            'order_id' => 'string',
        ];
    }
}
