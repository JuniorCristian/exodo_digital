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

mix
    //.styles('resources/vendor/fontawesome-free/css/all.min.css', 'public/css/plugins/fontawesome.min.css')
    .sass('resources/scss/fontawesome.scss', 'public/css/plugins/fontawesome.min.css')
    .sass('resources/scss/sb-admin-2.scss', 'public/css/sb-admin-2.min.css').version()
    .scripts('node_modules/bootstrap/dist/js/bootstrap.bundle.js', 'public/js/plugins/bootstrap.bundle.js')
    .scripts('node_modules/jquery/dist/jquery.js', 'public/js/plugins/jquery.min.js')
    .scripts('node_modules/jquery-mask-plugin/dist/jquery.mask.js', 'public/js/plugins/jquery.mask.min.js')
    .scripts('resources/vendor/jquery-easing/jquery.easing.js', 'public/js/plugins/jquery.easing.min.js')
    .scripts('resources/js/sb-admin-2.js', 'public/js/sb-admin-2.min.js')
    .scripts('node_modules/quill/dist/quill.js', 'public/js/plugins/quill.min.js')
    .styles(['node_modules/quill/dist/quill.bubble.css', 'node_modules/quill/dist/quill.snow.css'], 'public/css/plugins/quill.min.css')
    .scripts('node_modules/cropper/dist/cropper.js', 'public/js/plugins/cropper.min.js')
    .styles('node_modules/cropper/dist/cropper.css', 'public/css/plugins/cropper.min.css')
    .scripts('node_modules/sweetalert2/dist/sweetalert2.js', 'public/js/plugins/sweetalert2.min.js')
    .styles('node_modules/sweetalert2/dist/sweetalert2.css', 'public/css/plugins/sweetalert2.min.css')
    .scripts(['resources/vendor/datatables/dataTables.bootstrap4.js', 'resources/vendor/datatables/jquery.dataTables.js'], 'public/js/plugins/datatables.min.js')
    .scripts('node_modules/datatables.net-responsive/js/dataTables.responsive.js', 'public/js/plugins/datatables.responsive.min.js')
    .styles('resources/lib/lightbox/css/lightbox.css', 'public/css/plugin/lightbox.min.css').version()
    .scripts('resources/js/main.js', 'public/js/script.min.js').version()
    .styles('resources/css/style.css', 'public/css/style.min.css').version()
    .scripts('resources/lib/easing/easing.js', 'public/js/plugins/easing.min.js')
    .scripts('node_modules/wowjs/dist/wow.js', 'public/js/plugins/wow.min.js')
    .scripts('node_modules/typed.js/lib/typed.js', 'public/js/plugins/typed.min.js')
    .scripts('node_modules/owl.carousel/dist/owl.carousel.js', 'public/js/plugins/owl.carousel.min.js')
    .styles('node_modules/owl.carousel/dist/assets/owl.carousel.css', 'public/css/plugins/owl.carousel.min.css')
    .styles('node_modules/animate.css/animate.css', 'public/css/plugins/animate.min.css')
    .sourceMaps();
