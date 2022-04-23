<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\ReadersController;
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

Route::get('/visszavet', function () {
    return view('back');
});

Route::controller(ReadersController::class)->group(function(){
    Route::get('kolcsonzok', 'index');
    Route::post('kolcsonzok', 'store')->name('kolcsonzok.store');
    Route::get('kolcsonzok/letrehozas', 'create');
    Route::get('kolcsonzok/{readers}' , 'show');
    Route::get('kolcsonzok/{readers}/modositas' , 'edit');
    Route::put('kolcsonzok/{readers}', 'update');
});

Route::controller(BooksController::class)->group(function(){
    Route::get('konyvek', 'index');
    Route::post('konyvek', 'store')->name('konyvek.store');
    Route::get('konyvek/letrehozas', 'create');
    Route::get('konyvek/{books}' , 'show');
    Route::get('konyvek/{books}/modositas' , 'edit');
    Route::put('konyvek/{books}', 'update');
});
