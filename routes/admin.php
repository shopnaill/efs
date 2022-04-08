<?php
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ManagerController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\WorkController;
use Illuminate\Support\Facades\Route;

// middleware group
Route::group(['middleware' => ['auth', 'admin']], function () {

    // admin prefix route
    Route::group(['prefix' => 'admin'], function () {

// Admin routes
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index');

// About routes group

        Route::controller(AboutController::class)->group(function () {
            // about prefix
            Route::prefix('about')->group(function () {
                Route::get('/', [AboutController::class, 'index'])->name('admin.about.index');
                Route::put('/update/{about}', [AboutController::class, 'update'])->name('admin.about.update');
            });
        });

// Client routes group

        Route::controller(ClientController::class)->group(function () {
            // client prefix
            Route::prefix('client')->group(function () {
                Route::get('/', [ClientController::class, 'index'])->name('admin.client.index');
                Route::get('/create', [ClientController::class, 'create'])->name('admin.client.create');
                Route::post('/update_create', [ClientController::class, 'update_create'])->name('admin.client.update_create');
                Route::get('/edit/{client}', [ClientController::class, 'edit'])->name('admin.client.edit');
                Route::delete('/delete/{client}', [ClientController::class, 'delete'])->name('admin.client.delete');
            });
        });

// Service routes group

        Route::controller(ServiceController::class)->group(function () {
            // service prefix
            Route::prefix('service')->group(function () {
                Route::get('/', [ServiceController::class, 'index'])->name('admin.service.index');
                Route::get('/create', [ServiceController::class, 'create'])->name('admin.service.create');
                Route::post('/update_create', [ServiceController::class, 'update_create'])->name('admin.service.update_create');
                Route::get('/edit/{service}', [ServiceController::class, 'edit'])->name('admin.service.edit');
                Route::delete('/delete/{service}', [ServiceController::class, 'delete'])->name('admin.service.delete');
            });
        });

// Team routes group

        Route::controller(TeamController::class)->group(function () {
            // team prefix
            Route::prefix('team')->group(function () {
                Route::get('/', [TeamController::class, 'index'])->name('admin.team.index');
                Route::get('/create', [TeamController::class, 'create'])->name('admin.team.create');
                Route::post('/update_create', [TeamController::class, 'update_create'])->name('admin.team.update_create');
                Route::get('/edit/{team}', [TeamController::class, 'edit'])->name('admin.team.edit');
                Route::delete('/delete/{team}', [TeamController::class, 'delete'])->name('admin.team.delete');
            });
        });

// User routes group

        Route::controller(UserController::class)->group(function () {
            // user prefix
            Route::prefix('user')->group(function () {
                Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
                Route::get('/create', [UserController::class, 'create'])->name('admin.user.create');
                Route::post('/update_create', [UserController::class, 'update_create'])->name('admin.user.update_create');
                Route::get('/edit/{user}', [UserController::class, 'edit'])->name('admin.user.edit');
                Route::delete('/delete/{user}', [UserController::class, 'delete'])->name('admin.user.delete');
            });
        });

            // Admin Managers
    Route::controller(ManagerController::class)->group(function () {
        Route::get('/managers', 'index')->name('admin.manager.index');
        Route::get('/managers/create', 'create')->name('admin.manager.create');
        Route::get('/managers/{manager}/edit', 'edit')->name('admin.manager.edit');
        Route::post('/managers/update_create', 'update_create')->name('admin.manager.update_create');
        Route::delete('/managers/{manager}/delete', 'delete')->name('admin.manager.delete');
    });


    // Admin Roles

    Route::controller(RoleController::class)->group(function () {
        Route::get('/roles', 'index')->name('admin.roles.index');
        Route::get('/roles/create', 'create')->name('admin.roles.create');
        Route::get('/roles/{role}/edit', 'edit')->name('admin.roles.edit');
        Route::post('/roles/update_create', 'update_create')->name('admin.roles.update_create');
        Route::delete('/roles/{role}/delete', 'delete')->name('admin.roles.delete');
    });

        // Admin Sliders
    Route::controller(SliderController::class)->group(function () {
        Route::get('/sliders', 'index')->name('admin.slider.index');
        Route::get('/sliders/create', 'create')->name('admin.slider.create');
        Route::get('/sliders/{slider}/edit', 'edit')->name('admin.slider.edit');
        Route::post('/sliders/update_create', 'update_create')->name('admin.slider.update_create');
        Route::delete('/sliders/{slider}/delete', 'delete')->name('admin.slider.delete');
    });

        // Admin Works
    Route::controller(WorkController::class)->group(function () {
        Route::get('/works', 'index')->name('admin.work.index');
        Route::get('/works/create', 'create')->name('admin.work.create');
        Route::get('/works/{work}/edit', 'edit')->name('admin.work.edit');
        Route::post('/works/update_create', 'update_create')->name('admin.work.update_create');
        Route::delete('/works/{work}/delete', 'delete')->name('admin.work.delete');
    });

 

    });

});
