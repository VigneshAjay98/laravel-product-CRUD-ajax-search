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

Route::get('/', function(){
	return redirect()->route('login');
});

Route::group(['prefix'=>''], function()
{  
	Route::group(['namespace'=>'User'], function()
    {

    	Route::get('/register', 'RegisterController@register');
		Route::post('/register/store', 'RegisterController@store');

		Route::get('/login', 'LoginController@index')->name('login');
		Route::post('/login/submit', 'LoginController@login');
		Route::get('/logout', 'LoginController@logout');

		Route::resource('products', ProductController::class);
		Route::resource('users', UserController::class);

		// Ajax calls

		// Route::post('products/activate/{id}', 'AjaxController@activate');
		// Route::post('products/deactivate/{id}', 'AjaxController@deactivate');

		Route::get('/product_name', 'AjaxController@product');
		Route::get('/customer_name', 'AjaxController@customer');
		Route::get('/category', 'AjaxController@category');
		Route::get('/live_search', 'AjaxController@live_search');

	});
});