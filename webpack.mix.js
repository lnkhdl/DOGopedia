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
    .postCss('resources/css/main.css', 'public/css', [
        require('tailwindcss')
    ])
    .sass('resources/sass/app.scss', 'public/css')
    .setResourceRoot('/+Projects/PHP/PHP_DOGopedia/DOGopedia/public/');


// TODO: For production, add "extract" and "version" methods.