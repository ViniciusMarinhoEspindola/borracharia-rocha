const mix = require("laravel-mix");
const minifier = require("minifier");

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

mix.js("resources/assets/js/app.js", "public/js")
    .js("resources/assets/js/admin/app.js", "public/js/admin")
    .sass("resources/assets/sass/app.scss", "public/css")
    .sass("resources/assets/sass/datepicker.scss", "public/css")
    .sass("resources/assets/sass/admin/app.scss", "public/css/admin")
    .options({
        postCss: [
            require("autoprefixer")({
                grid: true,
            }),
        ],
        processCssUrls: false,
    });

mix.then(() => {
    minifier.minify("public/css/app.css");
    minifier.minify("public/css/admin/app.css");
});
