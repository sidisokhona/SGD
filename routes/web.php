<?php
use App\Http\Controllers\RayController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\DiscTypeController;
use App\Http\Controllers\DiscController;
use Illuminate\Support\Facades\Route;


// -----------------------------------------------------------------------------
// --------------------------------Welcome Route----------------------
Route::get('/', function () {
    return view('welcome');
});
// ----------------------------------------------------------------------------
// ---------------------------Welcome Route End

// --------------------------------------------------------------------
// -------------------------Author Route------------------------------

Route::get('/authors', [AuthorController::class, 'index']);
Route::post('/authors', [AuthorController::class, 'store']);
Route::get('/authors/{id}', [AuthorController::class, 'edit']);
Route::patch('/authors/{id}', [AuthorController::class, 'update']);
Route::delete('/authors/{id}', [AuthorController::class, 'destroy']);
// --------------------------------------------------------------------
// -------------------------End Author Route------------------------------



// --------------------------------------------------------------------
// -------------------------Ray Route------------------------------
Route::get('/rays', [RayController::class, 'index']);
Route::post('/rays', [RayController::class, 'store']);
Route::get('/rays/edit/{id}', [RayController::class, 'edit']);
Route::patch('/rays/edit/{id}', [RayController::class,'update']);
Route::delete('/rays/{id}', [RayController::class,'destroy']);
// --------------------------------------------------------------------
// -------------------------End Ray Route------------------------------


// --------------------------------------------------------------------
// -------------------------DiscType Route------------------------------

Route::get('/discTypes', [DiscTypeController::class, 'index']);
Route::post('/discTypes', [DiscTypeController::class, 'store']);
Route::get('/discTypes/{id}', [DiscTypeController::class, 'edit']);
Route::patch('/discTypes/{id}', [DiscTypeController::class, 'update']);
Route::delete('/discTypes/{id}', [DiscTypeController::class, 'destroy']);

// --------------------------------------------------------------------
// -------------------------End DiscType Route------------------------------

// --------------------------------------------------------------------
// -------------------------Disc Route------------------------------

Route::get('/discs', [DiscController::class, 'index']);
Route::post('/discs', [DiscController::class, 'store']);
Route::get('/discs/{id}', [DiscController::class, 'edit']);
Route::patch('/discs/{id}', [DiscController::class, 'update']);
Route::delete('/discs/{id}', [DiscController::class, 'destroy']);
Route::patch('/discs/{id}/rayQuantity', [DiscController::class, 'addRayQuantity']);
Route::patch('/discs/{id}/stockQuantity', [DiscController::class, 'addStockQuantity']);


// --------------------------------------------------------------------
// -------------------------End Disc Route------------------------------

