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

Route::get('/', 'HomeController');

Route::get('lihat/perhari/{id}/{tanggal}', 'perhari@data');
Route::post('lihat/perhari', 'perhari@carikelas');
Route::get('lihat/perhari', 'perhari');

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

