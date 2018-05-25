<?php

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

Route::get('/', 'PagesController@home')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('client-portal', 'PagesController@portal')->name('portal');
    Route::get('client-table', 'PagesController@getClientDataTable')->name('client-table');
    Route::get('admin-portal', 'PagesController@adminPortal')->name('admin-portal');
    Route::get('admin-items-table', 'PagesController@getAdminItemsDataTable')->name('admin-items-table');
    Route::get('admin-users-table', 'PagesController@getAdminUsersDataTable')->name('admin-users-table');

    Route::post('new-item', 'ItemController@store')->name('add-item');
    Route::post('items/update', 'ItemController@update')->name('update-item');
});
Auth::routes();

