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


## Code Organisation

### Include Files

The directory `inc-site` should house all site specific include files e.g. plugin configuration files.
These files should be suitably named based upon the plugin the code affects. e.g. bc-simple-clients.php. This should then be included in the site.inc.php file.

### Additional Templates for Theming

The `templates` directory houses all site specific templates, there are files that have already been created that are required for core wp functionality.
`content-page.php` can be editted to allow for site specific layouts/content. 
The parent `page.php` and all other templates in the root should not be altered for site specific code.
Any changes to theses files should be changes required for the Tanlinell theme and so should be rolled into the Theme repo.

Templates for bc-plugin-suite templates should be housed in the `bc-plugin-templates` directory. Here you can find example files of how to structure the file. Take specific note to the lack of `get_header()`

Consult roots.io for more information.
http://roots.io/an-introduction-to-the-roots-theme-wrapper/
http://roots.io/the-roots-sidebar/ 


## Tanlinell Framework - using assets

Since version X.X.X Tanlinell WordPress theme no longer has a built in CSS/JS framework. For better maintainability this has been ported to a new [Tanlinell Framework repo](https://github.com/getdave/tanlinell-framework).

The easiest method of including the Tanlinell in the theme is via the use of bower. Assuming you have bower installed on your system simply run `bower install` in the `Tanlinell` theme directory and the latest version from the `develop` branch will be installed. During development of your WordPress theme it is acceptable to reference the `develop` branch of the Tanlinell Framework. However once code has reached a production-ready phase, it is strongly advised that the bower dependency is updated to a hard commit reference to ensure consistency and avoid accidentally breaking your website styles/scripting with unexpected updates.


## Tips & Tricks

* For nice Custom Post Type icons check out [randyjensenonline.com/thoughts/wordpress-custom-post-type-fugue-icons/](http://randyjensenonline.com/thoughts/wordpress-custom-post-type-fugue-icons/)


## Changelog

## 3.0.0

* Major Organisation/Refactor of inc directory and templates

#### 3.0.1

* Fix Sass deprecation warning due to no including cwd directory as a default Sass loadPath.
* Minor reorganisation of changelog formatting.

#### 3.0.2

* Remove old hooks for woocommerce wrapper markup

#### 3.0.3

* Ensure GA Code only applied to Production Environment

#### 3.0.4

* Update Social Links Markup

#### 3.0.5

* Additional Page Header Markup Partial

### 2.11.0

* Hybrid Core Update to 1.6.2
* Hybrid Core Breadcrumb add support
* Addition of GF Button markup

#### 2.11.1

* Update vcard and inclusion swith for address__line

### 2.10.0

* Added pre/append classes for buttons so they can display content before/after text.
* Moved Blockquotes to a new, conditional molecule.
* Gave nav breakpoints the "Default" flag.
* Updated jshint.
* Conditionalise social compounds so they don't import unless configured to do so.
* Added sizing and positioning modifier styles for icons.
* GA Goal tracking for Gravity Forms

### 2.9.0 

* Update Grid FW to include "palm" grids
* Refactor of FontFace icons - standardise, add defaults.
* Separate "Social Icons" from specific layouts allowing them to be more portable
* Update search form componenet to be more flexible
* Create mixins for "stacked" and "inline" navigation menus - enables greater flexibility when defining menu styles
* Create "toggle" molecule for standarised toggle units



### 2.8.0 - Grunt, Responsive and Grid updates

* Update Grunt to include filename based cache busting
* Update Grunt to include `build` task for producing production-ready assets
* Update `respond-to` mixin to accept variables rather than string.
* Update grid system to avoid "widescreen" media query styles being served to oldie

#### 2.8.1 - Ensure no follow for all environments except production

### 2.7.0 - Housekeeping

### 2.6.2 - Version Marks 3 features, 2 fixes

* Update the init script
* Reworked developer credit in footer
* Added root/parent link to sidebar categories & descenedants
* Built in Sitemap functionality
* Instagram code changes for templates/theme options

#### 2.3.2

* Constrain cpt menu funciton in inc/cpt-current-menu-item

#### 2.3.1

* * Style Amends and CPT Menu current class

### 2.3.0

* Add templating wrapper action hooks to allow for DRY application of standard wrapper HTML
* Apply standard wrapper element html.

### 2.2.0

* Add WooCommerce support to the Theme.

#### 2.2.4

Content class markup fix