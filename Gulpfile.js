/**
 * Gulpfile
 * @author Axel Baron
 * @created 04/04/2017
 */

'use strict';
var
    // For gulp utilisation
    gulp = require('gulp'),
    gutil = require('gulp-util'),
    notify = require("gulp-notify"),

    // Concat sources file and rename
    concat = require('gulp-concat'),
    imagemin = require('gulp-imagemin'),

    // Js plugins
    jshint = require('gulp-jshint'),
    uglify = require('gulp-uglify'),

    // CSS plugins
    sass = require('gulp-sass'),
    cssnano = require('gulp-cssnano'),
    sourcemaps = require('gulp-sourcemaps'),
    autoprefixer = require('gulp-autoprefixer'),
    livereload = require('gulp-livereload');

var DIR = {
    'src': './src',
    'dest': './dist'
};

/**
 * @task set-dev-node-env and set-prod-node-env
 * Set environment. Used for dist-dev or dist-prod
 */
gulp.task('env-dev', function () {
    return gutil.env.type = 'development';
});

gulp.task('env-prod', function () {
    return gutil.env.type = 'production';
});


/**
 * @task styles
 * Compile sass/scss to unique css file
 */
gulp.task('styles', function () {
    gulp.src(DIR.src + '/sass/**/*.+(scss|sass)')
        .pipe(sourcemaps.init())
        .pipe(sass({
            //outputStyle: 'compressed',
            includePaths: require('node-normalize-scss').includePaths
        }).on('error', notify.onError("Error: <%= error.message %>")))
        .pipe(autoprefixer({
            browsers: ['last 3 versions'],
            cascade: false
        }))
        .pipe(gutil.env.type === 'production' ? cssnano() : gutil.noop())
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(DIR.dest + '/css'))
        .pipe(gutil.env.type === 'production' ? gutil.noop() : livereload())
});

/**
 * @task copy PHP/HTML
 * Copy to destination folder
 */
gulp.task('copy-pages', function () {
    var sources = [DIR.src + '/**/*.+(php|html|txt|xml|json)', DIR.src + '/.htaccess'];
    if (gutil.env.type === 'production') {
        sources.push('!' + DIR.src + '/demo/**/*');
    }
    gulp.src(sources)
        .pipe(gulp.dest(DIR.dest + '/'))
        .on('error', notify.onError("Error: <%= error.message %>"));
});

/**
 * @task copy optimize en copy img
 * Copy and optimize images to destination folder. Proprieties can be settings.
 */
gulp.task('images', function () {
    gulp.src(DIR.src + '/img/**/*')
        .pipe(imagemin({
            interlaced: true,
            progressive: true,
            optimizationLevel: 5,
            svgoPlugins: [{removeViewBox: true}]
        }))
        .pipe(gulp.dest(DIR.dest + '/img'))
        .on('error', notify.onError("Error: <%= error.message %>"));
});

/**
 * @task fonts
 * Copy clean fonts to destination folder
 */
gulp.task('fonts', function () {
    gulp.src(DIR.src + '/fonts/**/*.+(eot|svg|ttf|woff|woff2|json)')
        .pipe(gulp.dest(DIR.dest + '/fonts/'))
        .on('error', notify.onError("Error: <%= error.message %>"));
});


/**
 * @task scripts
 * Compile js scripts to unique js file
 */
gulp.task('scripts', function () {
    gulp.src([
        DIR.src + '/js/externals/*.js', // first
        DIR.src + '/js/**/*.js' // others
    ])
        .pipe(jshint())
        .pipe(jshint.reporter('default'))
        .pipe(sourcemaps.init())
        .pipe(concat('bundle.js'))
        .pipe(gutil.env.type === 'production' ? uglify() : gutil.noop())
        .pipe(gutil.env.type === 'production' ? sourcemaps.write() : gutil.noop())
        .pipe(gulp.dest(DIR.dest + '/js/'))
        .pipe(gutil.env.type === 'production' ? gutil.noop() : livereload())
});

/**
 * @task watch
 * Compile/watch app OTF (dev)
 */
gulp.task('watch', function () {
    livereload.listen();
    gulp.watch(DIR.src + '/**/*.+(php|html)', ['copy-pages']);
    gulp.watch(DIR.src + '/img/**/*', ['images']);
    gulp.watch(DIR.src + '/fonts/**/*', ['fonts']);
    gulp.watch(DIR.src + '/sass/**/*.scss', ['styles']);
    gulp.watch(DIR.src + '/js/**/*.js', ['scripts']);
});

/**
 * @task dist
 * Compile entire app
 */
gulp.task('dist-dev', ['env-dev', 'copy-pages', 'images', 'fonts', 'styles', 'scripts'], function () {
    return true;
});

/**
 * @task dist
 * Compile entire app
 */
gulp.task('dist-prod', ['env-prod', 'copy-pages', 'images', 'fonts', 'styles', 'scripts'], function () {
    return true;
});

/**
 * @task default
 * Compile/watch app OTF (dev)
 */
gulp.task('default', ['watch'], function () {
    return true;
});
