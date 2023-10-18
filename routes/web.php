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
//Rotta Homepage
Route::get('/', [RouteController::class, 'homepage'])->name('homepage');


//Rotte Dashboard
Route::get('/dashboard', function () {
    return view('dashboards.dashboard');
});


//Rotte Annunci
Route::get('/search/announcement', [AnnouncementController::class, 'search'])
->name('announcements.search');
Route::resource('announcements', AnnouncementController::class);

//Rotte Categorie
Route::resource('categories', CategoryController::class);


//Rotte revisore


Route::get('/revisor/home', [RevisorController::class, 'index'])->name('revisor.index');
Route::get('/revisor/revised', [RevisorController::class, 'revisedindex'])->name('revisor.revised');
Route::get('/revisor/accepted', [RevisorController::class, 'acceptedIndex'])->name('revisor.accepted');
Route::patch('/accept/announcement/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->name('revisor.accept_announcement');
Route::patch('/reject/announcement/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->name('revisor.reject_announcement');
Route::get('/revisor/request', [RevisorController::class, 'becomeRevisor'])->name('become.revisor');
Route::get('/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');




