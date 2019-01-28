/**
 * @var gulp
 * require - gulp proper
 */
let gulp = require('gulp');

/**
 * @var sass
 * require - gulp-sass plugin
 */
let sass = require('gulp-sass');

/**
 * @var sourcemaps
 * require - gulp-sourcemaps plugin
 */
let sourcemaps = require('gulp-sourcemaps');

gulp.task('default', ['sass']);

//task - compile sass
gulp.task('sass', function(){
    return gulp.src('webroot/scss/**/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest('webroot/css'))
});

