let mix = require('laravel-mix');

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

mix.js('resources/assets/js/admin.js', 'public/js')
    .sass('resources/assets/sass/admin.scss', 'public/css')
    .sass('resources/assets/sass/drag-drop.scss', 'public/css')
    .copy('node_modules/font-awesome/fonts', 'public/fonts')
    .sourceMaps();

// mix.browserSync('localhost:8000');
mix.browserSync('website-admin.br');
