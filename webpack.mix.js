const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);

mix.js('node_modules/@coreui/chartjs/dist/js/coreui-chartjs.bundle.js', 'public/js/coreui')
    .js('node_modules/@coreui/utils/dist/coreui-utils.js', 'public/js/coreui')
    .js('node_modules/@coreui/icons/js/svgxuse.min.js', 'public/js/coreui')
    .js('node_modules/@coreui/coreui/dist/js/coreui.bundle.min.js', 'public/js/coreui')
    .postCss('node_modules/@coreui/chartjs/dist/css/coreui-chartjs.css', 'public/css/coreui');


     


    




    