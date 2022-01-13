<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCommande as StoreCommandeRequest;
use App\Http\Requests\UpdateCommande as UpdateCommandeRequest;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $commandes = Commande::with(["utilisateur", 'service'])->where('id', '>', 0);

        if ($request->query('status')) $commandes = $commandes->where('status', $request->query('status'));

        $commandes = $commandes->orderBy('created_at', 'desc')->get();

        $data = [
            'success' => true,
            'data' => $commandes
        ];

        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommandeRequest $request)
    {
        $validated = $request->validated();

        $commande = new Commande;

        $commande->utilisateur_id = $validated['utilisateur_id'];
        $commande->service_id = $validated['service_id'];
        $commande->prix = $validated['prix'] ?? null;
        $commande->quantite = $validated['quantite'] ?? 1; 
        $commande->product = $validated['product'] ?? null;
        $commande->order_id = $validated['order_id'] ?? null;

        $commande->save();

        $data = [
            'success' => true,
            'data' => $commande
        ];

        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function show(Commande $commande)
    {
        $commande = Commande::with(["utilisateur", 'service'])
        ->where('id', $commande->id)->first();

        $data = [
            'success' => true,
            'data' => $commande
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function edit(Commande $commande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommandeRequest $request, Commande $commande)
    {
        $validated = $request->validated();

        $commande->utilisateur_id = $validated['utilisateur_id'];
        $commande->service_id = $validated['service_id'];
        $commande->prix = $validated['prix'] ?? null;
        $commande->quantite = $validated['quantite'] ?? 1; 
        $commande->status = $validated['status'] ?? 'non-verifié'; 
        $commande->product = $validated['product'] ?? null;
        $commande->technicien_id = $validated['technicien_id'] ?? null;
        $commande->prestataire_id = $validated['prestataire_id'] ?? null;
        $commande->order_id = $validated['order_id'] ?? null;

        $commande->save();

        $data = [
            'success' => true,
            'data' => $commande
        ];

        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commande $commande)
    {
        $commande->delete();
        
        $data = [
            'success' => true,
            'data' => $commande
        ];
        
        return response()->json($data);
    }
}
