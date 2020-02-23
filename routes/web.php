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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/add-lead','LeadController@index')->name('add-lead');

Route::post('/add-lead','LeadController@store')->name('store-lead');

Route::get('/list-lead','LeadController@list')->name('list-lead');

Route::get('/lead-view/{id}','LeadController@show')->name('lead-view');

Route::get('/lead-edit/{id}','LeadController@edit')->name('lead-edit');

Route::post('/lead-update/{id}','LeadController@update')->name('lead-update');

Route::delete('/lead-destroy/{id}','LeadController@destroy')->name('lead-destroy');
