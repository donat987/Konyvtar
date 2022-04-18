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

Route::get('/bejelentkezes', function () {
    return view('login');
});

Route::get('/kereses', function () {
    return view('search');
});

Route::get('/rolunk', function () {
    return view('about');
});

Route::get('/konyvkolcsonzes', function () {
    return view('bookrental');
});
Route::get('/konyvkezeles', function () {
    return view('booklist');
});
Route::get('/konyvhozzaad', function () {
    return view('addbook');
});
Route::get('/kolcsonzohozzaad', function () {
    return view('adduser');
});

Route::get('/kolcsonzok',[App\Http\Controllers\ReadersController::class, 'index']);
Route::get('/kolcsonzok/{readers}',[App\Http\Controllers\ReadersController::class, 'show']);

Route::get('/konyvek',[App\Http\Controllers\BooksController::class, 'index']);
Route::get('/konyvek/{books}',[App\Http\Controllers\BooksController::class, 'show']);