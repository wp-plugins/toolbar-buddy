<?php
/**
 * Display links for active BackupBuddy 2.x plugin.
 *
 * @package    Toolbar Buddy
 * @subpackage iThemes Plugins Support
 * @author     David Decker - DECKERWEB
 * @copyright  Copyright 2012, David Decker - DECKERWEB
 * @license    http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link       http://genesisthemes.de/en/wp-plugins/toolbar-buddy/
 * @link       http://twitter.com/deckerweb
 *
 * @since 1.0.0
 */

/**
 * Display BackupBuddy 2.x settings links
 *
 * @since 1.0.0
 */
	/**
	 * Check for Multisite install
	 * Change admin_url prefix on dependance
	 */
	if ( is_multisite() && current_user_can( 'manage_sites' ) ) {
		$ibuddy_bb_aurl_tools = network_admin_url( 'admin.php?page=pluginbuddy_backupbuddy' );
		$ibuddy_bb_aurl_settings = network_admin_url( 'admin.php?page=pluginbuddy_backupbuddy-settings' );
		$ibuddy_bb_aurl_schedule = network_admin_url( 'admin.php?page=pluginbuddy_backupbuddy-scheduling' );
		$ibuddy_bb_aurl_scan = network_admin_url( 'admin.php?page=pluginbuddy_backupbuddy-malware' );
		$ibuddy_bb_aurl_server = network_admin_url( 'admin.php?page=pluginbuddy_backupbuddy-tools' );
		$ibuddy_bb_aurl_start = network_admin_url( 'admin.php?page=pluginbuddy_backupbuddy' );
		$ibuddy_bb_aurl_backup = network_admin_url( 'admin.php?page=pluginbuddy_backupbuddy-backup' );
		$ibuddy_bb_aurl_backup_db = network_admin_url( 'admin.php?page=pluginbuddy_backupbuddy-backup&run_backup=db' );
		$ibuddy_bb_aurl_backup_full = network_admin_url( 'admin.php?page=pluginbuddy_backupbuddy-backup&run_backup=full' );
	} elseif ( ! is_multisite() ) {
		$ibuddy_bb_aurl_tools = admin_url( 'admin.php?page=pluginbuddy_backupbuddy' );
		$ibuddy_bb_aurl_settings = admin_url( 'admin.php?page=pluginbuddy_backupbuddy-settings' );
		$ibuddy_bb_aurl_schedule = admin_url( 'admin.php?page=pluginbuddy_backupbuddy-scheduling' );
		$ibuddy_bb_aurl_scan = admin_url( 'admin.php?page=pluginbuddy_backupbuddy-malware' );
		$ibuddy_bb_aurl_server = admin_url( 'admin.php?page=pluginbuddy_backupbuddy-tools' );
		$ibuddy_bb_aurl_start = admin_url( 'admin.php?page=pluginbuddy_backupbuddy' );
		$ibuddy_bb_aurl_backup = admin_url( 'admin.php?page=pluginbuddy_backupbuddy-backup' );
		$ibuddy_bb_aurl_backup_db = admin_url( 'admin.php?page=pluginbuddy_backupbuddy-backup&run_backup=db' );
		$ibuddy_bb_aurl_backup_full = admin_url( 'admin.php?page=pluginbuddy_backupbuddy-backup&run_backup=full' );
	}  // end if elseif is_multisite & super admin


	/** BackupBuddy 2.x Tools */
	$menu_items['backupbuddytools'] = array(
		'parent' => $backupbgroup,
		'title'  => __( 'BackupBuddy Tools', 'toolbar-buddy' ),
		'href'   => $ibuddy_bb_aurl_tools,
		'meta'   => array( 'target' => '', 'title' => __( 'BackupBuddy Tools', 'toolbar-buddy' ) )
	);
	$menu_items['backupbuddytools-settings'] = array(
		'parent' => $backupbuddytools,
		'title'  => __( 'BackupBuddy Settings', 'toolbar-buddy' ),
		'href'   => $ibuddy_bb_aurl_settings,
		'meta'   => array( 'target' => '', 'title' => __( 'BackupBuddy Settings', 'toolbar-buddy' ) )
	);
	$menu_items['backupbuddytools-schedule'] = array(
		'parent' => $backupbuddytools,
		'title'  => __( 'Scheduling', 'toolbar-buddy' ),
		'href'   => $ibuddy_bb_aurl_schedule,
		'meta'   => array( 'target' => '', 'title' => __( 'Scheduling', 'toolbar-buddy' ) )
	);
	$menu_items['backupbuddytools-scan'] = array(
		'parent' => $backupbuddytools,
		'title'  => __( 'Run Malware Scan', 'toolbar-buddy' ),
		'href'   => $ibuddy_bb_aurl_scan,
		'meta'   => array( 'target' => '', 'title' => __( 'Run Malware Scan', 'toolbar-buddy' ) )
	);
	$menu_items['backupbuddytools-server'] = array(
		'parent' => $backupbuddytools,
		'title'  => __( 'Web Server Info', 'toolbar-buddy' ),
		'href'   => $ibuddy_bb_aurl_server,
		'meta'   => array( 'target' => '', 'title' => __( 'Web Server Info', 'toolbar-buddy' ) )
	);
	$menu_items['backupbuddytools-start'] = array(
		'parent' => $backupbuddytools,
		'title'  => __( 'BackupBuddy: Getting Started', 'toolbar-buddy' ),
		'href'   => $ibuddy_bb_aurl_start,
		'meta'   => array( 'target' => '', 'title' => __( 'BackupBuddy: Getting Started', 'toolbar-buddy' ) )
	);


	/** BackupBuddy 2.x Backups & Restore section */
	$menu_items['backupbuddyrun'] = array(
		'parent' => $backupbgroup,
		'title'  => __( 'Backup &amp; Restore', 'toolbar-buddy' ),
		'href'   => $ibuddy_bb_aurl_backup,
		'meta'   => array( 'target' => '', 'title' => __( 'Backup &amp; Restore', 'toolbar-buddy' ) )
	);
	$menu_items['backupbuddyrun-db'] = array(
		'parent' => $backupbuddyrun,
		'title'  => __( 'Run Database Backup', 'toolbar-buddy' ),
		'href'   => $ibuddy_bb_aurl_backup_db,
		'meta'   => array( 'target' => '', 'title' => __( 'Run Database Backup', 'toolbar-buddy' ) )
	);
	$menu_items['backupbuddyrun-full'] = array(
		'parent' => $backupbuddyrun,
		'title'  => __( 'Run FULL Backup', 'toolbar-buddy' ),
		'href'   => $ibuddy_bb_aurl_backup_full,
		'meta'   => array( 'target' => '', 'title' => __( 'Run FULL Backup', 'toolbar-buddy' ) )
	);
	$menu_items['backupbuddyrun-destinations'] = array(
		'parent' => $backupbuddyrun,
		'title'  => __( 'Edit external Destinations', 'toolbar-buddy' ),
		'href'   => admin_url( 'admin-ajax.php?action=pb_backupbuddy_remotedestination&TB_iframe=true&width=640&height=522' ),
		'meta'   => array( 'class' => 'thickbox', 'title' => __( 'Edit external Destinations', 'toolbar-buddy' ) )
	);


	/** BackupBuddy 2.x Multisite Extras section */
	if ( is_multisite() ) {

		/** Only for Admins & Super-Admins */
		if ( current_user_can( 'manage_sites' ) || is_super_admin() ) {

			/** Multisite Main Entry */
			$menu_items['backupbuddymsextras'] = array(
				'parent' => $backupbgroup,
				'title'  => __( 'Multsite Extras', 'toolbar-buddy' ),
				'href'   => 'http://ithemes.com/codex/page/BackupBuddy_Multisite',
				'meta'   => array( 'title' => _x( 'Multsite Extras', 'Translators: For the tooltip', 'toolbar-buddy' ) )
			);

			/** BackupBuddy 2.x Multisite Export */
			$menu_items['backupbuddymsextras-export'] = array(
				'parent' => $backupbuddymsextras,
				'title'  => __( 'Export Site (Beta)', 'toolbar-buddy' ),
				'href'   => admin_url( 'admin.php?page=pluginbuddy_backupbuddy-msbackup' ),
				'meta'   => array( 'target' => '', 'title' => _x( 'Export Site (Beta)', 'Translators: For the tooltip', 'toolbar-buddy' ) )
			);

			/** BackupBuddy 2.x Multisite Duplicate */
			$menu_items['backupbuddymsextras-duplicate'] = array(
				'parent' => $backupbuddymsextras,
				'title'  => __( 'Duplicate Site (Beta)', 'toolbar-buddy' ),
				'href'   => admin_url( 'admin.php?page=pluginbuddy_backupbuddy-msduplicate' ),
				'meta'   => array( 'target' => '', 'title' => _x( 'Duplicate Site (Beta)', 'Translators: For the tooltip', 'toolbar-buddy' ) )
			);

		}  // end-if is administrator role

		/** Only for Super-Admins (cap: manage_sites) */
		if ( current_user_can( 'manage_sites' ) ) {

			/** BackupBuddy 2.x Multisite Import */
			$menu_items['backupbuddymsextras-import'] = array(
				'parent' => $backupbuddymsextras,
				'title'  => __( 'Import Site (Beta)', 'toolbar-buddy' ),
				'href'   => network_admin_url( 'admin.php?page=pluginbuddy_backupbuddy-msimport' ),
				'meta'   => array( 'target' => '', 'title' => _x( 'Import Site (Beta)', 'Translators: For the tooltip', 'toolbar-buddy' ) )
			);

		}  // end-if is_super_admin

	}  // end-if is_multisite


	/** Include plugin file with BackupBuddy resources stuff */
	require_once( TBB_PLUGIN_DIR . '/includes/tbb-backupbuddy-resources.php' );
