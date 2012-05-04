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
 * @link       http://twitter.com/#!/deckerweb
 *
 * @since 1.0
 * @version 1.1
 */

/**
 * Add "Settings" links to plugin page
 *
 * @since 1.2
 *
 * @global mixed $tbb_builder_active, $tbb_loopbuddy_active, $tbb_backupbuddy_active
 * @param  $tbb_links
 * @param  $tbb_settings_links
 * @return strings settings links
 */
function ddw_tbb_settings_page_links( $tbb_links ) {

	global $tbb_builder_active, $tbb_loopbuddy_active, $tbb_backupbuddy_active;

	if ( $tbb_builder_active == 'tbb_active_mode' ) {
		$tbb_builder_link = sprintf( ' &middot; <a href="%s" title="%s">%s</a>' , admin_url( 'admin.php?page=theme-settings' ) , __( 'Go to the Builder settings page', 'toolbar-buddy' ) , __( 'Builder', 'toolbar-buddy' ) );
	} else {
		$tbb_builder_link = FALSE;
	}

	if ( $tbb_loopbuddy_active == 'tbb_active_mode' ) {
		$tbb_loopbuddy_link = sprintf( ' &middot; <a href="%s" title="%s">%s</a>' , admin_url( 'admin.php?page=pluginbuddy_loopbuddy-settings' ) , __( 'Go to the LoopBuddy settings page', 'toolbar-buddy' ) , __( 'Loops', 'toolbar-buddy' ) );
	} else {
		$tbb_loopbuddy_link = FALSE;
	}

	if ( $tbb_backupbuddy_active == 'tbb_active_mode' ) {
		$tbb_backupbuddy_link = sprintf( ' &middot; <a href="%s" title="%s">%s</a>' , network_admin_url( 'admin.php?page=pluginbuddy_backupbuddy-backup' ) , __( 'Go to the BackupBuddy settings page', 'toolbar-buddy' ) , __( 'Backups', 'toolbar-buddy' ) );
	} else {
		$tbb_backupbuddy_link = FALSE;
	}
	
	$tbb_settings_links = $tbb_builder_link . $tbb_loopbuddy_link . $tbb_backupbuddy_link;

	array_unshift( $tbb_links, $tbb_settings_links );

	return $tbb_links;

}  // end of function ddw_tbb_settings_page_links


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

}  // end of function ddw_tbb_plugin_links
