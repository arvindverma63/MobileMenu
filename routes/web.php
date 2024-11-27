<?php

use App\Http\Controllers\FilterController;
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

Route::get('/menu', [MenuController::class, 'welcome']);
Route::get('/cart', [MenuController::class, 'cart'])->name('cart');
Route::get('/getData', [
    'restaurantId' => Cache::get('restaurantId'),
    'tableNo' => Cache::get('tableNo')
]);
Route::get('/home',[MenuController::class,'homeBack'])->name('home');
Route::get('/filter/{id}',[FilterController::class,'filter']);
Route::get('/cooking',[MenuController::class,'cooking']);
