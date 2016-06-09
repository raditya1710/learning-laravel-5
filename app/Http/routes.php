<?php


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

Route::get('foo', ['middleware' => 'manager', function(){
  return 'this page may only be viewed by manager';
}]);
