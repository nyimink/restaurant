<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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


Route::get('/', [HomeController::class, "index"]);

Route::get('/redirects', [HomeController::class, "redirects"]);

Route::get('/users', [AdminController::class, "user"]);
Route::get('/user/delete/{id}', [AdminController::class, "userDelete"]);

Route::get('/foodmenu', [AdminController::class, "foodmenu"]);
Route::get('/foodmenu/add', [AdminController::class, "foodmenuAdd"]);
Route::post('/foodmenu/create', [AdminController::class, "foodmenuCreate"]);
Route::get('/foodmenu/delete/{id}', [AdminController::class, "foodmenuDelete"]);
Route::get('/foodmenu/edit/{id}', [AdminController::class, "foodmenuEdit"]);
Route::post('/foodmenu/edit/{id}', [AdminController::class, "foodmenuUpdate"]);


Route::post('/reservation', [AdminController::class, "reservationCreate"])->middleware('auth');
Route::get('/reservation', [AdminController::class, "reservation"]);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
