<?php
use App\Http\Controllers\RayController;
use Illuminate\Support\Facades\Route;



// --------------------------------------------------------------------
// -------------------------Ray Route------------------------------
Route::get('/rays', [RayController::class, 'index']);
Route::post('/rays', [RayController::class, 'store']);
Route::get('/rays/edit/{id}', [RayController::class, 'edit']);
Route::patch('/rays/edit/{id}', [RayController::class,'update']);
Route::delete('/rays/{id}', [RayController::class,'destroy']);
// --------------------------------------------------------------------
// -------------------------End Ray Route------------------------------



Route::get('/', function () {
    return view('welcome');
});
