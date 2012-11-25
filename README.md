wp-shortcode-for-bootstrap
==========================

This plugin will add some bootstrap features into shortcodes and add dropdown menus in the visual editor.

WP Shortcode For Bootstrap
--------------------------

* Contributors: julienbourdeau
* Donate link: 
* Tags: shortcodes, bootstrap, tinymce plugin, visual editor
* Requires at least: 3.0
* Tested up to: 3.4.2
* Stable tag: 1.1
* License: GPLv2 or later
* License URI: http://www.gnu.org/licenses/gpl-2.0.html


Description
-----------

This plugin doesn't add the full Bootstrap to your theme. This plugin simply add support for:
* Buttons
* Icons (sprite)
* Label
* Progress bars
* Badges
* Well

Check out the FAQ below.

Screenshots
-----------

![This is the code](http://demo.sigerr.org/wp-shortcode-for-bootstrap/back-end.png "The shortcodes")
![This is the result](http://demo.sigerr.org/wp-shortcode-for-bootstrap/front-end.png "The result")

Examples
--------

There is 3 dropdown menus (select) added in your tinyMCE to help you using these shortcodes.

### Shortcode for a  button
	`[button link="file.zip" text="Download the file" size="large" type="success" icon="download" white="1"]`

### Shortcode for an icon
	`[icon icon="search" white=""]`

### Shortcode for a progress bar
	`[progress val="40" type="success" striped="1" active="1"]`


Installation
------------
This section describes how to install the plugin and get it working.


1. Upload the wp-shortcode-for-bootstrap folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Done

Frequently Asked Questions
--------------------------

### I don't know what is bootstrap

Twitter Inc has publish a wonderful library to build website, [check it out here]: http://twitter.github.com/bootstrap/

### Is bootstrap coming with the plugin?

The full bootstrap is not included, only the necessary code:
* Buttons
* Icons (sprite)
* Label
* Progress bars
* Badges
* Well


I am already using bootstrap I dont want to include this code twice

Open register-bootstrap-shortcodes.php and simply remove these lines at the end of the file.
For now, there is no option to not include it.

	function sfb_add_boostrap() {
	    wp_enqueue_style( 'css-bootstrap-for-shortcodes', plugins_url('custom-bootstrap.css', __FILE__ ));

	    wp_enqueue_script( 'js-bootstrap-for-shortcodes', plugins_url('custom-bootstrap.js', __FILE__ ), array( 'jquery' ), '2.2.1', true );
	}
	add_action( 'wp_enqueue_scripts', 'sfb_add_boostrap' );


Changelog
---------

### 1.1 
* Fixed the problem with folder name
* Added bootstrap in the plugin, only the necessary code

### 1.0
* First release

