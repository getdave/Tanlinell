'use strict';

var path = require('path');


module.exports = function(grunt) {

    // load all grunt tasks
    require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);
    require('time-grunt')(grunt);
    
    grunt.initConfig({

        // watch for changes and trigger sass, jshint, uglify and livereload
        watch: {
            options: {
                livereload: true,
            },

            sass: {
                files: ['assets/scss/**/*.scss'],
                tasks: ['sass']//,'version:styles','copy:prototype','copy:patterns']
            },
            js: {
                files: '<%= jshint.all %>',
                tasks: ['clean', 'jshint', 'uglify:dist', 'version:scripts'],//'copy:prototype','copy:patterns']
            },

            patterns: {
                files: ['<%= jekyll.patterns.options.src %>/**/*.html'],
                tasks: ['jekyll:patterns', 'copy:patterns']
            },

            prototype: {
                files: ['<%= jekyll.prototype.options.src %>/**/*.html'],
                tasks: ['jekyll:prototype', 'copy:prototype']
            },
        },

        // Sass - build CSS files from SCSS using grunt-sass (via libsass for speed!)
        sass: {
          options: {
            includePaths: [
              'bower_components/foundation/scss',
              'bower_components/baselayer/scss',
            ]
          },
          dist: {
            options: {
              outputStyle: 'expanded'
            },
            files: {
              'assets/css/site.css': 'assets/scss/site.scss'
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
                'assets/js/modules/**/*.js',
                'assets/js/source/**/*.js',
                '!assets/js/site.min.js'
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
                        // Compiled files
                        'assets/js/vendor/**/*.js',

                        // Tanlinell Framework components
                        'bower_components/tanlinell-framework/js/tanlinell-framework.js',
                        'bower_components/tanlinell-framework/js/modules/*.js',

                        // Theme specific components
                        'assets/js/source/globals.js',
                        'assets/js/modules/*.js',
                        'assets/js/source/plugins.js',
                        'assets/js/source/main.js',

                        // Ignored files
                        '!assets/js/modules/_EXAMPLE-MODULE.js', // ignore boilerplate files
                        '!assets/js/vendor/modernizr*.js' // included separetely in the <head>
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

        bump: {
            options: {
                files: ['package.json','bower.json'],
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
                dest: 'inc/tanlinell-scripts.php'
            },
            scripts: {
                src: ['assets/js/site.min.js', 'assets/js/vendor/modernizr.custom.js'],
                dest: 'inc/tanlinell-scripts.php'
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

        // Copy - ensure all site assets are mirrored for Patterns/Prototype
        copy: {
            options: {
                flatten: true
            },
            prototype: { // copy all assets into Prototype source dir
                src: [
                    'assets/css/site.css',
                    'assets/fonts/**/*{.eot,.svg,.ttf,.woff}',
                    'assets/images/**/*',
                    'assets/js/site.min.js',
                    'assets/js/vendor/modernizr.custom.js',
                    'assets/js/conditional/**/*'
                ],
                dest: '<%= jekyll.prototype.options.src %>/'
            },
            patterns: { // copy all assets into Patterns source dir
                src: '<%= copy.prototype.src %>',
                dest: '<%= jekyll.patterns.options.src %>/'
            },

            snapshot: {
                options: {
                    expand: true,
                    flatten: true,
                },
                files: [
                    {
                        src: ['<%= jekyll.patterns.options.dest %>/**/*'],
                        dest: '_patterns/snapshots/<%= grunt.template.today("yyyy-mm-dd") %>/'
                    },
                    {
                        src: ['<%= jekyll.prototype.options.dest %>/**/*'],
                        dest: '_prototype/snapshots/<%= grunt.template.today("yyyy-mm-dd") %>/'
                    },
                ],
            }
        },

        // Prototype (via static site generator)
        jekyll: {
            options: {
                //bundleExec: true,
            },
            patterns: {
                options: {
                    src : '_patterns/source',
                    dest: '_patterns/build'
                }
            },
            prototype: {
                options: {
                    src : '_prototype/source',
                    dest: '_prototype/build'
                }
            },
        },

        // Connect - boot up a server to display Patterns and Prototype
        connect: {
            options: {
                open: true,
                keepalive: false
            },
            prototype: {
                options: {
                    port: 9000,
                    base: '<%= jekyll.prototype.options.dest %>'
                }
            },
            patterns: {
                options: {
                    port: 9100,
                    base: '<%= jekyll.patterns.options.dest %>'
                }
            }
        },

        cc: {
            // catch that comma!
        }

    });

    // Default
    grunt.registerTask('default', [
        'watch'
    ]);



    // Prototype - compile static prototype using Jekyll and launch server to view
    grunt.registerTask('prototype', [
        'sass',
        'copy:prototype',
        'jekyll:prototype',
        'connect:prototype',
        'watch'
    ]);

    // Pattern Library - compile static Pattern Lib and launch server to view
    grunt.registerTask('patterns', [
        'sass',
        'copy:patterns',
        'jekyll:patterns',
        'connect:patterns',
        'watch'
    ]);






};
