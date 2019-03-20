/**
 * Defy Ma
 * defyma.com
 */
/*jshint esversion: 6 */
/*jshint ignore:start*/
var webpack = require('webpack');
const CleanWebpackPlugin = require('clean-webpack-plugin');
var argv = require('yargs').argv;
const path = require('path');
var glob = require('glob');
var PACKAGE = require('./package.json');
const fs = require('fs');

var banner = "yii2-react-basic by @defyma | defyma.com";

console.log('\x1Bc');
console.log("\t+---------------------------+");
console.log("\t|  script build yii2-react  |");
console.log("\t|        By Defy Ma         |");
console.log("\t|        defyma.com         |");
console.log("\t+---------------------------+");
console.log("\n");

var entryObject = glob.sync('./react/**/*.main.js').reduce(
    function (entries, entry) {

        var matchForRename = /^\.\/react\/([\w\d_]+\/[\w\d_]+)\/[\w\d_]+\.main\.js$/g.exec(entry);
        if (matchForRename !== null && typeof matchForRename[1] !== 'undefined') {
            entries[matchForRename[1]] = entry;
        }

        var matchModules = /^\.\/react\/([\w\d_]+\/[\w\d_]+\/[\w\d_]+\/[\w\d_]+)\/[\w\d_]+\.main\.js$/g.exec(entry);
        if (matchModules !== null && typeof matchModules[1] !== 'undefined') {
            entries[matchModules[1]] = entry;
        }

        return entries;
    },
    {}
);
var pathBuild = 'web/build';
var modeBuild = "production";
if(argv.watch) {
    modeBuild = "development";
    pathBuild = 'web/chunk';
}

fs.writeFile("./web/react-mode.txt", modeBuild, { flag: 'w' }, function(err) {
    if(err) {
        return console.log(err);
    }

    console.log("Mode: " + modeBuild);
});

module.exports = function () {
    return {
        entry: entryObject,
        output: {
            path: path.resolve(pathBuild),
            filename: '[name]/[contenthash]-bundled.js'
        },
        stats: {
            colors: true,
            modules: true,
            reasons: true,
            errorDetails: true
        },
        watch: argv.watch,
        module: {
            rules: [
                {
                    test: /\.js$/,
                    exclude: /node_modules/,
                    use: {
                        loader: "babel-loader"
                    }
                },
                {
                    test: /\.css$/,
                    use: [
                        {
                            loader: "style-loader"
                        },
                        {
                            loader: "css-loader",
                            options: {}
                        }
                    ]
                }
            ]
        },
        plugins: [
            new CleanWebpackPlugin(),
            new webpack.BannerPlugin(banner)
        ],
    }
};
