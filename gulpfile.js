var elixir = require('laravel-elixir');
elixir.config.sourcemaps = false;
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    //mix.sass('app.scss');


    //css
    mix.less('app.less');
    
    //App angular
    mix.scripts('app.js');    

    //Directives
    mix.scripts('directives/initModel.js', 'public/js/directives/initModel.js');

    //Controllers

    //Quem Somos
    /*mix.scripts('controllers/quemsomoCtrl.js', 'controllers/quemsomoCtrl.js');
    mix.scripts('controllers/alterarQuemsomoCtrl.js', 'controllers/alterarQuemsomoCtrl.js');*/

});

