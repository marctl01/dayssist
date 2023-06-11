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

        Route::get('/adm_users', [App\Http\Controllers\Admin\UserController::class,'index_searcher'])->name('adm_users.search');
        Route::post('/adm_users/update', [App\Http\Controllers\Admin\UserController::class,'update'])->name('adm_users.update');

        Route::get('/adm_users/create', [App\Http\Controllers\Admin\UserController::class,'view_form_create'])->name('adm_users.createform');
        Route::post('/adm_users/create', [App\Http\Controllers\Admin\UserController::class,'create'])->name('adm_users.create');

        Route::get('/adm_users/delete', [App\Http\Controllers\Admin\UserController::class,'view_form_delete'])->name('adm_users.deleteform');
        Route::delete('/adm_users/delete', [App\Http\Controllers\Admin\UserController::class,'delete'])->name('adm_users.delete');

        Route::get('/adm_events', [App\Http\Controllers\Admin\EventController::class,'index'])->name('adm_events');
    });


    Route::group(['middleware' => 'role:Coordinador'], function () {

        Route::get('/groups_coord', [App\Http\Controllers\Coordinador\GroupController::class,'index'])->name('groups_coord');
        Route::post('/groups_coord/add_group', [App\Http\Controllers\Coordinador\GroupController::class,'add_group'])->name('groups_coord.add_group');
        Route::post('/groups_coord/create_group', [App\Http\Controllers\Coordinador\GroupController::class,'create_group'])->name('groups_coord.create_group');
        Route::delete('/groups_coord/delete', [App\Http\Controllers\Coordinador\GroupController::class,'delete'])->name('groups_coord.delete');

    });


    Route::group(['middleware' => 'role:Miembro'], function () {

        Route::get('/groups_miembro', [App\Http\Controllers\Miembro\GroupController::class,'index'])->name('groups_miemb');
        Route::post('/groups_miembro/add_group', [App\Http\Controllers\Miembro\GroupController::class,'add_group'])->name('groups_miemb.add_group');
        Route::delete('/groups_miembro/delete', [App\Http\Controllers\Miembro\GroupController::class,'delete'])->name('groups_miemb.delete');


    });


    Route::get('/calendar', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/calendar/{month}', [App\Http\Controllers\Auth\CalendarController::class, 'index'])->name('calendar');
    Route::get('/calendar/{month}/{day}', [App\Http\Controllers\Auth\DayController::class, 'index'])->name('day');

    Route::get('/calendar/{month}/{day}', [App\Http\Controllers\EventController::class, 'showDayEvent'])->name('day');
    Route::get('/events/create', [App\Http\Controllers\EventController::class, 'create_form'])->name('events.create_form');
    Route::post('/events/create', [App\Http\Controllers\EventController::class, 'store'])->name('events.create');
    Route::get('/events/update', [App\Http\Controllers\EventController::class, 'update_form'])->name('events.update_form');
    Route::patch('/events/update', [App\Http\Controllers\EventController::class, 'update'])->name('events.update');
    // Route::get('/events/delete/{month}/{day}', [App\Http\Controllers\EventController::class, 'showDayEventDelete'])->name('events.delete');
    // Route::post('/events/delete', [App\Http\Controllers\EventController::class, 'delete'])->name('events.delete');
    Route::delete('/events/{id}', [App\Http\Controllers\EventController::class, 'delete'])->name('events.delete');
    Route::put('/events/{id}', [App\Http\Controllers\EventController::class, 'update'])->name('events.update');

});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
