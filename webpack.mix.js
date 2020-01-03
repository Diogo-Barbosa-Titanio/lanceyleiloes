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
mix.js('resources/js/app.js', 'public/js')
   .extract(['jquery', 'bootstrap', 'lodash', 'popper.js','axios','chart.js','datatables.net-bs4','jquery.easing','jquery-mask-plugin']).version();

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
mix.copy('./node_modules/startbootstrap-sb-admin-2/css/sb-admin-2.min.css','public/vendor/startbootstrap-sb-admin-2/css/sb-admin-2.min.css');
mix.copy('./node_modules/startbootstrap-sb-admin-2/js/sb-admin-2.min.js','public/vendor/startbootstrap-sb-admin-2/js/sb-admin-2.min.js');

//Máscaras para formuários
mix.js('resources/js/formulario_mascaras.js', 'public/js');

//Galeria de Imagens
mix.copy('resources/css/slideshow.css', 'public/css');
mix.copy('resources/js/gallery.js', 'public/js');

//jQuery UI
mix.copyDirectory('resources/js/jquery-ui', 'public/vendor/jquery-ui');

// Materialize JS
mix.copy('./node_modules/materialize-css/dist/js/materialize.js', 'public/js');

// Icons - material-design-icons
mix.copyDirectory('./node_modules/material-design-icons/iconfont','public/fonts/material-design-icons/iconfont');

//Sass Bootstrap Utilities Source (Código Sass contendo só algumas partee do Utilities do Boostrap)
mix.sass('resources/sass/bootstrap_utilities/sass/bootstrap_custom_utilities.scss','public/css');

// Sass Materialize CSS Source (Código Sass Materialize personalizado)
mix.sass('resources/sass/materialize-css/sass/materialize.scss','public/css');

//Init - Inicializações do javascript
mix.copy('resources/js/init.js', 'public/js');


