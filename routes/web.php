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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::group(['namespace' => 'Main'], function() {
        Route::get('/', 'IndexController');
    });
    Route::group(['namespace' => 'Culture', 'prefix' => 'cultures'], function() {
        Route::get('/', 'IndexController')->name('admin.culture.index');
        Route::get('/create', 'CreateController')->name('admin.culture.create');
        Route::post('/store', 'StoreController')->name('admin.culture.store');
        Route::get('/{culture}', 'ShowController')->name('admin.culture.show');
        Route::get('/{culture}/edit', 'EditController')->name('admin.culture.edit');
        Route::patch('/{culture}', 'UpdateController')->name('admin.culture.update');
        Route::delete('/{culture}', 'DeleteController')->name('admin.culture.delete');
    });
    Route::group(['namespace' => 'Client', 'prefix' => 'clients'], function() {
        Route::get('/', 'IndexController')->name('admin.client.index');
        Route::get('/create', 'CreateController')->name('admin.client.create');
        Route::post('/store', 'StoreController')->name('admin.client.store');
        Route::get('/{client}', 'ShowController')->name('admin.client.show');
        Route::get('/{client}/edit', 'EditController')->name('admin.client.edit');
        Route::patch('/{client}', 'UpdateController')->name('admin.client.update');
        Route::delete('/{client}', 'DeleteController')->name('admin.client.delete');
    });
    Route::group(['namespace' => 'Fertilizer', 'prefix' => 'fertilizers'], function() {
        Route::get('/', 'IndexController')->name('admin.fertilizer.index');
        Route::get('/create', 'CreateController')->name('admin.fertilizer.create');
        Route::post('/store', 'StoreController')->name('admin.fertilizer.store');
        Route::get('/{fertilizer}', 'ShowController')->name('admin.fertilizer.show');
        Route::get('/{fertilizer}/edit', 'EditController')->name('admin.fertilizer.edit');
        Route::patch('/{fertilizer}', 'UpdateController')->name('admin.fertilizer.update');
        Route::delete('/{fertilizer}', 'DeleteController')->name('admin.fertilizer.delete');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
