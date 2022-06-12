const path = require("path");

module.exports = {
    entry: {
        app: "./resources/js/index.js",
        thanhtoan: "./resources/js/noUiSlider/index.js",
        admin: "./resources/js/admin/index.js"
    },
    mode: "development",
    output: {
        filename: "[name].js",
        path: path.resolve(__dirname, "public/dist/js"),
        // clean: true
    },
    module: {
        rules: [
            {
                test: /\.css$/i,
                use: ["style-loader", "css-loader"],
            }
        ],
    },
    devtool: 'source-map',
    performance: { hints: false }
}
