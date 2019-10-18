module.exports = (env, options) => ({
    test: /\.ks$/,
    exclude: /node_modules/,
    use: [require("../loaders/babel-loader")(env, options)],
});
