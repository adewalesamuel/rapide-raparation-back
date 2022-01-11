<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;

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