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

// Bootstrap JS
mix.js('resources/js/app.js', 'public/js').version();

// Bootstrap SCSS
mix.sass('resources/sass/app.scss', 'public/css');
mix.sass('resources/sass/style.scss', 'public/css');

// ChartJS
mix.copyDirectory('./node_modules/chart.js/dist/*.css','public/vendor/chart_js');

// dataTables
mix.copyDirectory('./node_modules/datatables.net-bs4/css/*.css','public/vendor/datatables');

// Font Awesome
mix.copy('./node_modules/@fortawesome/fontawesome-free/css/all.min.css','public/vendor/fontawesome-free/css');
mix.copyDirectory('./node_modules/@fortawesome/fontawesome-free/webfonts/*','public/vendor/fontawesome-free/webfonts');

// SB Admin 2
mix.copy('./node_modules/startbootstrap-sb-admin-2/css/sb-admin-2.min.css','public/css');
mix.copy('./node_modules/startbootstrap-sb-admin-2/js/sb-admin-2.min.js','public/js');

//Máscaras para formuários
mix.js('resources/js/formulario_mascaras.js', 'public/js');
