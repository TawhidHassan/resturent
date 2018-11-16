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

Route::get('/','HomeController@index')->name('font');
Route::post('/reservation','ReservationController@reserv')->name('resaervation');
Route::post('/contect','ContectController@sentmassage')->name('contect.sentmassage');
Auth::routes();

Route::group(['prefix'=>'admin','middleware'=>'auth','namespace'=>'admin'],function(){

	Route::get('backend', 'DashbordController@index')->name('admin.backend');
	Route::resource('slider','SliderController');
	Route::resource('category','CategoryController');
	Route::resource('item','ItemController');
	Route::get('/reservation','AreservationController@index')->name('reservation.index');
	Route::post('/reservation/{id}','AreservationController@statas')->name('resaervation.statas');
	Route::delete('/reservation/{id}','AreservationController@destroy')->name('resaervation.destroy');
	Route::get('acontect','AcontectComntroller@index')->name('acontect.index');
	Route::get('acontect/{id}','AcontectComntroller@details')->name('acontect.details');
	Route::delete('deletec/{id}','AcontectComntroller@delete')->name('deletec.details');
});