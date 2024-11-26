<?php

use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

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

Route::get('/menu', [MenuController::class, 'welcome'])->name('home');
Route::get('/cart', [MenuController::class, 'cart'])->name('cart');
Route::get('/getData', [
    'restaurantId' => Cache::get('restaurantId'),
    'tableNo' => Cache::get('tableNo')
]);
