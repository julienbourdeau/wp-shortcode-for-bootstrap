<?php
/*
Plugin Name: Shortcodes for Bootstrap
Plugin URI: 
Description: Inspired from <a href="http://marquex.es/387/adding-a-select-box-to-wordpress-tinymce-editor">this article</a>
Version: 0.1
Author: Julien Bourdeau 
Author URI: http://sigerr.org
*/

require_once 'register-bootstrap-shortcodes.php';



if(!class_exists('ShortcodesForBootstrap')):
 
class ShortcodesForBootstrap {

	var $buttonName;

	function __construct($name) {
		$this->buttonName = $name;
	}

	function addSelector(){
		// Don't bother doing this stuff if the current user lacks permissions
		if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
			return;
 
	   // Add only in Rich Editor mode
	    if ( get_user_option('rich_editing') == 'true') {
	      add_filter('mce_external_plugins', array($this, 'registerTmcePlugin'));
	      //you can use the filters mce_buttons_2, mce_buttons_3 and mce_buttons_4 
	      //to add your button to other toolbars of your tinymce
	      add_filter('mce_buttons', array($this, 'registerButton'));
	    }
	}
 
	function registerButton($buttons){
		array_push($buttons, "separator", $this->buttonName);
		return $buttons;
	}
 
	function registerTmcePlugin($plugin_array){
		$plugin_array[$this->buttonName] = plugins_url() . '/wp-shortcode-for-bootstrap/editor_plugin_'. $this->buttonName .'.js.php';
		//if ( get_user_option('rich_editing') == 'true') 
		// 	var_dump($plugin_array);
		return $plugin_array;
	}
}
 
endif;

/**
	Select box for bootstrap icons
 */
if(!isset($sfb_button_1)){
	$sfb_button_1 = new ShortcodesForBootstrap('bootstrapicons');
	add_action('admin_head', array($sfb_button_1, 'addSelector'));
}

/**
	Select box for bootstrap buttons
 */
if(!isset($sfb_button_2)){
	$sfb_button_2 = new ShortcodesForBootstrap('bootstrapbuttons');
	add_action('admin_head', array($sfb_button_2, 'addSelector'));
}