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


Route::middleware([ 'isAdmin'])->group(function () {


    Route::get('images/create', function (){
        return view('images.create');})->name('images.create');});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/pictures', [App\Http\Controllers\HomeController::class, 'pictures'])->name('pictures');
Route::get('/information', [App\Http\Controllers\HomeController::class, 'information'])->name('information');

Route::resource('images', 'App\Http\Controllers\ImageController')->middleware( 'isAdmin'); // Laravel 8

Route::get('/search',[App\Http\Controllers\PostsController::class, 'search'] )->name('search');
Route::get('/manage',[\App\Http\Controllers\ImageController::class, 'index'] )->name('admin.manage')->middleware( 'isAdmin');
Route::get('changeStatus', [\App\Http\Controllers\ImageController::class, 'changeStatus'])->middleware("isAdmin");
