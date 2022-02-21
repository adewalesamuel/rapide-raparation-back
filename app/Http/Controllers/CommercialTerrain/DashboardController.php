<?php

namespace App\Http\Controllers\CommercialTerrain;

use App\Http\Controllers\Controller;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {
        $meilleur = DB::table('utilisateurs')
        ->select(DB::raw('pc_code, COUNT(pc_code) as pc_count'))
        ->where('type', 'client')
        ->whereNull('deleted_at')
        ->whereNotNull('pc_code')
        ->groupBy('pc_code')
        ->orderBy('pc_count', 'desc')
        ->first();
        $inscris = Utilisateur::where('pc_code', auth()->user()->pc_code)
        ->where('type', 'client');
        $data = [
            'title' => 'Tableau de board',
            'total_inscrits' => $inscris->count(),
            'nouveaux_inscrits' => $inscris->whereDate('created_at', date('Y-m-d'))->count(),
            'commercial' => Utilisateur::where('pc_code', $meilleur->pc_code)
            ->where('type', 'commercial_terrain')->first(),
            'max_inscris' => $meilleur->pc_count
        ];

        return view('commercial-terrain.dashboard', $data);
    }
}
