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
    return view('welcome');
});

// Auth::routes();
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

Route::middleware(['auth'])->group(function() {
	// Registration Routes...
	$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
	$this->post('register', 'Auth\RegisterController@register');

	// Password Reset Routes...
	$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
	$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
	$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
	$this->post('password/reset', 'Auth\ResetPasswordController@reset');

	//===============================ADD PRODUCT===============================//

	// Route::get('/add-products', function () {
	//     return view('add-products');
	// });
	Route::get('/add-products', 'Products\AddProductsController@index')->name('add-products');

	Route::post('/add-products-data', 'Products\AddProductsController@addProductsData');


	//===============================ADD PRODUCT===============================//


	//===============================LIST PRODUCT===============================//

	Route::get('/list-products', 'Products\ListProductsController@index')->name('list-products');

	Route::post('list-products-data', 'Products\ListProductsController@listProductsData')->name('list-products-data');

	Route::post('delete-product-data', 'Products\ListProductsController@deleteProductData');

	Route::post('modify-product-data', 'Products\ListProductsController@modifyProductData');

	//===============================LIST PRODUCT===============================//

	//===============================ADD BILL===============================//

	Route::get('/add-bill', 'Billing\AddBillController@index')->name('add-bill');

	Route::post('get-data-product-search', 'Billing\AddBillController@getDataProductSearch');

	Route::post('add-bill-data', 'Billing\AddBillController@addBillData');

	Route::get('make-pdf', 'Billing\AddBillController@makePDF');

	//===============================ADD BILL===============================//


	//===============================LIST BILL===============================//

	Route::get('/list-bill', 'Billing\ListBillController@index')->name('list-bill');

	Route::post('list-bill-data', 'Billing\ListBillController@listBillData')->name('list-bill-data');

	Route::post('delete-bill-data', 'Billing\ListBillController@deleteBillData');

	// Route::post('list-bill-products-data', 'Billing\ListBillController@listBillProductsData');

	Route::get('list-pdf-data', 'Billing\ListBillController@listPdfData');

	//===============================LIST BILL===============================//


	//===============================LOGIN===============================//
	// Route::get('/login', 'Billing\ListBillController@index');
	Route::get('/login-urbane', function () {
	    return view('login');
	});
	//===============================LOGIN===============================//
	// Route::get('/list-products', function () {
	//     return view('list-products');
	// });


	Route::get('/home', 'HomeController@index')->name('home');


	//===============================INFO===============================//

	Route::get('/info', 'InfoController@index')->name('info');	

	//===============================INFO===============================//

});
