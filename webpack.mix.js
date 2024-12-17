const mix = require("laravel-mix");

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

mix.js("resources/js/app.js", "public/js")
    .postCss("resources/css/app.css", "public/css", [
        //
    ])
    .sass("resources/sass/app.scss", "public/css")
    .browserSync({
        proxy: "http://127.0.0.1:8000", // Ganti dengan URL lokal aplikasi Anda, misalnya http://127.0.0.1:8000 jika menggunakan `php artisan serve`
        files: [
            "public/**/*.(css|js)",
            "resources/views/**/*.blade.php", // Tambahkan ini untuk memantau perubahan file blade
            "resources/**/*.html", // Tambahkan ini untuk memantau perubahan file HTML
        ],
    });
