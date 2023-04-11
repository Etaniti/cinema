<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CinemaHallController;
use App\Http\Controllers\Admin\FilmSessionController;
use App\Http\Controllers\Admin\SeatController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/reservations/{reservation}/delete', [App\Http\Controllers\User\ReservationController::class, 'delete'])->name('user_reservations.delete');
Route::resource('film-sessions.reservations', App\Http\Controllers\User\ReservationController::class)->shallow()
    ->names([
        'index' => 'user_reservations.index',
        'create' => 'user_reservations.create',
        'store' => 'user_reservations.store',
        'show' => 'user_reservations.show',
        'update' => 'user_reservations.update',
        'destroy' => 'user_reservations.destroy',
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
Route::get('/admin/cinema-halls/{cinema_hall}/delete', [CinemaHallController::class, 'delete'])->name('cinema_halls.delete');
Route::resource('admin/cinema-halls', CinemaHallController::class)->names([
    'index' => 'cinema_halls.index',
    'create' => 'cinema_halls.create',
    'store' => 'cinema_halls.store',
    'show' => 'cinema_halls.show',
    'edit' => 'cinema_halls.edit',
    'update' => 'cinema_halls.update',
    'destroy' => 'cinema_halls.destroy',
]);

// Seats
Route::resource('cinema-halls.seats', SeatController::class)->shallow()
    ->names([
        'index' => 'seats.index',
        'create' => 'seats.create',
        'store' => 'seats.store',
        'show' => 'seats.show',
        'edit' => 'seats.edit',
        'update' => 'seats.update',
        'destroy' => 'seats.destroy',
    ]);

// Film sessions
Route::get('/admin/film-sessions', [FilmSessionController::class, 'index'])->name('film_sessions.index');
Route::get('/admin/film-sessions/{film_session}/delete', [FilmSessionController::class, 'delete'])->name('film_sessions.delete');
Route::resource('films.film-sessions', FilmSessionController::class)->shallow()
    ->names([
        'create' => 'film_sessions.create',
        'store' => 'film_sessions.store',
        'show' => 'film_sessions.show',
        'edit' => 'film_sessions.edit',
        'update' => 'film_sessions.update',
        'destroy' => 'film_sessions.destroy',
    ]);

// Reservations
Route::resource('admin/reservations', App\Http\Controllers\Admin\ReservationController::class)->names([
    'index' => 'admin_reservations.index',
    'create' => 'admin_reservations.create',
    'store' => 'admin_reservations.store',
    'show' => 'admin_reservations.show',
    'update' => 'admin_reservations.update',
    'destroy' => 'admin_reservations.destroy',
]);
