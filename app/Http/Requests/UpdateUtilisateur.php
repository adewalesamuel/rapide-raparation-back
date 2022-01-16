<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUtilisateur extends FormRequest
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
            'mail' => 'required|string',
            'password' => 'nullable|string',
            'telephone' => 'required|string',
            'date_naissance' => 'nullable|date',
            'type' => 'required|string',
            'nom_entreprise' => 'nullable|string',
            'registre_commerce' => 'nullable|string',
            'dfe' => 'nullable|string',
            'pc_code' => 'nullable|string',
        ];
    }
}
