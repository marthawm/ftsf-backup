var config = require('../../gulpconfig.json');
var gulp = require('gulp');
var concatCss = require('gulp-concat-css');
var cleanCSS = require('gulp-clean-css');

gulp.task('concat-css', function () {
  return gulp.src(config.concatCss.source)
    .pipe(concatCss(config.concatCss.concatTo))
    .pipe(gulp.dest(config.concatCss.destination));
});
