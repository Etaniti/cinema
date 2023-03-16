<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CinemaHallController;
use App\Http\Controllers\Admin\FilmSessionController;
use App\Http\Controllers\Admin\SeatingChartController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\ReservationController;
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

Route::get('/', [HomeController::class, 'index'])->name('welcome');

// Auth
Auth::routes();
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// User
Route::resource('profile', ProfileController::class)->parameters([
    'profile' => 'user',
]);

// Films
Route::resource('films', App\Http\Controllers\User\FilmController::class)->names([
    'index' => 'user_films.index',
    'show' => 'user_films.show',
]);

// Reservations
Route::resource('film-sessions.reservations', ReservationController::class)->names([
    'create' => 'reservations.create',
    'store' => 'reservations.store',
    'destroy' => 'reservations.destroy',
]);


// Admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin');

// Films
Route::get('/admin/films/{film}/delete', [App\Http\Controllers\Admin\FilmController::class, 'delete'])->name('admin_films.delete');
Route::resource('admin/films', App\Http\Controllers\Admin\FilmController::class)->names([
    'index' => 'admin_films.index',
    'create' => 'admin_films.create',
    'store' => 'admin_films.store',
    'show' => 'admin_films.show',
    'edit' => 'admin_films.edit',
    'update' => 'admin_films.update',
    'destroy' => 'admin_films.destroy',
]);

// Cinema halls
Route::resource('admin/cinema-halls', CinemaHallController::class)->names([
    'index' => 'cinema_halls.index',
    'create' => 'cinema_halls.create',
    'store' => 'cinema_halls.store',
    'show' => 'cinema_halls.show',
    'edit' => 'cinema_halls.edit',
    'update' => 'cinema_halls.update',
    'destroy' => 'cinema_halls.destroy',
]);

// Seating charts
Route::resource('cinema-halls.seating-charts', SeatingChartController::class)->shallow()
    ->names([
        'index' => 'seating_charts.index',
        'create' => 'seating_charts.create',
        'store' => 'seating_charts.store',
        'show' => 'seating_charts.show',
        'edit' => 'seating_charts.edit',
        'update' => 'seating_charts.update',
        'destroy' => 'seating_charts.destroy',
    ]);

// Film sessions
Route::resource('films.film-sessions', FilmSessionController::class)->shallow()
    ->names([
        'index' => 'admin_film_sessions.index',
        'create' => 'admin_film_sessions.create',
        'store' => 'admin_film_sessions.store',
        'show' => 'admin_film_sessions.show',
        'edit' => 'admin_film_sessions.edit',
        'update' => 'admin_film_sessions.update',
        'destroy' => 'admin_film_sessions.destroy',
    ]);
