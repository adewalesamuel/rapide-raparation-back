<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UtilisateurController as AdminUtilisateurController;
use App\Http\Controllers\Admin\CommandeController as AdminCommandeController;
use App\Http\Controllers\AuthController;

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
            Route::delete('/commandes/{commande}', [AdminCommandeController::class, 'destroy'])->name('commandes.destroy');
            Route::get('/commandes', [AdminCommandeController::class, 'index'])->name('commandes.index');

            Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
        });
    });

});

Route::get('/', function () {
    return view('welcome');
});