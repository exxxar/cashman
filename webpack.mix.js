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
mix.copyDirectory('resources/assets/img', 'public/assets');
mix.copyDirectory('resources/assets/landing-img', 'public/assets/landing-img');
mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/base.js', 'public/js/base.js')
    .js('resources/js/landing/landing.js', 'public/js/landing.js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/landingStyles/landing-app.scss', 'public/css');
