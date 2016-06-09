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


   mix.sass('app.scss');

    mix.styles([
      'vendor/normalize.css',
      'app.css'
    ], null, 'public/css');

    /*first argument is the files that want to be merge
      second argument is the output directory/filename
      third argument is the input directory */

      mix.version('public/css/all.css');
});
