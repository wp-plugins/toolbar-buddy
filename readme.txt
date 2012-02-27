=== Toolbar Buddy ===
Contributors: daveshine
Donate link: http://genesisthemes.de/en/donate/
Tags: toolbar, tool bar, adminbar, admin bar, ithemes, builder, builder theme, framework, pluginbuddy, backupbuddy, loopbuddy, displaybuddy, administration, resources, links, theme, settings, manage, deckerweb
Requires at least: 3.3
Tested up to: 3.3.1
Stable tag: 1.0

This plugin adds useful admin links and resources for iThemes Builder and popular PluginBuddy plugins to the WordPress Toolbar / Admin Bar.

== Description ==

This **small and lightweight plugin** just adds a lot of iThemes Builder and PluginBuddy related resources to your toolbar / admin bar. Also links to all settings pages of Builder and PluginBuddy plugins are added, making life for webmasters (a.k.a. Admins and Super Admins) a lot easier. So you might just switch from the fontend of your site to the Builder 'Layouts' or adjust the schedule for 'BackupBuddy Backups' etc.

As the name suggests this plugin is **intended towards site admins and super admins**. The new admin bar entries will only be displayed if the current user has a proper WordPress capability originally required by Builder or the supported plugins. And yes, **Toolbar Buddy supports Multisite installs** which is especially useful for BackupBuddy... :-)

= Features =
* "iThemes Builder Framework" support
* "BackupBuddy" plugin support (including Multisite features)
* "LoopBuddy" plugin support
* "DisplayBuddy" plugin series support, including these 11 plugins: Accordion / Billboard / Carousel / Copious Comments / Featured Posts / Rotating Images / Rotating Text / Slides / Slideshow / Tipsy / Video Showcase
* Great time saver for admins / super admins
* Only display toolbar and menu items for proper capabilities
* Multisite compatible! (supports network-activation)
* Resource/Support links for each module or plugin included!
* Fully translateable - also supports update-secure custom language file (if you need special wording...)
* Fully optimized:
 * The already lightweight stuff only gets loaded if needed!
 * Toolbar Buddy consists of 4 modules: iThemes Builder stuff / BackupBuddy stuff / LoopBuddy stuff / DisplayBuddy stuff
 * If none of the supported stuff is activated nothing will be loaded or displayed!

= Special Features =
* This time supporting all official iThemes/ Builder/ PluginBuddy sites
* Link to downloadable German language packs - only displayed when German locales are active (de_DE, de_AT, de_CH, de_LU)
* *NOTE:* I would be happy to add more language/locale specific resources and more useful third-party links - just contact me!

= iThemes Builder specific Plugin Support =
*At this time the plugin out of the box supports also links to settings pages of these Builder-specific add-on plugins:*

* "Builder Style Manager"
* "Builder SEO"
* "Builder Block Church" (post types for sermons and staff members - only useful if Builder Child Theme supports it)
* "Builder Block Restaurant" (post types for menu items and locations - only useful if Builder Child Theme supports it)

= Localization =
* English (default) - always included
* German - always included
* .pot file (`toolbar-buddy.pot`) for translators is also always included :)
* *Your translation? - [Just send it in](http://genesisthemes.de/en/contact/)*

[A plugin from deckerweb.de and GenesisThemes](http://genesisthemes.de/en/)

= Feedback =
* I am open for your suggestions and feedback - Thank you for using or trying out one of my plugins!
* Drop me a line [@deckerweb](http://twitter.com/#!/deckerweb) on Twitter
* Follow me on [my Facebook page](http://www.facebook.com/deckerweb.service)
* Or follow me on [+David Decker](http://deckerweb.de/gplus) on Google Plus ;-)

= More =
* [Also see my other plugins](http://genesisthemes.de/en/wp-plugins/) or see [my WordPress.org profile page](http://profiles.wordpress.org/users/daveshine/)
* Tip: [*GenesisFinder* - Find then create. Your Genesis Framework Search Engine.](http://genesisfinder.com/)

== Installation ==

1. Upload the entire `toolbar-buddy` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Look at your toolbar / admin bar for the "iBuddy" entry and enjoy using the new links there :)
4. Go and manage your theme/framework and/or plugin settings :)

**Please note, this plugin requires WordPress 3.3 or higher in order to work!**

**Multisite install:** Yes, it's fully compatible but I recommend you to have a look in the [FAQ section here](http://wordpress.org/extend/plugins/toolbar-buddy/faq/) for more info :)

For custom and update-secure language files please upload them to `/wp-content/languages/toolbar-buddy/` (just create this folder) - This enables you to use fully custom translations that won't be overridden on plugin updates. Also, complete custom English wording is possible with that, just use a language file like `toolbar-buddy-en_US.mo/.po` to achieve that.

== Frequently Asked Questions ==

= Does this plugin work with latest WP version and also older versions? =
Yes, this plugin works really fine with the latest WordPress 3.3+!
And sorry, it DOES NOT work with older WordPress versions so please update your install if you haven't done yet :).

= I don't see any new toolbar entries/links? =
You must be an "Administrator" or "Super Administrator" (Multisite) in your install! Otherwise nothing gets displayed. Toolbar Buddy just takes over completely the behavior of its supported theme and/or plugins. (So if you have a general problem with that you should contact the iThemes/PluginBuddy support.)

*Note:* Toolbar Buddy also respects the removal of "My Theme" menu if set via "Builder" or child theme functions.php file. In this case NO Builder-specific links will be displayed!

= Help, where's my original "Builder" toolbar entry? =
Toolbar Buddy just de-activates this original item because it makes no sense to have all items doubled in your toolbar... Toolbar Buddy offers a few more links/possibilities, so I hope that's still ok with you.

= Why is the main toolbar entry called "iBuddy"? =
This is just my shortened version of the term "iThemes and PluginBuddy". I wanted it really short and unique and somewhat related to this brand so I came up with that name. I hope you like it... If not, just introduce your own wording/branding via another language file.

= How are new resources being added to the toolbar/admin bar? =
Just drop me a note on [my Twitter @deckerweb](http://twitter.com/deckerweb) or via my contact page and I'll add the link if it is useful for admins/ webmasters and the iThemes Builder and PluginBuddy communities.

= How could my plugin/extension or child theme options page be added to the toolbar/admin bar links? =
This is possible of course and highly welcomed! Just drop me a note on [my Twitter @deckerweb](http://twitter.com/deckerweb) or via my contact page and we sort out the details!
Particularly, I need the admin url for the primary options page (like so `wp-admin/admin.php?page=foo`) - this is relevant for both, plugins and child themes. For child themes then I also need the correct name defined in the stylesheet (like so `Footheme`) and the correct folder name (like so `footheme-folder`) because this would be the template name when using with child themes. (Note: I don't own all the premium stuff myself yet so you're more than welcomed to help me out with these things. Thank you!)

= Is this plugin Multisite compatible? =
Yes, it is! :) Works really fine in Multisite invironment - also see next Q/A...

= In Multisite, could I "network enable" this plugin? =
Of course, that's possible and fully supported! If you use "BackupBuddy" in Multisite then you will have it running network-activated. And so you should do the same with Toolbar Buddy to fully support the slightly different stuff of BackupBuddy in Multisite!

If you don't use BackupBuddy in your Multisite then it's better to enable Toolbar Buddy only on a per site basis because all other setting links are only site-related! Only in the following edge case it makes sense to network-activate (with no BackupBuddy active): if all of the sites in Multisite have one or all of the following in common: Builder Theme / Builder plugin add-ons / LoopBuddy plugin / DisplayBuddy plugin(s). This might be the case if you use Multisite for multilingual projects, especially with that awesome plugin: http://wordpress.org/extend/plugins/multilingual-press/

== Screenshots ==

1. Toolbar Buddy in action - a secondary level - "Builder" settings (running with WordPress 3.3+ here)
2. Toolbar Buddy in action - a secondary level - "Builder" manage content, includes "Widget Contents" as well as dynamic support for the "Builder Blocks" plugins (running with WordPress 3.3+ here)
3. Toolbar Buddy in action - a secondary level - "BackupBuddy" backups (running with WordPress 3.3+ here)
4. Toolbar Buddy in action - a tertiary level - "DisplayBuddy" - "Accordion" management (running with WordPress 3.3+ here)
5. Toolbar Buddy in action - a tertiary level - resources section - "Builder" Support/Codex (running with WordPress 3.3+ here)
6. Toolbar Buddy in action - a tertiary level - resources section - iBuddy HQ (running with WordPress 3.3+ here)
7. Toolbar Buddy in action on a Multisite install - showing with only "BackupBuddy" activated, full support for all Multisite extras of that plugin, including capabilities! (running with WordPress 3.3+ here)

== Changelog ==

= 1.0 =
* Initial release
* Including support for iThemes Builder Framework
* Including support for 4 Builder-specific plugin add-ons
* Including support for 13 plugins of PluginBuddy brand

== Upgrade Notice ==

= 1.0 =
Just released into the wild.

== Translations ==

* English - default, always included
* German: Deutsch - immer dabei! [Download auch via deckerweb.de](http://deckerweb.de/material/sprachdateien/ithemes-und-pluginbuddy/#toolbar-buddy)
* For custom and update-secure language files please upload them to `/wp-content/languages/toolbar-buddy/` (just create this folder) - This enables you to use fully custom translations that won't be overridden on plugin updates. Also, complete custom English wording is possible with that as well, just use a language file like `toolbar-buddy-en_US.mo/.po` to achieve that.

*Note:* All my plugins are localized/ translateable by default. This is very important for all users worldwide. So please contribute your language to the plugin to make it even more useful. For translating I recommend the awesome ["Codestyling Localization" plugin](http://wordpress.org/extend/plugins/codestyling-localization/) and for validating the ["Poedit Editor"](http://www.poedit.net/), which works fine on Windows, Mac and Linux.

== Additional Info ==
**Idea Behind / Philosophy:** Just a little leightweight plugin for all the iThemes Builder and/or PluginBuddy users out there to make their daily web admin life a bit easier. I might add even more plugin support in the future if it makes some sense. So stay tuned :).

**iBuddy News Planet** I also have started a little news/feed service for iThemes & PluginBuddy brands via "FriendFeed" that you can subscribe to: http://friendfeed.com/ibuddy-news -- Please contact me via my Twitter for new resources (that have an RSS feed and are iThemes or Pluginbuddy-related!)
