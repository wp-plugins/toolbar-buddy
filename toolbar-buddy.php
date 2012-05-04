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
 * Version: 1.2
 * Author: David Decker - DECKERWEB
 * Author URI: http://deckerweb.de/
 * License: GPLv2 or later
 * License URI: http://www.opensource.org/licenses/gpl-license.php
 * Text Domain: toolbar-buddy
 * Domain Path: /languages/
 *
 * Copyright 2012 David Decker - DECKERWEB
 *
 *     This file is part of Toolbar Buddy,
 *     a plugin for WordPress.
 *
 *     Toolbar Buddy is free software:
 *     You can redistribute it and/or modify it under the terms of the
 *     GNU General Public License as published by the Free Software
 *     Foundation, either version 2 of the License, or (at your option)
 *     any later version.
 *
 *     Toolbar Buddy is distributed in the hope that
 *     it will be useful, but WITHOUT ANY WARRANTY; without even the
 *     implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR
 *     PURPOSE. See the GNU General Public License for more details.
 *
 *     You should have received a copy of the GNU General Public License
 *     along with WordPress. If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Setting constants
 *
 * @since 1.0
 * @version 1.1
 */
/** Plugin directory */
define( 'TBB_PLUGIN_DIR', dirname( __FILE__ ) );

/** Plugin base directory */
define( 'TBB_PLUGIN_BASEDIR', dirname( plugin_basename( __FILE__ ) ) );


add_action( 'init', 'ddw_tbb_init' );
/**
 * Load the text domain for translation of the plugin.
 * Load admin helper functions - only within 'wp-admin'.
 * 
 * @since 1.0
 * @version 1.1
 */
function ddw_tbb_init() {

	/** First look in WordPress' "languages" folder = custom & update-secure! */
	load_plugin_textdomain( 'toolbar-buddy', false, TBB_PLUGIN_BASEDIR . '/../../languages/toolbar-buddy/' );

	/** Then look in plugin's "languages" folder = default */
	load_plugin_textdomain( 'toolbar-buddy', false, TBB_PLUGIN_BASEDIR . '/languages/' );

	/** Include admin helper functions */
	if ( is_admin() ) {
		require_once( TBB_PLUGIN_DIR . '/includes/tbb-admin.php' );
	}

	/** Add "Settings Page" links to plugin page - only within 'wp-admin' */
	if ( is_admin() && current_user_can( 'manage_options' ) ) {
		add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ) , 'ddw_tbb_settings_page_links' );
	}

}  // end of function ddw_tbb_init


add_action( 'admin_bar_menu', 'ddw_tbb_admin_bar_menu', 98 );
/**
 * Add new menu items to the WordPress Toolbar / Admin Bar.
 * 
 * @since 1.0
 * @version 1.1
 *
 * @global mixed $wp_admin_bar, $tbb_builder_active, $tbb_loopbuddy_active, $tbb_backupbuddy_active
 */
function ddw_tbb_admin_bar_menu() {

	global $wp_admin_bar, $tbb_builder_active, $tbb_loopbuddy_active, $tbb_backupbuddy_active;

	/**
	 * Allows for filtering the general user role/capability to see main & sub-level items
	 *
	 * Default role: 'edit_posts' (we need this for Builders content blocks stuff...)
	 *
	 * @since 1.2
	 */
	$tbb_filter_capability = apply_filters( 'tbb_filter_capability_all', 'edit_posts' );

	/**
	 * Required WordPress cabability to display new admin bar entry
	 * Only showing items if toolbar / admin bar is activated and user is logged in!
	 *
	 * @since 1.0
	 * @version 1.1
	 */
	if ( ! is_user_logged_in() || 
		! is_admin_bar_showing() || 
		! current_user_can( $tbb_filter_capability ) ||  // allows for custom filtering the required role/capability
		defined( 'TBB_ALL_DISPLAY' )  // allows for custom disabling
	)
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
			$builderblockevents = $prefix . 'builderblockevents';		// third level: builder block events
				$bblockevents = $prefix . 'bblockevents';			// fourth level: events block - events
				$bblockvenues = $prefix . 'bblockvenues';			// fourth level: events block - venues
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

	/** Set defaults */
	$tbb_builder_inactive = 'default';
	$tbb_displaybuddy_inactive = 'default';
	$tbb_loopbuddy_inactive = 'default';
	$tbb_backupbuddy_inactive = 'default';


	/** Check for active iThemes Builder framework and capabilities */
	if ( ! defined( 'TBB_BUILDER_DISPLAY' ) && 
		( function_exists( 'it_builder_load_theme_features' ) && current_user_can( 'edit_posts' ) ) 
	) {
		$tbb_builder_active = 'tbb_active_mode';
        	require_once( TBB_PLUGIN_DIR . '/includes/tbb-ithemesbuilder.php' );
	} else {
		$tbb_builder_active = 'tbb_irg_mode';
	}  // end-if Builder check


	/** Check for active DisplayBuddy plugin(s) and capabilities */
	if ( ! defined( 'TBB_DISPLAYBUDDY_DISPLAY' ) && 
		( ( class_exists( 'pluginbuddy_accordion' ) ||
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
			&& current_user_can( 'edit_posts' ) ) 
	) {
		$tbb_displaybuddy_active = 'tbb_active_mode';
        	require_once( TBB_PLUGIN_DIR . '/includes/tbb-displaybuddy.php' );
	} else {
		$tbb_displaybuddy_active = 'tbb_irg_mode';
	}  // end-if DisplayBuddy check


	/** Check for active LoopBuddy plugin and capabilities */
	if ( ! defined( 'TBB_LOOPBUDDY_DISPLAY' ) && 
		( class_exists( 'pluginbuddy_loopbuddy' ) && ( current_user_can( 'administrator' ) || current_user_can( 'edit_theme_options' ) ) ) 
	) {
		$tbb_loopbuddy_active = 'tbb_active_mode';
        	require_once( TBB_PLUGIN_DIR . '/includes/tbb-loopbuddy.php' );
	} else {
		$tbb_loopbuddy_active = 'tbb_irg_mode';
	}  // end-if LoopBuddy check


	/** Check for active BackupBuddy plugin and capabilities */
	if ( ! defined( 'TBB_BACKUPBUDDY_DISPLAY' ) && ( class_exists( 'pluginbuddy_backupbuddy' ) && ( 
								( is_multisite() && current_user_can( 'manage_sites' ) ) || 
								( ! is_multisite() && current_user_can( 'administrator' ) ) 
								) 
							) 
	) {
		$tbb_backupbuddy_active = 'tbb_active_mode';
        	require_once( TBB_PLUGIN_DIR . '/includes/tbb-backupbuddy.php' );
	} else {
		$tbb_backupbuddy_active = 'tbb_irg_mode';
	}  // end-if BackupBuddy check


	/** If no modules are active fall back to iResource Group only */
	if ( $tbb_builder_active == 'tbb_irg_mode' && $tbb_displaybuddy_active == 'tbb_irg_mode' && $tbb_loopbuddy_active == 'tbb_irg_mode' && $tbb_backupbuddy_active == 'tbb_irg_mode' ) {
		$menu_items = NULL;
	}  // end-if


	/** iThemes Group: Main Entry hook place */
	$wp_admin_bar->add_group( array(
		'parent' => $ibuddybar,
		'id'     => $ithemesgroup,
	) );

		/**
		 * Action Hook 'tbb_custom_ithemes_group_items'
		 * allows for hooking other iThemes Group items in
		 *
		 * @since 1.2
		 */
		do_action( 'tbb_custom_ithemes_group_items' );


	/** DisplayBuddy Group: Main Entry hook place */
	$wp_admin_bar->add_group( array(
		'parent' => $ibuddybar,
		'id'     => $displaybgroup,
	) );

		/**
		 * Action Hook 'tbb_custom_displaybuddy_group_items'
		 * allows for hooking other DisplayBuddy Group items in
		 *
		 * @since 1.2
		 */
		do_action( 'tbb_custom_displaybuddy_group_items' );


	/** LoopBuddy Group: Main Entry hook place */
	$wp_admin_bar->add_group( array(
		'parent' => $ibuddybar,
		'id'     => $loopbgroup,
	) );

		/**
		 * Action Hook 'tbb_custom_loopbuddy_group_items'
		 * allows for hooking other LoopBuddy Group items in
		 *
		 * @since 1.2
		 */
		do_action( 'tbb_custom_loopbuddy_group_items' );


	/** BackupBuddy Group: Main Entry hook place */
	$wp_admin_bar->add_group( array(
		'parent' => $ibuddybar,
		'id'     => $backupbgroup,
	) );

		/**
		 * Action Hook 'tbb_custom_backupbuddy_group_items'
		 * allows for hooking other BackupBuddy Group items in
		 *
		 * @since 1.2
		 */
		do_action( 'tbb_custom_backupbuddy_group_items' );


	/**
	 * Display these items also if iThemes Builder or PluginBuddy plugins are not installed
	 * iBuddy HQ menu items
	 */
	if ( ! defined( 'TBB_RESOURCES_DISPLAY' ) ) {

		/** Set filter for "iBuddy HQ" string */
		$tbb_ibuddy_hq_name = apply_filters( 'tbb_filter_ibuddy_hq_name', __( 'iBuddy HQ', 'toolbar-buddy' ) );

		/** Add the menu items */
		$iresourcegroup_menu_items = array(

			/** Start entry - HQ */
			'ibuddysites' => array(
				'parent' => $iresourcegroup,
				'title'  => esc_attr__( $tbb_ibuddy_hq_name ),
				'href'   => 'http://ithemes.com/',
				'meta'   => array( 'title' => esc_attr__( $tbb_ibuddy_hq_name ) )
			),

			/** Blogs section */
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

			/** iThemesTV section */
			'ithemestv' => array(
				'parent' => $ibuddysites,
				'title'  => __( 'iThemesTV', 'toolbar-buddy' ),
				'href'   => 'http://ithemes.tv/',
				'meta'   => array( 'title' => _x( 'iThemesTV - Video-Tutorials &amp; Live Events', 'Translators: For the tooltip', 'toolbar-buddy' ) )
			),

			/** Tutorials section */
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

			/** FAQs section */
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

			/** Members section */
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

			/** Free Plugins section */
			'ibuddyfreeplugins' => array(
				'parent' => $ibuddysites,
				'title'  => __( 'Free PluginBuddy plugins', 'toolbar-buddy' ),
				'href'   => 'http://pluginbuddy.com/free-wordpress-plugins/',
				'meta'   => array( 'title' => __( 'Free PluginBuddy plugins', 'toolbar-buddy' ) )
			),

			/** News Planet section */
			'ibuddyffnews' => array(
				'parent' => $ibuddysites,
				'title'  => __( 'iBuddy News Planet', 'toolbar-buddy' ),
				'href'   => 'http://friendfeed.com/ibuddy-news',
				'meta'   => array( 'title' => _x( 'iThemes Builder and PluginBuddy News Planet (official and community news via FriendFeed service)', 'Translators: For the tooltip', 'toolbar-buddy' ) )
			),
		);

	}  // end-if constant check for displaying resources


	/** Display language specific links only for these locales: de_DE, de_AT, de_CH, de_LU */
	if ( ! defined( 'TBB_DE_DISPLAY' ) && ( get_locale() == 'de_DE' || get_locale() == 'de_AT' || get_locale() == 'de_CH' || get_locale() == 'de_LU' ) ) {
		/** German iThemes & PluginBuddy language packs */
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
					$ithemesgroup, $buildersettings, $builderlayouts, $buildercontent, $builderblocksgroup,  							$builderblockevents, $bblockevents, $bblockvenues, $builderblockchurch, $bblocksermons, 
						$bblockstaff, $builderblockrestaurant, $bblockmenus, $bblocklocations, $buildersupport, 
						$builderdocs, 
					$backupbgroup, $backupbuddyrun, $backupbuddytools, $backupbuddysupport, $backupbuddydocs, 
					$loopbgroup, $loopbuddysettings, $loopbuddyedit, 
					$displaybgroup, $displaybuddystart, $dpbaccordion, $displaybuddysupport, $displaybuddydocs, 
					$ibuddysites, $iresourcegroup, 
					$irsbuildergroup, $irsbackupbgroup, $irsloopbgroup, $irsdisplaybgroup
				);


	/**
	 * Add the iBuddy top-level menu item
	 *
	 * @since 1.0
	 * @version 1.1
	 *
	 * @param $tbb_main_item_title
	 * @param $tbb_main_item_title_tooltip
	 * @param $tbb_main_item_icon_display
	 */
		/** Filter the main item name */
		$tbb_main_item_title = apply_filters( 'tbb_filter_main_item', __( 'iBuddy', 'toolbar-buddy' ) );

		/** Filter the main item name's tooltip */
		$tbb_main_item_title_tooltip = apply_filters( 'tbb_filter_main_item_tooltip', _x( 'iBuddy', 'Translators: For the tooltip', 'toolbar-buddy' ) );

		/** Filter the main item icon's class/display */
		$tbb_main_item_icon_display = apply_filters( 'tbb_filter_main_item_icon_display', 'icon-ibuddy' );

		$wp_admin_bar->add_menu( array(
			'id'    => $ibuddybar,
			'title' => esc_attr__( $tbb_main_item_title ),
			'href'  => '#',
			'meta'  => array( 'class' => $tbb_main_item_icon_display, 'title' => esc_attr__( $tbb_main_item_title_tooltip ) )
		) );


	/** Loop through the menu items */
	foreach ( $menu_items as $id => $menu_item ) {
		
		/** Add in the item ID */
		$menu_item['id'] = $prefix . $id;

		/** Add meta target to each item where it's not already set, so links open in new window/tab */
		if ( ! isset( $menu_item['meta']['target'] ) )		
			$menu_item['meta']['target'] = '_blank';

		/** Add class to links that open up in a new window/tab */
		if ( '_blank' === $menu_item['meta']['target'] ) {
			if ( ! isset( $menu_item['meta']['class'] ) )
				$menu_item['meta']['class'] = '';
			$menu_item['meta']['class'] .= $prefix . 'tbb-new-tab';
		}

		/** Add item */
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
		
		/** iResource Group: Add in the item ID */
		$iresourcegroup_menu_item['id'] = $prefix . $id;

		/** iResource Group: Add meta target to each item where it's not already set, so links open in new window/tab */
		if ( ! isset( $iresourcegroup_menu_item['meta']['target'] ) )		
			$iresourcegroup_menu_item['meta']['target'] = '_blank';

		/** iResource Group: Add class to links that open up in a new window/tab */
		if ( '_blank' === $iresourcegroup_menu_item['meta']['target'] ) {
			if ( ! isset( $iresourcegroup_menu_item['meta']['class'] ) )
				$iresourcegroup_menu_item['meta']['class'] = '';
			$iresourcegroup_menu_item['meta']['class'] .= $prefix . 'tbb-new-tab';
		}

		/** iResource Group: Add item */
		$wp_admin_bar->add_menu( $iresourcegroup_menu_item );

	}  // end foreach iResource Group


	/**
	 * Action Hook 'tbb_custom_iresource_group_items'
	 * allows for hooking other iResource Group items in
	 *
	 * @since 1.2
	 */
	do_action( 'tbb_custom_iresource_group_items' );

}  // end of main function ddw_tbb_admin_bar_menu


add_action( 'wp_head', 'ddw_tbb_admin_style' );
add_action( 'admin_head', 'ddw_tbb_admin_style' );
/**
 * Add the styles for new WordPress Toolbar / Admin Bar entry
 * 
 * @since 1.0
 */
function ddw_tbb_admin_style() {

	/** No styles if admin bar is disabled */
	if ( ! is_admin_bar_showing() || ! is_user_logged_in() )
		return;

	/** Add CSS styles to wp_head/admin_head */
	$tbb_main_icon = apply_filters( 'tbb_filter_main_icon', plugins_url( 'toolbar-buddy/images/icon-ibuddy.png',
dirname( __FILE__ ) ) );

	?>
	<style type="text/css">
		#wpadminbar.nojs .ab-top-menu > li.menupop.icon-ibuddy:hover > .ab-item,
		#wpadminbar .ab-top-menu > li.menupop.icon-ibuddy.hover > .ab-item,
		#wpadminbar.nojs .ab-top-menu > li.menupop.icon-ibuddy > .ab-item,
		#wpadminbar .ab-top-menu > li.menupop.icon-ibuddy > .ab-item {
      			background-image: url(<?php echo $tbb_main_icon; ?>);
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


/**
 * Helper functions for custom branding of the plugin
 *
 * @since 1.2
 */
	/** Include plugin file with special custom stuff */
	require_once( TBB_PLUGIN_DIR . '/includes/tbb-branding.php' );
