<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UtilisateurController as AdminUtilisateurController;
use App\Http\Controllers\Admin\CommandeController as AdminCommandeController;
use App\Http\Controllers\Admin\CategorieController as AdminCategorieController;
use App\Http\Controllers\Admin\SousCategorieController as AdminSousCategorieController;
use App\Http\Controllers\Admin\PrestationController as AdminPrestationController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\RapportController as AdminRapportController;

use App\Http\Controllers\CommercialTerrain\ClientController as CommercialTerrainClientController;
use App\Http\Controllers\CommercialTerrain\DashboardController as CommercialTerrainDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/connexion', [AuthController::class, 'loginForm'])->name('connexion');
Route::get('/deconnexion', [AuthController::class, 'logout'])->name('logout');
Route::post('/login', [AuthController::class, 'login'])->name('login');


Route::middleware('auth')->group(function(){
    Route::prefix('admin')->group(function() {
        Route::name('admin.')->group(function(){
            Route::get('/utilisateurs/{utilisateur}/modifier', [AdminUtilisateurController::class, 'edit'])->name('utilisateurs.edit');
            Route::put('/utilisateurs/{utilisateur}', [AdminUtilisateurController::class, 'update'])->name('utilisateurs.update');
            Route::delete('/utilisateurs/{utilisateur}', [AdminUtilisateurController::class, 'destroy'])->name('utilisateurs.destroy');
            Route::get('/utilisateurs/creer', [AdminUtilisateurController::class, 'create'])->name('utilisateurs.create');
            Route::post('/utilisateurs', [AdminUtilisateurController::class, 'store'])->name('utilisateurs.store');
            Route::get('/utilisateurs', [AdminUtilisateurController::class, 'index'])->name('utilisateurs.index');

            Route::get('/commandes/{commande}/modifier', [AdminCommandeController::class, 'edit'])->name('commandes.edit');
            Route::put('/commandes/{commande}', [AdminCommandeController::class, 'update'])->name('commandes.update');
            Route::get('/commandes/creer', [AdminCommandeController::class, 'create'])->name('commandes.create');
            Route::post('/commandes', [AdminCommandeController::class, 'store'])->name('commandes.store');
            Route::delete('/commandes/{commande}', [AdminCommandeController::class, 'destroy'])->name('commandes.destroy');
            Route::get('/commandes', [AdminCommandeController::class, 'index'])->name('commandes.index');
            
            Route::get('/categories/{categorie}/modifier', [AdminCategorieController::class, 'edit'])->name('categories.edit');
            Route::put('/categories/{categorie}', [AdminCategorieController::class, 'update'])->name('categories.update');
            Route::delete('/categories/{categorie}', [AdminCategorieController::class, 'destroy'])->name('categories.destroy');
            Route::get('/categories/creer', [AdminCategorieController::class, 'create'])->name('categories.create');
            Route::post('/categories', [AdminCategorieController::class, 'store'])->name('categories.store');
            Route::get('/categories', [AdminCategorieController::class, 'index'])->name('categories.index');
            
            Route::get('/sous-categories/{sousCategorie}/modifier', [AdminSousCategorieController::class, 'edit'])->name('sous-categories.edit');
            Route::put('/sous-categories/{sousCategorie}', [AdminSousCategorieController::class, 'update'])->name('sous-categories.update');
            Route::delete('/sous-categories/{sousCategorie}', [AdminSousCategorieController::class, 'destroy'])->name('sous-categories.destroy');
            Route::get('/sous-categories/creer', [AdminSousCategorieController::class, 'create'])->name('sous-categories.create');
            Route::post('/sous-categories', [AdminSousCategorieController::class, 'store'])->name('sous-categories.store');
            Route::get('/sous-categories', [AdminSousCategorieController::class, 'index'])->name('sous-categories.index');
            
            Route::get('/prestations/{prestation}/modifier', [AdminPrestationController::class, 'edit'])->name('prestations.edit');
            Route::put('/prestations/{prestation}', [AdminPrestationController::class, 'update'])->name('prestations.update');
            Route::delete('/prestations/{prestation}', [AdminPrestationController::class, 'destroy'])->name('prestations.destroy');
            Route::get('/prestations/creer', [AdminPrestationController::class, 'create'])->name('prestations.create');
            Route::post('/prestations', [AdminPrestationController::class, 'store'])->name('prestations.store');
            Route::get('/prestations', [AdminPrestationController::class, 'index'])->name('prestations.index');
           
            Route::get('/services/{service}/modifier', [AdminServiceController::class, 'edit'])->name('services.edit');
            Route::put('/services/{service}', [AdminServiceController::class, 'update'])->name('services.update');
            Route::delete('/services/{service}', [AdminServiceController::class, 'destroy'])->name('services.destroy');
            Route::get('/services/creer', [AdminServiceController::class, 'create'])->name('services.create');
            Route::post('/services', [AdminServiceController::class, 'store'])->name('services.store');
            Route::get('/services', [AdminServiceController::class, 'index'])->name('services.index');
            
            Route::get('/rapports', [AdminRapportController::class, 'index'])->name('rapport.index');

            Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
        });

    });
    
    Route::prefix('commercial-terrain')->group((function() {
        Route::name('commercial-terrain.')->group(function(){
            Route::get('/clients/creer', [CommercialTerrainClientController::class, 'create'])->name('clients.create');
            Route::get('/', [CommercialTerrainDashboardController::class, 'index'])->name('dashboard');
        });
    }));
});

Route::get('/{any?}', function () {
    return view('index');
})->where('any', '.*?');
