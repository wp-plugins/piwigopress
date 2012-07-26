=== PiwigoPress ===
Contributors: vpiwigo
Donate link: http://www.vdigital.org/sharing/
Tags: galleries, public pictures, randomize
Requires at least: 2.8.4
Tested up to: 3.4.1
Stable tag: 2.0.0

This widget integrates in your blog sidebars some randomized thumbnails and some links from your or any open API Piwigo gallery.

== Description ==

PiwigoPress is a WordPress Sidebar Widget that links to the pictures of a Piwigo gallery. 
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

A Widget signed and supported by a Former Piwigo Team member.
[demonstration gallery]: http://piwigo.org/demo  "The demonstration gallery"

== Installation ==

How to install PiwigoPress and get it working.

1. Upload `PiwigoPress` complete folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Access to Widgets, draw PiwigoPress to the sidebar you want

Explanation of Plugin data fields.

* Title: To use in the sidebar
* Square, Thumbnail, XXS - tiny,... : see you Piwigo configuration [Photo sizes] admin page
* Orientation criteria : Any, portrait, landscape
* Local directory (if local): Piwigo installation directory (on the same website)
* (or) External gallery URL: URL to the gallery (if not local)
* Number of pictures (0=none): Number of thumbnails to get

Optional parameters
* Category id (0=all): Pictures from a specific Piwigo category or from all
* Since X months (0=all): Age of posted picture
* CSS DIV class: For your blog design
* CSS IMG class: For your blog design
* Categories menu: Includes all links related to Piwigo categories

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

How can I get any thumbnails ?
* Just have the URL without the /index.php? on the end.
* Just have recent pictures in the gallery.
* Change Since X months (0=all) from 12 to 0
* Set "Number of pictures (0=none)" to 1 or 2  
* If it doesn't work, see the provided screenshots...

How can I get other sizes ? I only have thumbs and squares.
* In your gallery admin pages, find Configuration 
and select: Options > Photo sizes > Multiple size > show details

= A question that someone might have =

How can I get squared thumbnails ?
* maybe you should try to upgrade your gallery to Piwigo 2.4.x or above.
* See creenshots

== Screenshots ==

1. Widget parameters for the demo gallery 
2. Expected result in your sidebar
3. Widget parameters for your gallery (on the same domain)
4. Piwigo admin Photo sizes (from a Gallery website)

== Changelog ==

= 2.00 = 
* Support of WordPress from 2.8.0 to 3.4.1 (and probably above)
* Support of Piwigo 2.4.x (and probably above)
* Support of Piwigo 2.0.x - 2.3.x assumed
* cURL access support (3rd way to solve webservice call issues)
* CSS DIV class: img-shadow and/or img-show-desc are now provided
* Orientation filtering

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