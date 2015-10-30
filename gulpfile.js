var gulp = require('gulp');
var elixir = require('laravel-elixir');

gulp.task("copyfiles",function(){
 gulp.src("vendor/bower_dl/jquery/dist/jquery.js").pipe(gulp.dest("resources/assets/js/vendor/"));
 gulp.src("vendor/bower_dl/bootstrap/less/**").pipe(gulp.dest("resources/assets/less/vendor/bootstrap/"));
 gulp.src("vendor/bower_dl/bootstrap/dist/js/bootstrap.js").pipe(gulp.dest("resources/assets/js/vendor/"));
 gulp.src("vendor/bower_dl/bootstrap/dist/fonts/**").pipe(gulp.dest("public/fonts/"));
});

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
    mix.scripts([
            'vendor/jquery.js',
            'vendor/bootstrap.js'
        ],
    'public/js/users.js','resources/assets/js');

    mix.less('users.less','public/css/users.css');
});
