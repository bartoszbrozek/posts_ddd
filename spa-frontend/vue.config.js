const Webpack = require("webpack");
module.exports = {
    outputDir: 'dist',
    configureWebpack: {
        devServer: {
            compress: true,
            disableHostCheck: true,
        }
    }
}