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