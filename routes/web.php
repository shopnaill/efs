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
Route::get('storage/{dir}/{dir2}/{file}', function ($dir, $dir2, $file) {
    $path = storage_path('app' . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR . $dir2 . DIRECTORY_SEPARATOR . $file);
    if (file_exists($path)) {
        return response()->file($path);
    } else {
        return response()->json(['error' => 'File not found'], 404);
    }
});

Route::get('storage/{dir}/{file}', function ($dir, $file) {
    $path = storage_path('app' . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR . $file);
    if (file_exists($path)) {
        return response()->file($path);
    } else {
        return response()->json(['error' => 'File not found'], 404);
    }
});

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
})->name('locale');
