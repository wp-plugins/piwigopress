=== PiwigoPress ===
Contributors: vpiwigo
Donate link: http://www.vdigital.org/sharing/
Tags: galleries, public pictures, randomize
Requires at least: 2.8.4
Tested up to: 2.8.5
Stable tag: 1.0.4

This widget integrates in your blog sidebars some randomized thumbnails and some links from your or any open API Piwigo gallery.

== Description ==

PiwigoPress is a WordPress 2.8 Sidebar Widget that links to the pictures of a Piwigo gallery. 
Thus, a Piwigo gallery with several public pictures in it is a prerequisite to make it work. 
But even if you don't have one yet, you can nonetheless give this plugin a try by using the 
Official Piwigo [demonstration gallery][] before
setting up your own gallery.

PiwigoPress can display several links to the Piwigo gallery in the sidebars of your WordPress 
blog, all of them being optional: a random thumbnail linking to the corresponding picture page, 
menus directing to all categories defined as public in the gallery, several additional links 
to most recent, most viewed, most commented pictures, and more.

When you've finished testing and want to create you own gallery, go to the Piwigo [download page][], 
where you'll find all the links you might need.

Try "NetInstall" first. If it fails, switch to the "Package" download and follow the full 
installation procedure. Try « pLoader » but in any case, you will find an « Instructions » link 
in your Piwigo gallery administration page.

A Widget signed and supported by the Piwigo Team.
[demonstration gallery]: http://piwigo.org/demo  "The demonstration gallery"
[download page]: http://piwigo.org/downloads  "Piwigo download page"

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
* Most visited 
* Best rated 
* Most commented (need a plugin in the client gallery)
* Random
* Recent pics 
* Calendar 
* Keywords 
* Comments 

== Frequently Asked Questions ==

Currently, none.

= A question that someone might have =

Anwsers will come later.

== Screenshots ==

1. Widget parameters for the demo gallery 
2. Expected result in your sidebar
3. Widget parameters for your gallery (on the same domain)

== Changelog ==

= 1.04 = 
* Alternate pwg_get_contents (file\_get\_contents, fsockopen, ...)
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
* Link bug with some theme... Solved.

= 1.0 =
* First version.