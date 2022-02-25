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

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController')->name('admin');
    });
    Route::group(['namespace' => 'Culture', 'prefix' => 'cultures'], function () {
        Route::get('/', 'IndexController')->name('admin.culture.index');
        Route::get('/soft', 'SoftController')->name('admin.culture.soft');
        Route::get('/create', 'CreateController')->name('admin.culture.create');
        Route::post('/store', 'StoreController')->name('admin.culture.store');
        Route::get('/{culture}', 'ShowController')->name('admin.culture.show');
        Route::get('/{culture}/edit', 'EditController')->name('admin.culture.edit');
        Route::patch('/{culture}', 'UpdateController')->name('admin.culture.update');
        Route::delete('/{culture}', 'DeleteController')->name('admin.culture.delete');
    });
    Route::group(['namespace' => 'Client', 'prefix' => 'clients'], function () {
        Route::get('/', 'IndexController')->name('admin.client.index');
        Route::get('/soft', 'SoftController')->name('admin.client.soft');
        Route::get('/searchget', 'SearchgetController')->name('admin.client.searchget');
        Route::post('/searchpost', 'SearchpostController')->name('admin.client.searchpost');
        Route::get('/create', 'CreateController')->name('admin.client.create');
        Route::get('/import', 'ImportController')->name('admin.client.import');
        Route::post('/store', 'StoreController')->name('admin.client.store');
        Route::post('/excel', 'ExcelController')->name('admin.client.excel');
        Route::get('/{client}', 'ShowController')->name('admin.client.show');
        Route::get('/{client}/edit', 'EditController')->name('admin.client.edit');
        Route::patch('/{client}', 'UpdateController')->name('admin.client.update');
        Route::delete('/{client}', 'DeleteController')->name('admin.client.delete');
    });
    Route::group(['namespace' => 'Fertilizer', 'prefix' => 'fertilizers'], function () {
        Route::get('/', 'IndexController')->name('admin.fertilizer.index');
        Route::get('/soft', 'SoftController')->name('admin.fertilizer.soft');
        Route::get('/searchget', 'SearchgetController')->name('admin.fertilizer.searchget');
        Route::post('/searchpost', 'SearchpostController')->name('admin.fertilizer.searchpost');
        Route::get('/create', 'CreateController')->name('admin.fertilizer.create');
        Route::get('/import', 'ImportController')->name('admin.fertilizer.import');
        Route::post('/store', 'StoreController')->name('admin.fertilizer.store');
        Route::post('/excel', 'ExcelController')->name('admin.fertilizer.excel');
        Route::get('/{fertilizer}', 'ShowController')->name('admin.fertilizer.show');
        Route::get('/{fertilizer}/edit', 'EditController')->name('admin.fertilizer.edit');
        Route::patch('/{fertilizer}', 'UpdateController')->name('admin.fertilizer.update');
        Route::delete('/{fertilizer}', 'DeleteController')->name('admin.fertilizer.delete');
    });
    Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
        Route::get('/', 'IndexController')->name('admin.user.index');
        Route::get('/soft', 'SoftController')->name('admin.user.soft');
        Route::get('/create', 'CreateController')->name('admin.user.create');
        Route::post('/store', 'StoreController')->name('admin.user.store');
        Route::get('/{user}', 'ShowController')->name('admin.user.show');
        Route::get('/{user}/edit', 'EditController')->name('admin.user.edit');
        Route::patch('/{user}', 'UpdateController')->name('admin.user.update');
        Route::delete('/{user}', 'DeleteController')->name('admin.user.delete');
    });
    Route::group(['namespace' => 'Status', 'prefix' => 'statuses'], function () {
        Route::get('/', 'IndexController')->name('admin.status.index');
    });
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
