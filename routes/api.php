<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\SousCategorieController;
use App\Http\Controllers\PrestationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UtilisateurController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get("/categories", [CategorieController::class, 'index']);
Route::get("/categories/{categorie}/sous-categories", [CategorieController::class, 'sous_categories']);
Route::get("/categories/{categorie}", [CategorieController::class, 'show']);
Route::post("/categories", [CategorieController::class, 'store']);
Route::put("/categories/{categorie}", [CategorieController::class, 'update']);
Route::delete("/categories/{categorie}", [CategorieController::class, 'destroy']);

Route::get("/sous-categories", [SousCategorieController::class, 'index']);
Route::get("/sous-categories/{sousCategorie}/prestations", [SousCategorieController::class, 'prestations']);
Route::get("/sous-categories/{sousCategorie}", [SousCategorieController::class, 'show']);
Route::post("/sous-categories", [SousCategorieController::class, 'store']);
Route::put("/sous-categories/{sousCategorie}", [SousCategorieController::class, 'update']);
Route::delete("/sous-categories/{sousCategorie}", [SousCategorieController::class, 'destroy']);

Route::get("/prestations", [PrestationController::class, 'index']);
Route::get("/prestations/{prestation}/services", [PrestationController::class, 'services']);
Route::get("/prestations/{prestation}", [PrestationController::class, 'show']);
Route::post("/prestations", [PrestationController::class, 'store']);
Route::put("/prestations/{prestation}", [PrestationController::class, 'update']);
Route::delete("/prestations/{prestation}", [PrestationController::class, 'destroy']);

Route::get("/services", [ServiceController::class, 'index']);
Route::get("/services/{service}", [ServiceController::class, 'show']);
Route::post("/services", [ServiceController::class, 'store']);
Route::put("/services/{service}", [ServiceController::class, 'update']);
Route::delete("/services/{service}", [ServiceController::class, 'destroy']);

Route::get("/utilisateurs", [UtilisateurController::class, 'index']);
Route::get("/utilisateurs/{utilisateur}", [UtilisateurController::class, 'show']);
Route::post("/utilisateurs", [UtilisateurController::class, 'store']);
Route::put("/utilisateurs/{utilisateur}", [UtilisateurController::class, 'update']);
Route::delete("/utilisateurs/{utilisateur}", [UtilisateurController::class, 'destroy']);