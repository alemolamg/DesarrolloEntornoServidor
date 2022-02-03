<?php

use App\Http\Controllers\CatalogController;
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
});
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');

/*
Route::get('/catalog', function () {
    return view('catalog.index');
})->middleware(['auth'])->name('catalogo');
*/

Route::get('/catalog', [CatalogController::class, 'index'])->middleware(['auth'])->name('catalogo');

Route::get('/catalog/show/{id?}', [CatalogController::class, 'show'])->middleware(['auth'])->name('show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
