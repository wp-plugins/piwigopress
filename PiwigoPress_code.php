<?php
if (defined('PHPWG_ROOT_PATH')) return; /* Avoid direct usage under Piwigo */
if (!defined('PWGP_NAME')) return; /* Avoid unpredicted access */

global $wpdb; /* Need for recent thumbnail access */
extract($args);

$title = apply_filters('widget_title', empty($gallery['title']) ? '&nbsp;' : $gallery['title']);
if ( $title ) $title = $before_title . $title . $after_title;

$piwigo = empty($gallery['piwigo']) ? '' : $gallery['piwigo'];
$piwigo_url = 'http://' . $_SERVER['HTTP_HOST'] . '/' . $piwigo ;
if (!empty($gallery['external'])) $piwigo_url = $gallery['external'];
if (substr($piwigo_url,-1)!='/') $piwigo_url .= '/';

$thumbnail = empty($gallery['thumbnail']) ? '' : $gallery['thumbnail'];

$options = '';
$number = empty($gallery['number']) ? 1 : intval($gallery['number']);
$options .= '&per_page=' . intval($gallery['number']);
if (!empty($gallery['category'])) $options .= '&cat_id=' . intval($gallery['category']);
$from = empty($gallery['from']) ? '12' : intval($gallery['from']);
$r = (array) $wpdb->get_results('SELECT date_sub( date( now( ) ) , INTERVAL ' . $from . ' MONTH ) as begin');
$from = $r[0]->begin;
if (!empty($gallery['from'])) $options .= '&f_min_date_created=' . $from;

$PiwigoPress_divclass = empty($gallery['divclass']) ? '' : (' class="' . $gallery['divclass'] .'"');
$PiwigoPress_class = empty($gallery['class']) ? '' : (' class="' . $gallery['class'] .'"');
$mbcategories = empty($gallery['mbcategories']) ? '' : $gallery['mbcategories'];
$most_visited = empty($gallery['most_visited']) ? '' : $gallery['most_visited'];
$best_rated = empty($gallery['best_rated']) ? '' : $gallery['best_rated'];
$most_commented = empty($gallery['most_commented']) ? '' : $gallery['most_commented'];
$random = empty($gallery['random']) ? '' : $gallery['random'];
$recent_pics = empty($gallery['recent_pics']) ? '' : $gallery['recent_pics'];
$calendar = empty($gallery['calendar']) ? '' : $gallery['calendar'];
$tags = empty($gallery['tags']) ? '' : $gallery['tags'];
$comments = empty($gallery['comments']) ? '' : $gallery['comments'];

echo $before_widget;
echo $title;
if (!function_exists('pwg_get_contents')) include 'PiwigoPress_get.php';

if ($thumbnail == 'true') {
	// Make the Piwigo link
	$response = pwg_get_contents( $piwigo_url 
			. 'ws.php?method=pwg.categories.getImages&format=php'
			. $options . '&recursive=true&order=random&f_with_thumbnail=true');
	$thumbc = unserialize($response);
	if ($thumbc["stat"] == 'ok') {
		$pictures = $thumbc["result"]["images"]["_content"];
		foreach ($pictures as $picture) {
			echo '<div' . $PiwigoPress_divclass . '><a title="' . htmlspecialchars($picture['name']) . '" href="' 
				. $piwigo_url . 'picture.php?/' . $picture['id'] . '"><img '
				. $PiwigoPress_class . ' src="' . $picture['tn_url'] . '" alt="" /></a></div>';
		}
	}
}

if ($mbcategories == 'true') {
	// Make the Piwigo category list
	$response = pwg_get_contents( $piwigo_url 
			. 'ws.php?method=pwg.categories.getList&format=php&public=true');
	$cats = unserialize($response);
	if ($cats["stat"] == 'ok') {
		echo '<ul style="clear: both;"><li>' . __('Pictures categories','pwg') . '<ul>';
		foreach ($cats["result"]["categories"] as $cat) {
			echo '<li><a title="' . $cat['name'] . '" href="' . $piwigo_url . 'index.php?category/' . $cat['id'] . '">' . $cat['name'] . '</a></li>';
		}
		echo '</ul></li></ul>';
	}
}

if ($most_visited == 'true' or $best_rated == 'true' or 
    $most_commented == 'true' or $random == 'true' or $recent_pics == 'true' or 
    $calendar == 'true' or $tags == 'true' or $comments == 'true') echo '<ul style="clear: both;">';

if ($most_visited == 'true') 
	echo '<li><a title="' . __('Most visited','pwg') . '" href="' . $piwigo_url . 'index.php?most_visited' . '">' . __('Most visited','pwg') . '</a></li>';

if ($best_rated == 'true') 
	echo '<li><a title="' . __('Best rated','pwg') . '" href="' . $piwigo_url . 'index.php?best_rated' . '">' . __('Best rated','pwg') . '</a></li>';

if ($most_commented == 'true') 
	echo '<li><a title="' . __('Most commented','pwg') . '" href="' . $piwigo_url . 'index.php?most_commented' . '">' . __('Most commented','pwg') . '</a></li>';

if ($random == 'true') 
	echo '<li><a title="' . __('Random','pwg') . '" href="' . $piwigo_url . 'random.php' . '">' . __('Random','pwg') . '</a></li>';

if ($recent_pics == 'true')
	echo '<li><a title="' . __('Recent pics','pwg') . '" href="' . $piwigo_url . 'index.php?recent_pics' . '">' . __('Recent pics','pwg') . '</a></li>';

if ($calendar == 'true') 
	echo '<li><a title="' . __('Calendar','pwg') . '" href="' . $piwigo_url . 'index.php?created-monthly-calendar' . '">' . __('Calendar','pwg') . '</a></li>';

if ($tags == 'true') 
	echo '<li><a title="' . __('Tags','pwg') . '" href="' . $piwigo_url . 'tags.php' . '">' . __('Tags','pwg') . '</a></li>';

if ($comments == 'true') 
	echo '<li><a title="' . __('Comments','pwg') . '" href="' . $piwigo_url . 'comments.php' . '">' . __('Comments','pwg') . '</a></li>';


if ($most_visited == 'true' or $best_rated == 'true' or 
    $most_commented == 'true' or $random == 'true' or $recent_pics == 'true' or 
    $calendar == 'true' or $tags == 'true' or $comments == 'true') echo '</ul>';

echo $after_widget;

?>