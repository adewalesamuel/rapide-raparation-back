<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\CommandeService;
use App\Model\Commande;
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
        $data = [
            'title' => "Liste des commandes",
            'commandes' => CommandeService::getAll($request)
        ];

        return view('admin.commandes.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => "Creer une commande",
            'status' => ['non-verifie', 'appel', 'verifie', 'en-cours-visite', 'fin-visite', 'valide', 'annule', 'execution', 'termine']
        ];

        return view('admin.commandes.create', $data);
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

        $commande = CommandeService::store($validated);

        $msg = "La commande a été créé avec succes !";

        return redirect()->route('admin.commandes.index')->with('success', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Commande $commande)
    {
        $data = [
            'title' => "Liste des commandes",
            'status' => ['non-verifie', 'appel', 'verifie', 'en-cours-visite', 'fin-visite', 'valide', 'annule', 'execution', 'termine'],
            'commande' => $commande
        ];

        return view('admin.commandes.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommandeRequest $request, Commande $commande)
    {
        $validated = $request->validated();

        $commande = CommandeService::update($validated, $commande);

        $msg = "La commande a été modifié avec succes !";

        return back()->with('success', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commande $commande)
    {
        $commande = CommandeService::delete($commande);

        $msg = "La commande a été supprimée avec succes !";

        return redirect()->route('admin.commandes.index')->with('success', $msg);
    }
}
