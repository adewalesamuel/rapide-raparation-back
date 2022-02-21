<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class RapportController extends Controller
{
    public function index(Request $request) {
        $pc_code = $request->query('pc_code');
        $clients = null;
        $commerical = null;
    
        if ($pc_code && $pc_code != "") {
            $clients = Utilisateur::where('pc_code', $pc_code)
            ->where('type', 'client');

            if ($request->query('date_debut') && $request->query('date_fin')) {
                $clients = $clients->whereBetween('created_at',
                array($request->query('date_debut'),$request->query('date_fin')));
            }

            $commerical = Utilisateur::where('pc_code', $pc_code)
            ->where('type', 'commercial_terrain')->first();
        }

        $data = [
            'title' => "Rapport des commerciaux terrain",
            'clients' => $clients ? $clients->get() : [],
            'commercial' => $commerical
        ];

        return view('admin.rapport', $data);
    }
}
