<?php

/* Vistor Routes */
Route::get('/', 'HomeController@index');

// User Profile Show Routes
Route::get('/profile/{username}', 'UserController@profile');

// User Pockets Show Routes
Route::get('/pockets/{id}/show', 'PocketController@userShow');
Route::post('/pockets/{id}/show', 'PocketController@pocketAuth');

// Pages
Route::get('/about', 'PageController@about');
Route::get('/contact', 'PageController@contact');
Route::post('/contact', 'ContactController@store');

// Search
Route::post('/search', 'PocketController@search');

Auth::routes();

/* User Routes */
Route::group(['middleware' => 'auth'], function(){
	// Message Routes
	Route::get('/message/create', 'MessageController@create');
	Route::get('/inbox', 'MessageController@index');

	// User Share Routes
	Route::get('/pockets/share', 'ShareController@getShare');
	Route::post('/pockets/share/create', 'ShareController@create');
	Route::post('/pockets/take', 'PocketController@take');
	Route::get('/pockets/delete/share/{id}', 'ShareController@destroy');


	// User Follow Route
	Route::get('/profile/follow/{id}', ['as' => 'follow', 'uses' => 'FollowController@follow']);


	// User Profile Edit Routes
	Route::get('/account', 'UserController@editProfile');
	Route::post('/account', 'UserController@updateAccount');
	Route::post('/account/password', 'UserController@updateUserPass');
	Route::get('/numbers', 'UserController@numbers');

	// User Pockets Routes
	Route::get('/pockets', 'PocketController@mypockets');
	Route::get('/pockets/create', 'PocketController@UserCreate');
	Route::post('/pockets/store', 'PocketController@UserStore');
	Route::PATCH('/pockets/update/{id}', 'PocketController@update');
	Route::get('/pockets/{id}/edit', 'PocketController@userEdit');
	Route::get('/pockets/delete/{id}', 'PocketController@UserTrash');

	// User Links Routes
	Route::get('/links/create', 'LinkController@UserCreate');
	Route::post('/links/store', 'LinkController@UserStore');
	Route::get('/links/{id}/edit', 'LinkController@userEdit');
	Route::PATCH('/links/update/{id}', 'LinkController@userUpdate');
	Route::get('/links/{id}/delete', 'LinkController@userTrash');
	
	
});




/*  Admin Routes */
Route::group(['middleware' => ['web', 'admin']], function (){
	// Datatables Routes
	Route::get('/adminpanel/users/data', ['as' => 'adminpanel.users.data', 'uses' => 'UserController@anyData']);
	Route::get('/adminpanel/pockets/data', ['as' => 'adminpanel.pockets.data', 'uses' => 'PocketController@anyData']);
	Route::get('/adminpanel/links/data', ['as' => 'adminpanel.links.data', 'uses' => 'LinkController@anyData']);
	Route::get('/adminpanel/pages/data', ['as' => 'adminpanel.pages.data', 'uses' => 'PageController@anyData']);
	Route::get('/adminpanel/contacts/data', ['as' => 'adminpanel.contacts.data', 'uses' => 'ContactController@anyData']);
	
	// Trash Routes
	Route::get('/adminpanel/pockets/trash', 'PocketController@showTrash');
	Route::get('/adminpanel/pockets/{id}/restore', 'PocketController@restore');
	Route::get('/adminpanel/pockets/{id}/delete/trash', 'PocketController@destroyTrash');
	Route::get('/adminpanel/pockets/delete/trash/all', 'PocketController@destroyAllTrash');

	Route::get('/adminpanel/links/trash', 'LinkController@showTrash');
	Route::get('/adminpanel/links/{id}/restore', 'LinkController@restore');
	Route::get('/adminpanel/links/{id}/delete/trash', 'LinkController@destroyTrash');
	Route::get('/adminpanel/links/delete/trash/all', 'LinkController@destroyAllTrash');

	// Users Mangement Routes
	Route::resource('/adminpanel/users', 'UserController');
	Route::post('/adminpanel/users/chagepassowrd', 'UserController@updatePassword');
	Route::get('/adminpanel/users/{id}/delete', 'UserController@destroy');

	// Website settings Routes
	Route::get('/adminpanel/settings', 'SiteSettingController@index');
	Route::post('/adminpanel/settings', 'SiteSettingController@store');

	// Pockets Routes
	Route::resource('/adminpanel/pockets', 'PocketController');
	Route::get('/adminpanel/pockets/{id}/delete', 'PocketController@destroy');
	Route::get('/adminpanel/pockets/{id}/trash', 'PocketController@trash');

	// Links Routes
	Route::resource('/adminpanel/links', 'LinkController');
	Route::get('/adminpanel/links/{id}/delete', 'LinkController@destroy');
	Route::get('/adminpanel/links/{id}/show', 'LinkController@show');
	Route::get('/adminpanel/links/{id}/trash', 'LinkController@trash');

	// Pages Routes
	Route::get('/adminpanel/pages', 'PageController@index');
	Route::get('/adminpanel/pages/{id}/edit', 'PageController@edit');
	Route::PATCH('/adminpanel/pages/update', 'PageController@update');

	// Contact Routes
	Route::get('/adminpanel/contacts', 'ContactController@index');
	Route::get('/adminpanel/contacts/{id}/show', 'ContactController@show');
	Route::get('/adminpanel/contacts/{id}/delete', 'ContactController@destroy');

	// Slider Routes
	Route::resource('/adminpanel/sliders', 'SliderController');
	Route::get('/adminpanel/sliders/{id}/delete', 'SliderController@destroy');

	// Website Main Image Routes
	Route::get('/adminpanel/images', 'WebsiteImagesController@index');
	Route::get('/adminpanel/images/{id}/edit', 'WebsiteImagesController@edit');
	Route::post('/adminpanel/images/update', 'WebsiteImagesController@update');

	//Error Page Route
	Route::get('/adminpanel/404', 'AdminController@error');

	// Admin Checked Route
	Route::get('/adminpanel', 'AdminController@index');

});
