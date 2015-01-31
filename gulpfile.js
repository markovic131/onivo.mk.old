var gulp   = require('gulp');
var uglify = require('gulp-uglify');

// gulp.task('compress', function() {
//   gulp.src('lib/*.js')
//     .pipe(uglify())
//     .pipe(gulp.dest('dist'))
// });

gulp.task('compress', function() {
    return gulp.src('assets/js/app.js')
        .pipe(uglify())
        .pipe(gulp.dest('public/js'));
});

// gulp.task('js-onivo',function(){
//     return gulp.src([
//             'assets/js/support.js',
//             'assets/js/app.js',
//             'assets/js/directives.js',
//             'assets/js/filters.js',
//             'assets/js/controllers.js'
//         ])
//         .pipe(concat('onivo.min.js'))
//         .pipe(uglify())//{sourceMap:true}
//         .pipe(gulp.dest(jsBuildDir));
// });

// gulp.task('watch', function () {
//     gulp.watch('assets/js/**/*.js', ['js-onivo']);
// });

gulp.task('default', ['compress']);