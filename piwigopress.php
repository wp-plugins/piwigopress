<?php
/*
Plugin Name: PiwigoPress
Plugin URI: http://piwigo.org/ext/extension_view.php?eid=316
Description: PiwigoPress is a WordPress widget, linking your Piwigo gallery (<a href="http://piwigo.org/">Piwigo</a>) to your Wordpress blog. Required some public pictures in your Piwigo gallery.
Version: 2.10
Author: vpiwigo ( for The Piwigo Team )
Author URI: http://www.vdigital.org/sharing/
*/
if (defined('PHPWG_ROOT_PATH')) return; /* Avoid Automatic install under Piwigo */
/*  Copyright 2009-2012  VDigital  (email : vpiwigo[at]gmail[dot]com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
if (!defined('PWGP_NAME')) define('PWGP_NAME','PiwigoPress');
if (!defined('PWGP_VERSION')) define('PWGP_VERSION','2.1.0');
load_plugin_textdomain('pwg', 'wp-content/plugins/piwigopress', 'piwigopress' );
add_shortcode('PiwigoPress', 'PiwigoPress_photoblog');

function PiwigoPress_photoblog($parm) {
	$default = array(
				'url' => '',
				'id' => 0, 		// image_id
				'size' => 'la', // Default large
				'desc' => 0, 	// Generate picture description
				'class' => '',	// Specific class
				'style' => ''	// Specific style
		);
	extract(shortcode_atts( $default, $parm ));
	$previous_url = get_option( 'PiwigoPress_previous_url');
	if ($previous_url === false) {
		$previous_url = $_SERVER['HTTP_HOST'] . '/piwigo';
		add_option( 'PiwigoPress_previous_url', $previous_url );
	}
	if ($url == '') $url = $previous_url;
	if (substr($url,0,4)!='http') $url = 'http://' . $url;
	if (substr($url,-1)!='/') $url .= '/';
	if ($previous_url != $url) update_option( 'PiwigoPress_previous_url', $url );
	if ( !is_numeric($id) or $id < 1) return _('PiwigoPress shortcode attribute "id" is required and must be positive.','pwg');
	$deriv = array ( 'sq' => 'square', 'th' => 'thumb', 'sm' => 'small', 'xs' => 'xsmall', '2s' => '2small', 
					 'me' => 'medium', 'la' => 'large', 'xl' => 'xlarge', 'xx' => 'xxlarge');
	if (!function_exists('pwg_get_contents')) include 'PiwigoPress_get.php';
	$response = pwg_get_contents( $url . 'ws.php?method=pwg.images.getInfo&format=php&image_id=' . $id);
	$thumbc = unserialize($response);
	if ($thumbc["stat"] == 'ok') {
		$picture = $thumbc["result"];
		//var_dump($picture);
		if (isset($picture['derivatives']['square']['url'])) {
			$picture['tn_url'] = $picture['derivatives'][$deriv[$size]]['url'] ;
			$div = '<div class="PWGP_shortcode ' . $class . '"><a title="' . htmlspecialchars($picture['name']) . '" href="' 
				. $url . 'picture.php?/' . $picture['id'] . '" target="_blank"><img  class="PWGP_photo" src="' . $picture['tn_url'] . '" alt=""/>';
			if (isset( $picture['comment'] ) and $desc) { 
				$picture['comment'] = stripslashes(htmlspecialchars(strip_tags($picture['comment'])));
				$box_height = (24 * (int)(strlen($picture['comment'])/45))+32; 
				// estimated height of the box in case of description to avoid some vertical scrollbar inside the textarea
				$div .= '<textarea style="height: ' . $box_height . 'px;">' . $picture['comment'] . '</textarea>'; 
			}
			$div .= '</a>
			</div>';
		}
	}
	if ($style!='') $style = ' style="'.$style.'"';
	$str =  '<div id="Photo-' . $id . '-'. $size .'" class="PiwigoPress_photoblog"' . $style . '><!-- PiwigoPress Started -->';
	$str .=  $div . '</div><!-- PiwigoPress Ended -->';
	return $str;
}

class PiwigoPress extends WP_Widget
{
	function PiwigoPress(){
		$widget_ops = array('classname' => PWGP_NAME,
			'description' => __( "Adds a thumbnail and its link (to the picture) inside your blog sidebar.",'pwg') );
		$control_ops = array('width' => 300, 'height' => 300);
		$this->WP_Widget(PWGP_NAME, PWGP_NAME, $widget_ops, $control_ops);
	}
	// Code generator
	function widget($args, $gallery){
		include 'PiwigoPress_code.php';
	}
	function update($new_gallery, $old_gallery){
		$gallery = $old_gallery;
		$gallery['title'] = strip_tags(stripslashes($new_gallery['title']));
		$gallery['thumbnail'] = (bool) $new_gallery['thumbnail'];
		$gallery['thumbnail_size'] = strip_tags(stripslashes($new_gallery['thumbnail_size']));
		$gallery['format'] = strip_tags(stripslashes($new_gallery['format']));
		$gallery['piwigo'] = strip_tags(stripslashes($new_gallery['piwigo']));
		$gallery['external'] = strip_tags(stripslashes($new_gallery['external']));
		$gallery['number'] = intval(strip_tags(stripslashes($new_gallery['number'])));
		$gallery['category'] = intval(strip_tags(stripslashes($new_gallery['category'])));
		$gallery['from'] = intval(strip_tags(stripslashes($new_gallery['from'])));
		$gallery['divclass'] = strip_tags(stripslashes($new_gallery['divclass']));
		$gallery['class'] = strip_tags(stripslashes($new_gallery['class']));
		$gallery['most_visited'] = (strip_tags(stripslashes($new_gallery['most_visited'])) == 'true') ? 'true':'false';
		$gallery['best_rated'] = (strip_tags(stripslashes($new_gallery['best_rated'])) == 'true') ? 'true':'false';
		$gallery['most_commented'] = (strip_tags(stripslashes($new_gallery['most_commented'])) == 'true') ? 'true':'false';
		$gallery['random'] = (strip_tags(stripslashes($new_gallery['random'])) == 'true') ? 'true':'false';
		$gallery['recent_pics'] = (strip_tags(stripslashes($new_gallery['recent_pics'])) == 'true') ? 'true':'false';
		$gallery['calendar'] = (strip_tags(stripslashes($new_gallery['calendar'])) == 'true') ? 'true':'false';
		$gallery['tags'] = (strip_tags(stripslashes($new_gallery['tags'])) == 'true') ? 'true':'false';
		$gallery['comments'] = (strip_tags(stripslashes($new_gallery['comments'])) == 'true') ? 'true':'false';
		$gallery['mbcategories'] = (strip_tags(stripslashes($new_gallery['mbcategories'])) == 'true') ? 'true':'false';
		return $gallery;
	}
	function form($gallery){
		// Options
		include 'PiwigoPress_options.php';
	}
}

// Register 
function PiwigoPress_Init() {
			register_widget('PiwigoPress');
}
add_action('widgets_init', PWGP_NAME . '_Init');

// Style allocation
function PiwigoPress_load_in_head() {
    /* CSS */
	// wp_register_style( 'piwigopress_c', WP_PLUGIN_URL. '/piwigopress/css/piwigopress.css', array(), PWGP_VERSION );
	// wp_enqueue_style( 'piwigopress_c'); // doesn't include the additional style sheet inside the head tag section
	if (defined('PWGP_CSS_FILE')) return; // Avoid several links to CSS in case of several usage of PiwigoPress... 
	define('PWGP_CSS_FILE','');
	echo '<link media="all" type="text/css" href="' . 
		WP_PLUGIN_URL . '/piwigopress/css/piwigopress.css?ver=' . PWGP_VERSION . '" id="piwigopress_c-css" rel="stylesheet">'; // that's fine
}
add_action('wp_head',  PWGP_NAME . '_load_in_head');

// Script to be used
function PiwigoPress_load_in_footer() {
	/* Scripts */
	wp_register_script( 'piwigopress_s', WP_PLUGIN_URL . '/piwigopress/js/piwigopress.js', array('jquery'), PWGP_VERSION );
	wp_enqueue_script( 'jquery'); // include it even if it's done
	wp_enqueue_script( 'piwigopress_s' );
}
add_action('wp_footer',  PWGP_NAME . '_load_in_footer');

?>