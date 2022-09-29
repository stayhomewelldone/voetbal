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
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::get('/manage', function () {
        return view('admin.manage');
    })->name('admin.manage');
    Route::get('images/create', function (){
        return view('images.create');})->name('images.create');});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/pictures', [App\Http\Controllers\HomeController::class, 'pictures'])->name('pictures');
Route::get('/information', [App\Http\Controllers\HomeController::class, 'information'])->name('information');
Route::get('/404', [App\Http\Controllers\HomeController::class, 'fourzerofour'])->name('404');

Route::resource('images', 'App\Http\Controllers\ImageController')->middleware('auth'); // Laravel 8
