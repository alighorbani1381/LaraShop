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

/* Combinng CSS Panel Admin */
mix.combine([
    'resources/assets/CSS-PanelAdmin/bootstrap.min.css',
    'resources/assets/CSS-PanelAdmin/bootstrap-reset.css',
], "public/css/PanelAdminBootStrap.css")

mix.combine([
    'resources/assets/CSS-PanelAdmin/style.css',
    'resources/assets/CSS-PanelAdmin/style-responsive.css',
], "public/css/PanelAdmin.css")

/* Combinng Js Panel Admin */
mix.combine([
    'resources/assets/JS-PanelAdmin/bootstrap.min.js',
    'resources/assets/JS-PanelAdmin/common-scripts.js',//DropDown Required
    'resources/assets/JS-PanelAdmin/jquery-ui-1.9.2.custom.min.js',
    'resources/assets/JS-PanelAdmin/bootstrap-switch.js',
], "public/js/PanelAdmin.js")

/* Login Page CSS */
/*
mix.combine([
    'resources/assets/CSS-PanelAdmin/bootstrap.min.css',
    'resources/assets/CSS-Login/vendor/animate/animate.css',
    'resources/assets/CSS-Login/vendor/css-hamburgers/hamburgers.min.css',
    'resources/assets/CSS-Login/vendor/animsition/css/animsition.min.css',
    'resources/assets/CSS-Login/vendor/select2/select2.min.css',
    'resources/assets/CSS-Login/vendor/daterangepicker/daterangepicker.css',
    'resources/assets/CSS-Login/css/util.css',
    'resources/assets/CSS-Login/css/main.css',
], "public/css/LoginPage.css")
*/

/* Login Page JS */
/*
mix.combine([
    'resources/assets/CSS-Login/vendor/jquery/jquery-3.2.1.min.js',
    'resources/assets/CSS-Login/vendor/animsition/js/animsition.min.js',
    'resources/assets/CSS-Login/vendor/bootstrap/js/popper.js',
    'resources/assets/CSS-Login/vendor/bootstrap/js/bootstrap.min.js',
    'resources/assets/CSS-Login/vendor/select2/select2.min.js',
    'resources/assets/CSS-Login/vendor/daterangepicker/moment.min.js',
    'resources/assets/CSS-Login/vendor/daterangepicker/daterangepicker.js',
    'resources/assets/CSS-Login/vendor/countdowntime/countdowntime.js',
    'resources/assets/CSS-Login/js/main.js',
], "public/js/LoginPage.js")
*/
