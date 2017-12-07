<?php
use Illuminate\Support\Facades\Redirect;
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

// Landingpage
Route::get('/', function () {

	if(Auth::check()){
		return redirect::route('home');
	}
   return view('welcome');

})->name('welcome');


// Authentification Routing
Auth::routes();

// Home
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/pdf', 'MarinaController@printPDF')->name('pdf');


// Marina
Route::resource('marina', 'MarinaController');

