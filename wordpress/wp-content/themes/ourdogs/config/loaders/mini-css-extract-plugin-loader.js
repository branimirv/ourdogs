const MiniCssExtractPlugin = require("mini-css-extract-plugin");

module.exports = (env, options) => ({
    loader: MiniCssExtractPlugin.loader,
    options: {
        hmr: options.mode === "development",
    },
});
