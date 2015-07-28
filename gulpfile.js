var gulp = require('gulp'),
			less = require('gulp-less'),
			path = require('path'),
			watch = require('gulp-watch'),
			autoprefixer = require('gulp-autoprefixer'),
			browserSync = require('browser-sync'),
			uglify = require('gulp-uglify'),
			sourcemaps = require('gulp-sourcemaps'),
			jshint = require('gulp-jshint'),
			imageResize = require('gulp-image-resize'),
			rename = require("gulp-rename"),
            uglifycss = require("gulp-uglifycss"),
			changed = require("gulp-changed");

//gulp.src(['js/**/*.js', '!js/**/*.min.js'])

gulp.task('default', function () {

//
	browserSync({
	        proxy: "chesterboyd.dev.chand.co",
	        files: "./css/*.css"
	 	});
	//
	gulp.watch('./css/**/*.less', ['compile-css']);

	//gulp.watch('./js/*.js', ['javascript', browserSync.reload]);


});




gulp.task('compile-css', function () {
	gulp.src('./style.less')
				//.pipe(sourcemaps.init())
			    .pipe(less())
			    .pipe(autoprefixer())
                .pipe(uglifycss())
			    //.pipe(sourcemaps.write('./maps'))
			    .pipe(gulp.dest('./'));

});



