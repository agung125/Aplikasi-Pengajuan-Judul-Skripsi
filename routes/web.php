<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'ShowLoginForm']);

Auth::routes(['register' => false]);

Route::prefix('admin')->group(function () {

    Route::group(['middleware' => 'auth'], function(){

        //dashboard
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard.index');

        //download
        Route::get('/download/{file}', [App\Http\Controllers\Admin\SkripsiController::class, 'download'])->name('admin.skripsi.download');



        //aprove reject dosen
        Route::post('/dosen/setujui/{id}', [App\Http\Controllers\Admin\DosenController::class, 'setujui'])->name('admin.setujui.dosen');
        Route::post('/dosen/tolak/{id}', [App\Http\Controllers\Admin\DosenController::class, 'tolak'])->name('admin.tolak.dosen');

        //aprove reject SEK PRODI
        Route::post('/sekpro/setujui/{id}', [App\Http\Controllers\Admin\SekproController::class, 'setujui'])->name('admin.setujui.sekpro');
        Route::post('/sekpro/tolak/{id}', [App\Http\Controllers\Admin\SekproController::class, 'tolak'])->name('admin.tolak.sekpro');


        //permissions
        Route::resource('/permission', App\Http\Controllers\Admin\PermissionController::class, ['except' => ['show', 'create', 'edit', 'update', 'delete'] ,'as' => 'admin']);

        //roles
        Route::resource('/role', App\Http\Controllers\Admin\RoleController::class, ['except' => ['show'] ,'as' => 'admin']);

        //users
        Route::resource('/user', App\Http\Controllers\Admin\UserController::class, ['except' => ['show'] ,'as' => 'admin']);

        //pemesanan
        Route::resource('/skripsi', App\Http\Controllers\Admin\SkripsiController::class, ['except' => 'show' ,'as' => 'admin']);
        //lihat
        Route::get('/show/{id}', [App\Http\Controllers\Admin\SkripsiController::class, 'show'])->name('admin.skripsi.show');


        Route::resource('/dosen', App\Http\Controllers\Admin\DosenController::class, ['except' => 'show' ,'as' => 'admin']);

        Route::resource('/mahasiswa', App\Http\Controllers\Admin\MahasiswaController::class, ['except' => 'show' ,'as' => 'admin']);

        Route::resource('/dps', App\Http\Controllers\Admin\DpsController::class, ['except' => 'show' ,'as' => 'admin']);

        Route::get('dps/show/{id}', [App\Http\Controllers\Admin\DpsController::class, 'show'])->name('admin.dps.show');

        Route::get('dps/cetak/{id}', [App\Http\Controllers\Admin\DpsController::class, 'cetak'])->name('admin.dps.cetak');



    });

});
