=== PiwigoPress ===
Contributors: vpiwigo
Donate link: http://www.vdigital.org/sharing/
Tags: galleries, public pictures, randomize
Requires at least: 2.8.4
Tested up to: 2.8.5
Stable tag: trunk

This widget integrates in your blog sidebars some randomized thumbnails and some links from your or any open API Piwigo gallery.

== Description ==

PiwigoPress is a WordPress 2.8 widget, it links public pictures in your Piwigo gallery (Piwigo). 
In other words, it's a WordPress Sidebar Widget with some available public pictures in your Piwigo gallery as a prereq.

If you don't have a Piwigo Gallery already, you can try this plugin based on the Official Piwigo demo: http://piwigo.org/demo

Once convinced, you go to the Piwigo download page http://piwigo.org/downloads
(All links on this page are what you could need).

Try NetInstall if it fails switch to the package download and follow the full install procedure.
Try pLoader but in all case, in your Piwigo gallery administration pages, you will find the Instructions link.

Once your gallery online, PiwigoPress will offer to your blog in its sidebars:
- Random public thumbnails with a link to the related picture (medium size) in your gallery,
- Menu to all public categories of pictures,
- Several links to recent, most viewed, most commented pictures and more.

All of these are PiwigoPress options.


== Installation ==

How to install PiwigoPress and get it working.

1. Upload `PiwigoPress` complete folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Access to Widgets, draw PiwigoPress to the sidebar you want

Explanation of Plugin data fields.

Title: To use in the sidebar
Get thumbnails: Embed thumbnails or ignore (Another option will come later)
Local directory (if local): Piwigo installation directory (on the same website)
(or) External gallery URL: URL to the gallery (if not local)
Number of pictures (0=none): Number of thumbnails to get

Optional parameters
Category id (0=all): Pictures from a specific Piwigo category or from all
Since X months (0=all): Age of posted picture
CSS DIV class: For your blog design
CSS IMG class: For your blog design
Categories menu: Includes all links related to Piwigo categories

All below selectable option are special Piwigo links to include:
Most visited - Best rated - Most commented - Random
Recent pics - Calendar - Keywords - Comments 

== Frequently Asked Questions ==

Currently, none.

= A question that someone might have =

Anwsers will come later.

== Screenshots ==

1. Sshot_result.png in your sidebar
2. Sshot_demo.png Widget parameters for the demo gallery
3. Sshot_local.png Widget parameters for your local gallery

== Changelog ==

= 1.04 = 
* Alternate pwg_get_contents (file_get_contents, fsockopen, ...)
* cURL is coming

= 1.03 = 
* Project rename: Directory name changed for WordPress constraints
* Language issue solved 
* Pre-version for WordPress publication

= 1.02 = 
* Project rename: Public Piwigo WordPress Widget becomes PiwigoPress
* I18n version (Italian)

= 1.01 = 
* I18n version (French, Spanish,...)
  Link bug with some theme... Solved.

= 1.0 =
* First version.