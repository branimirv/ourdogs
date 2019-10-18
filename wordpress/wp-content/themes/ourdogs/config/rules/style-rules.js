module.exports = (env, options) => ({
    test: /\.(sa|sc|c)ss$/,
    use: [
        require("../loaders/style-loader")(env, options),
        require("../loaders/mini-css-extract-plugin-loader")(env, options),
        require("../loaders/css-loader")(env, options),
        require("../loaders/postcss-loader")(env, options),
        require("../loaders/sass-loader")(env, options),
    ],
});
