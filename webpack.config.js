const path = require('path');

module.exports = {
  mode: "production",
  entry: {
    'main': './src/js/main.js',
    'customize-control': './src/js/admin/customize-control.js',
    'customize-preview': './src/js/admin/customize-preview.js',
  },
  output: {
    filename: "[name].bundle.js",
    path: path.resolve(__dirname, 'js'),
  },
  module: {
    rules: [
      {
        test: /.jsx?$/,
        loader: 'babel-loader',
        exclude: /node_modules/,
      },
    ],
  },
};
