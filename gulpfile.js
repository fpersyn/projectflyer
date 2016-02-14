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
    mix.sass('app.scss')
        .scripts([
            './node_modules/sweetalert/dist/sweetalert-dev.js'
        ], './public/js/libs.js')
        .styles([
         './node_modules/sweetalert/dist/sweetalert.css'
        ], './public/css/libs.css');
});
