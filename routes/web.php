<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () { return view('welcome'); })->name('welcome');

Route::middleware('auth')->group(function () {
    Route::group(['middleware' => 'role:Admin'], function () {

        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class,'index'])->name('admin_dashboard');

        Route::get('/adm_users', [App\Http\Controllers\Admin\UserController::class,'index'])->name('adm_users');
        Route::get('/adm_events', [App\Http\Controllers\Admin\EventController::class,'index'])->name('adm_events');

        
    });

    Route::get('/calendar', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/calendar/{month}', [App\Http\Controllers\Auth\CalendarController::class, 'index'])->name('calendar');
    Route::get('/calendar/{month}/{day}', [App\Http\Controllers\Auth\DayController::class, 'index'])->name('day');

});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
