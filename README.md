# Tanlinell - a[nother] Wordpress Theme Boilerplate 

Tanlinell is a[nother] Wordpress Theme Boilerplate created for rapid development of WP Themes. It aims to reduce the initial overhead of Theme development by providing many of the common WP Theme requirements out of the box.

The word "Tanlinell" (I hope!) means "Underscore" in Welsh, but whilst the theme is based on the fantastic work of the Wordpress Core Theme team's Underscore theme it takes things a little further. This may be good/bad, depending on your preference.


Tanlinell is brought to you by myself and the team at [Burfield Creative](http://burfieldcreative.co.uk). If you are using this theme to build WordPress websites a genuine backlink to the Burfield Creative website is politely requested under the terms of the license.



## Usage

Tanlinell ships with a simple bash script for easy installation via git clone. Follow the instructions below:

1. Clone the repo using ````git clone --recursive git://github.com/foo/bar.git````. __Note:__ if you would like to clone the `develop` branch then add the branch argument to the above command (eg: (````git clone --recursive git://github.com/foo/bar.git -b develop````).
2. Set file permissions on the `init` script using ````chmod 744 init````.
3. Run the `init` command using ````./init```` - the script will remove all `.git` directories and files leaving you with a clean set of checked-out files
4. Start coding.

Note the use of the --recursive flag. This tells git to fetch the files for the submodules contained within the repo (eg: Hybrid Core).


## Styles

Tanlinell ships with a fully featured CSS Framework generated in SASS. The framework is tailored for general use but has some nice tweaks to help it to play nicely with Tanlinell.


## Grunt Configuration

Tanlinell ships with a Gruntfile for usage via [GruntJS](http://gruntjs.com/). If you aren't using Grunt don't worry, you can still make use of Tanlinell.

To utilize the Gruntfile you will first need to install grunt globally as admin.
* Open Terminal
* run: ```sudo npm install -g grunt```
* navigate to project directory in terminal e.g. ```cd Sites/Tanlinell/wp-content/themes/tanlinell```
* install dependencies ```npm install```
* run ```grunt```
your good to go!

Further reading and details about starting new projects can be found at:
http://gruntjs.com/getting-started


## Tips & Tricks

* For nice Custom Post Type icons check out [randyjensenonline.com/thoughts/wordpress-custom-post-type-fugue-icons/](http://randyjensenonline.com/thoughts/wordpress-custom-post-type-fugue-icons/)


## Changelog

See changelog.md file.