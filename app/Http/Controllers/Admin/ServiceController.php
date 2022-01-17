<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prestation;
use App\Models\Service;
use App\Http\Requests\StoreService as StoreServiceRequest;
use App\Http\Requests\UpdateService as UpdateServiceRequest;
use App\Http\Services\ServiceService;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => "Liste des services",
            'services' => ServiceService::getAll(),
        ];

        return view('admin.services.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => "Creer un service",
            'prestations' => Prestation::all(),
            'types' => ['particulier', 'entreprise']
        ];

        return view('admin.services.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceRequest $request)
    {
        $validated = $request->validated();

        ServiceService::store($validated);

        $msg = "Le service a été créé avec succes !";

        return redirect()->route('admin.services.index')->with('success', $msg);
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
    public function edit(Service $service)
    {
        $data = [
            'title' => "Modifier la sous categorie",
            'service' => $service,
            'prestations' => Prestation::all(),
            'types' => ['particulier', 'entreprise']
        ];

        return view('admin.services.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        $validated = $request->validated();

        ServiceService::update($validated, $service);

        $msg = "Le service a été modifié avec succes !";

        return back()->with('success', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        ServiceService::delete($service);

        $msg = "La service a été supprimé avec succes !";

        return redirect()->route('admin.services.index')->with('success', $msg);
    }
}
