var Encore = require('@symfony/webpack-encore');
var CopyWebpackPlugin = require('copy-webpack-plugin');

Encore
    // directory where all compiled assets will be stored
    .setOutputPath('public/build/')

    // what's the public path to this directory (relative to your project's document root dir)
    .setPublicPath('/build')

    // the public path you will use in Symfony's asset() function - e.g. asset('build/some_file.js')
    .setManifestKeyPrefix('build/')

    // empty the outputPath dir before each build
    .cleanupOutputBeforeBuild()

    // will output as web/build/app.js
    .addEntry('js/main', './assets/js/main.js')
    // .addEntry('js/slider-styles', './assets/js/slider-styles.js')
    // .addEntry('js/slider-scripts', './assets/js/slider-scripts.js')

    .addPlugin(new CopyWebpackPlugin([
        {from: './assets/css', to: 'css'},
        {from: './assets/fonts', to: 'fonts'},
        {from: './assets/images', to: 'images'},
        {from: './assets/js', to: 'js'},
        {from: './assets/plugins', to: 'plugins'}
    ]))

    // will output as web/build/global.css
    .addStyleEntry('css/main', './assets/sass/main.scss')

    // allow sass/scss files to be processed
    .enableSassLoader()

    // allow legacy applications to use $/jQuery as a global variable
    .autoProvidejQuery()

    // create hashed filenames (e.g. app.abc123.css)
    .enableVersioning(Encore.isProduction())
    .enableSourceMaps(!Encore.isProduction())
;

// export the final configuration
module.exports = Encore.getWebpackConfig();