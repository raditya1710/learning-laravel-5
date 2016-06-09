var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {


   mix.sass('app.scss', 'resources/css');

   mix.styles([
      'libs/bootstrap.min.css',
      'app.css',
      'libs/select2.min.css'
  ], null, 'resources/css');

    /*first argument is the files that want to be merge
      second argument is the output directory/filename
      third argument is the input directory */

    mix.scripts([
        'libs/jquery.js',
        'libs/select2.min.js',
        'libs/bootstrap.min.js'
    ], null, 'resources/js');
});
