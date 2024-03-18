<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Register\RegisterProviderController;

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


Route::get('/register-provider', [RegisterProviderController::class, 'index'])->name('index.step1');
Route::post('/register-provider', [RegisterProviderController::class, 'processStep1'])->name('RegisterProviderController.step1');
Route::get('/register-provider/back-step-1', [RegisterProviderController::class, 'backStep1'])->name('RegisterProviderController.backStep1');

Route::get('/register-provider/step-2', [RegisterProviderController::class, 'indexStep2'])->name('index.step2');
Route::post('/register-provider/step-2', [RegisterProviderController::class, 'processStep2'])->name('RegisterProviderController.step2');
Route::get('/register-provider/back-step-2', [RegisterProviderController::class, 'backStep2'])->name('RegisterProviderController.backStep2');

Route::get('/register-provider/step-3', [RegisterProviderController::class, 'indexStep3'])->name('index.step3');
Route::post('/register-provider/step-3', [RegisterProviderController::class, 'processStep3'])->name('RegisterProviderController.step3');


Route::get('/ciudades/{provincia_id}', [RegisterProviderController::class, 'getCiudadesByProvincia'])->name('getCiudades');

// App Routes
Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
