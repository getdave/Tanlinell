'use strict';

var path = require('path');


module.exports = function(grunt) {

    // load all grunt tasks
    require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);
    require('time-grunt')(grunt);
    
    grunt.initConfig({



        
        githooks: {
            all: {
                // Will run the jshint and test:unit tasks at every commit
                'pre-commit': 'jshint',
                'pre-receive': 'build'
            }
        },
        


        // watch for changes and trigger sass, jshint, uglify and livereload
        watch: {
            options: {
                livereload: true,
            },

            sass: {
                files: ['assets/sass/**/*.{scss,sass}'],
                //files: ['master.scss'],
                tasks: ['sass:dist','version:styles','copy:prototype','copy:patterns']
            },
            js: {
                files: '<%= jshint.all %>',
                tasks: ['clean', 'jshint', 'uglify:dist', 'version:scripts','copy:prototype','copy:patterns']
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

        sass: {
            options: {
                loadPath: [
                    'bower_components/tanlinell-framework/sass'
                ],
                style: 'expanded'
            },
            dist: {
                files: {
                    'assets/css/master.css': 'assets/sass/master.scss'
                }
            },
            build: {
                options: {
                    style: 'compressed',
                },
                files: '<%= sass.dist.files %>'
            },
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
                files: ['package.json','bower.json','composer.json'],
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
                    'assets/css/master.css',
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

    // Build - check, minify, compress and cache bust static assets ready for production usage
    grunt.registerTask('build', [
        'clean',
        'jshint',
        'uglify:build',
        'version:scripts',
        'sass:build',
        'imagemin'
    ]);


    // Prototype - compile static prototype using Jekyll and launch server to view
    grunt.registerTask('prototype', [
        'copy:prototype',
        'jekyll:prototype',
        'connect:prototype',
        'watch'
    ]);

    // Pattern Library - compile static Pattern Lib and launch server to view
    grunt.registerTask('patterns', [
        'copy:patterns',
        'jekyll:patterns',
        'connect:patterns',
        'watch'
    ]);






};
