const path = require('path');
var UnminifiedWebpackPlugin = require('unminified-webpack-plugin');

module.exports = {
  mode: process.env.NODE_ENV,
  entry: {
    'main': './src/js/main/main.js',
    'customize-control': './src/js/admin/customize-control.js',
    'customize-preview': './src/js/admin/customize-preview.js',
  },
  output: {
    filename: "[name].min.js",
    path: path.resolve(__dirname, 'js'),
  },
  module: {
    rules: [
      {
        test: /.jsx?$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['@babel/preset-env'],
            plugins: ['@babel/plugin-transform-runtime']
          }
        }
      }
    ]
  },
  plugins: [
    new UnminifiedWebpackPlugin()
  ]
};
