const path = require("path");

module.exports = {
    entry: {
        apis: "./resources/js/apis/index.js",
    },
    mode: "development",
    output: {
        filename: "[name].js",
        path: path.resolve(__dirname, "public/dist/js"),
        clean: true
    }
}
