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

Route::get('/', function () {
    return view('frontend/home');
});
Route::get('/room', function () {
    return view('frontend/room');
});
//Route::get('/admin', function () {
//    return view('backend/home');
//});
//
//Route::get('/admin/room/index', function () {
//    return view('backend/room/index');
//});
//Route::get('/admin/room/create', function () {
//    return view('backend/room/create');
//});
//Route::get('/admin/room/edit', function () {
//    return view('backend/room/edit');
//});
//Route::get('/admin/room/show', function () {
//    return view('backend/room/show');
//});

Route::group(['prefix' => 'admin','as' => 'admin.'], function() {
    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::resource('room', 'RoomController');

});

