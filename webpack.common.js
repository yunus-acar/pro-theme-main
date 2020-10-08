const VueLoaderPlugin = require('vue-loader/lib/plugin');
const path = require('path');

module.exports = {
    entry: {
        'theme':'./app/theme',
        'theme-configure':'./app/views/theme-configure',

        // Nodes Components
        'node/node-positions':'./app/components/node/node-positions.vue',
        'node/node-theme':'./app/components/node/node-theme.vue',

        // Widgets Components
        'widgets/widget-theme':'./app/components/widgets/widget-theme.vue'
    },
    output: {
        path: path.resolve(__dirname, './app/bundle'),
        filename: '[name].js'
    },
    module: {
        rules: [
            {
                test: /\.vue$/,
                loader: 'vue-loader'
            },
            {
                test: /\.js$/,
                loader: 'babel-loader'
            },
            {
                test: /\.css$/,
                use: [
                    'vue-style-loader',
                    'css-loader',
                ]
            }
        ]
    },
    plugins: [
        new VueLoaderPlugin()
    ]
};
