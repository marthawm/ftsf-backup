var gulp = require('gulp');
var runSequence = require('run-sequence');

gulp.task('all-css', function(){
    runSequence('clean-style','sass','concat-css','minify-css');
});
