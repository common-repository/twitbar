=== Twitbar ===
Contributors: Indeedle
Donate link: http://www.indeedle.com
Tags: twitter
Requires at least: 2.6.5
Tested up to: 2.7
Stable tag: 0.0.7

A twitter widget that adds the code needed to create a Twitter sidebar

== Description ==

A twitter widget that adds the code needed to create a Twitter sidebar.

This is an extremely basic version, it basically just adds the widget to display your Twitter updates in your sidebar. 

Works with Wordpress MU up to 2.6.5.

== Installation ==

**Wordpress**
1. Upload `twitbar.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Visit the design/widgets options page and add the widget
1. Enter your Twitter username. This must have no spaces and lowercase.

**Wordpress MU**
1. Upload `twitbar.php` to the `/wp-content/plugins` directory *or* the `/wp-content/mu-plugins` directory if you want it to auto-load.
1. (If in plugins) Activate through the 'Plugins" menu in WordPress
1. Visit the design/widgets page and add the widget.
1. Enter your username for Twitter.

== Frequently Asked Questions ==

= Why is this so basic? =

Because I wrote it to do exactly what I wanted, since I really couldn't find anything that would do it for me. You can achieve the same thing by using the Text widget and copy/pasting the HTML, but Wordpress does funky HTML validation things so I wrote this to save my sanity.

= Can I get a feature added? =

Sure, poke me and I'll see what I can do.

= How does it work? =

It literally just puts the code for the HTML badge on twitter into your sidebar and footer. The footer has the script so it loads at the end of the page instead of during the middle (which hopefully speeds things up).
