<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\FilmController;

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
//

// Admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin');

// Films
Route::get('/admin/films', [FilmController::class, 'index'])->name('films.index');
Route::get('/admin/films/create', [FilmController::class, 'create'])->name('films.create');
Route::post('/admin/films', [FilmController::class, 'store'])->name('films.store');
Route::get('/admin/films/{film}', [FilmController::class, 'show'])->name('films.show');
Route::get('/admin/films/{film}/edit', [FilmController::class, 'edit'])->name('films.edit');
Route::patch('/admin/films/{film}', [FilmController::class, 'update'])->name('films.update');
Route::get('/admin/films/{film}/delete', [FilmController::class, 'delete'])->name('films.delete');
Route::delete('/admin/films/{film}', [FilmController::class, 'destroy'])->name('films.destroy');
