<?php

use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DeviceController;
use App\Http\Controllers\Admin\LogController;
use App\Http\Controllers\Admin\UserController;
// use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Hash;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/monitoring', [HomeController::class, 'monitoring'])->name('monitoring');
Route::get('/about', [HomeController::class, 'about'])->name('about');
// Auth::routes();
Auth::routes([
  'register' => false, // Registration Routes...
  'reset' => false, // Password Reset Routes...
  'verify' => false, // Email Verification Routes...
]);
// Route::group(['middleware' => ['auth', 'verified']], function(){
Route::group(['middleware' => ['auth']], function(){
    Route::group(['prefix' => 'dashboard'], function(){
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/device/sensor', [DeviceController::class, 'sensor'])->name('dashboard.sensor');

        Route::resource('/device', DeviceController::class)
            ->name('index', 'dashboard.device.index')
            ->name('show', 'dashboard.device.show')
            ->name('create', 'dashboard.device.create')
            ->name('store', 'dashboard.device.store')
            ->name('edit', 'dashboard.device.edit')
            ->name('update', 'dashboard.device.update')
            ->name('destroy', 'dashboard.device.delete');


        Route::get('/log', [LogController::class, 'index'])->name('dashboard.log.index');

        Route::get('/my_profile', [UserController::class, 'my_profile'])->name('my_profile');
        Route::get('/edit_my_profile', [UserController::class, 'edit_my_profile'])->name('edit_my_profile');
        Route::put('/update_my_profile', [UserController::class, 'update_my_profile'])->name('update_my_profile');

        Route::resource('user', UserController::class)
        ->name('index', 'dashboard.user.index')
        ->name('show', 'dashboard.user.show')
        ->name('create', 'dashboard.user.create')
        ->name('store', 'dashboard.user.store')
        ->name('edit', 'dashboard.user.edit')
        ->name('update', 'dashboard.user.update')
        ->name('destroy', 'dashboard.user.delete');

        Route::resource('contact', ContactController::class)
        ->name('index', 'dashboard.contact.index')
        ->name('create', 'dashboard.contact.create')
        ->name('store', 'dashboard.contact.store')
        ->name('edit', 'dashboard.contact.edit')
        ->name('update', 'dashboard.contact.update')
        ->name('destroy', 'dashboard.contact.delete')
        ->except('show');
    });
});
