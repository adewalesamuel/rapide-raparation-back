<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class RapportController extends Controller
{
    public function index(Request $request) {
        $pc_code = $request->query('pc_code');
        $clients = [];
        $commerical = null;
        
        if ($pc_code && $pc_code != "") {
            $clients = Utilisateur::where('pc_code', $pc_code)
            ->where('type', 'client')->get();
            $commerical = Utilisateur::where('pc_code', $pc_code)
            ->where('type', 'commercial_terrain')->first();
        }

        $data = [
            'title' => "Rapport des commerciaux terrain",
            'clients' => $clients,
            'commercial' => $commerical
        ];

        return view('admin.rapport', $data);
    }
}
