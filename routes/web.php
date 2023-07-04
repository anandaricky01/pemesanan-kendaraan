<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KendaraanController;
use App\Http\Controllers\Admin\UserController;
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

Auth::routes([
  'register' => false, // Registration Routes...
  'reset' => false, // Password Reset Routes...
  'verify' => false, // Email Verification Routes...
]);

Route::group(['middleware' => ['auth']], function(){
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('kendaraan', KendaraanController::class)
            ->name('index', 'dashboard.kendaraan.index')
            ->name('create', 'dashboard.kendaraan.create')
            ->name('store', 'dashboard.kendaraan.store')
            ->name('show', 'dashboard.kendaraan.show')
            ->name('edit', 'dashboard.kendaraan.edit')
            ->name('update', 'dashboard.kendaraan.update')
            ->name('destroy', 'dashboard.kendaraan.delete');

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
});
