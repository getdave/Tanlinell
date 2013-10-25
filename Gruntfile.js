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
                    relativeAssets: true,
                    environment: 'production',
                    outputStyle: 'compressed',
                    noLineComments: true,
                }
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
                'assets/js/source/**/*.js'
            ]
        },

        // uglify to concat, minify, and make source maps
        uglify: {
            dist: {
                options: {
                    sourceMap: 'map/source-map.js',
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
                exclude: [
                    // Git
                    '.git*',
                    '.gitignore',

                    // NPM & Grunt
                    'node_modules',
                    'package.json',
                    'Gruntfile.js',

                    // Tools and Libs
                    '.sass-cache',
                    '.jshintrc',
                    'config.rb',

                    // License & Docs
                    'README.md',
                    'readme.html',
                    'license.txt',
                    'humans.txt',

                    // WordPress
                    'wp-config-local.php',
                    'w3tc-config',
                    'advanced-cache.php',
                    'object-cache.php',
                    '/wp-content/uploads/cache/',

                    // Misc file-system
                    '.DS_Store',
                ],
                args: [
                    "-avzh",     //  -a is an alias for -rlptgoD; -v is verbose; -z is compression, -h is output numbers in a human-readable format
                    "--progress",
                ],
                recursive: true,
                syncDest: false,
                untracked_config: grunt.file.readJSON('code_deployments_untracked_config.json') // file not under version control
            },

            "develop": "<%= deploy.options.untracked_config.develop %>",

            /*
            "develop": {
                options: {
                    "src": "../../../",
                    "dest": "~/public_html/",
                    "host": "user@host",
                }
            },
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



        bump: {
            options: {
                files: ['package.json'],
                updateConfigs: [],
                commit: false,
                commitMessage: 'Bumped version number to v%VERSION%',
                commitFiles: ['package.json'], // '-a' for all files
                push: false,
            }
        },
        changelog: {
            options: {
            // Task-specific options go here.
            }
        },

        cc: {
            // catch that comma!
        }

    });



    // rename tasks
    grunt.renameTask('rsync', 'deploy');



    // register watch task
    grunt.registerTask('default', [
        'watch'
    ]);

    grunt.registerTask('versionbump', [
        'bump',
        'changelog'
    ]);



};
