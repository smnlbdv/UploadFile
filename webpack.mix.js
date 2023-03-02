let mix = require('laravel-mix');

mix.sass('resources/css/app.scss','/css')
    .setPublicPath('public');

