=== Toolbar Buddy ===
Contributors: daveshine, deckerweb
Donate link: http://genesisthemes.de/en/donate/
Tags: toolbar, tool bar, adminbar, admin bar, ithemes, builder, framework, pluginbuddy, backupbuddy, loopbuddy, displaybuddy, administration, resources, links, theme, settings, manage, deckerweb, ddwtoolbar
Requires at least: 3.3
Tested up to: 3.5
Stable tag: 1.4.0
License: GPLv2 or later
License URI: http://www.opensource.org/licenses/gpl-license.php

This plugin adds useful admin links and resources for iThemes Builder and popular iThemes/PluginBuddy Plugins to the WordPress Toolbar / Admin Bar.

== Description ==

= Have Quicker Access - Time Saver! =
This **small and lightweight plugin** just adds a lot of *iThemes Builder* and *iThemes Plugins/PluginBuddy* related resources to your toolbar / admin bar. Also links to all settings pages of *Builder* and supported *iThemes Plugins* are added, making life for webmasters (a.k.a. Admins and Super Admins) a lot easier. So you might just switch from the frontend of your site to the *Builder* 'Layouts' or adjust the schedule for 'BackupBuddy Backups' etc.

As the name suggests this plugin is **intended towards site admins and super admins**. The new admin bar entries will only be displayed if the current user has a proper WordPress capability originally required by *Builder* or the supported plugins. And yes, **Toolbar Buddy supports Multisite installs** which is especially useful for *BackupBuddy*... :-)

= Features =
* "iThemes Builder Framework" support (current 3.x branch!)
* "BackupBuddy" plugin support, for current 2.x branch AND upcoming 3.x branch (currently beta!), including all Multisite features
* "LoopBuddy" plugin support
* "DisplayBuddy" plugin series support, including these 12 plugins: Accordion / Billboard / BoomBar / Carousel / Copious Comments / Featured Posts / Rotating Images / Rotating Text / Slides / Slideshow / Tipsy / Video Showcase
* Great time & clicks saver for admins / super admins
* Only display toolbar and menu items for proper capabilities
* Multisite compatible! (supports network-activation)
* Resource/Support links for each module or plugin included!
* 5 Hooks, 6 filters and 9 constants allow for special customizing/ branding purposes for the plugin's output. Great for developers doing client stuff or need this for other purposes. -- [See the FAQ section here](http://wordpress.org/extend/plugins/toolbar-buddy/faq/) for more info on that.
* Fully internationalized! Real-life tested and developed with international users in mind! Also supports update-secure custom language file (if you need special wording...)
* Fully WPML compatible!
* Fully optimized:
 * The already lightweight stuff only gets loaded if needed!
 * Toolbar Buddy consists of 4 modules: iThemes Builder stuff / BackupBuddy stuff / LoopBuddy stuff / DisplayBuddy stuff
 * If none of the supported stuff is activated nothing will be loaded or displayed!
 * If resource links group is deactivated via constant, stuff won't be loaded!
 * Plugin's extra admin links load only within "wp-admin"!

= Special Features =
* This time supporting all official iThemes/ Builder/ iThemes Plugins sites
* Link to downloadable German language packs - only displayed when German locales are active (de_DE, de_AT, de_CH, de_LU)
* *NOTE:* I would be more than happy to add more language/locale specific resources and more useful third-party links - just contact me!

= iThemes Builder specific Plugin Support =
*At this time the plugin out of the box supports also links to settings pages of these Builder-specific add-on plugins:*

* "Builder Style Manager"
* "Builder SEO"
* "Builder Block Events" (post types for Events and Venues - "Builder" needs to be activated first!)
* "Builder Block Church" (post types for Sermons and Staff Members - "Builder" needs to be activated first!)
* "Builder Block Restaurant" (post types for Menu Items and Locations - only useful if "Builder" Child Theme supports it)

= Localization =
* English (default) - always included
* German (de_DE) - always included
* .pot file (`toolbar-buddy.pot`) for translators is also always included :)
* Easy plugin translation platform with GlotPress tool: [Translate "Toolbar Buddy"...](http://translate.wpautobahn.com/projects/wordpress-plugins-deckerweb/toolbar-buddy)
* *Your translation? - [Just send it in](http://genesisthemes.de/en/contact/)*

[A plugin from deckerweb.de and GenesisThemes](http://genesisthemes.de/en/)

= Feedback =
* I am open for your suggestions and feedback - Thank you for using or trying out one of my plugins!
* Drop me a line [@deckerweb](http://twitter.com/deckerweb) on Twitter
* Follow me on [my Facebook page](http://www.facebook.com/deckerweb.service)
* Or follow me on [+David Decker](http://deckerweb.de/gplus) on Google Plus ;-)

= Tips & More =
* When using *Builder Block Events* with *Gravity Forms*, [you might want check out my "Gravity Forms Toolbar" plugin :)](http://wordpress.org/extend/plugins/gravity-forms-toolbar/)
* Check out more great helper plugins for admins in [my WordPress Toolbar / Admin Bar plugin series...](http://wordpress.org/extend/plugins/tags/ddwtoolbar)
* [Also see my other plugins](http://genesisthemes.de/en/wp-plugins/) or see [my WordPress.org profile page](http://profiles.wordpress.org/daveshine/)
* Tip: [*GenesisFinder* - Find then create. Your Genesis Framework Search Engine.](http://genesisfinder.com/)

== Installation ==

1. Upload the entire `toolbar-buddy` folder to the `/wp-content/plugins/` directory -- or just upload the ZIP package via 'Plugins > Add New > Upload' in your WP Admin
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Look at your toolbar / admin bar for the "iBuddy" entry and enjoy using the new links there :)
4. Go and manage your theme/framework and/or plugin settings - plus some content stuff :)

**Please note, this plugin requires WordPress 3.3 or higher in order to work!**

**Multisite install:** Yes, it's fully compatible but I recommend you to have a look in the [FAQ section here](http://wordpress.org/extend/plugins/toolbar-buddy/faq/) for more info :)

**Own translation/wording:** For custom and update-secure language files please upload them to `/wp-content/languages/toolbar-buddy/` (just create this folder) - This enables you to use fully custom translations that won't be overridden on plugin updates. Also, complete custom English wording is possible with that, just use a language file like `toolbar-buddy-en_US.mo/.po` to achieve that (for creating one see the tools on "Other Notes").

== Frequently Asked Questions ==

= Does this plugin work with latest WordPress version and also older versions? =
Yes, this plugin works really fine with the latest WordPress 3.3+ and also 3.4!
And sorry, it DOES NOT work with older WordPress versions so please update your install if you haven't done yet :).

= I don't see any new toolbar entries/links? =
You must be an "Administrator" or "Super Administrator" (Multisite) in your install! Otherwise nothing gets displayed. Toolbar Buddy just takes over completely the behavior of its supported theme and/or plugins. (So if you have a general problem with that you should contact the iThemes support.)

*Note:* Toolbar Buddy also respects the removal of "My Theme" menu if set via "Builder" or child theme functions.php file. In this case NO Builder-specific links will be displayed!

= Help, I now have two Builder-related toolbar items? =
Toolbar Buddy items appear under "iBuddy" where the original "Builder" items just appear under "Builder". That way you can manage your current layout used by the site and its depending widget content. "iBuddy" then manages all other things... :) (Note: By user request I just decided to let both go hand in hand as the default setting. Removal of original "Builder" item in plugin version 1.0 was disabled by plugin version 1.1. --- Since I still wanted to have only one item I added the optional removing of the original item via a constant in your child theme's `functions.php file` - just add this code:
`
/** Toolbar Buddy: Remove Original Builder Toolbar Items */
define( 'TBB_REMOVE_BUILDER_ORIGINAL_TOOLBAR', TRUE );
`

= Why is the main toolbar entry called "iBuddy"? =
This is just my shortened version of the term "iThemes and PluginBuddy". I wanted it really short and unique and somewhat related to this brand so I came up with that name. I hope you like it... If not, just introduce your own wording/branding via another language file. --- Since the rebranding of "PluginBuddy" to just iThemes or iThemes Plugins, I still think "iBuddy" remains the perfect fit, especially regarding the hugely popular "BackupBuddy" plugin among others :).

= How are new resources being added to the toolbar/admin bar? =
Just drop me a note on [my Twitter @deckerweb](http://twitter.com/deckerweb) or via my contact page and I'll add the link if it is useful for admins/ webmasters and the iThemes Builder and iThemes Plugins/PluginBuddy communities.

= How could my plugin/extension or child theme options page be added to the toolbar/admin bar links? =
This is possible of course and highly welcomed! Just drop me a note on [my Twitter @deckerweb](http://twitter.com/deckerweb) or via my contact page and we sort out the details!
Particularly, I need the admin url for the primary options page (like so `wp-admin/admin.php?page=foo`) - this is relevant for both, plugins and child themes. For child themes then I also need the correct name defined in the stylesheet (like so `Footheme`) and the correct folder name (like so `footheme-folder`) because this would be the template name when using with child themes. (Note: I don't own all the premium stuff myself yet so you're more than welcomed to help me out with these things. Thank you!)

= Is this plugin Multisite compatible? =
Yes, it is! :) Works really fine in Multisite invironment - also see next Q/A...

= In Multisite, could I "network enable" this plugin? =
Of course, that's possible and fully supported! If you use "BackupBuddy" in Multisite then you will have it running network-activated. And so you should do the same with Toolbar Buddy to fully support the slightly different stuff of BackupBuddy in Multisite!

If you don't use BackupBuddy in your Multisite then it's better to enable Toolbar Buddy only on a per site basis because all other setting links are only site-related! Only in the following edge case it makes sense to network-activate (with no BackupBuddy active): if all of the sites in Multisite have one or all of the following in common: Builder Theme / Builder plugin add-ons / LoopBuddy plugin / DisplayBuddy plugin(s). This might be the case if you use Multisite for multilingual projects, especially with that awesome plugin: http://wordpress.org/extend/plugins/multilingual-press/

= Can custom menu items be hooked in via theme/child theme or other plugins? =
Yes, this is possible since version 1.2 of the plugin! There are 5 action hooks available for hooking custom menu items in -- `tbb_custom_ithemes_group_items` for the "Builder" section, `tbb_custom_displaybuddy_group_items` for the "DisplayBuddy" section, `tbb_custom_loopbuddy_group_items` for the "LoopBuddy" section, `tbb_custom_backupbuddy_group_items` for the "BackupBuddy" section and `tbb_custom_iresource_group_items` for the resource group section. Here's an example code:
`
add_action( 'tbb_custom_iresource_group_items', 'tbb_custom_additional_iresource_group_item' );
/**
 * Toolbar Buddy: Custom iResource Group Items
 *
 * @global mixed $wp_admin_bar
 */
function tbb_custom_additional_iresource_group_item() {

	global $wp_admin_bar;

	$wp_admin_bar->add_menu( array(
		'parent' => 'ddw-ibuddy-iresourcegroup',
		'title'  => __( 'Custom Menu Item Name', 'your-textdomain' ),
		'href'   => 'http://deckerweb.de/',
		'meta'   => array( 'title' => __( 'Custom Menu Item Name Tooltip', 'your-textdomain' ) )
	) );
}
`

= Can certain sections be removed? =
Yes, this is possible since version 1.2 of the plugin! You can remove the following sections: "Builder Theme" area (all items) / "DisplayBuddy" area (all items) / "LoopBuddy" area (all items) / "BackupBuddy" area (all items) / "Resources link group" at the bottom (all items) / "German language stuff" (all items)

To achieve this add one, some or all of the following constants to your child theme's `functions.php` or similar file (or functionality plugin or whatever...):
`
/** Toolbar Buddy: Remove all Builder Items */
define( 'TBB_BUILDER_DISPLAY', FALSE );

/** Toolbar Buddy: Remove Builder's Manage Content Items */
define( 'TBB_BUILDER_MANAGE_CONTENT_DISPLAY', FALSE );

/** Toolbar Buddy: Remove DisplayBuddy Items */
define( 'TBB_DISPLAYBUDDY_DISPLAY', FALSE );

/** Toolbar Buddy: Remove LoopBuddy Items */
define( 'TBB_LOOPBUDDY_DISPLAY', FALSE );

/** Toolbar Buddy: Remove BackupBuddy Items */
define( 'TBB_BACKUPBUDDY_DISPLAY', FALSE );

/** Toolbar Buddy: Remove iResource Items */
define( 'TBB_RESOURCES_DISPLAY', FALSE );

/** Toolbar Buddy: Remove German Language Items */
define( 'TBB_DE_DISPLAY', FALSE );
`

= Can the the whole toolbar entry be removed, especially for certain users? =
Yes, that's also possible! This could be useful if your site has special user roles/capabilities or other settings that are beyond the default WordPress stuff etc. For example: if you want to disable the display of any "Toolbar Buddy" items for all user roles of "Editor" please use this code:
`
/** Toolbar Buddy: Remove ALL items for "Editor" user role */
if ( current_user_can( 'editor' ) ) {
	define( 'TBB_ALL_DISPLAY', FALSE );
}
`

To hide only from the user with a user ID of "2":
`
/** Toolbar Buddy: Remove ALL items for user ID 2 */
if ( 2 == get_current_user_id() ) {
	define( 'TBB_ALL_DISPLAY', FALSE );
}
`

To hide items only in frontend use this code:
`
/** Toolbar Buddy: Remove ALL items from frontend */
if ( ! is_admin() ) {
	define( 'TBB_ALL_DISPLAY', FALSE );
}
`

In general, use this constant do hide any "Toolbar Buddy" items:
`
/** Toolbar Buddy: Remove ALL items */
define( 'TBB_ALL_DISPLAY', FALSE );
`

= Available Filters to Customize More Stuff =
All filters are listed with the filter name in bold and the below additional info, helper functions (if available) as well as usage examples.

**tbb_filter_capability_all**

* Default value: `edit_posts`
* 4 Predefined helper functions:
 * `__tbb_admin_only` -- returns `'administrator'` role -- usage:
`
add_filter( 'tbb_filter_capability_all', '__tbb_admin_only' );
`
 * `__tbb_role_editor` -- returns `'editor'` role -- usage:
`
add_filter( 'tbb_filter_capability_all', '__tbb_role_editor' );
`
 * `__tbb_cap_edit_theme_options` -- returns `'edit_theme_options'` capability -- usage:
`
add_filter( 'tbb_filter_capability_all', '__tbb_cap_edit_theme_options' );
`
 * `__tbb_cap_manage_options` -- returns `'manage_options'` capability -- usage:
`
add_filter( 'tbb_filter_capability_all', '__tbb_cap_manage_options' );
`
 * `__tbb_cap_install_plugins` -- returns `'install_plugins'` capability -- usage:
`
add_filter( 'tbb_filter_capability_all', '__tbb_cap_install_plugins' );
`
* Another example:
`
add_filter( 'tbb_filter_capability_all', 'custom_tbb_capability_all' );
/**
 * Toolbar Buddy: Change Main Capability
 */
function custom_tbb_capability_all() {
	return 'activate_plugins';
}
`
--> Changes the capability to `activate_plugins`

**tbb_filter_main_icon**

* Default value: iThemes Logo default graphic from the plugin's "images" folder
* 8 Predefined helper functions:
`
add_filter( 'tbb_filter_main_icon', '__tbb_icon_builder' );

add_filter( 'tbb_filter_main_icon', '__tbb_icon_buildertwo' );

add_filter( 'tbb_filter_main_icon', '__tbb_icon_pluginbuddy' );

add_filter( 'tbb_filter_main_icon', '__tbb_icon_pluginbuddytwo' );

add_filter( 'tbb_filter_main_icon', '__tbb_icon_displaybuddy' );

add_filter( 'tbb_filter_main_icon', '__tbb_icon_loopbuddy' );

add_filter( 'tbb_filter_main_icon', '__tbb_icon_backupbuddy' );

add_filter( 'tbb_filter_main_icon', '__tbb_child_images_icon' );
`
--> Where the last helper function returns the icon file (`icon-tbb.png`) found in your current child theme's `/images/` subfolder

* Example for using with child themes and Builder (or any other parent theme):
`
add_filter( 'tbb_filter_main_icon', 'custom_child_tbb_main_icon' );
/**
 * Toolbar Buddy: Change Main Icon (Child Theme)
 */
function custom_child_tbb_main_icon() {
	return get_stylesheet_directory_uri() . '/images/custom-icon.png';
}
`
--> Uses a custom image from your active child theme's `/images/` folder

--> Recommended dimensions are 16px x 16px

**tbb_filter_main_icon_display**

* Returning the CSS class for the main item icon
* Default value: `icon-ibuddy` (class is: `.icon-ibuddy`)
* 1 Predefined helper function:
 * `__tbb_no_icon_display()` -- usage:
`
add_filter( 'tbb_filter_main_icon_display', '__tbb_no_icon_display' );
`
 * This way you can REMOVE the icon!
* Another example:
`
add_filter( 'tbb_filter_main_icon_display', 'custom_tbb_main_icon_display_class' );
/**
 * Toolbar Buddy: Change Main Icon CSS Class
 */
function custom_tbb_main_icon_display_class() {
	return 'your-custom-icon-class';
}
`
--> You then have to define CSS rules in your `style.css` file of your child theme stylesheet for your own custom class `.your-custom-icon-class`

**tbb_filter_main_item**

* Default value: "iBuddy"
* Example code for your `functions.php` file or similar file from child theme:
`
add_filter( 'tbb_filter_main_item', 'custom_tbb_main_item' );
/**
 * Toolbar Buddy: Change Main Item Name
 */
function custom_tbb_main_item() {
	return __( 'Your custom main item', 'your-child-theme-textdomain' );
}
`

**tbb_filter_main_item_tooltip**

* Default value: "iBuddy"
* Example code for your `functions.php` file or similar file from child theme:
`
add_filter( 'tbb_filter_main_item_tooltip', 'custom_tbb_main_item_tooltip' );
/**
 * Toolbar Buddy: Change Main Item Name's Tooltip
 */
function custom_tbb_main_item_tooltip() {
	return __( 'Your custom main item tooltip', 'your-child-theme-textdomain' );
}
`

**tbb_filter_ibuddy_hq_name**

* Default value: "iBuddy HQ"
* Used for the resource group item in the toolbar to enable proper branding
* Change things like in the other examples/principles shown above


**Final note:** I DON'T recommend to add customization code snippets to your main theme's/child theme's `functions.php` file! **Please use a functionality plugin or an MU-plugin instead!** This way you can also use this better for Multisite environments. In general you are then more independent from theme/child theme changes etc. If you don't know how to create such a plugin yourself just use one of my recommended 'Code Snippets' plugins. Read & bookmark these Sites:

* [**"What is a functionality plugin and how to create one?"**](http://wpcandy.com/teaches/how-to-create-a-functionality-plugin) - *blog post by WPCandy*
* [**"Creating a custom functions plugin for end users"**](http://justintadlock.com/archives/2011/02/02/creating-a-custom-functions-plugin-for-end-users) - *blog post by Justin Tadlock*
* DON'T hack your `functions.php` file: [Resource One](http://thomasgriffinmedia.com/custom-snippets-plugin/) - [Resource Two](http://thomasgriffinmedia.com/blog/2012/09/calling-on-the-wordpress-community/) *(both by Thomas Griffin Media)*
* [**"Code Snippets"** plugin by Shea Bunge](http://wordpress.org/extend/plugins/code-snippets/) - also network wide!
* [**"Code With WP Code Snippets"** plugin by Thomas Griffin](https://github.com/thomasgriffin/CWWP-Custom-Snippets) - Note: Plugin currently in development at GitHub.
* [**"Toolbox Modules"** plugin by Sergej Müller](http://wordpress.org/extend/plugins/toolbox/) - see also his [plugin instructions](http://playground.ebiene.de/toolbox-wordpress-plugin/).

All the custom & branding stuff code above can also be found as a Gist on GitHub: https://gist.github.com/2597157 (you can also add your questions/ feedback there :)

== Screenshots ==

1. Toolbar Buddy in action - second level - "Builder" settings ([click on image for larger view](https://www.dropbox.com/s/84wkejpdqtoofmk/screenshot-1.png)).
2. Toolbar Buddy in action - second level - "Builder" manage content, includes "Widget Contents" as well as dynamic support for the "Builder Blocks" plugins ([click on image for larger view](https://www.dropbox.com/s/84nw4l1nyly8eiz/screenshot-2.png)).
3. Toolbar Buddy in action - second level - "BackupBuddy" backups ([click on image for larger view](https://www.dropbox.com/s/1es9m3uni7y4wf1/screenshot-3.png)).
4. Toolbar Buddy in action - third level - "DisplayBuddy" - "Accordion" management ([click on image for larger view](https://www.dropbox.com/s/crbgml8zze5ttv8/screenshot-4.png)).
5. Toolbar Buddy in action - third level - resources section - "Builder" Support/Codex ([click on image for larger view](https://www.dropbox.com/s/vjq0cexb1a533a7/screenshot-5.png)).
6. Toolbar Buddy in action - third level - resources section - iBuddy HQ ([click on image for larger view](https://www.dropbox.com/s/a00lm4h9glk4az1/screenshot-6.png)).
7. Toolbar Buddy in action on a Multisite install - showing with only "BackupBuddy 2.x" activated, full support for all Multisite extras of that plugin, including capabilities! ([Click on image for larger view](https://www.dropbox.com/s/fzvxuj7jfy55zjd/screenshot-7.png))

== Changelog ==

= 1.4.0 (2012-12-09) =
* *General updates:*
 * UPDATE: Changed some wording/branding to fully support the rebranding of former "PluginBuddy" imprint into iThemes/ iThemes Plugins.
 * UPDATE: Maintained/ updated resources links.
 * NEW: Added link to new "My Stashboard" within iThemes members area - for the new "Stash" remote destination for BackupBuddy customers (only displayed if BackupBuddy is active!).
* *Plugin support:*
 * NEW: Added support for new plugin "BoomBar" within DisplayBuddy series.
 * UPDATE: Changed "Remote Destinations" settings link for BackupBuddy, to support changes introduced in BackupBuddy 3.1+ branch. So please update your BackupBuddy install to the latest version if you don't have yet!
 * UPDATE: Currently removed "Export Site" for Administrators in Multisite - seems currently not working or deactivated in latest BackupBuddy versions (tested with v3.1.6.5).
* *Other stuff:*
 * CODE: Some code/ documentation updates & improvements.
 * UPDATE: Updated readme.txt file here.
 * UPDATE: Updated German translations and also the .pot file for all translators!
 * UPDATE: Initiated new three digits versioning, starting with this version.
 * UPDATE: Moved screenshots to 'assets' folder in WP.org SVN to reduce plugin package size.

= 1.3.2 (2012-06-15) =
* *Maintenance release.*
* UPDATE: Small improvement for BackupBuddy 3.x branch: improved check in Multisite for allowing export to 'administrators' (However, it's recommended to re-save this special setting in BackupBuddy admin if you previously had used their beta version!)
* CODE: Minor code/documentation tweaks and improvements.
* UPDATE: Updated German translations and also the .pot file for all translators!

= 1.3.1 (2012-05-23) =
* UPDATE: For *BackupBuddy 3.x* branch: Properly implemented the "Export Site" feature for 'admininstrator' user roles in Multisite installs, correspondending with the setting in BackupBuddy. --- This feature was somehow forgotten in the v1.3 release, sorry folks! :)
* UPDATE: Improved overall capability checks for the *BackupBuddy 3.x* branch.
* UPDATE: Updated German translations and also the .pot file for all translators!

= 1.3.0 (2012-05-23) =
* *New features:*
 * NEW: Added full support for new BackupBuddy 3.0 branch, currently in beta (so DON'T use on live sites!!).
 * NEW: Added 7 new helper functions for the main item icon - including icons for Builder, PluginBuddy brand, DisplayBuddy, LoopBuddy and BackupBuddy. [(see FAQ here)](http://wordpress.org/extend/plugins/toolbar-buddy/faq/)
 * NEW: Added a new constant for removing sections if needed, this time for the Builder-related "Manage Content" section. [(see FAQ here)](http://wordpress.org/extend/plugins/toolbar-buddy/faq/)
 * NEW: Added video resource links for Builder, LoopBuddy and BackupBuddy to their specific resources sections.
* CODE: Minor code/documentation tweaks and improvements, also improving performance if sections are removed.
* UPDATE: Updated German translations and also the .pot file for all translators!

= 1.2.0 (2012-05-04) =
* *New features:*
 * NEW: Added full support for newly released "Builder Block Events".
 * NEW: Added 5 action hooks for hooking custom menu items in - for all main sections (see FAQ section here for more info on that).
 * NEW: Added 6 filters and 7 constants for better customizing the plugin's output (see FAQ section here for more info on that).
* CODE: Beside new features, minor code/documentation tweaks and improvements.
* CODE: Successfully tested against current Builder/PluginBuddy versions, plus WordPress 3.3 branch and new 3.4 branch. Also successfully tested in WP_DEBUG mode (no notices or warnings).
* BUGFIX: Fixed PHP notices
* UPDATE: Updated German translations and also the .pot file for all translators!
* UPDATE: Extended GPL License info in readme.txt as well as main plugin file.
* NEW: Easy plugin translation platform with GlotPress tool: [Translate "Toolbar Buddy"...](http://translate.wpautobahn.com/projects/wordpress-plugins-deckerweb/toolbar-buddy)

= 1.1.0 (2012-02-28) =
* Disabled the removal of original "Builder" toolbar item - by user request!
* Corrected/updated readme.txt file

= 1.0.0 (2012-02-27) =
* Initial release
* Including support for iThemes Builder Framework
* Including support for 4 Builder-specific plugin add-ons
* Including support for 13 plugins of PluginBuddy brand

== Upgrade Notice ==

= 1.4.0 =
Several additions & improvements: Updated & improved wording, branding, documentation. Refined BackupBuddy support, added "Stash". Also, updated German translations plus .pot file for all translators.

= 1.3.2 =
Maintenance release: Improvements for Multisite support with BackupBuddy 3.x branch. Also, updated German translations plus .pot file for all translators.

= 1.3.1 =
Several additions & improvements: Added BackupBuddy 3.x support! Added 7 helper functions for main item icon. Code tweaks & improvements. Also, updated German translations plus .pot file for all translators.

= 1.3.0 =
Several additions & improvements: Added BackupBuddy 3.x support! Added 7 helper functions for main item icon. Code tweaks & improvements. Also, updated German translations plus .pot file for all translators.

= 1.2.0 =
Several additions & improvements: Added "Builder Block Events" support! Also added hooks, filters, constants for customizing/branding purposes. Further, updated German translations plus .pot file for all translators.

= 1.1.0 =
Disabled the removal of original "Builder" toolbar item - by user request! Corrected/updated readme.txt file.

= 1.0.0 =
Just released into the wild.

== Plugin Links ==
* [Translations (GlotPres)](http://translate.wpautobahn.com/projects/wordpress-plugins-deckerweb/toolbar-buddy)
* [User support forums](http://wordpress.org/support/plugin/toolbar-buddy)
* [Developers: customization codes (GitHub Gist)](https://gist.github.com/2597157)
* *Plugin tip 1:* [My "Gravity Forms Toolbar"](http://wordpress.org/extend/plugins/gravity-forms-toolbar/) - great, when using *Gravity Forms*, especially with *Builder Block Events* :)
* *Plugin tip 2:* [My WordPress Toolbar / Admin Bar plugin series...](http://wordpress.org/extend/plugins/tags/ddwtoolbar)

== Donate ==
Enjoy using *Toolbar Buddy*? Please consider [making a small donation](http://genesisthemes.de/en/donate/) to support the project's continued development.

== Translations ==

* English - default, always included
* German (de_DE): Deutsch - immer dabei! [Download auch via deckerweb.de](http://deckerweb.de/material/sprachdateien/ithemes-und-pluginbuddy/#toolbar-buddy)
* For custom and update-secure language files please upload them to `/wp-content/languages/toolbar-buddy/` (just create this folder) - This enables you to use fully custom translations that won't be overridden on plugin updates. Also, complete custom English wording is possible with that as well, just use a language file like `toolbar-buddy-en_US.mo/.po` to achieve that (for creating one see the following tools).

**Easy plugin translation platform with GlotPress tool:** [**Translate "Toolbar Buddy"...**](http://translate.wpautobahn.com/projects/wordpress-plugins-deckerweb/toolbar-buddy)

*Note:* All my plugins are internationalized/ translateable by default. This is very important for all users worldwide. So please contribute your language to the plugin to make it even more useful. For translating I recommend the awesome ["Codestyling Localization" plugin](http://wordpress.org/extend/plugins/codestyling-localization/) and for validating the ["Poedit Editor"](http://www.poedit.net/), which works fine on Windows, Mac and Linux.

== Additional Info ==
**Idea Behind / Philosophy:** Just a little leightweight plugin for all the iThemes Builder and/or iThemes Plugins/PluginBuddy users out there to make their daily web admin life a bit easier. I might add even more plugin support in the future if it makes some sense. So stay tuned :).

**iBuddy News Planet** I also have started a little news/feed service for iThemes & iThemes Plugins/PluginBuddy brands via "FriendFeed" that you can subscribe to: http://friendfeed.com/ibuddy-news -- Please contact me via my Twitter for new resources (that have an RSS feed and are iThemes or iThemes Plugins/Pluginbuddy-related!)

== Credits ==
* Thanks to the *iThemes & iThemes Plugins* crew for providing great feedback when this plugind launched back in February of 2012! ;-)
