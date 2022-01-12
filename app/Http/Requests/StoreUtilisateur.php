<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUtilisateur extends FormRequest
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
            'nom_prenoms' => 'required|string',
            'mail' => 'required|string|unique:utilisateurs',
            'password' => 'required|string',
            'telephone' => 'required|string',
            'date_naissance' => 'date',
            'type' => 'required|string',
            'nom_entreprise' => 'string',
            'registre_commerce' => 'string',
            'dfe' => 'string',
            'pc_code' => 'string',
        ];
    }
}
