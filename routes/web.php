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
        Route::get('/adm_users', [App\Http\Controllers\Admin\UserController::class,'index_searcher'])->name('adm_users.search');

        Route::get('/adm_users/create', [App\Http\Controllers\Admin\UserController::class,'view_form_create'])->name('adm_users.createform');
        Route::post('/adm_users/create', [App\Http\Controllers\Admin\UserController::class,'create'])->name('adm_users.create');

        Route::get('/adm_users/delete', [App\Http\Controllers\Admin\UserController::class,'view_form_delete'])->name('adm_users.deleteform');
        Route::delete('/adm_users/delete', [App\Http\Controllers\Admin\UserController::class,'delete'])->name('adm_users.delete');

        



        Route::get('/adm_events', [App\Http\Controllers\Admin\EventController::class,'index'])->name('adm_events');

        
    });

    Route::get('/calendar', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/calendar/{month}', [App\Http\Controllers\Auth\CalendarController::class, 'index'])->name('calendar');
    Route::get('/calendar/{month}/{day}', [App\Http\Controllers\Auth\DayController::class, 'index'])->name('day');

    Route::get('/events', [App\Http\Controllers\EventController::class, 'showall'])->name('events');
    Route::get('/events/create', [App\Http\Controllers\EventController::class, 'create_form'])->name('events.create_form');
    Route::post('/events/create', [App\Http\Controllers\EventController::class, 'store'])->name('events.create');
    Route::get('/events/update', [App\Http\Controllers\EventController::class, 'update_form'])->name('events.update_form');
    Route::patch('/events/update', [App\Http\Controllers\EventController::class, 'update'])->name('events.update');
    Route::get('/events/delete', [App\Http\Controllers\EventController::class, 'delete_form'])->name('events.delete_form');
    Route::delete('/events/delete', [App\Http\Controllers\EventController::class, 'delete'])->name('events.delete');

    // Route::get('/events/showall', [App\Http\Controllers\Admin\EventController::class,'index'])->name('events');
    // Route::get('/adm_events', [App\Http\Controllers\Admin\EventController::class,'index'])->name('adm_events');
    // Route::get('/adm_events', [App\Http\Controllers\Admin\EventController::class,'index'])->name('adm_events');
    // Route::get('/adm_events', [App\Http\Controllers\Admin\EventController::class,'index'])->name('adm_events');
    // Route::get('/adm_events', [App\Http\Controllers\Admin\EventController::class,'index'])->name('adm_events');

    // Route::get('/events', [EventController::class, 'index']);
    // Route::post('/events', [EventController::class, 'store']);
    // Route::get('/events/{id}', [EventController::class, 'show']);
    // Route::put('/events/{id}', [EventController::class, 'update']);
    // Route::delete('/events/{id}', [EventController::class, 'destroy']);

});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
