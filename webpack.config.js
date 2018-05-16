var Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('web/build/')
    .setPublicPath('/web')
    .addEntry('global', './assets/scss/global.scss')
    .addEntry('main', './assets/js/main.js')
    .addEntry('favicon', './assets/images/favicon.ico')
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSassLoader()
    .autoProvidejQuery()
    .enableSassLoader(function(sassOptions) {}, {
        resolveUrlLoader: false
    });

module.exports = Encore.getWebpackConfig();