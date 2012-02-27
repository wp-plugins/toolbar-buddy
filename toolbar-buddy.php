<?php 
/**
 * Main plugin file. This plugin adds useful admin links and resources for iThemes Builder and popular PluginBuddy plugins to the WordPress Toolbar / Admin Bar.
 *
 * @package   Toolbar Buddy
 * @author    David Decker
 * @link      http://twitter.com/#!/deckerweb
 * @copyright Copyright 2012, David Decker - DECKERWEB
 *
 * Plugin Name: Toolbar Buddy
 * Plugin URI: http://genesisthemes.de/en/wp-plugins/toolbar-buddy/
 * Description: This plugin adds useful admin links and resources for iThemes Builder and popular PluginBuddy plugins to the WordPress Toolbar / Admin Bar.
 * Version: 1.0
 * Author: David Decker - DECKERWEB
 * Author URI: http://deckerweb.de/
 * License: GPLv2
 * Text Domain: toolbar-buddy
 * Domain Path: /languages/
 */

/**
 * Setting constants
 *
 * @since 1.0
 */
/** Plugin directory */
define( 'TBB_PLUGIN_DIR', dirname( __FILE__ ) );

/** Plugin base directory */
define( 'TBB_PLUGIN_BASEDIR', dirname( plugin_basename( __FILE__ ) ) );


add_action( 'init', 'ddw_tbb_init' );
/**
 * Load the text domain for translation of the plugin
 * 
 * @since 1.0
 */
function ddw_tbb_init() {

	/** First look in WordPress' "languages" folder = custom & update-secure! */
	load_plugin_textdomain( 'toolbar-buddy', false, TBB_PLUGIN_BASEDIR . '/../../languages/toolbar-buddy/' );

	/** Then look in plugin's "languages" folder = default */
	load_plugin_textdomain( 'toolbar-buddy', false, TBB_PLUGIN_BASEDIR . '/languages/' );
}


add_filter( 'plugin_row_meta', 'ddw_tbb_plugin_links', 10, 2 );
/**
 * Add various support links to plugin page
 *
 * @since 1.0
 *
 * @param  $tbb_links
 * @param  $tbb_file
 * @return strings plugin links
 */
function ddw_tbb_plugin_links( $tbb_links, $tbb_file ) {

	if ( !current_user_can( 'install_plugins' ) )
		return $tbb_links;

	if ( $tbb_file == TBB_PLUGIN_BASEDIR . '/toolbar-buddy.php' ) {
		$tbb_links[] = '<a href="http://wordpress.org/extend/plugins/toolbar-buddy/faq/" target="_new" title="' . __( 'FAQ', 'toolbar-buddy' ) . '">' . __( 'FAQ', 'toolbar-buddy' ) . '</a>';
		$tbb_links[] = '<a href="http://wordpress.org/tags/toolbar-buddy?forum_id=10" target="_new" title="' . __( 'Support', 'toolbar-buddy' ) . '">' . __( 'Support', 'toolbar-buddy' ) . '</a>';
		$tbb_links[] = '<a href="' . __( 'http://genesisthemes.de/en/donate/', 'toolbar-buddy' ) . '" target="_new" title="' . __( 'Donate', 'toolbar-buddy' ) . '">' . __( 'Donate', 'toolbar-buddy' ) . '</a>';
	}

	return $tbb_links;
}


add_action( 'admin_bar_menu', 'ddw_tbb_admin_bar_menu', 98 );
/**
 * Add new menu items to the WP Toolbar / Admin Bar.
 * 
 * @since 1.0
 *
 * @global mixed $wp_admin_bar 
 */
function ddw_tbb_admin_bar_menu() {

	global $wp_admin_bar;

	/** Required WordPress cabability to display new admin bar entry */
	if ( !is_user_logged_in() || !is_admin_bar_showing()	)
		return;

	/** Set unique prefix */
	$prefix = 'ddw-ibuddy-';
	
	/** Create general parent menu item references */
	$ibuddybar = $prefix . 'admin-bar';				// root level
	$ibuddysites = $prefix . 'ibuddysites';					// sub level: ibuddy sites
			$ibuddyblogs = $prefix . 'ibuddyblogs';				// third level: ibuddy blogs
			$ibuddytutorials = $prefix . 'ibuddytutorials';			// third level: ibuddy tutorials
			$ibuddyfaqs = $prefix . 'ibuddyfaqs';				// third level: ibuddy faqs
			$ibuddymembers = $prefix . 'ibuddymembers';			// third level: ibuddy members
	$iresourcegroup = $prefix . 'iresourcegroup';				// sub level: iresource group (resources)

	/** Create iThemes Builder parent menu item references */
	$ithemesgroup = $prefix . 'ithemesgroup';				// sub level: group root - ithemes
		$buildersettings = $prefix . 'buildersettings';			// sub level: builder settings
		$builderlayouts = $prefix . 'builderlayouts';			// sub level: builder layouts
		$buildercontent = $prefix . 'buildercontent';			// sub level: builder content
			$builderblocksgroup = $prefix . 'builderblocksgroup';		// third level: builder blocks group root
			$builderblockchurch = $prefix . 'builderblockchurch';		// third level: builder block church
				$bblocksermons = $prefix . 'bblocksermons';			// fourth level: church block - sermons
				$bblockstaff = $prefix . 'bblockstaff';				// fourth level: church block - staff
			$builderblockrestaurant = $prefix . 'builderblockrestaurant';	// third level: builder block restaurant
				$bblockmenus = $prefix . 'bblockmenus';				// fourth level: church block - menus
				$bblocklocations = $prefix . 'bblocklocations';			// fourth level: church block - locations
	$irsbuildergroup = $prefix . 'irsbuildergroup';				// sub level: builder resource group
			$buildersupport = $prefix . 'buildersupport';			// third level: builder support
			$builderdocs = $prefix . 'builderdocs';				// third level: builder docs

	/** Create DisplayBuddy parent menu item references */
	$displaybgroup = $prefix . 'displaybgroup';				// sub level: group root - displaybuddy
		$displaybuddystart = $prefix . 'displaybuddystart';		// sub level: displaybuddy start/modules
			$dpbaccordion = $prefix . 'dpbaccordion';			// third level: accordion
	$irsdisplaybgroup = $prefix . 'irsdisplaybgroup';			// sub level: builder resource group
			$displaybuddysupport = $prefix . 'displaybuddysupport';		// third level: displaybuddy support
			$displaybuddydocs = $prefix . 'displaybuddydocs';		// third level: displaybuddy docs

	/** Create LoopBuddy parent menu item references */
	$loopbgroup = $prefix . 'loopbgroup';					// sub level: group root - loopbuddy
		$loopbuddysettings = $prefix . 'loopbuddysettings';		// sub level: loopbuddy settings
		$loopbuddyedit = $prefix . 'loopbuddyedit';			// sub level: loopbuddy edit
	$irsloopbgroup = $prefix . 'irsloopbgroup';				// sub level: loop buddy resource group
			$loopbuddysupport = $prefix . 'loopbuddysupport';		// third level: loopbuddy support
			$loopbuddydocs = $prefix . 'loopbuddydocs';			// third level: loopbuddy docs

	/** Create BackupBuddy parent menu item references */
	$backupbgroup = $prefix . 'backupbgroup';				// sub level: group root - backupbuddy
		$backupbuddyrun = $prefix . 'backupbuddyrun';			// sub level: backupbuddy run
		$backupbuddytools = $prefix . 'backupbuddytools';		// sub level: backupbuddy tools
		$backupbuddymsextras = $prefix . 'backupbuddymsextras';		// sub level: backupbuddy multisite extras
	$irsbackupbgroup = $prefix . 'irsbackupbgroup';				// sub level: builder resource group
		$backupbuddysupport = $prefix . 'backupbuddysupport';			// third level: backupbuddy support
		$backupbuddydocs = $prefix . 'backupbuddydocs';				// third level: backupbuddy docs


	/** Check for active iThemes Builder framework */
	if ( function_exists( 'it_builder_load_theme_features' ) && current_user_can( 'edit_posts' ) ) {
        	require_once( TBB_PLUGIN_DIR . '/includes/tbb-ithemesbuilder.php' );
	}  // end-if Builder check

	/** Check for active DisplayBuddy plugin */
	if ( ( class_exists( 'pluginbuddy_accordion' ) ||
		class_exists( 'iThemesBillboard' ) ||
		class_exists( 'pluginbuddy_carousel' ) ||
		class_exists( 'PluginBuddyCopiousComments' ) ||
		class_exists( 'PluginBuddyFeaturedPosts' ) ||
		class_exists( 'iThemesRotatingImages' ) ||
		class_exists( 'rotatingtext' ) ||
		class_exists( 'pb_slides' ) ||
		class_exists( 'pluginbuddy_slideshow' ) ||
		class_exists( 'pluginbuddy_tipsy' ) ||
		class_exists( 'PluginBuddyVideoShowcase' ) ) 
		&& current_user_can( 'edit_posts' ) 
	) {
        	require_once( TBB_PLUGIN_DIR . '/includes/tbb-displaybuddy.php' );
	}  // end-if DisplayBuddy check

	/** Check for active LoopBuddy plugin */
	if ( class_exists( 'pluginbuddy_loopbuddy' ) && ( current_user_can( 'administrator' ) || current_user_can( 'edit_theme_options' ) ) ) {
        	require_once( TBB_PLUGIN_DIR . '/includes/tbb-loopbuddy.php' );
	}  // end-if LoopBuddy check

	/** Check for active BackupBuddy plugin */
	if ( class_exists( 'pluginbuddy_backupbuddy' ) && ( 
								( is_multisite() && current_user_can( 'manage_sites' ) ) || 
								( !is_multisite() && current_user_can( 'administrator' ) ) 
	) ) {
        	require_once( TBB_PLUGIN_DIR . '/includes/tbb-backupbuddy.php' );
	}  // end-if BackupBuddy check


	/** iThemes Group: Main Entry hook place */
	$wp_admin_bar->add_group( array(
		'parent' => $ibuddybar,
		'id'     => $ithemesgroup,
	) );

	/** DisplayBuddy Group: Main Entry hook place */
	$wp_admin_bar->add_group( array(
		'parent' => $ibuddybar,
		'id'     => $displaybgroup,
	) );

	/** LoopBuddy Group: Main Entry hook place */
	$wp_admin_bar->add_group( array(
		'parent' => $ibuddybar,
		'id'     => $loopbgroup,
	) );

	/** BackupBuddy Group: Main Entry hook place */
	$wp_admin_bar->add_group( array(
		'parent' => $ibuddybar,
		'id'     => $backupbgroup,
	) );


	/**
	 * Display these items also if iThemes Builder or PluginBuddy plugins are not installed
	 * iBuddy HQ menu items
	 */
	$iresourcegroup_menu_items = array(

		// Start entry - HQ
		'ibuddysites' => array(
			'parent' => $iresourcegroup,
			'title'  => __( 'iBuddy HQ', 'toolbar-buddy' ),
			'href'   => 'http://ithemes.com/',
			'meta'   => array( 'title' => __( 'iBuddy HQ', 'toolbar-buddy' ) )
		),
		// Blogs section
		'ibuddyblogs' => array(
			'parent' => $ibuddysites,
			'title'  => __( 'Official Blog', 'toolbar-buddy' ),
			'href'   => 'http://ithemes.com/category/blog/',
			'meta'   => array( 'title' => __( 'Official Blog', 'toolbar-buddy' ) )
		),
		'ibuddyblogs-builder' => array(
			'parent' => $ibuddyblogs,
			'title'  => __( 'Builder Community Blog', 'toolbar-buddy' ),
			'href'   => 'http://ithemesbuilder.com/',
			'meta'   => array( 'title' => __( 'Builder Community Blog', 'toolbar-buddy' ) )
		),
		'ibuddyblogs-pb' => array(
			'parent' => $ibuddyblogs,
			'title'  => __( 'PluginBuddy Blog', 'toolbar-buddy' ),
			'href'   => 'http://pluginbuddy.com/category/blog/',
			'meta'   => array( 'title' => __( 'PluginBuddy Blog', 'toolbar-buddy' ) )
		),
		'ibuddyblogs-webdesign' => array(
			'parent' => $ibuddyblogs,
			'title'  => __( 'WebDesign.com Blog', 'toolbar-buddy' ),
			'href'   => 'http://webdesign.com/news',
			'meta'   => array( 'title' => __( 'WebDesign.com Blog', 'toolbar-buddy' ) )
		),
		'ibuddyblogs-thediv' => array(
			'parent' => $ibuddyblogs,
			'title'  => __( 'The Div Blog', 'toolbar-buddy' ),
			'href'   => 'http://thediv.org/',
			'meta'   => array( 'title' => _x( 'The Div Blog (thediv.org)', 'Translators: For the tooltip', 'toolbar-buddy' ) )
		),
		'ibuddyblogs-cmiller' => array(
			'parent' => $ibuddyblogs,
			'title'  => __( 'Cory Miller Blog', 'toolbar-buddy' ),
			'href'   => 'http://corymiller.com/blog/',
			'meta'   => array( 'title' => _x( 'Cory Miller Blog (corymiller.com)', 'Translators: For the tooltip', 'toolbar-buddy' ) )
		),
		'ibuddyblogs-jkopepasah' => array(
			'parent' => $ibuddyblogs,
			'title'  => __( 'Justin Kopepasah Blog', 'toolbar-buddy' ),
			'href'   => 'http://kopepasah.com/',
			'meta'   => array( 'title' => _x( 'Justin Kopepasah Blog (kopepasah.com)', 'Translators: For the tooltip', 'toolbar-buddy' ) )
		),
		// iThemesTV section
		'ithemestv' => array(
			'parent' => $ibuddysites,
			'title'  => __( 'iThemesTV', 'toolbar-buddy' ),
			'href'   => 'http://ithemes.tv/',
			'meta'   => array( 'title' => _x( 'iThemesTV - Video-Tutorials &amp; Live Events', 'Translators: For the tooltip', 'toolbar-buddy' ) )
		),
		// Tutorials section
		'ibuddytutorials' => array(
			'parent' => $ibuddysites,
			'title'  => __( 'iThemes Tutorials', 'toolbar-buddy' ),
			'href'   => 'http://ithemes.com/tutorials/',
			'meta'   => array( 'title' => __( 'iThemes Tutorials', 'toolbar-buddy' ) )
		),
		'ibuddytutorials-builder' => array(
			'parent' => $ibuddytutorials,
			'title'  => __( 'Builder Tutorials', 'toolbar-buddy' ),
			'href'   => 'http://ithemesbuilder.com/category/tutorials/',
			'meta'   => array( 'title' => __( 'Builder Tutorials', 'toolbar-buddy' ) )
		),
		'ibuddytutorials-pb' => array(
			'parent' => $ibuddytutorials,
			'title'  => __( 'PluginBuddy Tutorials', 'toolbar-buddy' ),
			'href'   => 'http://ithemes.com/codex/page/PluginBuddy',
			'meta'   => array( 'title' => __( 'PluginBuddy Tutorials', 'toolbar-buddy' ) )
		),
		'ibuddytutorials-codex' => array(
			'parent' => $ibuddytutorials,
			'title'  => __( 'Complete Codex', 'toolbar-buddy' ),
			'href'   => 'http://ithemes.com/codex/',
			'meta'   => array( 'title' => __( 'Complete Codex', 'toolbar-buddy' ) )
		),
		// FAQs section
		'ibuddyfaqs' => array(
			'parent' => $ibuddysites,
			'title'  => __( 'iThemes FAQ', 'toolbar-buddy' ),
			'href'   => 'http://ithemes.com/frequently-asked-questions/',
			'meta'   => array( 'title' => __( 'iThemes FAQ', 'toolbar-buddy' ) )
		),
		'ibuddyfaqs-pb' => array(
			'parent' => $ibuddyfaqs,
			'title'  => __( 'PluginBuddy FAQ', 'toolbar-buddy' ),
			'href'   => 'http://pluginbuddy.com/frequently-asked-questions/',
			'meta'   => array( 'title' => __( 'PluginBuddy FAQ', 'toolbar-buddy' ) )
		),
		// Members section
		'ibuddymembers' => array(
			'parent' => $ibuddysites,
			'title'  => __( 'Members Area', 'toolbar-buddy' ),
			'href'   => 'http://ithemes.com/member/member.php',
			'meta'   => array( 'title' => __( 'Members Area', 'toolbar-buddy' ) )
		),
		'ibuddymembers-affiliates' => array(
			'parent' => $ibuddymembers,
			'title'  => __( 'Affiliates Area', 'toolbar-buddy' ),
			'href'   => 'http://ithemes.com/member/aff_member.php',
			'meta'   => array( 'title' => __( 'Affiliates Area', 'toolbar-buddy' ) )
		),
		'ibuddymembers-forum' => array(
			'parent' => $ibuddymembers,
			'title'  => __( 'Support Forum', 'toolbar-buddy' ),
			'href'   => 'http://ithemes.com/forum/',
			'meta'   => array( 'title' => __( 'Support Forum', 'toolbar-buddy' ) )
		),
		// Free Plugins section
		'ibuddyfreeplugins' => array(
			'parent' => $ibuddysites,
			'title'  => __( 'Free PluginBuddy plugins', 'toolbar-buddy' ),
			'href'   => 'http://pluginbuddy.com/free-wordpress-plugins/',
			'meta'   => array( 'title' => __( 'Free PluginBuddy plugins', 'toolbar-buddy' ) )
		),
		// News Planet section
		'ibuddyffnews' => array(
			'parent' => $ibuddysites,
			'title'  => __( 'iBuddy News Planet', 'toolbar-buddy' ),
			'href'   => 'http://friendfeed.com/ibuddy-news',
			'meta'   => array( 'title' => _x( 'iThemes Builder and PluginBuddy News Planet (official and community news via FriendFeed service)', 'Translators: For the tooltip', 'toolbar-buddy' ) )
		),
	);


	/** Display language specific links only for these locales: de_DE, de_AT, de_CH, de_LU */
	if ( get_locale() == 'de_DE' || get_locale() == 'de_AT' || get_locale() == 'de_CH' || get_locale() == 'de_LU' ) {
		// German iThemes & PluginBuddy language packs
		$iresourcegroup_menu_items['languages-de'] = array(
			'parent' => $iresourcegroup,
			'title'  => __( 'German language files', 'toolbar-buddy' ),
			'href'   => 'http://deckerweb.de/material/sprachdateien/ithemes-und-pluginbuddy/',
			'meta'   => array( 'title' => _x( 'German language files for iThemes Builder Framework and PluginBuddy Plugins', 'Translators: For the tooltip', 'toolbar-buddy' ) )
		);
	}  // end-if German locales


	/** Allow menu items to be filtered, but pass in parent menu item IDs */
	$menu_items = (array) apply_filters( 'ddw_tbb_menu_items',
					$menu_items, $iresourcegroup_menu_items, $prefix, $ibuddybar, $ibuddyblogs, $ibuddytutorials, 
						$ibuddyfaqs, $ibuddymembers, 
					$ithemesgroup, $buildersettings, $builderlayouts, $buildercontent, $builderblocksgroup,  							$builderblockchurch, $builderblockrestaurant, $buildersupport, $builderdocs, 
					$backupbgroup, $backupbuddyrun, $backupbuddytools, $backupbuddysupport, $backupbuddydocs, 
					$loopbgroup, $loopbuddysettings, $loopbuddyedit, 
					$displaybgroup, $displaybuddystart, $dpbaccordion, $displaybuddysupport, $displaybuddydocs, 
					$ibuddysites, $iresourcegroup, 
					$irsbuildergroup, $irsbackupbgroup, $irsloopbgroup, $irsdisplaybgroup
				);


	/** Add the iBuddy top-level menu item */
	$wp_admin_bar->add_menu( array(
		'id'    => $ibuddybar,
		'title' => __( 'iBuddy', 'toolbar-buddy' ),
		'href'  => '#',
		'meta'  => array( 'class' => 'icon-ibuddy', 'title' => _x( 'iBuddy', 'Translators: For the tooltip', 'toolbar-buddy' ) )
	) );


	/** Loop through the menu items */
	foreach ( $menu_items as $id => $menu_item ) {
		
		// Add in the item ID
		$menu_item['id'] = $prefix . $id;

		// Add meta target to each item where it's not already set, so links open in new window/tab
		if ( ! isset( $menu_item['meta']['target'] ) )		
			$menu_item['meta']['target'] = '_blank';

		// Add class to links that open up in a new window/tab
		if ( '_blank' === $menu_item['meta']['target'] ) {
			if ( ! isset( $menu_item['meta']['class'] ) )
				$menu_item['meta']['class'] = '';
			$menu_item['meta']['class'] .= $prefix . 'tbb-new-tab';
		}

		// Add item
		$wp_admin_bar->add_menu( $menu_item );

	}  // end foreach menu items


	/** iResource Group: Main Entry */
	$wp_admin_bar->add_group( array(
		'parent' => $ibuddybar,
		'id'     => $iresourcegroup,
		'meta'   => array( 'class' => 'ab-sub-secondary' )
	) );


	/** iResource Group: Loop through the group menu items */
	foreach ( $iresourcegroup_menu_items as $id => $iresourcegroup_menu_item ) {
		
		// iResource Group: Add in the item ID
		$iresourcegroup_menu_item['id'] = $prefix . $id;

		// iResource Group: Add meta target to each item where it's not already set, so links open in new window/tab
		if ( ! isset( $iresourcegroup_menu_item['meta']['target'] ) )		
			$iresourcegroup_menu_item['meta']['target'] = '_blank';

		// iResource Group: Add class to links that open up in a new window/tab
		if ( '_blank' === $iresourcegroup_menu_item['meta']['target'] ) {
			if ( ! isset( $iresourcegroup_menu_item['meta']['class'] ) )
				$iresourcegroup_menu_item['meta']['class'] = '';
			$iresourcegroup_menu_item['meta']['class'] .= $prefix . 'tbb-new-tab';
		}

		// iResource Group: Add item
		$wp_admin_bar->add_menu( $iresourcegroup_menu_item );

	}  // end foreach iResource Group

}  // end of main function ddw_tbb_admin_bar_menu


add_action( 'wp_head', 'ddw_tbb_admin_style' );
add_action( 'admin_head', 'ddw_tbb_admin_style' );
/**
 * Add the styles for new WP Toolbar / Admin Bar entry
 * 
 * @since 1.0
 */
function ddw_tbb_admin_style() {

	/** No styles if admin bar is disabled */
	if ( !is_admin_bar_showing() || !is_user_logged_in() )
		return;

	/** Add CSS styles to wp_head/admin_head */
	?>
	<style type="text/css">
		#wpadminbar.nojs .ab-top-menu > li.menupop.icon-ibuddy:hover > .ab-item,
		#wpadminbar .ab-top-menu > li.menupop.icon-ibuddy.hover > .ab-item,
		#wpadminbar.nojs .ab-top-menu > li.menupop.icon-ibuddy > .ab-item,
		#wpadminbar .ab-top-menu > li.menupop.icon-ibuddy > .ab-item {
      			background-image: url(<?php echo plugins_url( 'toolbar-buddy/images/icon-ibuddy.png',
dirname( __FILE__ ) ); ?>);
			background-repeat: no-repeat;
			background-position: 0.85em 50%;
			padding-left: 30px;
		}
		#wp-admin-bar-ddw-ibuddy-languages-de > .ab-item:before {
			color: #ff9900;
			content: '• ';
		}
	</style>
	<?php

}  // end of function ddw_tbb_admin_style
