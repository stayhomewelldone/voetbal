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

Route::get('/welcome', function () {
    return view('welcome');
});


//Route::middleware([ 'isAdmin'])->group(function () {
//
//
//    Route::get('images/create', function (){
//        return view('images.create');})->name('images.create');});


\Illuminate\Support\Facades\Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'pictures'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/information', [App\Http\Controllers\HomeController::class, 'information'])->name('information');

Route::resource('images', 'App\Http\Controllers\ImageController'); // Laravel 8

//Route::get('/search',[App\Http\Controllers\PostsController::class, 'search'] )->name('search');
Route::get('/manage',[\App\Http\Controllers\ImageController::class, 'index'] )->name('admin.manage')->middleware( 'isAdmin');
Route::post('changeStatus', [\App\Http\Controllers\ImageController::class, 'changeStatus']);
//Route::get('/', [App\Http\Controllers\PostController::class, 'index']);
Route::get('/pictures', [App\Http\Controllers\PostController::class, 'show']);
