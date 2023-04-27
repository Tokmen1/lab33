<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\CarmodelController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/manufacturers', [App\Http\Controllers\ManufacturerController::class, 'index'])->name('manufacturers.index'); 
Route::delete('/countries/{id}', [App\Http\Controllers\CountryController::class, 'destroy'])->name('countries.destroy'); 
Route::resource('country', CountryController::class);
Route::redirect('/', 'country');
Route::get('country/create', [CountryController::class, 'create']);

Route::resource('manufacturer', ManufacturerController::class, ['except' => ['index', 'create']]);
Route::get('{countryslug}/manufacturer', [ManufacturerController::class, 'index']);
Route::get('{countryslug}/manufacturer/create', [ManufacturerController::class, 'create']);

Route::resource('carmodel', CarmodelController::class, ['except' => ['index', 'create']]);
Route::get('manufacturer/{id}/models', [CarmodelController::class, 'index']);
Route::get('manufacturer/{id}/models/create', [CarmodelController::class, 'create']);


