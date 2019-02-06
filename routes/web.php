<?php

Route::get('/', 'FrontendPagesController@index');
Route::get('/home', 'FrontendPagesController@index');

Route::get('/category-wise/{catID}', 'FrontendPagesController@category_wise_product');
Route::get('/brand-wise/{brandID}', 'FrontendPagesController@brand_wise_product');
Route::get('/product-details/{productID}', 'FrontendPagesController@product_details');

Route::get('/shop', function(){ return view('products'); });
Route::get('/contact', function(){ return view('contact_us'); });


// Cart
Route::get('/cart', 'CartController@index');
Route::post('/add-to-cart', 'CartController@add_to_cart');
Route::get('/remove-from-cart/{rowID}', 'CartController@remove_from_cart');
Route::put('/update-cart/{rowID}', 'CartController@update_cart');

// Checkout
Route::get('/checkout', 'CheckoutController@index');
Route::post('/checkout', 'CheckoutController@checkoutPost')->name('checkout.post');
Route::get('/checkoutPayment', function(){ return view('checkoutPayment'); });




//       Customer Authentication Routes
//-----------------------------------------------
Route::get('/customer/login', 'Auth\CustomerAuthController@showCustomerLoginForm')->name('customer-login');
Route::post('/customer/login', 'Auth\CustomerAuthController@customerLogin');
Route::get('/customer/logout', 'Auth\CustomerAuthController@customerLogout')->name('customer-logout');

// Registration Routes...
Route::get('/customer/register', 'Auth\CustomerAuthController@showCustomerLoginForm')->name('customer-register');
Route::post('/customer/register', 'Auth\CustomerAuthController@registerCustomer');



//=============================================
//              Admin Routes
//=============================================

Auth::routes();



Route::get('/admin', 'DashboardController@index');
Route::get('/dashboard', 'DashboardController@index');
Route::get('/dashboard/charts', 'DashboardController@charts');
Route::get('/dashboard/tables', 'DashboardController@tables');


Route::resource('users', 'UserController');
Route::resource('roles', 'RoleController');
Route::resource('permissions', 'PermissionController');


// Category CRUD
Route::resource('category', 'CategoryController');
// Brand CRUD
Route::resource('brand', 'BrandController');
// Product CRUD
Route::resource('product', 'ProductController');
// Slider CRUD
Route::resource('slider', 'SliderController');


