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
// home
Route::get('/','FrontendController@index')->name('home');
Route::get('/homeApi', 'FrontendController@homeApi');
Route::get('/cheapHomeApi', 'FrontendController@cheapHomeApi');
//room
Route::get('/room', 'FrontendController@room')->name('room');
Route::get('roomApi', 'FrontendController@roomApi')->name('roomApi');
Route::get('/cityApi','FrontendController@cityApi');
Route::get('/districtApi','FrontendController@districtApi');
Route::get('/roomTypeApi','FrontendController@roomTypeApi');
Route::get('/roomDetail/{id}', 'FrontendController@roomDetail')->name('roomdetail');
Route::get('/roomDetailApi/{id}','FrontendController@roomDetailApi');
Route::get('/roomFacilitiesApi/{id}','FrontendController@roomFacilitiesApi');
Route::get('/roomImageDetailApi/{id}','FrontendController@imageRoomDetailApi');
//login register
Route::post('login', 'FrontendController@customerLogin')->name('login');
Route::get('logout','FrontendController@logout')->name('logout');
route::get('/register','FrontendController@register')->name('frontRegister');
Route::post('postRegister', 'FrontendController@CustomerRegister')->name('register');
Route::get('/repassword', 'FrontendController@rePassword')->name('repassword');
//gg
Route::get('/user/getAllRoomViewed', 'UserViewedController@getAllRoomViewed')->name('userviewed.getAllRoomViewed');
Route::get('/user/storeRoomViewed/{user_id}/{room_id}', 'UserViewedController@storeViewed')->name('userviewed.store');
Route::get('/user/storeVoted/{user_id}/{room_id}/{count_star}', 'UserVotedController@storeVoted')->name('uservoted.store');
Route::get('/user/storeLiked/{user_id}/{room_id}', 'UserLikedController@storeLiked')->name('userliked.store');
Route::get('/admin/login', 'AdminController@login')->name('admin.login');
Route::get('/owner/login', 'OwnerController@login')->name('owner.login');
//fillter
Route::get('/search', 'FrontendController@search')->name('frontend.search');
Route::get('/user/search', 'FrontendController@searchApi')->name('user.search');
//cmt like
Route::post('/like', 'FrontendController@customerLike')->name('like');
Route::post('/report', 'FrontendController@reportRoom')->name('report');
Route::post('/comment', 'FrontendController@commentVote')->name('comment');
Route::get('allComment','FrontendController@allComment')->name('allComment');
Route::get('allCommentApi', 'FrontendController@getCommentApi');
//myaccount
Route::get('/myaccount', 'FrontendController@myAccount')->name('myaccount');
Route::get('/accountApi', 'FrontendController@accountApi');
Route::get('/likeRoom', 'FrontendController@likeRoom');
Route::get('/likeRoomApi', 'FrontendController@likeRoomApi');
// Admin
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
    Route::delete('/roomimage/{id}', 'RoomController@deleteRoomImage')->name('room/deleteRoomImage');
    Route::get('/showAllExtendRoomRequest', 'AdminController@showAllExtendRoomRequest')->name('showAllExtendRoomRequest');
    Route::get('/test', 'AdminController@test');
    Route::get('/approveExtendRequest/{request_id}','AdminController@extendDate')->name('approveExtendRequest');
    Route::get('/deleteRequest/writeReason/{request_id}', 'AdminController@writeReason')->name('deleteRequest.writeReason');
    Route::post('/deleteRequest/refuseRequest/{request_id}', 'AdminController@refuseExtendDate')->name('deleteRequest.refuseExtendDate');
    Route::get('/showAllEditRoomRequest', 'AdminController@showAllEditRoomRequest')->name('showAllEditRoomRequest');
    Route::get('/allowEditRoomRequest/{request_id}', 'AdminConTroller@allowEditRoom')->name('allowEditRoomRequest');
});

//owner
Route::get('/owner/register', 'OwnerController@register');
Route::post('/owner/postRegister', 'OwnerController@postRegister')->name('admin.postRegister');
Route::get('/owner/logout', 'OwnerController@logout')->name('owner.logout');
Route::post('/owner/postLogin', 'OwnerController@postLogin')->name('owner.postLogin');
Route::group(['prefix' => 'owner','as' => 'owner.', 'middleware' => ['CheckLoginOwner']], function() {
    Route::get('/','OwnerController@getAllRoom')->name('room.index');
    Route::get('/register', 'OwnerController@register')->name('register');
    Route::post('/postRegister', 'OwnerController@postRegister')->name('postRegister'); // chua lam
    Route::get('/show/{id}', 'OwnerController@showRoomDetail')->name('room.show');
    Route::get('/create', 'OwnerController@viewCreateRoom')->name('room.create');
    Route::post('/postCreate', 'OwnerController@store')->name('room.store');
    Route::get('/edit/{id}', 'OwnerController@viewEditRoom')->name('room.edit');
    Route::post('/postEdit', 'OwnerController@update')->name('room.update');
    Route::post('/extend/{roomId}', 'OwnerController@viewExtend')->name('room.extend');
//    Route::post('/extend/{roomId}', 'OwnerController@viewExtend')->name('room.extend');
    Route::get('/requestEditRoom/{roomId}', 'OwnerController@requestEditRoom')->name('room.requestEdit');
    Route::post('/sendRequestEditRoom', 'OwnerController@sendRequestEditRoom')->name('room.sendRequestEditRoom');
});
