<?php

use App\Routes\Route;
use App\Controllers\HomeController;
use App\Controllers\LivreController;
use App\Controllers\UserController;
use App\Controllers\AuthController;

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/home/edit', 'HomeController@edit');
Route::post('/home/edit', 'HomeController@update');

Route::get('/livres', 'LivreController@index');
Route::get('/livre/show', 'LivreController@show');
Route::get('/livre/create', 'LivreController@create');
Route::post('/livre/create', 'LivreController@store');
Route::get('/livre/edit', 'LivreController@edit');
Route::post('/livre/edit', 'LivreController@update');
Route::get('/livre/delete', 'LivreController@delete');

Route::get('/user/create', 'UserController@create');
Route::post('/user/create', 'UserController@store');

Route::get('/login', 'AuthController@create');
Route::post('/login', 'AuthController@store');
Route::get('/logout', 'AuthController@delete');

Route::get('/log', 'LogController@index');

Route::dispatch();
