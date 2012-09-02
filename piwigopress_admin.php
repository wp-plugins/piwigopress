<?php
if (defined('PHPWG_ROOT_PATH')) return; /* Avoid direct usage under Piwigo */
if (!defined('PWGP_NAME')) return; /* Avoid unpredicted access */
if (!defined('PWGP_VERSION')) define('PWGP_VERSION','2.2.0');
if (!function_exists('pwg_get_contents')) include 'PiwigoPress_get.php';

if(!class_exists('PiwigoPress_Admin')){
	class PiwigoPress_Admin {

		function PiwigoPress_Admin(){
			add_filter( 'media_buttons_context', array(&$this,'Add_new_button'), 9999 );
			add_action( 'in_admin_header', PWGP_NAME . '_load_in_head' ); 
			add_action( 'in_admin_footer', PWGP_NAME . '_load_in_footer' ); 
			 
			add_action( 'save_post',  array(&$this, 'Save_options'));
			// add_action("admin_menu", array($this, "getAdminMenu"));
		}
		function Save_options( $post_ID ) {
			$PWGP_options = serialize(array(
				'previous_url' 		=>  (string) $_POST['piwigopress_url'],
				'thumbnail_size' 	=>  (string) $_POST['thumbnail_size'],
				'desc_check'		=>  (bool) $_POST['desc_check'],
				'photo_class'		=>  $_POST['photo_class'],
			));
			if ( strlen($_POST['piwigopress_url']) > 6 ) update_option( 'PiwigoPress_previous_options', $PWGP_options );
		}
		function Add_new_button($context=''){
			$PWGP_options = serialize(array(
				'previous_url' 		=> 'http://piwigo.org/demo/',
				'thumbnail_size' 	=> 'me',
				'desc_check'		=> (bool) true,
				'photo_class'		=> 'img-shadow',
			));
			$previous_options = get_option( 'PiwigoPress_previous_options', $PWGP_options );
			extract( unserialize($previous_options) );
			if ( !in_array($thumbnail_size, array('sq','th','xs','2s','sm','me','la','xl','xx'))) $thumbnail_size='la';
			$url  = __('Piwigo gallery URL:','pwg');
			$recommendation = __('Folder URL of any up-to-date Piwigo Gallery with public photos and opened webservices (MUST END with a "/")','pwg');
			$load = __('Start with 5 recent pics','pwg');
			$loaddesc = __('Load or reload the 5 most latest squared thumbnails from the url (might be changed or not)','pwg');
			$more = __('Get more','pwg');
			$moredesc = __('Getting more squared thumbnails: starts by 5, then 5, 10, 10, 10, 10, 50, and continues by 100','pwg');
			$hide = __('Hide 50%','pwg');
			$hidedesc = __('Hide 50% or less of current available squared thumbnails','pwg');
			$show = __('Show hidden','pwg');
			$showdesc  = __('Display all currently hidden squared thumbnails','pwg');
			$drop = __('Drop one or several thumbnails over the blue border here above !','pwg');
			$loadreq = __('Loaded, hidden & dropped vs. Requested thumbnails: ','pwg');
			$desc_options = __('Shortcode options','pwg');
			$Lib_sq =  __('Square','pwg');
			$Lib_th =  __('Thumbnail','pwg');
			$Lib_xs =  __('XS - extra small','pwg');
			$Lib_2s =  __('XXS - tiny','pwg');
			$Lib_sm =  __('S - small','pwg');
			$Lib_me =  __('M - medium','pwg');
			$Lib_la =  __('L - large','pwg');
			$Lib_xl =  __('XL - extra large','pwg');
			$Lib_xx =  __('XXL - huge','pwg');
			$csq = checked($thumbnail_size,'sq',false);
			$cth = checked($thumbnail_size,'th',false);
			$cxs = checked($thumbnail_size,'xs',false);
			$c2s = checked($thumbnail_size,'2s',false);
			$csm = checked($thumbnail_size,'sm',false);
			$cme = checked($thumbnail_size,'me',false);
			$cla = checked($thumbnail_size,'la',false);
			$cxl = checked($thumbnail_size,'xl',false);
			$cxx = checked($thumbnail_size,'xx',false);
			$descrip_check = checked($desc_check,true,false);
			$Lib_desc =  __('Display description','pwg');
			$Lib_CSS_div =  __('CSS DIV class','pwg');
			$Gen_insert =  __('Generate and insert','pwg');
			$gendesc = __('Generate shortcodes of all dropped squared thumbnails','pwg');
			$Reset_drop =  __('Reset dropping zone','pwg');
			$rstdesc = __('Remove all squared thumbnails from the dropping zone','pwg');
			echo <<<EOF
<div id="PWGP_Gallery_finder" style="display:none">
	<label>$url
	<input id="PWGP_finder" type="text" value="$previous_url" name="piwigopress_url" style="width: 250px;" title="$recommendation"></label>
	&nbsp;	<a id="PWGP_more" rel="nofollow" href="javascript:void(0);" class="hidden" title="$moredesc">$more</a>
	&nbsp;	<a id="PWGP_hide" rel="nofollow" href="javascript:void(0);" class="hidden" title="$hidedesc">$hide</a>
	&nbsp;	<a id="PWGP_show" rel="nofollow" href="javascript:void(0);" class="hidden" title="$showdesc">$show</a>
	&nbsp;	<a id="PWGP_show" rel="nofollow" href="javascript:void(0);" class="hidden" title="$showdesc">$show</a>
	&nbsp;	<a id="PWGP_show_button" rel="nofollow" href="javascript:void(0);" class="button" title="$loaddesc">$load</a>
	<ul class='hidden'></ul>
	<div class="PWGP_system" style="display:none">
		<div class="PWGP_gallery">
			<ul id="PWGP_dragger"> 
			</ul>
			<span id="PWGP_show_stats" class="hidden">$loadreq<span id="PWGP_stats"> </span></span>	&nbsp;		&nbsp;	

			<img id="PWGP_Load_Active" src="../wp-content/plugins/piwigopress/img/LoadActive.gif" style="display: none;"/>

			<div id="PWGP_dropping"> 
				<ul class='gallery ui-helper-reset'></ul>
			</div>

			<h3> $drop </span></h3>
		</div>
	</div>
	<fieldset id="PWGP_short_option">
		<legend><span> $desc_options </span></legend>
		<div class="thumbnail-select"><table id="thumbnail_size"><tr>
				 <td><label><input type="radio" value="sq" class="post-format" name="thumbnail_size" $csq> $Lib_sq</label>	&nbsp;	
			</td><td><label><input type="radio" value="th" class="post-format" name="thumbnail_size" $cth> $Lib_th</label>	&nbsp;	
			</td><td><label><input type="radio" value="xs" class="post-format" name="thumbnail_size" $cxs> $Lib_xs</label>	&nbsp;	
			</td><td><label><input type="radio" value="2s" class="post-format" name="thumbnail_size" $c2s> $Lib_2s</label>	&nbsp;	
			</td></tr><tr><td><label><input type="radio" value="sm" class="post-format" name="thumbnail_size" $csm> $Lib_sm</label>	&nbsp;	
			</td><td><label><input type="radio" value="me" class="post-format" name="thumbnail_size" $cme> $Lib_me</label>	&nbsp;	
			</td><td><label><input type="radio" value="la" class="post-format" name="thumbnail_size" $cla> $Lib_la</label>	&nbsp;	
			</td><td><label><input type="radio" value="xl" class="post-format" name="thumbnail_size" $cxl> $Lib_xl</label>	&nbsp;	
			</td></tr><tr><td><label><input type="radio" value="xx" class="post-format" name="thumbnail_size" $cxx> $Lib_xx</label>	&nbsp;	
			</td><td><label>$Lib_CSS_div 	&nbsp; <input id="photo_class" style="width: 200px;" name="photo_class" type="text" value="$photo_class" /></label>
			</td><td><label><input id="desc_check" style="width: 30px;" name="desc_check" type="checkbox" $descrip_check value="true" /> &nbsp; $Lib_desc</label>
			</td></tr></table>
			<table><tr></tr><tr><td><a id="PWGP_Gen" rel="nofollow" href="javascript:void(0);" class="hidden" title="$gendesc">$Gen_insert</a>&nbsp;</br>
			</td><td><a id="PWGP_rst" rel="nofollow" href="javascript:void(0);" class="hidden" title="$rstdesc">$Reset_drop</a>&nbsp;</br>
			</td></tr></table>
		</div>
	</fieldset>
</div>
EOF;
			return $context . '<a id="PWGP_button" rel="nofollow" href="javascript:void(0);" 
			title="'. __('Insert a PiwigoPress shortcode from a Piwigo dragged photo','pwg') . '">
			<img src="../wp-content/plugins/piwigopress/img/PiwigoPress.png"/></a>';
		}
	}
}
if (!is_object($PWG_Adm)) {
	$PWG_Adm = new PiwigoPress_Admin();
}

/*
	function getAdminMenu() {
		add_submenu_page("plugins.php", "PiwigoPress", "PiwigoPress", "administrator", basename(__FILE__), array(&$PWG_Adm, "getAdminContent"));
	}
*/

?>