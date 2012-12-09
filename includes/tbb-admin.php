<?php
/**
 * Helper functions for the admin - plugin links.
 *
 * @package    Toolbar Buddy
 * @subpackage Admin
 * @author     David Decker - DECKERWEB
 * @copyright  Copyright 2012, David Decker - DECKERWEB
 * @license    http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link       http://genesisthemes.de/en/wp-plugins/toolbar-buddy/
 * @link       http://twitter.com/deckerweb
 *
 * @since 1.0.0
 */

/**
 * Setting internal plugin helper links constants
 *
 * @since 1.3.0
 */
define( 'TBB_URL_TRANSLATE',		'http://translate.wpautobahn.com/projects/wordpress-plugins-deckerweb/toolbar-buddy' );
define( 'TBB_URL_WPORG_FAQ',		'http://wordpress.org/extend/plugins/toolbar-buddy/faq/' );
define( 'TBB_URL_WPORG_FORUM',		'http://wordpress.org/support/plugin/toolbar-buddy' );
if ( get_locale() == 'de_DE' || get_locale() == 'de_AT' || get_locale() == 'de_CH' || get_locale() == 'de_LU' ) {
	define( 'TBB_URL_DONATE', 	'http://genesisthemes.de/spenden/' );
} else {
	define( 'TBB_URL_DONATE', 	'http://genesisthemes.de/en/donate/' );
}


/**
 * Add "Settings" links to plugin page
 *
 * @since 1.2.0
 *
 * @global mixed $tbb_builder_active, $tbb_loopbuddy_active, $tbb_backupbuddy_active
 *
 * @param  $tbb_links
 * @param  $tbb_settings_links
 *
 * @return strings settings links
 */
function ddw_tbb_settings_page_links( $tbb_links ) {

	/** Setting globals */
	global $tbb_builder_active, $tbb_loopbuddy_active, $tbb_backupbuddy_active;

	/** Builder settings link */
	if ( $tbb_builder_active == 'tbb_active_mode' ) {
		$tbb_builder_link = sprintf( ' &middot; <a href="%s" title="%s">%s</a>' , admin_url( 'admin.php?page=theme-settings' ) , __( 'Go to the Builder settings page', 'toolbar-buddy' ) , __( 'Builder', 'toolbar-buddy' ) );
	} else {
		$tbb_builder_link = FALSE;
	}

	/** LoopBuddy settings link */
	if ( $tbb_loopbuddy_active == 'tbb_active_mode' ) {
		$tbb_loopbuddy_link = sprintf( ' &middot; <a href="%s" title="%s">%s</a>' , admin_url( 'admin.php?page=pluginbuddy_loopbuddy-settings' ) , __( 'Go to the LoopBuddy settings page', 'toolbar-buddy' ) , __( 'Loops', 'toolbar-buddy' ) );
	} else {
		$tbb_loopbuddy_link = FALSE;
	}

	/** Retrieve BackupBuddy admin url */
	if ( class_exists( 'pb_backupbuddy' ) ) {
		$tbb_backupbuddy_aurl_slug = 'pb_backupbuddy_backup';
	} elseif ( class_exists( 'pluginbuddy_backupbuddy' ) ) {
		$tbb_backupbuddy_aurl_slug = 'pluginbuddy_backupbuddy-backup';
	}

	/** BackupBuddy settings link */
	if ( $tbb_backupbuddy_active == 'tbb_active_mode' ) {
		$tbb_backupbuddy_link = sprintf( ' &middot; <a href="%s" title="%s">%s</a>' , network_admin_url( 'admin.php?page=' . $tbb_backupbuddy_aurl_slug . '' ) , __( 'Go to the BackupBuddy settings page', 'toolbar-buddy' ) , __( 'Backups', 'toolbar-buddy' ) );
	} else {
		$tbb_backupbuddy_link = FALSE;
	}

	/** Setup the current settings links */
	$tbb_settings_links = $tbb_builder_link . $tbb_loopbuddy_link . $tbb_backupbuddy_link;

	/** Build the settings links array */
	array_unshift( $tbb_links, $tbb_settings_links );

	/** Display the settings links */
	return $tbb_links;

}  // end of function ddw_tbb_settings_page_links


add_filter( 'plugin_row_meta', 'ddw_tbb_plugin_links', 10, 2 );
/**
 * Add various support links to plugin page
 *
 * @since 1.0.0
 *
 * @param  $tbb_links
 * @param  $tbb_file
 *
 * @return strings plugin links
 */
function ddw_tbb_plugin_links( $tbb_links, $tbb_file ) {

	/** Capability check */
	if ( ! current_user_can( 'install_plugins' ) ) {

		return $tbb_links;

	}  // end-if cap check

	/** List additional links only for this plugin */
	if ( $tbb_file == TBB_PLUGIN_BASEDIR . '/toolbar-buddy.php' ) {

		$tbb_links[] = '<a href="' . esc_url_raw( TBB_URL_WPORG_FAQ ) . '" target="_new" title="' . __( 'FAQ', 'toolbar-buddy' ) . '">' . __( 'FAQ', 'toolbar-buddy' ) . '</a>';
		$tbb_links[] = '<a href="' . esc_url_raw( TBB_URL_WPORG_FORUM ) . '" target="_new" title="' . __( 'Support', 'toolbar-buddy' ) . '">' . __( 'Support', 'toolbar-buddy' ) . '</a>';
		$tbb_links[] = '<a href="' . esc_url_raw( TBB_URL_TRANSLATE ) . '" target="_new" title="' . __( 'Translations', 'toolbar-buddy' ) . '">' . __( 'Translations', 'toolbar-buddy' ) . '</a>';
		$tbb_links[] = '<a href="' . esc_url_raw( TBB_URL_DONATE ) . '" target="_new" title="' . __( 'Donate', 'toolbar-buddy' ) . '">' . __( 'Donate', 'toolbar-buddy' ) . '</a>';

	}  // end-if plugin links

	/** Output the links */
	return $tbb_links;

}  // end of function ddw_tbb_plugin_links
