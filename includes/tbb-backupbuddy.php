<?php
/**
 * Display links for active BackupBuddy 3.x plugin.
 *
 * @package    Toolbar Buddy
 * @subpackage iThemes Plugins Support
 * @author     David Decker - DECKERWEB
 * @copyright  Copyright 2012, David Decker - DECKERWEB
 * @license    http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link       http://genesisthemes.de/en/wp-plugins/toolbar-buddy/
 * @link       http://twitter.com/deckerweb
 *
 * @since 1.3.0
 */

/**
 * Display BackupBuddy 3.x settings links
 *
 * @since 1.3.0
 */
	/** BackupBuddy 3.x Tools - Getting started */
	$menu_items['backupbuddytools'] = array(
		'parent' => $backupbgroup,
		'title'  => __( 'BackupBuddy Tools', 'toolbar-buddy' ),
		'href'   => network_admin_url( 'admin.php?page=pb_backupbuddy_getting_started' ),
		'meta'   => array( 'target' => '', 'title' => __( 'BackupBuddy Tools', 'toolbar-buddy' ) )
	);

	/** BackupBuddy 3.x Tools */
	if ( ( is_multisite() && current_user_can( 'manage_network' ) )
			|| ( ! is_multisite() && current_user_can( 'administrator' ) )
	) {
		$menu_items['backupbuddytools-settings'] = array(
			'parent' => $backupbuddytools,
			'title'  => __( 'BackupBuddy Settings', 'toolbar-buddy' ),
			'href'   => network_admin_url( 'admin.php?page=pb_backupbuddy_settings' ),
			'meta'   => array( 'target' => '', 'title' => __( 'BackupBuddy Settings', 'toolbar-buddy' ) )
		);
		$menu_items['backupbuddytools-schedule'] = array(
			'parent' => $backupbuddytools,
			'title'  => __( 'Scheduling', 'toolbar-buddy' ),
			'href'   => network_admin_url( 'admin.php?page=pb_backupbuddy_scheduling' ),
			'meta'   => array( 'target' => '', 'title' => __( 'Scheduling', 'toolbar-buddy' ) )
		);
		$menu_items['backupbuddytools-scan'] = array(
			'parent' => $backupbuddytools,
			'title'  => __( 'Run Malware Scan', 'toolbar-buddy' ),
			'href'   => network_admin_url( 'admin.php?page=pb_backupbuddy_malware_scan' ),
			'meta'   => array( 'target' => '', 'title' => __( 'Run Malware Scan', 'toolbar-buddy' ) )
		);
		$menu_items['backupbuddytools-server'] = array(
			'parent' => $backupbuddytools,
			'title'  => __( 'Web Server Info', 'toolbar-buddy' ),
			'href'   => network_admin_url( 'admin.php?page=pb_backupbuddy_server_info' ),
			'meta'   => array( 'target' => '', 'title' => __( 'Web Server Info', 'toolbar-buddy' ) )
		);
		$menu_items['backupbuddytools-start'] = array(
			'parent' => $backupbuddytools,
			'title'  => __( 'BackupBuddy: Getting Started', 'toolbar-buddy' ),
			'href'   => network_admin_url( 'admin.php?page=pb_backupbuddy_getting_started' ),
			'meta'   => array( 'target' => '', 'title' => __( 'BackupBuddy: Getting Started', 'toolbar-buddy' ) )
		);


		/** BackupBuddy 3.x Backups & Restore section */
		$menu_items['backupbuddyrun'] = array(
			'parent' => $backupbgroup,
			'title'  => __( 'Backup &amp; Restore', 'toolbar-buddy' ),
			'href'   => network_admin_url( 'admin.php?page=pb_backupbuddy_backup' ),
			'meta'   => array( 'target' => '', 'title' => __( 'Backup &amp; Restore', 'toolbar-buddy' ) )
		);
		$menu_items['backupbuddyrun-db'] = array(
			'parent' => $backupbuddyrun,
			'title'  => __( 'Run Database Backup', 'toolbar-buddy' ),
			'href'   => network_admin_url( 'admin.php?page=pb_backupbuddy_backup&backup=db' ),
			'meta'   => array( 'target' => '', 'title' => __( 'Run Database Backup', 'toolbar-buddy' ) )
		);
		$menu_items['backupbuddyrun-full'] = array(
			'parent' => $backupbuddyrun,
			'title'  => __( 'Run FULL Backup', 'toolbar-buddy' ),
			'href'   => network_admin_url( 'admin.php?page=pb_backupbuddy_backup&backup=full' ),
			'meta'   => array( 'target' => '', 'title' => __( 'Run FULL Backup', 'toolbar-buddy' ) )
		);
		$menu_items['backupbuddyrun-destinations'] = array(
			'parent' => $backupbuddyrun,
			'title'  => __( 'Edit external Destinations', 'toolbar-buddy' ),
			'href'   => network_admin_url( 'admin.php?page=pb_backupbuddy_destinations' ),
			'meta'   => array( 'target' => '', 'title' => _x( 'Manage Remote Destinations &amp; Archives', 'Translators: For the tooltip', 'toolbar-buddy' ) )
		);
		$menu_items['backupbuddytools-migraterestore'] = array(
			'parent' => $backupbuddyrun,
			'title'  => __( 'Migrate &amp; Restore', 'toolbar-buddy' ),
			'href'   => network_admin_url( 'admin.php?page=pb_backupbuddy_migrate_restore' ),
			'meta'   => array( 'target' => '', 'title' => __( 'Migrate &amp; Restore', 'toolbar-buddy' ) )
		);

	}  // end-if BackupBuddy cap check


	/** BackupBuddy 3.x Multisite Extras section */
	if ( is_multisite() ) {

		/** Only for Super-Admins */
		if ( ( current_user_can( 'manage_network' ) || is_super_admin() )
			/* || ( ( current_user_can( 'activate_plugins' ) ) && ( pb_backupbuddy::$options[ 'multisite_export' ] == '1' ) ) */
		) {

			/** Multisite 3.x Main Entry */
			$menu_items['backupbuddymsextras'] = array(
				'parent' => $backupbgroup,
				'title'  => __( 'Multsite Extras', 'toolbar-buddy' ),
				'href'   => 'http://ithemes.com/codex/page/BackupBuddy_Multisite',
				'meta'   => array( 'title' => _x( 'Multsite Extras', 'Translators: For the tooltip', 'toolbar-buddy' ) )
			);

			/** BackupBuddy 3.x Multisite Import */
			if ( current_user_can( 'manage_network' ) || is_super_admin() ) {
				$menu_items['backupbuddymsextras-import'] = array(
					'parent' => $backupbuddymsextras,
					'title'  => __( 'Import Site (Beta)', 'toolbar-buddy' ),
					'href'   => network_admin_url( 'admin.php?page=pb_backupbuddy_multisite_import' ),
					'meta'   => array( 'target' => '', 'title' => _x( 'Import Site (Beta)', 'Translators: For the tooltip', 'toolbar-buddy' ) )
				);
			}  // end-if cap check

			/** BackupBuddy 3.x Multisite Export */
			if ( ( current_user_can( 'activate_plugins' ) && current_user_can( 'manage_network' ) )
				/* && ( ( pb_backupbuddy::$options[ 'multisite_export' ] == '1' ) || ( $multisite_export == '1' ) ) */
			) {
				$menu_items['backupbuddymsextras-export'] = array(
					'parent' => $backupbuddymsextras,
					'title'  => __( 'Export Site', 'toolbar-buddy' ),
					'href'   => admin_url( 'admin.php?page=pb_backupbuddy_multisite_export' ),
					'meta'   => array( 'target' => '', 'title' => _x( 'Export Site', 'Translators: For the tooltip', 'toolbar-buddy' ) )
				);
			}  // end-if cap check

		}  // end-if is_super_admin


		/**
		 * In Multisite but for regular (site-wide) Admins
		 *    - Currently not working with BackupBuddy v3.1.6.5
		 */
		if ( TBB_MULTISITE_EXTRAS_ADMIN
			&& ! current_user_can( 'manage_network' )
			&& ( current_user_can( 'administrator' ) /* || current_user_can( 'manage_options' ) || current_user_can( 'activate_plugins' ) */ )
		) {

			/** Multisite 3.x Main Entry - for Admins */
			$menu_items['backupbuddymsextras'] = array(
				'parent' => $backupbgroup,
				'title'  => __( 'Multsite Extras', 'toolbar-buddy' ),
				'href'   => 'http://ithemes.com/codex/page/BackupBuddy_Multisite',
				'meta'   => array( 'title' => _x( 'Multsite Extras', 'Translators: For the tooltip', 'toolbar-buddy' ) )
			);

			/** Malware Scan for Sup-Sites - for Admins */
			$menu_items['backupbuddymsextras-admins-malwarescan'] = array(
				'parent' => $backupbuddymsextras,
				'title'  => __( 'Run Malware Scan', 'toolbar-buddy' ),
				'href'   => admin_url( 'admin.php?page=pb_backupbuddy_malware_scan' ),
				'meta'   => array( 'target' => '', 'title' => __( 'Run Malware Scan', 'toolbar-buddy' ) )
			);

			/** Remote Destinations - for Admins */
			$menu_items['backupbuddymsextras-admin-destinations'] = array(
				'parent' => $backupbuddymsextras,
				'title'  => __( 'Edit external Destinations', 'toolbar-buddy' ),
				'href'   => network_admin_url( 'admin.php?page=pb_backupbuddy_destinations' ),
				'meta'   => array( 'target' => '', 'title' => _x( 'Manage Remote Destinations &amp; Archives', 'Translators: For the tooltip', 'toolbar-buddy' ) )
			);

			/** BackupBuddy 3.x Multisite Export (only Sub-Sites!) - for Admins */
			if ( '1' == pb_backupbuddy::$options[ 'multisite_export' ] ) {

				$menu_items['backupbuddymsextras-admins-export'] = array(
					'parent' => $backupbuddymsextras,
					'title'  => __( 'Export Site', 'toolbar-buddy' ),
					'href'   => admin_url( 'admin.php?page=pb_backupbuddy_multisite_export' ),
					'meta'   => array( 'target' => '', 'title' => _x( 'Export Site', 'Translators: For the tooltip', 'toolbar-buddy' ) )
				);

			}  // end-if cap check
		
		}  // end-if cap check admins

	}  // end-if is_multisite


	/** Include plugin file with BackupBuddy resources stuff */
	if ( is_super_admin() ) {
		require_once( TBB_PLUGIN_DIR . '/includes/tbb-backupbuddy-resources.php' );
	}
