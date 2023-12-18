const { EnvironmentPlugin } = require("webpack");
const mix = require("laravel-mix");
const glob = require("glob");
const path = require("path");

/*
 |--------------------------------------------------------------------------
 | Configure mix
 |--------------------------------------------------------------------------
 */

mix.options({
    resourceRoot: process.env.ASSET_URL || undefined,
    processCssUrls: false,
    postCss: [require("autoprefixer")],
});

/*
 |--------------------------------------------------------------------------
 | Configure Webpack
 |--------------------------------------------------------------------------
 */

mix.webpackConfig({
    output: {
        publicPath: process.env.ASSET_URL || undefined,
        libraryTarget: "umd",
    },

    plugins: [
        new EnvironmentPlugin({
            // Application's public url
            BASE_URL: process.env.ASSET_URL ? `${process.env.ASSET_URL}/` : "/",
        }),
    ],
    module: {
        rules: [
            {
                test: /\.es6$|\.js$/,
                include: [
                    path.join(__dirname, "node_modules/bootstrap/"),
                    path.join(__dirname, "node_modules/popper.js/"),
                    path.join(__dirname, "node_modules/shepherd.js/"),
                ],
                loader: "babel-loader",
                options: {
                    presets: [
                        [
                            "@babel/preset-env",
                            { targets: "last 2 versions, ie >= 10" },
                        ],
                    ],
                    plugins: [
                        "@babel/plugin-transform-destructuring",
                        "@babel/plugin-proposal-object-rest-spread",
                        "@babel/plugin-transform-template-literals",
                    ],
                    babelrc: false,
                },
            },
        ],
    },
    externals: {
        jquery: "jQuery",
        moment: "moment",
        jsdom: "jsdom",
        velocity: "Velocity",
        hammer: "Hammer",
        pace: '"pace-progress"',
        chartist: "Chartist",
        "popper.js": "Popper",

        // blueimp-gallery plugin
        "./blueimp-helper": "jQuery",
        "./blueimp-gallery": "blueimpGallery",
        "./blueimp-gallery-video": "blueimpGallery",
    },
});

/*
 |--------------------------------------------------------------------------
 | Vendor assets
 |--------------------------------------------------------------------------
 */

function mixAssetsDir(query, cb) {
    (glob.sync("resources/assets/" + query) || []).forEach((f) => {
        f = f.replace(/[\\\/]+/g, "/");
        cb(f, f.replace("resources/assets/", "public/assets/"));
    });
}

/*
 |--------------------------------------------------------------------------
 | Configure sass
 |--------------------------------------------------------------------------
 */

const sassOptions = {
    precision: 5,
};

// Core stylesheets
// mixAssetsDir("vendor/scss/**/!(_)*.scss", (src, dest) =>
//     mix.sass(
//         src,
//         dest
//             .replace(/(\\|\/)scss(\\|\/)/, "$1css$2")
//             .replace(/\.scss$/, ".css"),
//         { sassOptions }
//     )
// );

// Core javascripts
// mixAssetsDir("vendor/js/**/*.js", (src, dest) => mix.js(src, dest));

// Libs
// mixAssetsDir("vendor/libs/**/*.js", (src, dest) => mix.js(src, dest));
// mixAssetsDir("vendor/libs/**/!(_)*.scss", (src, dest) =>
//     mix.sass(src, dest.replace(/\.scss$/, ".css"), { sassOptions })
// );
// mixAssetsDir("vendor/libs/**/*.{png,jpg,jpeg,gif}", (src, dest) =>
//     mix.copy(src, dest)
// );

// Img
mixAssetsDir("assets/img/*/*", (src, dest) => mix.copy(src, dest));

// Plugin
mixAssetsDir("assets/plugins/*/*", (src, dest) => mix.copy(src, dest));

// Fonts
mixAssetsDir("fonts/*/*", (src, dest) => mix.copy(src, dest));
mixAssetsDir("fonts/!(_)*.scss", (src, dest) =>
    mix.sass(
        src,
        dest
            .replace(/(\\|\/)scss(\\|\/)/, "$1css$2")
            .replace(/\.scss$/, ".css"),
        { sassOptions }
    )
);

/*
 |--------------------------------------------------------------------------
 | Application assets
 |--------------------------------------------------------------------------
 */

mixAssetsDir("js/**/*.js", (src, dest) => mix.scripts(src, dest));
mixAssetsDir("css/**/*.css", (src, dest) => mix.copy(src, dest));

// mix.copy(
//     "node_modules/boxicons/fonts/*",
//     "public/assets/vendor/fonts/boxicons"
// );

mix.version();

// mix.js("resources/assets/js/script.js", "public/js");
// mix.js("resources/assets/js/bootstrap.bundle.min.js", "public/js");
// mix.js("resources/assets/js/script.js", "public/js");
// mix.js("resources/assets/js/script.js", "public/js");
// mix.js("resources/assets/js/script.js", "public/js");
// mix.js("resources/assets/js/script.js", "public/js");

mix.js(
    [
        // "resources/assets/js/jquery-3.7.1.min.js",
        // "resources/assets/js/bootstrap.bundle.min.js",
        // "resources/assets/js/feather.min.js",
        // "resources/assets/plugins/slimscroll/jquery.slimscroll.min.js",
        // "resources/assets/plugins/select2/js/select2.min.js",
        "resources/js/app.js",
    ],
    "public/js"
)
    .autoload({
        jquery: ["$", "window.jQuery"],
        Jquery: ["$", "window.jQuery"],
    })
    .styles(
        [
            // "resources/assets/css/bootstrap.min.css",
            // "resources/assets/plugins/fontawesome/css/fontawesome.min.css",
            // "resources/assets/plugins/fontawesome/css/all.min.css",
            // "resources/assets/plugins/feather/feather.css",
            // "resources/assets/css/bootstrap-datetimepicker.min.css",
            // "resources/assets/plugins/select2/css/select2.min.css",
            // "resources/assets/plugins/intlTelInput/css/intlTelInput.css",
            "resources/assets/css/style.css",
            "resources/assets/css/toastr.css",
            // other stylesheets
        ],
        "public/css/all.css"
    )
    // .sass("resources/sass/app.scss", "public/css")
    .setResourceRoot("/public")
    .setPublicPath("public");

mix.webpackConfig({
    resolve: {
        extensions: [".js", ".vue", ".json"],
        alias: {
            "@": __dirname + "/resources/js",
        },
    },
});

/*
 |--------------------------------------------------------------------------
 | Browsersync Reloading
 |--------------------------------------------------------------------------
 |
 | BrowserSync can automatically monitor your files for changes, and inject your changes into the browser without requiring a manual refresh.
 | You may enable support for this by calling the mix.browserSync() method:
 | Make Sure to run `php artisan serve` and `yarn watch` command to run Browser Sync functionality
 | Refer official documentation for more information: https://laravel.com/docs/10.x/mix#browsersync-reloading
 */

mix.browserSync("http://127.0.0.1:8000/");
// mix.browserSync({
//   proxy: 'http://127.0.0.1:8000/',
//   files: ['app/**/*.php', 'resources/views/**/*.php', 'public/js/**/*.js', 'public/css/**/*.css'],
//   ui: false // Disable BrowserSync UI overlay
// });
