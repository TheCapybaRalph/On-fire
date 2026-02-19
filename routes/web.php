<?php

use App\Http\Controllers\Channels\NotificationsChannelController;
use App\Http\Controllers\Dashboard\DashboardRefreshController;
use App\Http\Controllers\SitePageController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

// CUSTOM REGISTER ROUTE
Route::post('register', [\App\Http\Controllers\Auth\RegisterUserController::class, 'store'])->name('custom.register.store');

// HOME PAGE
Route::get('/', function () {
    return Inertia::render('landing/Main', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');



require __DIR__.'/settings.php';

Route::middleware(['auth'])
    ->group(function() {
        Route::prefix('team')
            ->name('team.')
            ->group(function() {

                Route::get('/create', [\App\Http\Controllers\Team\TeamController::class, 'create'])
                    ->name('team.create');

                Route::post('/store', [\App\Http\Controllers\Team\TeamController::class, 'store'])
                    ->name('team.store');
            });


        Route::prefix('sites')
            ->name('sites.')
            ->group(function() {
                Route::get('/', [\App\Http\Controllers\Site\SiteController::class, 'index'])->name('index');
                Route::get('/show/{siteId}', [\App\Http\Controllers\Site\SiteController::class, 'show'])->name('show');
                Route::get('/create', [\App\Http\Controllers\Site\SiteController::class, 'create'])->name('create');
                Route::post('/store', [\App\Http\Controllers\Site\SiteController::class, 'store'])->name('store');
            });

        Route::prefix('pages')
            ->name('pages.')
            ->group(function() {
                Route::get('{site:id}/create', [SitePageController::class, 'create'])->name('create');
                Route::get('{page:id}/show', [SitePageController::class, 'show'])->name('show');
                Route::post('{site:id}/store', [SitePageController::class, 'store'])->name('store');
            });

        Route::prefix('channels')
            ->as('channels.')
            ->group(function() {
                Route::get('/', [NotificationsChannelController::class, 'index'])->name('index');
            });

        Route::get('dashboard', function () {
            /** @var \App\Services\Dashboard\DashboardWidgetService $service */
            $service = app(\App\Services\Dashboard\DashboardWidgetService::class);
            return Inertia::render('Dashboard', [
                'widgets' => $service->resolve(),
            ]);
        })->name('dashboard');

        // One-click refresh to invalidate all dashboard widget caches for current team
        Route::post('dashboard/refresh', DashboardRefreshController::class)
            ->name('dashboard.refresh');
    });
