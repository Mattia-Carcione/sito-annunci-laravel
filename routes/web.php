<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\RouteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [RouteController::class, 'homepage'])->name('homepage');

Route::get('/dashboard', function () {
    return view('dashboards.dashboard');
});

Route::resource('announcements', AnnouncementController::class);
Route::resource('categories', CategoryController::class);

//Rotte revisore

Route::get('/revisor/home', [RevisorController::class, 'index'])->name('revisor.index');
Route::patch('/accetta/annuncio/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->name('revisor.accept_announcement');
Route::patch('/rifiuta/annuncio/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->name('revisor.reject_announcement');
Route::get('/revisor/request', [RevisorController::class, 'becomeRevisor'])->name('become.revisor');
Route::get('/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');