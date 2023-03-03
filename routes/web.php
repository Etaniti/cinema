<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\FilmController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\ProfileController;
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
Route::resource('profile', ProfileController::class)->only([
    'index', 'edit', 'update',
])->parameters([
    'profile' => 'user',
]);

// Films


// Admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin');

// Films
Route::get('/admin/films/{film}/delete', [FilmController::class, 'delete'])->name('films.delete');
Route::resource('admin/films', FilmController::class);
