let mix = require('laravel-mix');

mix.browserSync({proxy: 'soul-plug.test'});

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


mix.scripts([
    'resources/assets/js/jquery-ui.min.js'
], 'public/js/all.js').sourceMaps();

mix.styles([
    'resources/assets/sass/jquery-ui.min.css',
    'resources/assets/sass/jquery-ui.structure.min.css',
    'resources/assets/sass/jquery-ui.theme.min.css'
], 'public/css/all.css');

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/custom.sass', 'public/css');
