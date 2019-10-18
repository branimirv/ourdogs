const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");

function getPlugins(env, options) {
    const plugins = [];

    switch (options.mode) {
        case "production":
            break;
        case "development":
            plugins.push(
                new BrowserSyncPlugin({
                    files: [
                        "./**/*.php",
                        "./dist/bundle.js",
                        "./dist/bundle.css",
                    ],
                    reloadDelay: 0,
                    proxy: "our-dogs.test",
                    open: false,
                }),
            );
            break;
        default: // nop
    }

    plugins.push(
        new MiniCssExtractPlugin({
            filename: "bundle.css",
        }),
    );

    return plugins;
}

module.exports = (env, options) => ({
    entry: ["./assets/scripts/app.js", "./assets/styles/style.scss"],
    module: {
        rules: [
            require("./config/rules/script-rules")(env, options),
            require("./config/rules/style-rules")(env, options),
        ],
    },
    plugins: getPlugins(env, options),
    output: {
        path: path.resolve(__dirname, "dist"),
        filename: "bundle.js",
    },
    externals: {
        // @note provided by WordPress
        jquery: "jQuery",
    },
});
