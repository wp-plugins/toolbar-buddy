<?php
/**
 * Helper functions for custom branding & capabilities.
 *
 * @package    Toolbar Buddy
 * @subpackage Branding
 * @author     David Decker - DECKERWEB
 * @copyright  Copyright 2012, David Decker - DECKERWEB
 * @license    http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link       http://genesisthemes.de/en/wp-plugins/toolbar-buddy/
 * @link       http://twitter.com/deckerweb
 *
 * @since 1.2.0
 */

/**
 * Helper functions for returning a few popular roles/capabilities.
 *
 * @since 1.2.0
 *
 * @return role/capability
 */
	/**
	 * Helper function for returning 'administrator' role/capability.
	 *
	 * @since 1.2.0
	 *
	 * @return 'administrator' role
	 */
	function __tbb_admin_only() {

		return 'administrator';
	}

	/**
	 * Helper function for returning 'editor' role/capability.
	 *
	 * @since 1.2.0
	 *
	 * @return 'editor' role
	 */
	function __tbb_role_editor() {

		return 'editor';
	}

	/**
	 * Helper function for returning 'edit_theme_options' capability.
	 *
	 * @since 1.2.0
	 *
	 * @return 'edit_theme_options' capability
	 */
	function __tbb_cap_edit_theme_options() {

		return 'edit_theme_options';
	}

	/**
	 * Helper function for returning 'manage_options' capability.
	 *
	 * @since 1.2.0
	 *
	 * @return 'manage_options' capability
	 */
	function __tbb_cap_manage_options() {

		return 'manage_options';
	}

	/**
	 * Helper function for returning 'install_plugins' capability.
	 *
	 * @since 1.2.0
	 *
	 * @return 'install_plugins' capability
	 */
	function __tbb_cap_install_plugins() {

		return 'install_plugins';
	}

/** End of role/capability helper functions */


/**
 * Helper functions for returning custom icons.
 *
 * @since 1.2.0
 *
 * @return string URL for custom icon image
 */
	/**
	 * Helper function for returning a custom icon (icon-tbb.png)
	 * from stylesheet/child theme "images" folder.
	 *
	 * @since 1.2.0
	 *
	 * @return tbb custom icon
	 */
	function __tbb_child_images_icon() {

		return get_stylesheet_directory_uri() . '/images/icon-tbb.png';
	}

	/**
	 * Helper function for returning the iThemes Builder icon
	 *
	 * @since 1.3.0
	 *
	 * @return tbb ithemes builder icon
	 */
	function __tbb_icon_builder() {

		return plugins_url( 'images/icon-builder.png', dirname( __FILE__ ) );
	}

	/**
	 * Helper function for returning the alternate iThemes Builder icon
	 *
	 * @since 1.3.0
	 *
	 * @return tbb alternate ithemes builder icon
	 */
	function __tbb_icon_buildertwo() {

		return plugins_url( 'images/icon-builder2.png', dirname( __FILE__ ) );
	}

	/**
	 * Helper function for returning the PluginBuddy Brand icon
	 *
	 * @since 1.3.0
	 *
	 * @return tbb pluginbuddy brand icon
	 */
	function __tbb_icon_pluginbuddy() {

		return plugins_url( 'images/icon-pluginbuddy.png', dirname( __FILE__ ) );
	}

	/**
	 * Helper function for returning the alternate PluginBuddy Brand icon
	 *
	 * @since 1.3.0
	 *
	 * @return tbb alternate pluginbuddy brand icon
	 */
	function __tbb_icon_pluginbuddytwo() {

		return plugins_url( 'images/icon-pluginbuddy2.png', dirname( __FILE__ ) );
	}

	/**
	 * Helper function for returning the DisplayBuddy icon
	 *
	 * @since 1.3.0
	 *
	 * @return tbb displaybuddy icon
	 */
	function __tbb_icon_displaybuddy() {

		return plugins_url( 'images/icon-displaybuddy.png', dirname( __FILE__ ) );
	}

	/**
	 * Helper function for returning the LoopBuddy icon
	 *
	 * @since 1.3.0
	 *
	 * @return tbb loopbuddy icon
	 */
	function __tbb_icon_loopbuddy() {

		return plugins_url( 'images/icon-loopbuddy.png', dirname( __FILE__ ) );
	}

	/**
	 * Helper function for returning the BackupBuddy icon
	 *
	 * @since 1.3.0
	 *
	 * @return tbb backupbuddy icon
	 */
	function __tbb_icon_backupbuddy() {

		return plugins_url( 'images/icon-backupbuddy.png', dirname( __FILE__ ) );
	}

/** End of icon helper functions */


/**
 * Helper functions for returning icon class.
 *
 * @since 1.2.0
 *
 * @return icon class
 */
	/**
	 * Helper function for returning no icon class.
	 *
	 * @since 1.2.0
	 *
	 * @return no icon class
	 */
	function __tbb_no_icon_display() {

		return NULL;
	}

/** End of icon class helper functions */
