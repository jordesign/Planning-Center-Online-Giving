=== Planning Center Online Giving ===
Contributors: jordesign, wpchurchteam
Requires at least: 4.7
Tested up to: 4.8
Stable tag: 1.0
License: GPL2



== Description ==
This plugin makes it simple to insert the [Planning Center Online](https://planning.center/) 'Giving' widget in your site with a shortcode or widget.

== Installation ==
1). Download the plugin

2). Install the plugin by either:
extracting the .zip file and uploading the entire planning-center-online-giving folder to the /wp-content/plugins/ directory of our web server, or...
go to Plugins > Add New in the WordPress Admin and upload the .zip file.

3). Activate the Plugin. You can now insert the 'Give' button using the shortcode


NOTE: Your server will require an SSL certificate in order for payments to be processed through the PCO system. Talk to your web host for further details.

== Frequently Asked Questions ==

= Where do I Find My Church Subdomain? =

This is the unique string that is used when you give online, or manage your PCO account. It is the portion inside the brackets of -[yourchurchsubdomain].churchcenteronline.com.

= How Do I Insert My Button? =

You can insert the button into your page content using the shortcode <code>[pco-giving]</code>. It will use the Church Subdomain, Button Text and styling class defined in the plugin settings, but can be overidden by using the additional attributes in the format <code>[pco-giving button="Donate Now" subdomain="firstballard" class="button"]</code>.

= What additional attributes can I use with the shortcode? =
<strong><code>button</code></strong>
This replaces the string of text displayed within the button.

<strong><code>subdomain</code></strong>
This is the subdomain associated with your 'Planning Center Online' account.

<strong><code>class</code></strong>
This can be used to add CSS classes your theme might use for button or link styling.


= Is this secure? =
Whilst PCO processes payments securely - we recommend you only use the give button on  a page that is protected with SSL encryption. It's pretty cheap to add and usually costs around $30-50 a year depending on the service. Talk to your hosting provider to find out more details.

== Changelog ==

v1.0 First release of core plugin