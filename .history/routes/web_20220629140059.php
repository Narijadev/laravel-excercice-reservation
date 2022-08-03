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
Route::get('test',[TestController::class, 'test']);
Route::group(["namespace"=>"Users"], function() {
	Route::resource('users', 'UserController', ["except" => ["edit"]]);
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/listes-articles', [App\Http\Controllers\ArticleController::class, 'index'])->name('listes-articles');
//$router->get('/', 'ArticleController@index');