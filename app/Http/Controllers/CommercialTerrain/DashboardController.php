<?php

namespace App\Http\Controllers\CommercialTerrain;

use App\Http\Controllers\Controller;
use App\Models\Utilisateur;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index() {
        // dd(date('Y-m-d'));
        $inscris = Utilisateur::where('pc_code', auth()->user()->pc_code)
        ->where('type', 'client');
        $data = [
            'title' => 'Tableau de board',
            'total_inscrits' => $inscris->count(),
            'nouveaux_inscrits' => $inscris->whereDate('created_at', date('Y-m-d'))->count()
        ];

        return view('commercial-terrain.dashboard', $data);
    }
}
