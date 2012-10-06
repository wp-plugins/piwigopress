=== PiwigoPress ===
Contributors: vpiwigo
Donate link: http://www.vdigital.org/sharing/
Tags: galleries, pictures, randomize, shortcode, gallery, integration, photos, drag, drop, widget, media, piwigo
Requires at least: 2.8.4
Tested up to: 3.4.2
Stable tag: 2.2.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

From any open API Piwigo gallery, swiftly include your photos in Posts/Pages and/or add randomized thumbnails and menus in your sidebar.

== Description ==

On the one hand, PiwigoPress is a WordPress **Sidebar Widget** that links your blog to some public pictures of a Piwigo gallery. 
Thus, a Piwigo gallery with several public pictures in it is a prerequisite to make it working. 
But even if you don't have one yet, you can nonetheless give this plugin a try by using the 
Official Piwigo [demonstration gallery][] before setting up your own gallery.

PiwigoPress generates several highly valuable links in sidebars of your WordPress 
blog, all of them being optional: a random thumbnail linking to the corresponding picture page, 
menus directing to all categories defined as public in the gallery, several additional links 
to most recent, most viewed, most commented pictures, and more.

On the other hand, by using **a shortcode** [PiwigoPress ...] you can add any public picture of a Piwigo gallery.
Here again you should try even though you don't have yet your Piwigo Gallery.
Have a look with [PiwigoPress id=72 url='http://piwigo.org/demo'] in a post or page.

Above all, PiwigoPress provides a shortcode **generator**. 
Each time you add some pictures to your gallery you will be able to add a post related to your last uploaded photos.
So, your friends and family are going to like your photos and Search Engines are going reference your gallery with the refbacks provided by PiwigoPress.

When you've finished testing and want to create you own gallery, go to the Piwigo [download page][], 
where you'll find all the links you might need.

Try "NetInstall" first. If it fails, switch to the "Package" download and follow the full 
installation procedure. 
When ready, if you are a bit lost, just try Photos add page sheets (Web form, Applications, FTP + Synchronization) 
in your Piwigo gallery administration page.

PiwigoPress is a Plugin/Widget signed and supported by a Former Piwigo Team member.
[demonstration gallery]: http://piwigo.org/demo/  "The demonstration gallery"
[download page]: http://piwigo.org/basics/downloads  "Piwigo download page"

== Installation ==

How to install nanually PiwigoPress and get it working ? (automatic installation is working perfectly).

1. Upload `PiwigoPress` complete folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Access to Widgets, draw PiwigoPress to the sidebar you want or create/update a post/page and click on the PP icon above the editor area.
4. Don't forget that any gallery URL is the folder address (ending with a slash ("/") where is ws.php is available.
5. The selected gallery Webservices have to be opened, and some public pictures have to be available (and unlocked). 

Explanation of Plugin Widget data fields.

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


Explanation of Plugin Shortcode attributes.

* id: (required) Photo Numeric identifier
* url: (mandadory for first usage in a post or to change to another) domaine or domaine/piwigo-folder 
* size: (default size='la') 2 letters as sq(Square), (th)Thumbnail, (2s)XXS - tiny, (xs)XS - extra small, (sm)S - small, 
(me)M - medium, (la)L - large, (xl)XL - extra large,(xx)XXL - huge : see you Piwigo configuration [Photo sizes] admin page
* class : (optional) additional CSS class selectors at DIV tag level (e.g. class="img-drop-cap img-shadow left")
* style: (optional) any additional CSS rules at DIV tag level (e.g. style="background-color: rgba(16, 64, 192, 0.05);")
* desc: (0,1) (0 by default) add the photo description in a blockquote from description field 
in the Edit photo [Properties] admin page if there is a filled description there
* lnktype: (string, default lnktype='picture') 'none' : no link, 'picture' : link to picture.php, 'album' : link to index.php/category

"style" is not used by the Shortcode generator

== Frequently Asked Questions ==

= Widget (only): How can I get any thumbnails ? =
* Just have the URL without the /index.php? on the end.
* Just have recent pictures in the gallery.
* Change Since X months (0=all) from 12 to 0
* Set "Number of pictures (0=none)" to 1 or 2  
* If it doesn't work, see the provided screenshots...

= How can I get other sizes ? I only have thumbs and squares. =
* In your gallery admin pages, find Configuration 
and there select: Options > Photo sizes > Multiple size > show details

= How can I get squared thumbnails ? =
* maybe you should try to upgrade your gallery to Piwigo 2.4.x or above.
* See creenshots

= Widget (Only): With Link type Album which album would be selected ? =
If Album = 0 the link will remain to the picture page.
Otherwise, if Number of pictures > 0 the firt picture will link the Album page, next pictures will refer to their picture page.

= Shortcode (Only): With Link type Album which album would be selected ? =
Picture is going to have a link to its most recent Album page (Upcoming releases should cover other cases).

= Shortcode generator (only): Why did I get a warning message ? =
* Message is "No available public picture or Piwigo release < 2.4.x" (Won't be translated)
* Disconnect you from the gallery and try to access to any Albums, maybe all pictures are locked or private
* Second possible cause: Old piwigo release. Only recent releases (2.4 and above) provide several picture sizes.
* Backward compatibility below Piwigo 2.4 is limited to Widget sidebar functions

== Screenshots ==

1. Widget parameters for the demo gallery 
2. Expected result in your sidebar
3. Widget parameters for your gallery (on the same domain)
4. Piwigo admin Photo sizes (from a Gallery website)
5. PiwigoPress shortcode samples
6. PiwigoPress shortcode generator above Post/Page editor usable with both Visual/HTML editor.
7. Buttons, Drag and Drop zones for a total intuitive interface.
8. Generation and insertion of the shortcodes are done at caret (insert cursor) position.
9. Expected result on your page or post of your Wordpress blog. 

== Changelog ==

= 2.22 =
* **New shortcode parameter** lnktype = 'picture', 'none', or 'album' (most recent album id) : indicates the link type of the shortcoded picture
* Small bugs (functional defects) within Shortcode generator have been corrected 
* Shortcode generator generates lnktype parameter
* **New widget parameter** Link type (Differ from lnktype here above) "album" link the first picture to the selected album id
* **New Caption widget parameter** to have the caption directly with the displayed and selected pictures.
* Sidebar widget has been totally rewritten  

= 2.21 =
* Minor issues solved in drag & drop.
* jQuery code reviewed
* WordPress 3.4.2 support 
If you don't have your own up-to-date Piwigo gallery, just try it with Piwigo demo URL: http://piwigo.org/demo/

= 2.20 =
* Edit post/page shortcode generator using Drag-n-drop (a useful tool for your photoblog). 
If you don't have your own up-to-date Piwigo gallery, just try it with Piwigo demo URL: http://piwigo.org/demo/

= 2.10 =
* I18n version (Hugarian)
* Widget: Largest sizes added (from user request)
* WordPress shortcode for post/page: e.g. [PiwigoPress id=72 url='http://piwigo.org/demo/']

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

== Upgrade Notice ==

= 2.21 =
Performances

= 2.20 =
Swiftly transform your blog in a photoblog. 

= 2.00 = 
Previous PiwigoPress releases didn't support the most Piwigo recent releases (if you upgrade your Piwigo Gallery to 2.4.x or above, PiwigoPress 1.04 and older releases will fail).