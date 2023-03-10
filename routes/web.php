<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Rules\Role;

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

Route::get('/redirects', [HomeController::class, "redirects"])->middleware('auth');

Route::post('/cart/add/{id}', [HomeController::class, "cartAdd"]);
Route::get('/cart/show/{id}', [HomeController::class, "cart"]);
Route::get('/cart/delete/{id}', [HomeController::class, "cartDelete"]);

Route::post('/order/confirm', [HomeController::class, "orderConfirm"]);
Route::get('/orders', [AdminController::class, "orders"]);

Route::get('/search', [AdminController::class, "search"]);

Route::get('/users', [AdminController::class, "user"]);
Route::get('/user/delete/{id}', [AdminController::class, "userDelete"]);

Route::get('/foodmenu', [AdminController::class, "foodmenu"]);
Route::get('/foodmenu/add', [AdminController::class, "foodmenuAdd"]);
Route::post('/foodmenu/create', [AdminController::class, "foodmenuCreate"]);
Route::get('/foodmenu/delete/{id}', [AdminController::class, "foodmenuDelete"]);
Route::get('/foodmenu/edit/{id}', [AdminController::class, "foodmenuEdit"]);
Route::post('/foodmenu/edit/{id}', [AdminController::class, "foodmenuUpdate"]);

Route::get('/chefs', [AdminController::class, "chef"]);
Route::get('/chefs/add', [AdminController::class, "chefAdd"]);
Route::post('/chefs/create', [AdminController::class, "chefCreate"]);
Route::get('/chefs/edit/{id}', [AdminController::class, "chefEdit"]);
Route::post('/chefs/edit/{id}', [AdminController::class, "chefUpdate"]);
Route::get('/chefs/delete/{id}', [AdminController::class, "chefDelete"]);


Route::post('/reservation', [HomeController::class, "reservationCreate"])->middleware('auth');
Route::get('/reservation', [AdminController::class, "reservation"]);
Route::get('/reservation/delete/{id}', [AdminController::class, "reservationDelete"]);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
