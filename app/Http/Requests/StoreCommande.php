<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommande extends FormRequest
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
            'quantite' => 'nullable|integer',
            'materiel' => 'nullable|string',
            'order_id' => 'nullable|string',
            'lieu' => 'nullable|string',
            'is_urgent' => 'nullable|boolean',
            'description' => 'nullable|string',
            'image' => 'nullable|file:jpg,png,pdf,webp,svg',
        ];
    }
}
