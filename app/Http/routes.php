<?php


Route::get('foo', 'FooController@foo');

//if yout want to attach middleware to route:
/* Route::get('about', ['middleware' => 'auth', 'uses' => 'PagesController@about']); */
Route::get('about', 'PagesController@about');
Route::get('contact', 'PagesController@contact');

/*
Route::get('articles','ArticlesController@index');
Route::get('articles/create','ArticlesController@create');

Route::get('articles/{id}','ArticlesController@show');

Route::post('articles', 'ArticlesController@store');
Route::get('articles/{id}/edit', 'ArticlesController@edit');
*/

// Make All generate by resource
Route::resource('articles', 'ArticlesController');

Route::controllers([
  'auth' => 'Auth\AuthController',
  'password'=> 'Auth\PasswordController'
]);

Route::auth();

Route::get('home', 'HomeController@index');
