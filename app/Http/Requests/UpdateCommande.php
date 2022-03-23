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
            'prix' => 'nullable|integer',
            'status' => 'required|string',
            'quantite' => 'nullable|integer',
            'technicien_id' => 'nullable|integer|exists:utilisateurs,id',
            'commercial_id' => 'nullable|integer|exists:utilisateurs,id',
            'responsable_technique_id' => 'nullable|integer|exists:utilisateurs,id',
            'prestataire_id' => 'nullable|integer|exists:utilisateurs,id',
            'materiel' => 'nullable|string',
            'lieu' => 'nullable|string',
            'description' => 'nullable|string',
            'date_execution' => 'nullable|date',
            'note' => 'nullable|integer',
            'order_id' => 'nullable|string',
            'has_visite_technique' => 'nullable|boolean',
            'note_visite_technique' => 'nullable|string',
            'rapport_visite_file' => 'nullable|file:pdf,jpg,png',
        ];
    }
}
