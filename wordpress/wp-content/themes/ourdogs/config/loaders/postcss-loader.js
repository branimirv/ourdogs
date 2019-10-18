module.exports = (env, options) => ({
    loader: "postcss-loader",
    options: {
        ident: "postcss",
        sourceMap: true,
        plugins: () => [
            require("lost"),
            require("postcss-flexbugs-fixes"),
            require("postcss-preset-env")({
                autoprefixer: {
                    browsers: [
                        ">1%",
                        "last 4 versions",
                        "Firefox ESR",
                        "not ie < 9",
                    ],
                    flexbox: "no-2009",
                },
                stage: 3,
            }),
        ],
    },
});
