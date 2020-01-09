<?php

use Illuminate\Support\Facades\Route;




///////////////////////// Backend Admin Product /////////////////////////////
Route::group(['prefix' => 'admin', 'namespace' => 'backend', 'middleware' => 'admin'], function () {
    Route::get('post', 'ProductController@index');
    Route::get('post/create', 'ProductController@create');
    Route::post('post/create', 'ProductController@store');
    Route::get('post/{id}/delete', 'ProductController@destroy');
    Route::get('post/{id}/edit', 'ProductController@edit');
    Route::post('post/{id}/edit', 'ProductController@update');
    Route::get('post/{id}/show', 'ProductController@show');
});

///////////////////////// Backend User Product ///////////////////////////////
Route::group(['prefix' => 'user', 'namespace' => 'user', 'middleware' => 'adminuser'], function () {
    /////////////////////// public product /////////////////////////////
    Route::get('product', 'ProductController@index');
    Route::get('product/{id}/show', 'ProductController@show');
    /////////////////////// personal product ///////////////////////////
    Route::get('personalproducts', 'ProductController@personalproducts');
    Route::get('personalproducts/{id}/show', 'ProductController@personalproductshow');
    Route::get('personalproducts/{id}/edit', 'ProductController@edit');
    Route::post('personalproducts/{id}/edit', 'ProductController@update');
    Route::get('personalproduct/create', 'ProductController@create');
    Route::post('personalproduct/create', 'ProductController@store');
    Route::get('personalproduct/{id}/delete','ProductController@destroy');


    ////////////////////// personal user account ////////////////////
    Route::get('personalaccount/{id}/show', 'UserController@show');
    Route::get('personalaccount/{id}/edit', 'UserController@edit');
    Route::post('personalaccount/{id}/edit', 'UserController@update');

    ////////////////////// Wish list //////////////////////////////////
    Route::get('wishlist/{id}', 'WishlistController@add');
    Route::get('mywishlist', 'WishlistController@showall');
    Route::get('mywishlist/{id}/show', 'WishlistController@show');
    Route::get('mywishlist/{id}/delete', 'WishlistController@destroy');

    /////////////////////// Comment //////////////////////////////////
    Route::post('comment/store', 'CommentController@store');
    Route::get('showcomment/{id}', 'CommentController@show');
    Route::get('deletecomment/{id}', 'CommentController@destroy');

    //////////////////////// Search  /////////////////////////////////
    Route::get('search', 'SearchController@search');
    Route::get('searchbyname', 'SearchController@searchbyname');
    Route::get('searchbyprice','SearchController@searchbyprice');
    Route::get('findbrand', 'SearchController@findbrand');
    Route::get('findbrand/{id}', 'SearchController@findbrandid');
    Route::get('showsinglebrand/{id}', 'SearchController@show');
    Route::get('show/city/brand/{id}', 'SearchController@citybrand');
});



///////////////////////// city route /////////////////////////////
Route::group(['prefix' => 'admin', 'namespace' => 'backend', 'middleware' => 'admin'], function () {
    Route::get('city', 'CityController@index');
    Route::get('city/create', 'CityController@create');
    Route::post('city/create', 'CityController@store');
    Route::get('city/{id}/edit', 'CityController@edit');
    Route::post('city/{id}/edit', 'CityController@update');
    Route::get('city/{id}/delete', 'CityController@delete');
});


////////////////////////// category route //////////////////////////
Route::group(['prefix' => 'admin', 'namespace' => 'backend', 'middleware' => 'admin'], function () {
    Route::get('category', 'CategoryController@index');
    Route::get('category/create', 'CategoryController@create');
    Route::post('category/create', 'CategoryController@store');
    Route::get('category/{id}/edit', 'CategoryController@edit');
    Route::post('category/{id}/edit', 'CategoryController@update');
    Route::get('category/{id}/delete', 'CategoryController@destroy');
});


/////////////////////////admin user rout ///////////////////////////////
Route::group(['prefix' => 'admin', 'namespace' => 'backend', 'middleware' => 'admin'], function () {
    Route::get('user', 'UserController@index');
    Route::get('user/{id}/edit', 'UserController@edit');
    Route::post('user/{id}/edit', 'UserController@update');
    Route::get('user/{id}/delete', 'UserController@destroy');
});


/////////////////////// frontend Products /////////////////////////
Route::group(['namespace' => 'frontend'], function () {
    Route::get('/', 'ProductController@index');
    Route::get('post/{id}/show', 'ProductController@show');

    Route::get('searchbyname', 'SearchController@searchbyname');
    Route::get('searchbyprice','SearchController@searchbyprice');
    Route::get('findbrand', 'SearchController@findbrand');
    Route::get('findbrand/{id}', 'SearchController@findbrandid');
    Route::get('showsinglebrand/{id}', 'SearchController@show');
    Route::get('show/city/brand/{id}', 'SearchController@citybrand');
});

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');



// url('home#product')
