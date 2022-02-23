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
        ->whereDate('created_at', date('Y-m-d'))
        ->whereNull('deleted_at')
        ->whereNotNull('pc_code')
        ->groupBy('pc_code')
        ->orderBy('pc_count', 'desc')
        ->limit(3)->get();

        $meilleur_pc_codes = collect($meilleur)->map(function($item) {
            return $item->pc_code;
        });
        $meilleur_commerciaux = Utilisateur::where('type', 'commercial_terrain')
        ->whereIn('pc_code', $meilleur_pc_codes)->limit(3)->get();
        $inscris = Utilisateur::where('pc_code', auth()->user()->pc_code)
        ->where('type', 'client');
        
        for ($i=0; $i < count($meilleur_commerciaux); $i++) { 
            $meilleur_commerciaux[$i]['max_inscris'] = $meilleur[$i]->pc_count;
        }

        $data = [
            'title' => 'Tableau de board',
            'total_inscrits' => $inscris->count(),
            'nouveaux_inscrits' => $inscris->whereDate('created_at', date('Y-m-d'))->count(),
            'meilleurs_commerciaux' => $meilleur_commerciaux,
        ];

        return view('commercial-terrain.dashboard', $data);
    }
}
