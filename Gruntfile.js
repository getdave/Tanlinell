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
                    src: '**/*',
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

        // Code Deployments (via rsync)
        /* deploy: {
            options: {
                exclude: ['.git*', 'node_modules', '.sass-cache', 'Gruntfile.js', 'package.json', '.DS_Store', 'README.md', 'readme.html', 'license.txt', 'humans.txt','config.rb', '.jshintrc', '.gitignore', 'wp-config-local.php'],
                args: [
                        "-avz",     //  -a is an alias for -rlptgoD; -v is verbose; -z is compression
                        "--progress",
                ],
                recursive: true,
                syncDest: false,
            },
            develop: {
                src: "../../../",
                dest: "~/public_html/",
                host: "user@134.0.18.114",
                recursive: "<%= deploy.options.recursive %>",
                syncDest: "<%= deploy.options.syncDest %>",
                exclude: "<%= deploy.options.exclude %>",
                args: "<%= deploy.options.args %>",
            },
        }, */

        // Database Deployments (via grunt-deployments)
        /* deployments: {
                options: {
                    backups_dir: '../../../../backups'
                },
                "local": {
                    "title": "Local",
                    "database": "db_name",
                    "user": "db_user",
                    "pass": "db_pass",
                    "host": "localhost",
                    "url": "local_url",
                },
                "remote": {
                    "title": "Remote",
                    "database": "remote_db_name",
                    "user": "remote_db_user",
                    "pass": "remote_db_pass",
                    "host": "localhost",
                    "url": "remote_url",
                    "ssh_host": "user@host"
                },
            }, */

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
        'uglify:build'
    ]);

};
