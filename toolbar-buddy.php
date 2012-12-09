<?php 
/**
 * Main plugin file.
 * This plugin adds useful admin links and resources for iThemes Builder
 * and popular iThemes/PluginBuddy Plugins to the WordPress Toolbar / Admin Bar.
 *
 * @package   Toolbar Buddy
 * @author    David Decker
 * @link      http://twitter.com/deckerweb
 * @copyright Copyright 2012, David Decker - DECKERWEB
 *
 * Plugin Name: Toolbar Buddy
 * Plugin URI: http://genesisthemes.de/en/wp-plugins/toolbar-buddy/
 * Description: This plugin adds useful admin links and resources for iThemes Builder and popular iThemes/PluginBuddy Plugins to the WordPress Toolbar / Admin Bar.
 * Version: 1.4.0
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
 * @since 1.0.0
 */
/** Plugin directory */
define( 'TBB_PLUGIN_DIR', dirname( __FILE__ ) );

/** Plugin base directory */
define( 'TBB_PLUGIN_BASEDIR', dirname( plugin_basename( __FILE__ ) ) );

/** Various link/content related helper constants */
define( 'TBB_VTUTORIALS_BUILDER', apply_filters( 'tbb_filter_videos_builder', 'http://www.youtube.com/results?search_query=ithemes+builder' ) );
define( 'TBB_VTUTORIALS_LOOPBUDDY', apply_filters( 'tbb_filter_videos_loopbuddy', 'http://www.youtube.com/results?search_query=loopbuddy' ) );
define( 'TBB_VTUTORIALS_BACKUPBUDDY', apply_filters( 'tbb_filter_videos_backupbuddy', 'http://www.youtube.com/results?search_query=backupbuddy' ) );


add_action( 'init', 'ddw_tbb_init' );
/**
 * Load the text domain for translation of the plugin.
 * Load admin helper functions - only within 'wp-admin'.
 * 
 * @since 1.0.0
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

	/** Define constants and set defaults for removing all or certain sections */
	if ( ! defined( 'TBB_ALL_DISPLAY' ) ) {
		define( 'TBB_ALL_DISPLAY', TRUE );
	}

	if ( ! defined( 'TBB_BUILDER_DISPLAY' ) ) {
		define( 'TBB_BUILDER_DISPLAY', TRUE );
	}

	if ( ! defined( 'TBB_BUILDER_MANAGE_CONTENT_DISPLAY' ) ) {
		define( 'TBB_BUILDER_MANAGE_CONTENT_DISPLAY', TRUE );
	}

	if ( ! defined( 'TBB_DISPLAYBUDDY_DISPLAY' ) ) {
		define( 'TBB_DISPLAYBUDDY_DISPLAY', TRUE );
	}

	if ( ! defined( 'TBB_LOOPBUDDY_DISPLAY' ) ) {
		define( 'TBB_LOOPBUDDY_DISPLAY', TRUE );
	}

	if ( ! defined( 'TBB_BACKUPBUDDY_DISPLAY' ) ) {
		define( 'TBB_BACKUPBUDDY_DISPLAY', TRUE );
	}

	if ( ! defined( 'TBB_RESOURCES_DISPLAY' ) ) {
		define( 'TBB_RESOURCES_DISPLAY', TRUE );
	}

	if ( ! defined( 'TBB_DE_DISPLAY' ) ) {
		define( 'TBB_DE_DISPLAY', TRUE );
	}

	if ( ! defined( 'TBB_MULTISITE_EXTRAS_ADMIN' ) ) {
		define( 'TBB_MULTISITE_EXTRAS_ADMIN', FALSE );
	}

}  // end of function ddw_tbb_init


add_action( 'admin_bar_menu', 'ddw_tbb_admin_bar_menu', 98 );
/**
 * Add new menu items to the WordPress Toolbar / Admin Bar.
 * 
 * @since 1.0.0
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
	 * @since 1.2.0
	 */
	$tbb_filter_capability = apply_filters( 'tbb_filter_capability_all', 'edit_posts' );

	/**
	 * Required WordPress cabability to display new admin bar entry
	 * Only showing items if toolbar / admin bar is activated and user is logged in!
	 *
	 * @since 1.0.0
	 */
	if ( ! is_user_logged_in()
		|| ! is_admin_bar_showing()
		|| ! current_user_can( $tbb_filter_capability )		// allows for custom filtering the required role/capability
		|| ! TBB_ALL_DISPLAY		// allows for custom disabling
	) {
		return;
	}

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
			$dpbboombar = $prefix . 'dpbboombar';				// third level: boombar
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
	if ( TBB_BUILDER_DISPLAY && 
		( function_exists( 'it_builder_load_theme_features' ) && current_user_can( 'edit_posts' ) ) 
	) {

		$tbb_builder_active = 'tbb_active_mode';

        	require_once( TBB_PLUGIN_DIR . '/includes/tbb-ithemesbuilder.php' );

	} else {

		$tbb_builder_active = 'tbb_irg_mode';

	}  // end-if Builder check


	/** Check for active DisplayBuddy plugin(s) and capabilities */
	if ( TBB_DISPLAYBUDDY_DISPLAY
		&& (
			(
				class_exists( 'pluginbuddy_accordion' )
				|| class_exists( 'IT_Boom_Bar' )
				|| class_exists( 'iThemesBillboard' )
				|| class_exists( 'pluginbuddy_carousel' )
				|| class_exists( 'PluginBuddyCopiousComments' )
				|| class_exists( 'PluginBuddyFeaturedPosts' )
				|| class_exists( 'iThemesRotatingImages' )
				|| class_exists( 'rotatingtext' )
				|| class_exists( 'pb_slides' )
				|| class_exists( 'pluginbuddy_slideshow' )
				|| class_exists( 'pluginbuddy_tipsy' )
				|| class_exists( 'PluginBuddyVideoShowcase' )
			) 
			&& current_user_can( 'edit_posts' )
		) 
	) {

		$tbb_displaybuddy_active = 'tbb_active_mode';

        	require_once( TBB_PLUGIN_DIR . '/includes/tbb-displaybuddy.php' );

	} else {

		$tbb_displaybuddy_active = 'tbb_irg_mode';

	}  // end-if DisplayBuddy check


	/** Check for active LoopBuddy plugin and capabilities */
	if ( TBB_LOOPBUDDY_DISPLAY && 
		( class_exists( 'pluginbuddy_loopbuddy' ) && ( current_user_can( 'administrator' ) || current_user_can( 'edit_theme_options' ) ) ) 
	) {

		$tbb_loopbuddy_active = 'tbb_active_mode';

        	require_once( TBB_PLUGIN_DIR . '/includes/tbb-loopbuddy.php' );

	} else {

		$tbb_loopbuddy_active = 'tbb_irg_mode';

	}  // end-if LoopBuddy check


	/** Check for active BackupBuddy 2.x/3.x plugin and capabilities */
	if ( TBB_BACKUPBUDDY_DISPLAY ) {

		/** Check for BackupBuddy 3.x stuff */
		if ( class_exists( 'pb_backupbuddy' )
			&& (
				( is_multisite() && current_user_can( 'manage_network' ) )
				|| ( ! is_multisite() && current_user_can( 'administrator' ) )
			)
		) {

			$tbb_backupbuddy_active = 'tbb_active_mode';

			require_once( TBB_PLUGIN_DIR . '/includes/tbb-backupbuddy.php' );

		}

		/** Otherwise check for BackupBuddy 2.x stuff */
		elseif ( class_exists( 'pluginbuddy_backupbuddy' )
			&& ( 
				( is_multisite() && current_user_can( 'manage_sites' ) )
				|| ( ! is_multisite() && current_user_can( 'administrator' ) ) 
			)
		) {

			$tbb_backupbuddy_active = 'tbb_active_mode';

			require_once( TBB_PLUGIN_DIR . '/includes/tbb-backupbuddy-2x.php' );

		} else {

			$tbb_backupbuddy_active = 'tbb_irg_mode';

		}

	}  // end-if TBB BackupBuddy display constant check


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
		 * @since 1.2.0
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
		 * @since 1.2.0
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
		 * @since 1.2.0
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
		 * @since 1.2.0
		 */
		do_action( 'tbb_custom_backupbuddy_group_items' );


	/**
	 * Display these items also if iThemes Builder or iThemes/PluginBuddy plugins are not installed
	 * iBuddy HQ menu items
	 */
	if ( TBB_RESOURCES_DISPLAY ) {

		/** Include plugin file with resource links */
		require_once( TBB_PLUGIN_DIR . '/includes/tbb-iresources.php' );

	}  // end-if constant check for displaying resources


	/** Display language specific links only for these locales: de_DE, de_AT, de_CH, de_LU */
	if ( TBB_DE_DISPLAY && ( get_locale() == 'de_DE' || get_locale() == 'de_AT' || get_locale() == 'de_CH' || get_locale() == 'de_LU' ) ) {
		/** German iThemes & iThemes Plugins/PluginBuddy language packs */
		$iresourcegroup_menu_items['languages-de'] = array(
			'parent' => $iresourcegroup,
			'title'  => __( 'German language files', 'toolbar-buddy' ),
			'href'   => 'http://deckerweb.de/material/sprachdateien/ithemes-und-pluginbuddy/',
			'meta'   => array( 'title' => _x( 'German language files for iThemes Builder Framework and iThemes Plugins', 'Translators: For the tooltip', 'toolbar-buddy' ) )
		);
	}  // end-if German locales


	/** Allow menu items to be filtered, but pass in parent menu item IDs */
	$menu_items = (array) apply_filters( 'ddw_tbb_menu_items', $menu_items,
									$iresourcegroup_menu_items,
									$prefix,
									$ibuddybar,
									$ibuddyblogs,
									$ibuddytutorials,
									$ibuddyfaqs,
									$ibuddymembers,
									$ithemesgroup,
										$buildersettings,
										$builderlayouts,
										$buildercontent,
										$builderblocksgroup, 											$builderblockevents,
										$bblockevents,
										$bblockvenues,
										$builderblockchurch,
										$bblocksermons,
										$bblockstaff,
										$builderblockrestaurant,
										$bblockmenus,
										$bblocklocations,
										$buildersupport,
										$builderdocs,
									$backupbgroup,
									$backupbuddyrun,
									$backupbuddytools,
									$backupbuddysupport,
									$backupbuddydocs,
										$loopbgroup,
										$loopbuddysettings,
										$loopbuddyedit,
									$displaybgroup,
									$displaybuddystart,
									$dpbaccordion,
									$dpbboombar,
									$displaybuddysupport,
									$displaybuddydocs,
										$ibuddysites,
										$iresourcegroup,
										$irsbuildergroup,
										$irsbackupbgroup,
										$irsloopbgroup,
										$irsdisplaybgroup
	);  // end of array


	/**
	 * Add the iBuddy top-level menu item
	 *
	 * @since 1.0.0
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
			'meta'  => array(
						'class' => esc_attr( $tbb_main_item_icon_display ),
						'title' => esc_attr__( $tbb_main_item_title_tooltip )
			)
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

		/** Add menu items */
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

		/** iResource Group: Add menu items */
		$wp_admin_bar->add_menu( $iresourcegroup_menu_item );

	}  // end foreach iResource Group


	/**
	 * Action Hook 'tbb_custom_iresource_group_items'
	 * allows for hooking other iResource Group items in
	 *
	 * @since 1.2.0
	 */
	do_action( 'tbb_custom_iresource_group_items' );

}  // end of main function ddw_tbb_admin_bar_menu


add_action( 'wp_head', 'ddw_tbb_admin_style' );
add_action( 'admin_head', 'ddw_tbb_admin_style' );
/**
 * Add the styles for new WordPress Toolbar / Admin Bar entry
 * 
 * @since 1.0.0
 */
function ddw_tbb_admin_style() {

	/** No styles if admin bar is disabled or user is not logged in or items are disabled via constant */
	if ( ! is_admin_bar_showing()
		|| ! is_user_logged_in()
		|| ! TBB_ALL_DISPLAY
	) {
		return;
	}

	/** Add CSS styles to wp_head/admin_head */
	$tbb_main_icon = apply_filters( 'tbb_filter_main_icon', plugins_url( 'toolbar-buddy/images/icon-ibuddy.png',
dirname( __FILE__ ) ) );

	?>
	<style type="text/css">
		#wpadminbar.nojs .ab-top-menu > li.menupop.icon-ibuddy:hover > .ab-item,
		#wpadminbar .ab-top-menu > li.menupop.icon-ibuddy.hover > .ab-item,
		#wpadminbar.nojs .ab-top-menu > li.menupop.icon-ibuddy > .ab-item,
		#wpadminbar .ab-top-menu > li.menupop.icon-ibuddy > .ab-item {
      			background-image: url(<?php echo esc_url_raw( $tbb_main_icon ); ?>);
			background-repeat: no-repeat;
			background-position: 0.85em 50%;
			padding-left: 30px;
		}
		#wp-admin-bar-ddw-ibuddy-languages-de > .ab-item:before {
			color: #ff9900;
			content: '• ';
		}
		#wp-admin-bar-ddw-ibuddy-irsbuildergroup .ab-item,
		#wp-admin-bar-ddw-ibuddy-irsdisplaybgroup .ab-item,
		#wp-admin-bar-ddw-ibuddy-irsloopbgroup .ab-item,
		#wp-admin-bar-ddw-ibuddy-irsbackupbgroup .ab-item {
			color: #21759b !important;
		}
	</style>
	<?php

}  // end of function ddw_tbb_admin_style


/**
 * Helper functions for custom branding of the plugin
 *
 * @since 1.2.0
 */
	/** Include plugin file with special custom stuff */
	require_once( TBB_PLUGIN_DIR . '/includes/tbb-branding.php' );


/**
 * Returns current plugin's header data in a flexible way.
 *
 * @since 1.4.0
 *
 * @uses get_plugins()
 *
 * @param $tbb_plugin_value
 * @param $tbb_plugin_folder
 * @param $tbb_plugin_file
 *
 * @return string Plugin version
 */
function ddw_tbb_plugin_get_data( $tbb_plugin_value ) {

	if ( ! function_exists( 'get_plugins' ) ) {
		require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	}

	$tbb_plugin_folder = get_plugins( '/' . plugin_basename( dirname( __FILE__ ) ) );
	$tbb_plugin_file = basename( ( __FILE__ ) );

	return $tbb_plugin_folder[ $tbb_plugin_file ][ $tbb_plugin_value ];

}  // end of function ddw_tbb_plugin_get_data
