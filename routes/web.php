<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
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




Auth::routes();
//ajax
Route::post('/ajax',[App\Http\Controllers\AjaxController::class, 'postIndex']);

//posts
Route::post('/portfolio/add',[App\Http\Controllers\PortfolioController::class, 'postIndex'])->middleware('checkauth');
//get
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware'=>['auth']],function(){
    Route::get('/work/delete/{id}',[App\Http\Controllers\PortfolioController::class, 'getDelete']);
});
Route::get('/portfolio', [App\Http\Controllers\PortfolioController::class, 'getAll']);
Route::get('/work/{id}',[App\Http\Controllers\PortfolioController::class, 'getOne']);
Route::get('{url?}', [Controllers\MaintextController::class, 'getIndex']);
