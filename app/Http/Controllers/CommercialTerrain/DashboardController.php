<?php

namespace App\Http\Controllers\CommercialTerrain;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $data = [
            'title' => 'Tableau de board'
        ];

        return view('commercial-terrain.dashboard', $data);
    }
}
