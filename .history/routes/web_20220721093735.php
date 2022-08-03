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

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/article', [App\Http\Controllers\Frontend\ArticleController::class, 'index'])->name('article');

Route::get('/liste-user', [App\Http\Controllers\Frontend\UsersController::class, 'index'])->name('liste-user');
Route::get('/voir/{id}', [App\Http\Controllers\Frontend\UsersController::class, 'getUser'])->name('voir');
Route::delete('/delete/{id}', [App\Http\Controllers\Frontend\UsersController::class, 'destroy'])->name('delete');
Route::get('/liste-reservation', [App\Http\Controllers\Frontend\ResevationController::class, 'index'])->name('liste-reservation');
Route::get('/detail/{id}', [App\Http\Controllers\Frontend\ResevationController::class, 'getReservation'])->name('voir');
Route::get('/ajouter', [App\Http\Controllers\Frontend\ResevationController::class, 'addReservation'])->name('ajout-reservation');
Route::post('/ajouterUsersReservation', [App\Http\Controllers\Frontend\ResevationController::class, 'store'])->name('ajouter-Users-Reservation');
Route::delete('/deleteUser', [App\Http\Controllers\Frontend\UsersController::class, 'destroy'])->name('delete-user');