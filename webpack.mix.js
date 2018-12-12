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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');


//Compilando arquivos css
mix.styles([
    'node_modules/bootstrap/dist/css/bootstrap.min.css',
    'node_modules/datatables.net-dt/css/jquery.dataTables.min.css'
], 'public/css/all.css');


//Compilando arquivos js
mix.scripts([
	'node_modules/jquery/dist/jquery.min.js',
	'node_modules/bootstrap/dist/js/bootstrap.min.js',
	'node_modules/datatables.net/js/jquery.dataTables.min.js',
	'node_modules/datatables.net-dt/js/dataTables.dataTables.min.js',
	'resources/assets/js/Chart.min.js',
	'resources/assets/js/config-datatables.js',
	'resources/assets/js/ajax-modal-pib.js',
	'resources/assets/js/graficos.js'
], 'public/js/all.js');