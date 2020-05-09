var gulp        = require('gulp');
var browserSync = require('browser-sync').create();
var sass        = require('gulp-sass');

// Static Server + watching scss/html files
/* gulp.task('serve', ['sass'], function() {

    browserSync.init({
        server: "./",
    });

    gulp.watch("app/scss/*.scss", ['sass']);
    gulp.watch("*.php").on('change', browserSync.reload);
});

// Compile sass into CSS & auto-inject into browsers
gulp.task('sass', function() {
    return gulp.src("app/scss/*.scss")
        .pipe(sass())
        .pipe(gulp.dest("app/css"))
        .pipe(browserSync.stream());
});

gulp.task('default', ['serve']); */

function watch() {
    browserSync.init({
        //server: { "baseDir": "./" },
        proxy: {"target": "localhost/managinn"},
    });
    gulp.watch("app/scss/*.scss", style);
    gulp.watch("app/js/*.js").on('change', browserSync.reload);
    gulp.watch("*.php").on('change', browserSync.reload);
}

function style() {
    return gulp.src("app/scss/*.scss")
        .pipe(sass())
        .pipe(gulp.dest("app/css"))
        .pipe(browserSync.stream()); 
}

exports.style = style;
exports.watch = watch;