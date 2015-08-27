<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('template/front/pages/homepage');
});


Route::post('/api/add-person', 'AddPersonController@postAction');

Route::get('/api/peoples', 'PeoplesController@apiGetAction');

//Route::resource('people', 'PeopleController');
Route::get('/api/peoples/{id}', 'PeoplesController@dashboard');
Route::get('/api/dashboard', 'DashboardController@apiGetAction');



Route::get('/add-person', 'AddPersonController@getAction');
Route::get('/dashboard', 'DashboardController@getAction');
Route::get('/peoples/{id}', 'PeoplesController@feDashboard');


Route::get('/search2', function () {
    //return view('welcome');
    return view('template/front/pages/search2');
});