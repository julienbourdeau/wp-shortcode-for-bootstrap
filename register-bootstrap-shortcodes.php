<?php 
/**
 * All the following functions declare shortcodes
 *
 * @package wp-shortcode-for-bootstrap
 * @since 0.1
 */


function sfb_well_box( $atts, $content = null ) {
   return '<div class="well">' . do_shortcode($content) . '</div>';
}
add_shortcode('well_box', 'sfb_well_box');

/**
 * Create a shortcode for bootstrap alerts
 * ex: [alert type="info" closable="1"]Lorem ipsum <strong>text</strong>[/alert]
 *
 * @since 0.1
 */
function sfb_alert( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'type'      => 'alert-block',
		'closable'		=> '1',
    ), $atts));

    if($type != 'alert-block') $type = "alert-$type";

    $out = "<div class=\"alert $type\">";
    if($closable) {
    	$out .= "<a class=\"close\" data-dismiss=\"alert\" href=\"#\">&times;</a>";
    }
    $out .= do_shortcode($content) . "</div>";

    return $out;
}
add_shortcode('alert', 'sfb_alert');

/**
 * Create a shortcode for bootstrap buttons
 * ex: [button link="#" text="download" size="large" type="success" icon="envelope" white="1"]
 *
 * @since 0.1
 */
function sfb_button( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'link'      => '#',
        'text'      => 'Click Here',
		'size'		=> '',
		'block'		=> '',
		'icon'		=> '',
		'white'		=> '',
		'type'		=> '',
    ), $atts));

    if ( $type != '' ) $type = "btn-$type";
    if ( $size != '' ) $size = "btn-$size";
    if ( $block != '' ) $block = "btn-block";

	$out = "<a class=\"btn $type $size $block\" href=\"" .$link. "\">";

	if ( $icon != '' ) {
		if ( $white != '' ) $white = "icon-white";
		$out .= "<i class=\"icon icon-$icon $white \"></i> ";
	}
	$out .= $text . "</a>";
    
    return $out;
}
add_shortcode('button', 'sfb_button');

/**
 * Create a shortcode for bootstrap icons
 * ex: [icon icon="envelope" white="1"]
 *
 * @since 0.1
 */
function sfb_icon( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'icon'		=> '',
		'white'		=> '',
    ), $atts));

	if ( $white != '' ) $white = "icon-white";
	$out = "<i class=\"icon-$icon $white \"></i> ";
    
    return $out;
}
add_shortcode('icon', 'sfb_icon');

/**
 * Create a shortcode for bootstrap labels
 * ex: [label type="important" text="Attention"]
 *
 * @since 0.1
 */
function sfb_label( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'type'		=> '',
		'text'		=> 'text',
    ), $atts));

	if ( $type != '' ) $type = "label-$type";
	$out  = "<span class=\"label $type\"> $text </span>";
    
    return $out;
}
add_shortcode('label', 'sfb_label');

/**
 * Create a shortcode for bootstrap badges
 * ex: [badge type="success" text="12"]
 *
 * @since 0.1
 */
function sfb_badge( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'type'		=> '',
		'text'		=> '0',
    ), $atts));

	if ( $type != '' ) $type = "badge-$type";
	$out  = "<span class=\"badge $type\"> $text </span>";
    
    return $out;
}
add_shortcode('badge', 'sfb_badge');


/**
 * Create a shortcode for bootstrap progress bars
 * ex: [progress val="40" type="success" striped="1" active="1"]
 *
 * @since 0.1
 */
function sfb_progress( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'val'	=> '33',
		'type'		=> '',
		'striped'	=> '',
		'active'	=> '',
    ), $atts));

	if ( $type != '' ) $type = "progress-$type";
	if ( $striped != '' ) $striped = "progress-striped";
	if ( $active != '' ) $active = "active";

	$out  = "<div class=\"progress $striped $active $type\"><div class=\"bar\" style=\"width: $val%;\"></div></div>";

    return $out;
}
add_shortcode('progress', 'sfb_progress');



/**
 * Register style and JS that is required
 *
 * @since 1.1
 */

function sfb_add_boostrap() {
    wp_enqueue_style( 'css-bootstrap-for-shortcodes', plugins_url('custom-bootstrap.css', __FILE__ ));

    wp_enqueue_script( 'js-bootstrap-for-shortcodes', plugins_url('custom-bootstrap.js', __FILE__ ), array( 'jquery' ), '2.2.1', true );
}
add_action( 'wp_enqueue_scripts', 'sfb_add_boostrap' );

