const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
<<<<<<< HEAD
.js('resources/js/frontend.js' , 'public/js')
=======
.sass("resources/sass/backend.scss", 'public/css')
>>>>>>> 44ed8e7a0413bbb8d7d6337cb4f312f4fe555900
    .sass('resources/sass/app.scss', 'public/css');
