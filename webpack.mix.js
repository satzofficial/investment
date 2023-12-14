import { EnvironmentPlugin } from "webpack";
import {
    options as _options,
    webpackConfig,
    sass,
    js,
    copy,
    scripts,
    version,
    browserSync,
} from "laravel-mix";
import { sync } from "glob";
import { join } from "path";

/*
 |--------------------------------------------------------------------------
 | Configure mix
 |--------------------------------------------------------------------------
 */

_options({
    resourceRoot: process.env.ASSET_URL || undefined,
    processCssUrls: false,
    postCss: [require("autoprefixer")],
});

/*
 |--------------------------------------------------------------------------
 | Configure Webpack
 |--------------------------------------------------------------------------
 */

webpackConfig({
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
                    join(__dirname, "node_modules/bootstrap/"),
                    join(__dirname, "node_modules/popper.js/"),
                    join(__dirname, "node_modules/shepherd.js/"),
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
    (sync("resources/assets/" + query) || []).forEach((f) => {
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
mixAssetsDir("vendor/scss/**/!(_)*.scss", (src, dest) =>
    sass(
        src,
        dest
            .replace(/(\\|\/)scss(\\|\/)/, "$1css$2")
            .replace(/\.scss$/, ".css"),
        { sassOptions }
    )
);

// Core javascripts
mixAssetsDir("vendor/js/**/*.js", (src, dest) => js(src, dest));

// Libs
mixAssetsDir("vendor/libs/**/*.js", (src, dest) => js(src, dest));
mixAssetsDir("vendor/libs/**/!(_)*.scss", (src, dest) =>
    sass(src, dest.replace(/\.scss$/, ".css"), { sassOptions })
);
mixAssetsDir("vendor/libs/**/*.{png,jpg,jpeg,gif}", (src, dest) =>
    copy(src, dest)
);

// Img
mixAssetsDir("assets/img/*/*", (src, dest) => copy(src, dest));

// Plugin
mixAssetsDir("plugins/*/*", (src, dest) => copy(src, dest));

// Fonts
mixAssetsDir("assets/fonts/*/*", (src, dest) => copy(src, dest));
mixAssetsDir("assets/fonts/!(_)*.scss", (src, dest) =>
    sass(
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

mixAssetsDir("js/**/*.js", (src, dest) => scripts(src, dest));
mixAssetsDir("css/**/*.css", (src, dest) => copy(src, dest));

// copy("node_modules/boxicons/fonts/*", "public/assets/vendor/fonts/boxicons");

version();

js("resources/js/app.js", "public/js")
    .sass("resources/sass/app.scss", "public/css")
    .setResourceRoot("/public")
    .setPublicPath("public");

webpackConfig({
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

browserSync("http://127.0.0.1:8000/");
// mix.browserSync({
//   proxy: 'http://127.0.0.1:8000/',
//   files: ['app/**/*.php', 'resources/views/**/*.php', 'public/js/**/*.js', 'public/css/**/*.css'],
//   ui: false // Disable BrowserSync UI overlay
// });
