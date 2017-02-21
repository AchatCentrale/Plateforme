var webpack = require('webpack');

var path = require('path');

var ExtractTextPlugin = require('extract-text-webpack-plugin');





var BUILD_DIR = path.resolve(__dirname, 'web');

var APP_DIR = path.resolve(__dirname, 'react');

var config = {

    entry: [

        APP_DIR + '/app.jsx',

    ],

    output: {

        path: BUILD_DIR,

        filename: 'app.bundle.js',

    },

    module: {

        loaders: [{

            test: /.jsx?$/,

            loader: 'babel-loader',

            exclude: /node_modules/,

            query: {

                presets: ['es2015', 'react']

            }

        }, {

            test: /\.scss$/,

            loaders: ExtractTextPlugin.extract('css!sass')

        }]

    },

    plugins: [

        new webpack.HotModuleReplacementPlugin(),

        new webpack.DefinePlugin({

            'process.env': {

                'NODE_ENV': JSON.stringify('production')
            }

        }),
    ]

};



module.exports = config;