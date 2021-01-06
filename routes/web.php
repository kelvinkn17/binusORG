<?php

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
Auth::routes();

Route::get('/', function () {
    return view('home');
})->middleware('auth');


Route::middleware(['admin'])->group(function(){
    Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'handleAdmin'])->name('admin.home');
    Route::get('/admin/organization', [App\Http\Controllers\HomeController::class, 'organizationAdmin'])->name('admin.organization');
    Route::get('/admin/membership', [App\Http\Controllers\HomeController::class, 'membershipAdmin'])->name('admin.membership');
    Route::post('/addActivity', [App\Http\Controllers\HomeController::class, 'addActivity'])->name('add.activity');
    Route::post('/deleteActivity/{id}', [App\Http\Controllers\HomeController::class, 'deleteActivity'])->name('delete.activity');
    Route::post('/addEvent', [App\Http\Controllers\HomeController::class, 'addEvent'])->name('add.event');
    Route::post('/deleteEvent/{id}', [App\Http\Controllers\HomeController::class, 'deleteEvent'])->name('delete.event');

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/organization', [App\Http\Controllers\HomeController::class, 'organization'])->name('organization');
Route::get('/register/{id}', [App\Http\Controllers\HomeController::class, 'registerOrganization'])->name('register.organization');
Route::post('/register/{id}', [App\Http\Controllers\HomeController::class, 'registerOrganizationSubmit'])->name('register.organization.submit');

