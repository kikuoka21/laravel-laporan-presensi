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

use Illuminate\Http\Request;

Route::get('/', 'HomeController');

Route::get('lihat/perbulan/{id}/{tanggal}', 'perbulan@data');
Route::get('print/perbulan/{id}/{tanggal}', 'perbulan@data2');


Route::post('lihat/perbulan', 'perbulan@carikelas');
Route::get('lihat/perbulan', 'perbulan');

Route::get('lihat/persemester', 'persemester');
Route::post('lihat/persemester', 'persemester@carikelas');


Route::get('lihat/persemester/{id}/{smes}', 'persemester@data');
Route::get('print/persemester/{id}/{smes}', 'persemester@data2');
Route::prefix('auth')
	->group(function () {

		/// auth/login
		Route::get('login', 'LoginController');
		Route::post('login', 'LoginController@StartLogin');

		/// auth/logout
		Route::get('logout', function (\Illuminate\Http\Request $request) {
			$request->session()
				->flush();

			return redirect('auth/login');
		});
	});


//	Route::get('login', 'LoginController');
//	Route::post('login', 'LoginController@StartLogin');

//
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');

