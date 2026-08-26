<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MenuCategoryController;
use App\Http\Controllers\Admin\MenuItemController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');

Route::get('/reservation', [ReservationController::class, 'create'])->name('reservation.create');
Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
    });

    Route::middleware(['auth', 'admin:admin'])->group(function () {
        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('menu/categories', MenuCategoryController::class)
            ->except(['show'])
            ->parameters(['categories' => 'category'])
            ->names('menu.categories');

        Route::resource('menu/items', MenuItemController::class)
            ->except(['show'])
            ->parameters(['items' => 'item'])
            ->names('menu.items');

        Route::prefix('reservations')->name('reservations.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\ReservationController::class, 'index'])->name('index');
            Route::get('/{reservation}', [\App\Http\Controllers\Admin\ReservationController::class, 'show'])->name('show');
            Route::patch('/{reservation}', [\App\Http\Controllers\Admin\ReservationController::class, 'update'])->name('update');
        });
    });
});
