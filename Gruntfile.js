module.exports = function(grunt) {

	grunt.initConfig({

		pkg: grunt.file.readJSON('package.json'),
		sass:{
			dist: {
				options: {
					style: 'compressed',
					sourcemap: 'none'
				},
				files: {
					'style.css' : 'sass/style.scss'
				}
			}
		},

		watch: {
			css: {
				files: 'sass/*.scss',
				tasks: ['sass']
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.registerTask('default', ['watch']);

};