var gulp = require('gulp'),
    sass = require('gulp-sass'),
    concat = require('gulp-concat');


gulp.task('sass', function(){
    return gulp.src('public/sass/*.sass')
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(concat('style.min.css'))
        .pipe(gulp.dest('public/css/'));
});

gulp.task('watch', function () {
    gulp.watch('public/sass/*.sass', gulp.parallel('sass'));
});

gulp.task('default',gulp.series('sass', 'watch', function(done){
    done();
}));
