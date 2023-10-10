<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\CategoryController;
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

Route::get('/', function () {
    return view('welcome');
})->name('homepage');

Route::get('/dashboard', function () {
    return view('dashboards.dashboard');
});

Route::resource('announcements', AnnouncementController::class);
Route::resource('categories', CategoryController::class);