const path = require('path');
const ExtraWatchWebpackPlugin = require('extra-watch-webpack-plugin');

module.exports = {
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/js/'),
            'main': path.resolve(__dirname, 'resources/js/pages/main'),
        }
    },
    plugins: [
        new ExtraWatchWebpackPlugin({dirs: [ 'resources/lang/ja' ]}),
    ],
};
