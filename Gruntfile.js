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
                tasks: ['compass:dist']
            },
            js: {
                files: '<%= jshint.all %>',
                tasks: ['jshint', 'uglify:dist']
            },
        },

        // compass and scss
        compass: {
            dist: {
                options: {
                    config: 'config.rb',
                    force: true,
                    relativeAssets: true
                }
            },
            build: {
                options: {
                    environment: 'production',
                    force: true,
                    noLineComments: true,
                    outputStyle: 'compressed'
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
                    compress:   false,
                    mangle:     false,
                    beautify:   true,
                },
                files: {
                    'assets/js/plugins.min.js': [
                        'assets/js/source/plugins.js',
                        'assets/js/vendor/**/*.js',
                        '!assets/js/vendor/modernizr*.js'
                    ],
                    'assets/js/main.min.js': [
                        'assets/js/source/main.js'
                    ]
                }
            },
            build: {
                options: {
                    sourceMap: 'assets/js/map/source-map.js',
                },
                files: {
                    'assets/js/plugins.min.js': [
                        'assets/js/source/plugins.js',
                        'assets/js/vendor/**/*.js',
                        '!assets/js/vendor/modernizr*.js'
                    ],
                    'assets/js/main.min.js': [
                        'assets/js/source/main.js'
                    ]
                }
            }
        },

        // image optimization
        imagemin: {
            dist: {
                options: {
                    optimizationLevel: 7,
                    progressive: true
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


        // Code Deployments (via rsync)
        deploy: {
            options: {
                        exclude: ['.git*', 'node_modules', '.sass-cache', 'Gruntfile.js', 'package.json', '.DS_Store', 'README.md', 'readme.html', 'license.txt', 'humans.txt','config.rb', '.jshintrc', '.gitignore', 'wp-config-local.php', 'w3tc-config', 'advanced-cache.php', 'object-cache.php'],                args: [
                        "-avz",     //  -a is an alias for -rlptgoD; -v is verbose; -z is compression
                        "--progress",
                ],
                recursive: true,
                syncDest: false,
                untracked_config: grunt.file.readJSON('code_deployments_untracked_config.json') // file not under version control
            },
            
            "develop": "<%= deploy.options.untracked_config.develop %>"

            /*
            "develop": {
                "src": "../../../",
                "dest": "~/public_html/",
                "host": "user@host",
                "recursive": "<%= deploy.options.recursive %>",
                "syncDest": "<%= deploy.options.syncDest %>",
                "exclude": "<%= deploy.options.exclude %>",
                "args": "<%= deploy.options.args %>"
            }
             */
        },

        // Database Deployments (via grunt-deployments)
        deployments: {
             options: {
                backups_dir: "../../../../backups",
                untracked_config: grunt.file.readJSON('db_deployments_untracked_config.json') // file not under version control under version control
            },

            "local": "<%= deployments.options.untracked_config.local %>",
            "develop": "<%= deployments.options.untracked_config.develop %>"



            /* "remote": {
                "title": "Remote",
                "database": "remote_db_name",
                "user": "remote_db_user",
                "pass": "remote_db_pass",
                "host": "localhost",
                "url": "remote_url",
                "ssh_host": "user@host"
            }, */
        },

        cc: {
            // catch that comma!
        }

    });



    // rename tasks
    grunt.renameTask('rsync', 'deploy');



    // register task
    grunt.registerTask('default', [
        'watch'
    ]);

    // Build task - run to optimise before pushing to production
    grunt.registerTask('build', [
        'compass:build',
        'jshint',
        'uglify:build',
        'imagemin'
    ]);

};
