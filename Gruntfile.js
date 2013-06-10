module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		watch: {
			gruntfile: {
				files: 'Gruntfile.js',
				tasks: ['jshint:gruntfile'],
			},
			css: {
				files: ['sass/*.scss'],
				tasks: 'compass'
			},
			javascript: {
				files: ['javascripts/**/*.js'],
				tasks: ['concat', 'uglify']
			},
		},
		compass: {
			dist: {
				options: {
					config: 'config.rb'
				}
			}
		},
		concat: {
			basic: {
				src: [
					'components/jquery/jquery.js',
					'components/foundation/js/foundation/foundation.js',
					'components/foundation/js/foundation/foundation.alerts.js',
					'components/foundation/js/foundation/foundation.clearing.js',
					'components/foundation/js/foundation/foundation.cookie.js',
					'components/foundation/js/foundation/foundation.dropdown.js',
					'components/foundation/js/foundation/foundation.forms.js',
					'components/foundation/js/foundation/foundation.joyride.js',
					'components/foundation/js/foundation/foundation.magellan.js',
					'components/foundation/js/foundation/foundation.orbit.js',
					'components/foundation/js/foundation/foundation.placeholder.js',
					'components/foundation/js/foundation/foundation.reveal.js',
					'components/foundation/js/foundation/foundation.section.js',
					'components/foundation/js/foundation/foundation.tooltips.js',
					'components/foundation/js/foundation/foundation.topbar.js',
					'components/foundation/js/foundation/foundation.interchange.js',

					'javascripts/vendor/*.js',
					
					'javascripts/app.js'
					],
				dest: 'javascripts/<%= pkg.name %>.js'
			},
		},
		jshint: {
			gruntfile: {
				src: 'Gruntfile.js'
			},
			packagejson: {
				src: 'package.json'
			}
		},
		uglify: {
			options: {
				banner: '/*! <%= pkg.name %> - v<%= pkg.version %> - ' + '<%= grunt.template.today("yyyy-mm-dd") %> */',
				report: ['min', 'gzip']
			},
			my_target: {
				files: {
					'javascripts/cartogram.min.js': ['javascripts/<%= pkg.name %>.js']
				}
			}
		}	
	});

	grunt.registerTask('default', ['concat']);
	grunt.registerTask('build', ['concat', 'uglify']);
	grunt.registerTask('watch', ['watch:css', 'watch:javascript']);

	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-compass');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-uglify');
};