<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

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

Route::get('/',[HomeController::class,'welcome']);

Route::get('/home',[HomeController::class,'index']);

Route::post('/upload',[HomeController::class,'upload']);

Route::get('/view',[HomeController::class,'view']);

Route::get('/delete/{id}',[HomeController::class,'delete']);

Route::get('/search',[HomeController::class,'search']);

Route::get('/update_view/{id}',[HomeController::class,'update_view']);

Route::post('/update/{id}',[HomeController::class,'update']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
