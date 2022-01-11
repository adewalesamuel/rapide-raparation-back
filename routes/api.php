<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\SousCategorieController;
use App\Http\Controllers\PrestationController;

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
Route::get("/categories/{categorie}", [CategorieController::class, 'show']);
Route::post("/categories", [CategorieController::class, 'store']);
Route::put("/categories/{categorie}", [CategorieController::class, 'update']);
Route::delete("/categories/{categorie}", [CategorieController::class, 'destroy']);

Route::get("/sous-categories", [SousCategorieController::class, 'index']);
Route::get("/sous-categories/{sousCategorie}", [SousCategorieController::class, 'show']);
Route::post("/sous-categories", [SousCategorieController::class, 'store']);
Route::put("/sous-categories/{sousCategorie}", [SousCategorieController::class, 'update']);
Route::delete("/sous-categories/{sousCategorie}", [SousCategorieController::class, 'destroy']);

Route::get("/prestations", [PrestationController::class, 'index']);
Route::get("/prestations/{prestation}", [PrestationController::class, 'show']);
Route::post("/prestations", [PrestationController::class, 'store']);
Route::put("/prestations/{prestation}", [PrestationController::class, 'update']);
Route::delete("/prestations/{prestation}", [PrestationController::class, 'destroy']);