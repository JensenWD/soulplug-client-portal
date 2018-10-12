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

//Route::get('/mailable', function () {
//    $item = App\Item::find(1);
//
//    return new App\Mail\NotifyAdminOfPriceChange($item);
//});

Route::group(['middleware' => 'auth'], function () {
    Route::get('client-portal', 'PagesController@portal')->name('portal');
    Route::get('client-table', 'PagesController@getClientDataTable')->name('client-table');

    Route::get('admin-portal', 'PagesController@adminPortal')->name('admin-portal');
    Route::get('admin-archives', 'PagesController@adminArchives')->name('admin-archives');
    Route::get('admin-items-table', 'PagesController@getAdminItemsDataTable')->name('admin-items-table');
    Route::get('archived-items-table', 'PagesController@getArchivedItemsDataTable')->name('archived-items-table');
    Route::get('admin-users-table', 'PagesController@getAdminUsersDataTable')->name('admin-users-table');

    Route::post('new-item', 'ItemController@store')->name('add-item');
    Route::post('items/update', 'ItemController@update')->name('update-item');
    Route::get('item/archive/{item}', 'ItemController@archive');
    Route::get('item/approve/{item}', 'ItemController@approve')->name('approve-item');
    Route::get('item/decline/{item}', 'ItemController@decline')->name('decline-item');
    Route::get('item/paid/{item}', 'ItemController@togglePaid');
    Route::get('user/remove/{user}', 'AdminController@removeUser')->name('remove-user');
    Route::get('items/remove/{item}', 'ItemController@delete')->name('delete-item');
    Route::get('items', 'ItemController@index')->name('get-items');
    //Route::post('items', 'ItemController@index')->name('get-items');
});
Auth::routes();

