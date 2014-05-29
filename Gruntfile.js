'use strict';

var path = require('path');


module.exports = function(grunt) {

    // load all grunt tasks
    require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);
    require('time-grunt')(grunt);

    grunt.initConfig({
        pkg: grunt.file.readJSON('./package.json'),
        config: {
            scssDir: './assets/sass/',
            cssDir: './assets/css/',
            cssFileName: 'master',
            jsDir: './assets/js/',
            jsFileName: 'site',
            packageName: '<%= pkg.name %>',
            flattenMQs: 60,
        },

        // watch for changes and trigger sass, jshint, uglify and livereload
        watch: {
            options: {
                livereload: true,
                debounceDelay: 500
            },

            sass: {
                files: ['<%= config.scssDir %>/**/*.scss'],
                tasks: ['sass:dist']
            },
            js: {
                files: '<%= jshint.all %>',
                tasks: ['clean', 'jshint', 'uglify:dist']
            },

            patterns: {
                files: ['<%= jekyll.patterns.options.src %>/**/*.html'],
                tasks: ['copy:patterns','jekyll:patterns']
            },

            prototype: {
                files: ['<%= jekyll.prototype.options.src %>/**/*.html'],
                tasks: ['copy:prototype','jekyll:prototype']
            },
        },

        sass: {
            options: {
                loadPath: [
                    '.', // required to force current working directory to be available
                    'bower_components/tanlinell-framework/sass'
                ],
                style: 'expanded'
            },
            dist: {
                files: {
                    '<%= config.cssDir %>/<%= config.cssFileName %>.css': '<%= config.scssDir %>/<%= config.cssFileName %>.scss'
                }
            },
            build: {
                files: '<%= sass.dist.files %>'
            },
        },

        // Legacssy - flatten MQ's in <%= config.jsFileName %>-oldie.css
        legacssy: {
          dist: {
            options: {
              // Include only styles for a screen 800px wide
              legacyWidth: "<%= config.flattenMQs %>"
            },
            files: {
              '<%= config.cssDir %>/<%= config.cssFileName %>-ie.css': '<%= config.cssDir %>/<%= config.cssFileName %>.css',
            },
          },
        },

        // CSSMin - minify CSS
        cssmin: {
          minify: {
            files: {
                '<%= config.cssDir %>/<%= config.cssFileName %>.css': ['<%= config.cssDir %>/<%= config.cssFileName %>.css', '!*.min.css'],
                '<%= config.cssDir %>/<%= config.cssFileName %>-ie.css': ['<%= config.cssDir %>/<%= config.cssFileName %>-ie.css', '!*.min.css']
            }
          },
        },

        // JSHint - lint JavaScript for codesmells with jshint
        jshint: {
            options: {
                jshintrc: '.jshintrc',
                "force": true
            },
            all: [
                'Gruntfile.js',
                '<%= config.jsDir %>/modules/**/*.js',
                '<%= config.jsDir %>/source/**/*.js',
                '!<%= config.jsDir %>/<%= config.jsFileName %>.min.js'
            ]
        },

        // Uglify - to concat & minify JavaScripts
        uglify: {
            dist: {
                options: {
                    mangle: false,
                    compress: false,
                    beautify: true
                },
                files: {
                    '<%= config.jsDir %>/<%= config.jsFileName %>.min.js': [
                        // Compiled files
                        '<%= config.jsDir %>/vendor/**/*.js',

                        // Tanlinell Framework components
                        'bower_components/tanlinell-framework/js/tanlinell-framework.js',
                        'bower_components/tanlinell-framework/js/modules/*.js',

                        // Theme specific components
                        '<%= config.jsDir %>/source/globals.js',
                        '<%= config.jsDir %>/modules/*.js',
                        '<%= config.jsDir %>/source/plugins.js',
                        '<%= config.jsDir %>/source/main.js',

                        // Ignored files
                        '!<%= config.jsDir %>/modules/_EXAMPLE-MODULE.js', // ignore boilerplate files
                        '!<%= config.jsDir %>/vendor/modernizr*.js' // included separetely in the <head>
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

        // Imagemin - image compression and optimisation
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

        // Bump - used to bump version numbers
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


        // WP Assets - static asset filename based cache-busting
        // avoids failed "Expires" headers due to WP adding
        // version query strings to end of assets
        version: {
            styles: {
                src: ['style.css'],
                dest: 'inc/tanlinell-scripts.php'
            },
            scripts: {
                src: ['<%= config.jsDir %>/<%= config.jsFileName %>.min.js', '<%= config.jsDir %>/vendor/modernizr.custom.js'],
                dest: 'inc/tanlinell-scripts.php'
            }
        },


        // Clean - remove old files (+ cached version)
        clean: {
          dist: [
            'assets/*.style.css',
            '<%= config.jsDir %>/<%= config.jsFileName %>.min.js',
            '<%= config.jsDir %>/*.<%= config.jsFileName %>.min.js',
            '<%= config.jsDir %>/vendor/*.modernizr.custom.js'
          ]
        },

        // Copy - ensure all <%= config.jsFileName %> assets are mirrored for Patterns/Prototype
        copy: {
            options: {
                flatten: true
            },
            prototype: { // copy all assets into Prototype source dir
                src: [
                    '<%= config.cssDir %>/<%= config.cssFileName %>.css',
                    'assets/fonts/**/*{.eot,.svg,.ttf,.woff}',
                    'assets/images/**/*',
                    '<%= config.jsDir %>/<%= config.jsFileName %>.min.js',
                    '<%= config.jsDir %>/vendor/modernizr.custom.js',
                    '<%= config.jsDir %>/conditional/**/*'
                ],
                dest: '<%= jekyll.prototype.options.dest %>/'
            },
            patterns: { // copy all assets into Patterns source dir
                src: '<%= copy.prototype.src %>',
                dest: '<%= jekyll.patterns.options.dest %>/'
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

        // Jekyll - static <%= config.jsFileName %> generator used to create Prototype and Pattern lib
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





    /**
     * TASKS
     */

    // Default
    grunt.registerTask('default', [
        'watch'
    ]);

    // Build - check, minify, compress and cache bust static assets ready for production usage
    grunt.registerTask('build', [
        'clean',
        'jshint',
        'uglify:build',
        'version:scripts',
        'sass:build',
        'legacssy',
        'cssmin',
        'version:styles',
        'imagemin'
    ]);


    // Prototype - compile static prototype using Jekyll and launch server to view
    grunt.registerTask('prototype', [
        'jekyll:prototype',
        'copy:prototype',
        'connect:prototype',
        'watch'
    ]);

    // Pattern Library - compile static Pattern Lib and launch server to view
    grunt.registerTask('patterns', [
        'jekyll:patterns',
        'copy:patterns',
        'connect:patterns',
        'watch'
    ]);






};
