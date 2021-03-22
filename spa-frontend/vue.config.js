const Webpack = require("webpack");
module.exports = {
    outputDir: 'dist',
    configureWebpack: {
        devServer: {
            compress: true,
            disableHostCheck: true,
            host: 'my-clusters.local',
            port: '8080'
        }
    }
}