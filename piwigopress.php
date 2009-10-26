<?php
/*
Plugin Name: PiwigoPress
Plugin URI: http://piwigo.org/ext/extension_view.php?eid=316
Description: PiwigoPress is a WordPress 2.8 widget, it links a public picture in your Piwigo gallery (<a href="http://piwigo.org/">Piwigo</a>). In other words, it's a WordPress Sidebar Widget with some available public pictures in your Piwigo gallery as a prereq.
Version: 1.04
Author: vpiwigo ( for The Piwigo Team )
Author URI: http://www.vdigital.org/sharing/
*/
if (defined('PHPWG_ROOT_PATH')) return; /* Avoid Automatic install under Piwigo */
/*  Copyright 2009  VDigital  (email : vpiwigo[at]gmail[dot]com)

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

load_plugin_textdomain('pwg', 'wp-content/plugins/piwigopress', 'piwigopress' );

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
		$gallery['thumbnail'] = (strip_tags(stripslashes($new_gallery['thumbnail'])) == 'true') ? 'true':'false';
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
?>