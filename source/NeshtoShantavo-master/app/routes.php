<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// home page
Route::get('/', 'HomeController@getHome');
Route::get('/contacts', 'HomeController@getContacts');
Route::post('/contacts', 'HomeController@postContacts');
Route::get('/about', 'HomeController@getAbout');
Route::get('/team', 'HomeController@getTeam');
Route::get('/rules', 'HomeController@getRules');
Route::get('/terms', 'HomeController@getTerms');
Route::get('/privacy', 'HomeController@getPrivacy');
Route::get('/sitemap', 'HomeController@getSitemap');
Route::get('/feed', 'HomeController@getFeed');

// user routes
Route::get('/user/register', 'UserController@getRegister');
Route::post('/user/register', 'UserController@postRegister');
Route::get('/user/login', 'UserController@getLogin');
Route::post('/user/login', 'UserController@postLogin');
Route::get('/user/logout', 'UserController@getLogout');
Route::get('/user/profile', 'UserController@getProfile');
Route::get('/user/albums', 'UserController@getAlbums');
Route::get('/user/edit/{id}', 'UserController@getEdit');
Route::post('/user/edit/{id}', 'UserController@postEdit');
Route::get('/user/{username}', 'UserController@getPublicProfile');

// category routes
Route::get('/category/edit/{id}', 'CategoryController@getUpdate');
Route::post('/category/edit/{id}', 'CategoryController@postUpdate');
Route::get('/category/add', 'CategoryController@getCreate');
Route::post('/category/add', 'CategoryController@postCreate');
Route::post('/category/delete', 'CategoryController@postDelete');
Route::get('/category/new', 'CategoryController@getNew');
Route::get('/category/{slug}', 'CategoryController@getView');

// album routes
Route::get('/album/{id}', 'AlbumController@getView');
Route::get('/album/add', 'AlbumController@getCreate');
Route::post('/album/add', 'AlbumController@postCreate');
Route::get('/album/edit/{id}', 'AlbumController@getUpdate');
Route::post('/album/edit/{id}', 'AlbumController@postUpdate');
Route::post('/album/delete', 'AlbumController@postDelete');

// picture routes (upload,rename,move,crop,caption etc)
Route::get('/picture/edit/{id}', 'PictureController@getUpdate');
Route::post('/picture/edit/{id}', 'PictureController@postUpdate');
Route::post('/picture/delete', 'PictureController@postDelete');
Route::get('/picture/upload', 'PictureController@getCreate');
Route::post('/picture/upload', 'PictureController@postCreate');
Route::post('/picture/vote', 'PictureController@postVote');
Route::get('/picture/{id}', 'PictureController@getView');

// admin routes (admin panel etc.)
Route::get('/admin', 'AdminController@getIndex');

// TODO
// comment routes (disqus API - db sync, get comments count)