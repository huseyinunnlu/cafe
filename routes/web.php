<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ReservationController;
<<<<<<< HEAD
use App\Http\Controllers\Admin\ChefController;
use App\Http\Controllers\Admin\MenuController;
=======
>>>>>>> parent of 8c094ea (Chefs Finished with Livewire)
use App\Http\Controllers\MainController;
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

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/gallery', [MainController::class, 'gallery'])->name('gallery');


Route::group(['middleware' => ['auth', 'isAdmin'], 'prefix' => 'adminpanel',], function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    //settings
    Route::get('/settings' ,[AdminController::class, 'settings'])->name('settings.index');
    Route::post('/settings/update/{id}' ,[AdminController::class, 'update'])->name('settings.update');
    //Social Media links
    Route::post('/social/create' ,[AdminController::class, 'socialCreate'])->name('social.create');
    Route::get('/social/edit/{id}' ,[AdminController::class, 'socialEdit'])->name('social.edit');
    Route::post('/social/update/{id}' ,[AdminController::class, 'socialUpdate'])->name('social.update');
    Route::get('/social/destroy/{id}' ,[AdminController::class, 'socialDestroy'])->name('social.destroy');
    //Gallery
    Route::resource('gallery', GalleryController::class);
    Route::get('gallery/{id}/destroy', [GalleryController::class, 'destroy'])->name('gallery.destroy');
    //Reservation
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservation.index');
    Route::get('/reservations/{id}/detail', [ReservationController::class, 'detail'])->name('reservation.detail');
    Route::get('/reservations/{id}/destroy', [ReservationController::class, 'destroy'])->name('reservation.destroy');
<<<<<<< HEAD
    Route::get('/chefs', [ChefController::class, 'index'])->name('chef.index');
    //Menu
    Route::resource('menu', MenuController::class);
=======
>>>>>>> parent of 8c094ea (Chefs Finished with Livewire)
});


