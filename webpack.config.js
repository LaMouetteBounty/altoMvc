const path = require('path');
const MiniCSSExtractPlugin = require('mini-css-extract-plugin');
const devMode = process.env.MODE_ENV !== 'production';
const CopyPlugin = require('copy-webpack-plugin');

module.exports = {
    //point d'entrée, toujours en JS
  entry: './assets/js/app.js',
  output: {
      //chemin pour déposer le fichier créé (compilation finale)
    path: path.resolve(__dirname, 'public/js'),
    filename: 'script.js'
  },

module : {
  rules: [{
    //expression reguliere pour vérifier les fichiers sass, css,...
    test: /\.s?[ac]ss$/,
    use: [
      MiniCSSExtractPlugin.loader,
      {loader: 'css-loader', options: {url: false, sourceMap: true}},
      {loader: 'sass-loader', options: {sourceMap: true}}
    ]
  },
  {
    test: /\.js$/,
    exclude: /node_modules/,
    use: "babel-loader"
  }

]
},
devtool:'source-map',
plugins: [
  new MiniCSSExtractPlugin({
filename: '../css/style.css'
  }),
  new CopyPlugin([
    { from: './assets/images', to: '../img' },
    ]),
],

 mode : devMode ? 'development' : 'production'
};