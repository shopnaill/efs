<?php

use Illuminate\Support\Facades\Route;

require_once 'admin.php';
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// storage routes
Route::get('/storage/{path}', function ($path) {
    return Storage::disk('public')->get($path);
})->where('path', '.*');

// storage routes with subfolder
Route::get('/storage/{folder}/{path}', function ($folder, $path) {
    return Storage::disk('public')->get($folder.'/'.$path);
})->where('path', '.*');