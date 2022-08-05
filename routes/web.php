<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Models\Reservation;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// user routes 
Route::get('/', [HomeController::class, 'index']);
Route::get('/users', [AdminController::class, 'users']);
Route::get('/deleteuser/{id}', [AdminController::class, 'deleteuser']);

// food routes
Route::get('/foodmenu', [AdminController::class, 'foodmenu']);
Route::post('/uploadfood', [AdminController::class, 'uploadfood']);
Route::get('/deleteFood/{id}', [AdminController::class, 'deleteFood']);
Route::get('/UpdateFood/{id}', [AdminController::class, 'updateFood']);
Route::post('/update/{id}', [AdminController::class, 'update']);

// Reservation Routes 
Route::post('/reservation', [AdminController::class, 'reservation']);
Route::get('/orders', [AdminController::class, 'orders']);

// cheifs Routes
Route::post('/cheifsAdd', [AdminController::class, 'cheifsAdd']);
Route::get('/cheifs', [AdminController::class, 'cheifs']);
Route::get('/EditCheif/{id}', [AdminController::class, 'EditCheif']);
Route::post('/UpdateCheif/{id}', [AdminController::class, 'UpdateCheif']);
Route::get('/deleteCheif/{id}', [AdminController::class, 'deleteCheif']);

// cart 
Route::post('/AddCart/{id}', [HomeController::class, 'AddCart']);
Route::get('/showCart/{id}', [HomeController::class, 'showCart']);
Route::get('/removeCart/{id}', [HomeController::class, 'removeCart']);

//orders
Route::post('/confirm-order', [HomeController::class, 'confirm_order']);
Route::get('/user_orders', [AdminController::class, 'user_orders']);

// serach 
Route::get('/search', [AdminController::class, 'search']);


Route::get('/redirects', [HomeController::class, 'redirects']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
