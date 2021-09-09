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
    .js('resources/js/administracion/app.js', 'public/js/Administracion')
    .js('resources/js/documentos/app.js', 'public/js/Documentos')
    .js('resources/js/indicadores/app.js', 'public/js/Indicadores')
    .js('resources/js/riesgos/app.js', 'public/js/Riesgos')
    .js('resources/js/planes/app.js', 'public/js/Planes')
    .js('resources/js/mejoras/app.js', 'public/js/Mejoras')
    .js('resources/js/bsc/app.js', 'public/js/BSC')
    .vue();
    //.sass('resources/sass/app.scss', 'public/css');
