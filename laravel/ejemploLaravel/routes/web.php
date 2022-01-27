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


/*
Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', function () {
    return view('inicio');
})->name('inicio');

/*
Route::get('/inicio', function () {
    return view('inicio');
})->name('inicio');
*/

Route::get('/perfil', function () {
    return view('perfil');
})->name('perfil');

Route::get('/component', function () {
    return view('vista_component');
});

require __DIR__ . '/auth.php';
