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

// @ts-ignore
mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/chart/statistic.js', 'public/js')
    .js('resources/js/frontend.js', 'public/js')
    .sass("resources/sass/backend.scss", 'public/css')
    .sass('resources/sass/app.scss', 'public/css');
