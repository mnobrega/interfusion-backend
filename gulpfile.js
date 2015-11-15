var gulp = require('gulp');
var elixir = require('laravel-elixir');

gulp.task("copyfiles",function(){
 gulp.src("vendor/bower_dl/jquery/dist/jquery.js").pipe(gulp.dest("resources/assets/js/vendor/"));
 gulp.src("vendor/bower_dl/bootstrap/less/**").pipe(gulp.dest("resources/assets/less/vendor/bootstrap/"));
 gulp.src("vendor/bower_dl/bootstrap/dist/js/bootstrap.js").pipe(gulp.dest("resources/assets/js/vendor/"));
 gulp.src("vendor/bower_dl/bootstrap/dist/fonts/**").pipe(gulp.dest("public/fonts/"));
 gulp.src("vendor/bower_dl/html5shiv/dist/html5shiv.js").pipe(gulp.dest("public/js/"));
 gulp.src("vendor/rydurham/sentinel/public/bootstrap/js/restfulizer.js").pipe(gulp.dest("resources/assets/js/vendor/"));
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
            'vendor/bootstrap.js',
            'vendor/restfulizer.js'
        ],
    'public/js/admin.js','resources/assets/js');

    mix.less('admin.less','public/css/admin.css');
});
