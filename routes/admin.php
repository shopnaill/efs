<?php
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

// middleware group
Route::group(['middleware' => ['auth']], function () {

    // admin prefix route
    Route::group(['prefix' => 'admin'], function () {

// Admin routes
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index');

// About routes group

        Route::controller(AboutController::class)->group(function () {
            // about prefix
            Route::prefix('about')->group(function () {
                Route::get('/', [AboutController::class, 'index'])->name('about.index');
                Route::put('/update/{about}', [AboutController::class, 'update'])->name('about.update');
            });
        });

// Client routes group

        Route::controller(ClientController::class)->group(function () {
            // client prefix
            Route::prefix('client')->group(function () {
                Route::get('/', [ClientController::class, 'index'])->name('client.index');
                Route::get('/create', [ClientController::class, 'create'])->name('client.create');
                Route::post('/update_create', [ClientController::class, 'update_create'])->name('client.update_create');
                Route::get('/edit/{client}', [ClientController::class, 'edit'])->name('client.edit');
                Route::delete('/delete/{client}', [ClientController::class, 'delete'])->name('client.delete');
            });
        });

// Service routes group

        Route::controller(ServiceController::class)->group(function () {
            // service prefix
            Route::prefix('service')->group(function () {
                Route::get('/', [ServiceController::class, 'index'])->name('service.index');
                Route::get('/create', [ServiceController::class, 'create'])->name('service.create');
                Route::post('/update_create', [ServiceController::class, 'update_create'])->name('service.update_create');
                Route::get('/edit/{service}', [ServiceController::class, 'edit'])->name('service.edit');
                Route::delete('/delete/{service}', [ServiceController::class, 'delete'])->name('service.delete');
            });
        });

// Team routes group

        Route::controller(TeamController::class)->group(function () {
            // team prefix
            Route::prefix('team')->group(function () {
                Route::get('/', [TeamController::class, 'index'])->name('team.index');
                Route::get('/create', [TeamController::class, 'create'])->name('team.create');
                Route::post('/update_create', [TeamController::class, 'update_create'])->name('team.update_create');
                Route::get('/edit/{team}', [TeamController::class, 'edit'])->name('team.edit');
                Route::delete('/delete/{team}', [TeamController::class, 'delete'])->name('team.delete');
            });
        });

// User routes group

        Route::controller(UserController::class)->group(function () {
            // user prefix
            Route::prefix('user')->group(function () {
                Route::get('/', [UserController::class, 'index'])->name('user.index');
                Route::get('/create', [UserController::class, 'create'])->name('user.create');
                Route::post('/update_create', [UserController::class, 'update_create'])->name('user.update_create');
                Route::get('/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
                Route::delete('/delete/{user}', [UserController::class, 'delete'])->name('user.delete');
            });
        });

    });

});
