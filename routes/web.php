<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
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

Route::get('/user',[DashboardController::class, 'profile'])->name('users.profile')->middleware('auth');

//Rotta lingue
Route::post('/language/{lang}', [RouteController::class, 'setLanguage'])->name('set_language_locale');

//Rotte Annunci
Route::get('/search/announcement', [AnnouncementController::class, 'search'])
->name('announcements.search');
Route::resource('announcements', AnnouncementController::class);

//Rotte Categorie
Route::resource('categories', CategoryController::class);


//Rotte revisore


Route::get('/revisor/home', [RevisorController::class, 'index'])->name('revisor.index');
Route::get('/revisor/revised', [RevisorController::class, 'revisedIndex'])->name('revisor.revised');
Route::get('/revisor/search/announcement', [RevisorController::class, 'search'])
->name('revisor.search');
Route::patch('/accept/announcement/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->name('revisor.accept_announcement');
Route::patch('/reject/announcement/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->name('revisor.reject_announcement');
Route::get('/revisor/request', [RevisorController::class, 'becomeRevisor'])->name('become.revisor');
Route::get('/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');
Route::get('/revisor/revised/{announcement}', [RevisorController::class, 'revisedShow'])->name('revisor.show');




