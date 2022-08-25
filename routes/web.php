<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ApiController;

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
// Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search/cities', [ApiController::class, 'city'])->name('city');
Route::get('/search/provinces', [ApiController::class, 'province'])->name('province');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
