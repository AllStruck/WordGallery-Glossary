=== WordGallery Glossary ===
Contributors: AllStruck
Donate link: http://wordgallery-glossary.allstruck.net/donate
Tags: glossary, terms, words, gallery, definitions, plugin, widget, page, comments
Requires at least: 3.0
Tested up to: 3.2.1
Stable tag: 1.0.6

Easily add a simple glossary of terms to your site. A widget is also included to display a few random terms with a link to the full glossary.

== Description ==

WordGallery Glossary is a plugin that makes it easy to add a glossary of terms to your WordPress website. Simply add terms just like any post or page, then create a page to display them on and select it in the options. Options for the glossary page also include using jQuery to hide definitions on load and animate them in and out on click or tap. The plugin also adds a widget to display a selected number of random terms with links.

Additional features and functionality will be added with future versions and any recommendations and comments are appreciated. Please show your support by visiting http://wordgallery-glossary.allstruck.com where you can get support, share your thoughts and even make a donation. AllStruck develops open source plugins and themes for your enjoyment.

== Installation ==

There are three methods that can be used to install WordPress plugins, WordGallery Glossary can be installed in any of these three ways:

1. Install from WordPress Plugins Directory by clicking "Install" button.
1. Download 'wordglossary-gallery.zip' and upload the file directly in the 'Plugins' menu.
1. Download 'wordglossary-gallery.zip', extract the files, and upload the directory `wordglossary-gallery` to the `/wp-content/plugins/` directory.

Once the plugin has been installed, it must also be activated before it can be configured and used.

== Configuration ==

After activating this plugin a new page is added for configuration of WordGallery Glossary, it can be found by opening the 'Settings' menu item and clicking on 'WG Glossary'.

You will need to have a page ready for the glossary of terms to be displayed on if you wish to use this feature: We recommend creating a new blank page, you could create a title of 'Glossary' with a slug of 'glossary' if you wish.

Now in the options panel select the page you created in the drop-down menu and select your preferences for the remaining options.

NOTE: You will now need to use the plugin to get glossary terms to display on this page, terms are added manually (see the Usage section for instruction.)

== Usage ==

This plugin will add a new section to the administrative menu in WordPress, after activation under 'Pages' you will find a new menu called 'Glossary Terms' where you can add, list, and edit terms.

A glossary term is a lot like any other page on your site but it will not be displayed in lists of pages or posts. It is instead a 'glossary-term' and so with the standard (not the default) permalink structure these pages will be located under [your-site.com]/glossary-term/term-slug and it's important to note that you will not be able to view a listing of the terms at /glossary-term or /glossary-terms, only the selected override page will show the aggregated listing.

Once you have published glossary terms they are automatically displayed on the page you selected in the configuration, and each term can be viewed on it's own page but will not be linked in automatic site menus or page lists as mentioned above.

*Widget:* This plugin adds a widget called 'WG-Glossary' that can be added to any widget area with qualified themes. Settings include a title, the number of random terms to display on the widget, change location of link on each term to glossary page, and show a link at the bottom to the glossary page.

NOTE: Glossary terms on the full listing page will link to the individual term page unless the jQuery animation option is enabled. Keep this in mind when configuring the plugin, if you do not want visitors to see the individual pages for glossary terms you should enable jQuery animation and leave the 'read more' link disabled.

== F.A.Q. ==

= How do I add glossary terms? =

WordGallery Glossary adds a new type of post/page to your WordPress site. After activating the plugin you'll see "Glossary Terms" as a new menu under pages in your administrative interface. Add terms like you would any page, these terms will each have their own page at your-site.com/glossary-term/glossary-term-slug, and when you create a blank page and configure the plugin to use it to display terms on all of the terms and their definitions (the page content) will appear with the style selected in the settings panel.

= Is this plugin WPMU or network activated friendly?  =

WordGallery Glossary can be used with network activated WordPress installations and will keep glossaries of each blog separate. Since the plugin is developed for WordPress 3.0 and above there is not any support or testing for WPMU or WordPress prior to 3.0, you may try this at your own risk and we may or may not add support for earlier versions... in the future...

= Can I create more than one Glossary of Terms? =

Currently only one glossary page is supported with WordGallery Glossary.

= Can the display style of the items on the full glossary page be changed? =

Since version 1.0.4 you can modify the appearance of the glossary page more using custom CSS, by default the custom CSS field contains a sample style that makes it fairly easy to modify. You may also choose from one of the 6 pre-loaded CSS styles, or add your own CSS file(s) to the plugin's style folder.

= Can this plugin be used for other uses other than a Glossary of Terms? =

This plugin may be used to display any type of information that you want to have collected in a definition list style (terms and definitions), this plugin is great for displaying a list of frequently asked questions (FAQ) and more. As of version 1.0.7 you can rename the custom post type created, along with the URL slug associated with them.

== Screenshots ==

1. The glossary display in each of the 6 styles available.
2. The settings panel.

== Changelog ==

= 1.0.7 =
* BUGFIX: Removed copy of jQuery added by this plugin, now using jQuery included with WP.
* BUGFIX: Added glossary of terms naming to edit page and menu(s).
* Complete code cleanup/overhaul, code is now MVC and OO.*
* Added custom icon for edit page and menu(s).
* Moved Glossary Terms menu; is now below comments and just a few ticks above second divider (55).
* Widgetized options page.
* Added Colors section to settings page.
* Added options in Colors section of settings page for many various elements of user interface.
* Removed all colors from styles (CSS).
* Added automatic linking functionality for glossary terms (not enabled by default.)
* Added 'Automatic Linking' section to settings page.
* Added option in 'Automatic Linking' section of settings page to enable automatic linking using glossary term titles.
* Added new field on Edit Glossary Term page for creating auto-link terms for glossary terms.
* Added option to ignore automatic linking search terms.

= 1.0.6 =
* BUGFIX: Added clear-fix to titles on each style to fix hidden show-more link.

= 1.0.5 =
* Added option to show a credit link below glossary, linking to the WordGallery Glossary website.

= 1.0.4 =
* Update to style processing, if updating from a previous version you will need to reselect a style in the options panel.
* This update makes it possible to customize the style using CSS directly, either using the custom-style text field in the options panel or by adding your own .css file to the plugin's style folder.
* Updated and filled out the CSS styles provided, added three new styles (Puffy-Clouds, Purple-Clouds, and Squareville), changed the name "Rounded Corners" to "Papercut-Avoided", and changed the name "Standard" to "Snore-Fest."

= 1.0.3 =
* BUGFIX: Added menu_position to fix conflict with other plugins and glossary menu.

= 1.0.2 =
* BUGFIX: Inclusion of jQuery file.

= 1.0.1 =
* BUGFIX: Definition was contained within a P tag, changed to DIV for ability to add additional block level elements without bugs.

= 1.0 =
* First public release.
* Straight forward glossary plugin with a little bit of style.
