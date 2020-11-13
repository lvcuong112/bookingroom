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

use App\Room;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend/home');
});
Route::get('/room', function () {
    return view('frontend/room');
});
Route::get('/userviewed/getAllRoomViewed', 'UserViewedController@getAllRoomViewed')->name('userviewed.getAllRoomViewed');
Route::get('/userviewed/storeRoomViewed', 'UserViewedController@storeViewed')->name('userviewed.store'); // xu ly de lam sao user dang nhap moi dung dc
Route::get('/admin/login', 'AdminController@login')->name('admin.login');
//Route::get('/login', 'ShopController@login')->name('shop.login');
// Đăng xuất
Route::get('/admin/logout', 'AdminController@logout')->name('admin.logout');

Route::post('/admin/postLogin', 'AdminController@postLogin')->name('admin.postLogin');

Route::group(['prefix' => 'admin','as' => 'admin.', 'middleware' => ['checkLogin']], function() {
    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::resource('room', 'RoomController');
    Route::get('/user/getListOwnerRequested', 'UserController@getListRequestedOwner')->name('user.getListOwnerRequested');
    Route::resource('user', 'UserController');
    Route::resource('roomtype', 'RoomTypeController');
    Route::resource('city', 'CityController');
    Route::resource('district', 'DistrictController');

    Route::get('/comment/getAllUnApprovedComments', 'CommentController@getAllUnApprovedComments')->name('comment.getAllUnApprovedComments');
    Route::resource('comment', 'CommentController');
    Route::get('/report/getAllUnApprovedReports', 'ReportController@getAllUnApprovedReports')->name('report.getAllUnApprovedReports');
    Route::resource('report', 'ReportController');

});

//Route::get('/test/{id}', function($roomId) {
//    // dd($room->facilities->get());
//    $room = Room::find($roomId);
//    $room->facilities()->syncWithoutDetaching([
//        1 => [
//            'description' => 'aaaaa'
//        ],
//        2 => [
//            'description' => 'bbbbb'
//        ]
//    ]);
//
//    return "ok";
//});
