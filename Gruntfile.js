'use strict';

var path = require('path');


module.exports = function(grunt) {

        // load all grunt tasks
        require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

        grunt.initConfig({


        // watch for changes and trigger compass, jshint, uglify and livereload
        watch: {
            options: {
                livereload: true,
            },

            compass: {
                files: ['assets/sass/**/*.{scss,sass}'],
                //files: ['master.scss'],
                tasks: ['compass:dist','version:styles']
            },
            js: {
                files: '<%= jshint.all %>',
                tasks: ['clean', 'jshint', 'uglify:dist', 'version:scripts']
            },
        },

        // compass and scss
        compass: {
            dist: {
                options: {
                    config: 'config.rb',
                    force: true
                }
            },
            build: {
                options: {
                    outputStyle: "compressed",
                    environment: "production",
                    noLineComments: true,
                    force: true
                }
            }
        },

        // javascript linting with jshint
        jshint: {
            options: {
                jshintrc: '.jshintrc',
                "force": true
            },
            all: [
                'Gruntfile.js',
                'assets/js/source/**/*.js'
            ]
        },

        // uglify to concat, minify, and make source maps
        uglify: {
            dist: {
                options: {
                    mangle: false,
                    compress: false,
                    beautify: true
                },
                files: {
                    'assets/js/site.min.js': [
                        'assets/js/vendor/**/*.js',
                        'assets/js/source/plugins.js',
                        'assets/js/source/main.js',
                        '!assets/js/vendor/modernizr*.js'
                    ],
                }
            },
            build: {
                options: {
                    compress: true
                },
                files: '<%= uglify.dist.files %>'
            }
        },

        // image optimization
        imagemin: {
            dist: {
                options: {
                    optimizationLevel: 7,
                    progressive: true,
                    pngquant: true
                },
                files: [{
                    expand: true,
                    cwd: 'assets/images/',
                    src: ['**/*.{png,jpg,gif}'],   // Actual patterns to match
                    dest: 'assets/images/'
                }]
            }
        },

        grunticon: {
            myIcons: {
                options: {
                    src: "assets/images/grunt-icons/source/",
                    dest: "assets/images/grunt-icons/",
                    defaultWidth: "64px",
                    defaultHeight: "64px",
                    cssprefix: "grunt-icon-",
                    colors: {
                        "white": "#ffffff",
                        "black": "#000000"
                    }
                }
            }
        },

        svg2png: {
            all: {
                // specify files in array format with multiple src-dest mapping
                files: [
                    // rasterize SVG file to same directory
                    { src: ['assets/images/*.svg'] }
                ]
            }
        },

        sprite:{
            framework: {
                src: 'assets/images/framework/sprites/*.png',
                destImg: 'assets/images/framework/spritesheet.png',
                destCSS: 'assets/sass/framework/compounds/_sprites.scss',
                cssFormat: 'scss',
                padding: 30,
                imgPath: '../images/framework/spritesheet.png'
            },

            site: {
                src: 'assets/images/sprites/*.png',
                destImg: 'assets/images/spritesheet.png',
                destCSS: 'assets/sass/site/modules/_sprites.scss',
                cssFormat: 'scss',
                padding: 30,
                imgPath: '../images/spritesheet.png'
            },
        },

        bump: {
            options: {
                files: ['package.json'],
                updateConfigs: [],
                commit: false,
                commitMessage: 'Bump version number to v%VERSION%',
                commitFiles: ['package.json'], // '-a' for all files
                createTag: false,
                push: false,
            }
        },

        // Static asset filename based cache-busting
        // Avoids failed "Expires" headers due to WP adding
        // version query strings to end of assets
        version: {
            styles: {
                src: ['style.css'],
                dest: 'inc/enqueue-scripts-styles.php'
            },
            scripts: {
                src: ['assets/js/site.min.js', 'assets/js/vendor/modernizr.custom.js'],
                dest: 'inc/enqueue-scripts-styles.php'
            }
        },

        // Remove old JS files (+ cached version)
        // ready for cache busting
        clean: {
          dist: [
            'assets/*.style.css',
            'assets/js/site.min.js',
            'assets/js/*.site.min.js',
            'assets/js/vendor/*.modernizr.custom.js'
          ]
        },

        cc: {
            // catch that comma!
        }

    });

    // Default
    grunt.registerTask('default', [
        'watch'
    ]);

    // Build
    grunt.registerTask('build', [
        'clean',
        'jshint',
        'uglify:build',
        'version:scripts',
        'compass:build',
        'imagemin'
    ]);



};
