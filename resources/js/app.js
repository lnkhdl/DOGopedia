//require('./bootstrap');

// Alpine.js - created by Caleb Porzio and contributors, https://github.com/alpinejs/alpine, licensed under The MIT License
require('alpinejs/dist/alpine');

// Lightbox2 - created by Lokesh Dhakar, https://lokeshdhakar.com/projects/lightbox2/,  licensed under The MIT License
//require('lightbox2/dist/js/lightbox-plus-jquery');

window.lightbox = require('lightbox2/dist/js/lightbox-plus-jquery');

window.lightbox.option({
    'alwaysShowNavOnTouchDevices': true
});