const path = require('path');

module.exports = {
    resolve: {
        symlinks: false,
        alias: {
            '@': path.resolve('resources/js'),
        },
    },
};
