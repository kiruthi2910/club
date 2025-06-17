<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\RegController;

Route::get('/form', function () {
    return view('form');
});


Route::get('/dashboard', [DashboardController::class, 'index']);


Route::get('/form', [ClubController::class, 'create'])->name('form');

Route::get('/table', [RegController::class, 'showTable']);

Route::post('/clubs', [ClubController::class, 'store'])->name('clubs.store');
