<?php
use App\Http\Controllers\RayController;
use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;


// --------------------------------------------------------------------
// -------------------------Author Route------------------------------

Route::get('/authors', [AuthorController::class, 'index']);
Route::post('/authors', [AuthorController::class, 'store']);
Route::get('/authors/{id}', [AuthorController::class, 'edit']);
Route::patch('/authors/{id}', [AuthorController::class, 'update']);
Route::delete('/authors/{id}', [AuthorController::class, 'destroy']);



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
