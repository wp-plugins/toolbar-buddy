<?php
/**
 * Helper functions for custom branding & capabilities
 *
 * @package    Toolbar Buddy
 * @subpackage Branding
 * @author     David Decker - DECKERWEB
 * @copyright  Copyright 2012, David Decker - DECKERWEB
 * @license    http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link       http://genesisthemes.de/en/wp-plugins/toolbar-buddy/
 * @link       http://twitter.com/#!/deckerweb
 *
 * @since 1.2
 */

/**
 * Helper functions for returning a few popular roles/capabilities.
 *
 * @since 1.2
 *
 * @return role/capability
 */
	/**
	 * Helper function for returning 'administrator' role/capability.
	 *
	 * @since 1.2
	 *
	 * @return 'administrator' role
	 */
	function __tbb_admin_only() {

		return 'administrator';
	}

	/**
	 * Helper function for returning 'editor' role/capability.
	 *
	 * @since 1.2
	 *
	 * @return 'editor' role
	 */
	function __tbb_role_editor() {

		return 'editor';
	}

	/**
	 * Helper function for returning 'edit_theme_options' capability.
	 *
	 * @since 1.2
	 *
	 * @return 'edit_theme_options' capability
	 */
	function __tbb_cap_edit_theme_options() {

		return 'edit_theme_options';
	}

	/**
	 * Helper function for returning 'manage_options' capability.
	 *
	 * @since 1.2
	 *
	 * @return 'manage_options' capability
	 */
	function __tbb_cap_manage_options() {

		return 'manage_options';
	}

	/**
	 * Helper function for returning 'install_plugins' capability.
	 *
	 * @since 1.2
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
 * @since 1.2
 *
 * @return string URL for custom icon image
 */
	/**
	 * Helper function for returning a custom icon (icon-tbb.png)
	 * from stylesheet/child theme "images" folder.
	 *
	 * @since 1.2
	 *
	 * @return tbb custom icon
	 */
	function __tbb_child_images_icon() {

		return get_stylesheet_directory_uri() . '/images/icon-tbb.png';
	}

/** End of icon helper functions */


/**
 * Helper functions for returning icon class.
 *
 * @since 1.2
 *
 * @return icon class
 */
	/**
	 * Helper function for returning no icon class.
	 *
	 * @since 1.2
	 *
	 * @return no icon class
	 */
	function __tbb_no_icon_display() {

		return NULL;
	}

/** End of icon class helper functions */
