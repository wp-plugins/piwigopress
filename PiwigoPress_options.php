<?php
if (defined('PHPWG_ROOT_PATH')) return; /* Avoid direct usage under Piwigo */
if (!defined('PWGP_NAME')) return; /* Avoid unpredicted access */

	// Defaults
	$gallery = wp_parse_args( (array) $gallery, array('title'=>__('Random picture'), 
		'thumbnail'=>'true', 'piwigo'=>'piwigo', 'external'=>'', 'number'=>1, 'category'=>0, 'from'=> 12, 'divclass'=>'', 
		'class'=>'',  'most_visited' => 'true', 'best_rated' => 'true',
		'most_commented' => 'true', 'random' => 'true', 'recent_pics' => 'true',
		'calendar' => 'true', 'tags' => 'true', 'comments' => 'true', 'mbcategories' => 'true',
		 ) );

	$title = htmlspecialchars($gallery['title']);
	$thumbnail = (htmlspecialchars($gallery['thumbnail']) == 'true') ? 'checked="checked"':'';
	$piwigo = htmlspecialchars($gallery['piwigo']);
	$external = htmlspecialchars($gallery['external']);
	$number = intval($gallery['number']);
	$category = intval($gallery['category']);
	$from = intval($gallery['from']);
	$divclass = htmlspecialchars($gallery['divclass']);
	$class = htmlspecialchars($gallery['class']);
	$mbcategories = (htmlspecialchars($gallery['mbcategories']) == 'true') ? 'checked="checked"':'';
	$most_visited = (htmlspecialchars($gallery['most_visited']) == 'true') ? 'checked="checked"':'';
	$best_rated = (htmlspecialchars($gallery['best_rated']) == 'true') ? 'checked="checked"':'';
	$most_commented = (htmlspecialchars($gallery['most_commented']) == 'true') ? 'checked="checked"':'';
	$random = (htmlspecialchars($gallery['random']) == 'true') ? 'checked="checked"':'';
	$recent_pics = (htmlspecialchars($gallery['recent_pics']) == 'true') ? 'checked="checked"':'';
	$calendar = (htmlspecialchars($gallery['calendar']) == 'true') ? 'checked="checked"':'';
	$tags = (htmlspecialchars($gallery['tags']) == 'true') ? 'checked="checked"':'';
	$comments = (htmlspecialchars($gallery['comments']) == 'true') ? 'checked="checked"':'';

	// Options
	echo '<p style="text-align:right;"><label for="' . $this->get_field_name('title') . '">' . __('Title','pwg') 
	. ' <input style="width: 250px;" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title')
	. '" type="text" value="' . $title . '" /></label></p>';
	// Thumbnail
	echo '<p style="text-align:right;"><label for="' . $this->get_field_name('thumbnail') . '">' . __('Get thumbnails','pwg') 
	. ' <input style="width: 50px;" id="' . $this->get_field_id('thumbnail') . '" name="' . $this->get_field_name('thumbnail')
	. '" type="checkbox" value="true" ' . $thumbnail . '/></label></p>';
	// Piwigo directory
	echo '<p style="text-align:right;"><label for="' . $this->get_field_name('piwigo') . '">' . __('<strong>Local</strong> directory (if local)','pwg') 
	. ' <input style="width: 200px;" id="' . $this->get_field_id('piwigo') . '" name="' . $this->get_field_name('piwigo')
	. '" type="text" value="' . $piwigo . '" /></label></p>';
	// External website
	echo '<p style="text-align:right;"><label for="' . $this->get_field_name('external') . '">' . __('(or) <strong>External</strong> gallery URL','pwg') 
	. ' <input style="width: 250px;" id="' . $this->get_field_id('external') . '" name="' . $this->get_field_name('external')
	. '" type="text" value="' . $external . '" /></label></p>';
	// number of pictures
	echo '<p style="text-align:right;"><label for="' . $this->get_field_name('number') . '">' . __('Number of pictures (0=none)','pwg') 
	. ' <input style="width: 30px;" id="' . $this->get_field_id('number') . '" name="' . $this->get_field_name('number')
	. '" type="text" value="' . $number . '" /></label></p>';
	// Optional parameters
	echo '<h5>' . __('Optional parameters','pwg') . '</h5>';
	// Selected category
	echo '<p style="text-align:right; font-size:8px; margin:0;"><label for="' . $this->get_field_name('category') . '">' . __('Category id (0=all)','pwg') 
	. ' <input style="width: 30px;" id="' . $this->get_field_id('category') . '" name="' . $this->get_field_name('category')
	. '" type="text" value="' . $category . '" /></label></p>';
	// from
	echo '<p style="text-align:right; font-size:8px; margin:0;"><label for="' . $this->get_field_name('from') . '">' . __('Since X months (0=all)','pwg') 
	. ' <input style="width: 30px;" id="' . $this->get_field_id('from') . '" name="' . $this->get_field_name('from')
	. '" type="text" value="' . $from . '" /></label></p>';
	// divclass
	echo '<p style="text-align:right; font-size:8px; margin:0;"><label for="' . $this->get_field_name('divclass') . '">' . __('CSS DIV class','pwg') 
	. ' <input style="width: 200px;" id="' . $this->get_field_id('divclass') . '" name="' . $this->get_field_name('divclass')
	. '" type="text" value="' . $divclass . '" /></label></p>';
	// class
	echo '<p style="text-align:right; font-size:8px; margin:0;"><label for="' . $this->get_field_name('class') . '">' . __('CSS IMG class','pwg') 
	. ' <input style="width: 200px;" id="' . $this->get_field_id('class') . '" name="' . $this->get_field_name('class')
	. '" type="text" value="' . $class . '" /></label></p>';

	// The categories menu
	echo '<table><tr><td style="text-align:right; font-size:8px;" colspan="2"><label for="' . $this->get_field_name('mbcategories') . '">' . __('Categories menu','pwg') 
	. ' <input style="width: 50px;" id="' . $this->get_field_id('mbcategories') . '" name="' . $this->get_field_name('mbcategories')
	. '" type="checkbox" value="true" ' . $mbcategories . '/></label></td>';
	// The most visited
	echo '</tr><tr><td style="text-align:right; font-size:8px;"><label for="' . $this->get_field_name('most_visited') . '">' . __('Most visited','pwg') 
	. ' <input style="width: 50px;" id="' . $this->get_field_id('most_visited') . '" name="' . $this->get_field_name('most_visited')
	. '" type="checkbox" value="true" ' . $most_visited . '/></label></td>';
	// The best rated
	echo '<td style="text-align:right; font-size:8px;"><label for="' . $this->get_field_name('best_rated') . '">' . __('Best rated','pwg') 
	. ' <input style="width: 50px;" id="' . $this->get_field_id('best_rated') . '" name="' . $this->get_field_name('best_rated')
	. '" type="checkbox" value="true" ' . $best_rated . '/></label></td>';
	// The most commented
	echo '</tr><tr><td style="text-align:right; font-size:8px;"><label for="' . $this->get_field_name('most_commented') . '">' . __('Most commented','pwg') 
	. ' <input style="width: 50px;" id="' . $this->get_field_id('most_commented') . '" name="' . $this->get_field_name('most_commented')
	. '" type="checkbox" value="true" ' . $most_commented . '/></label></td>';
	// The random link
	echo '<td style="text-align:right; font-size:8px;"><label for="' . $this->get_field_name('random') . '">' . __('Random','pwg') 
	. ' <input style="width: 50px;" id="' . $this->get_field_id('random') . '" name="' . $this->get_field_name('random')
	. '" type="checkbox" value="true" ' . $random . '/></label></td>';
	// The recent pics
	echo '</tr><tr><td style="text-align:right; font-size:8px;"><label for="' . $this->get_field_name('recent_pics') . '">' . __('Recent pics','pwg') 
	. ' <input style="width: 50px;" id="' . $this->get_field_id('recent_pics') . '" name="' . $this->get_field_name('recent_pics')
	. '" type="checkbox" value="true" ' . $recent_pics . '/></label></td>';
	// The calendar
	echo '<td style="text-align:right; font-size:8px;"><label for="' . $this->get_field_name('calendar') . '">' . __('Calendar','pwg') 
	. ' <input style="width: 50px;" id="' . $this->get_field_id('calendar') . '" name="' . $this->get_field_name('calendar','pwg')
	. '" type="checkbox" value="true" ' . $calendar . '/></label></td>';
	// The random
	echo '</tr><tr><td style="text-align:right; font-size:8px;"><label for="' . $this->get_field_name('tags') . '">' . __('Tags','pwg') 
	. ' <input style="width: 50px;" id="' . $this->get_field_id('tags') . '" name="' . $this->get_field_name('tags')
	. '" type="checkbox" value="true" ' . $random . '/></label></td>';
	// The tags
	echo '<td style="text-align:right; font-size:8px;"><label for="' . $this->get_field_name('comments') . '">' . __('Comments','pwg') 
	. ' <input style="width: 50px;" id="' . $this->get_field_id('comments') . '" name="' . $this->get_field_name('comments','pwg')
	. '" type="checkbox" value="true" ' . $tags . '/></label></td></tr></table>';

?>