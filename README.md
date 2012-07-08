wp-shortcode-for-bootstrap
==========================

If your theme is using Bootstrap (original or modified one), this plugin will add shortcodes and selector in the visual editor.

WP Shortcode For Bootstrap
--------------------------

* Contributors: julienbourdeau
* Donate link: 
* Tags: shortcodes, bootstrap, tinymce plugin, visual editor
* Requires at least: 3.0
* Tested up to: 3.4.1
* Stable tag: 1.0
* License: GPLv2 or later
* License URI: http://www.gnu.org/licenses/gpl-2.0.html


Description
-----------

This plugin doesn't add Bootstrap to your theme (no css, no js, no img). You are meant to do it yourself in case you want
to modify it (change the colors for example). You can check the FAQ if you need some help to add it.

If you want to add an icon to your text, you can simply click on the button and select the one you want from the list. It's
really easy.

Installation
------------
This section describes how to install the plugin and get it working.

e.g.

1. Upload the wp-shortcode-for-bootstrap folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Done

Frequently Asked Questions
--------------------------

### I don't know what is bootstrap

Twitter Inc has publish a wonderful library to build website, [check it out here]: http://twitter.github.com/bootstrap/

### How can I install it ?

If you don't know how to do it:
1. you need to download the .zip archive, and copy the files into your theme directory.
1. Then copy and paste this code on top of your functions.php


	function sfb_add_boostrap() {
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
		wp_enqueue_style( 'bootstrap-responsive', get_template_directory_uri() . '/css/bootstrap-responsive.css', array( 'bootstrap' ) );

		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '2.0.4', true );
	}
	add_action( 'wp_enqueue_scripts', 'sfb_add_boostrap' );


Changelog
---------

### 1.0
* First release

