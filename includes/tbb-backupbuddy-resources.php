<?php
/**
 * Display resource links for active BackupBuddy 2.x/3.x plugin.
 *
 * @package    Toolbar Buddy
 * @subpackage PluginBuddy Plugins Support
 * @author     David Decker - DECKERWEB
 * @copyright  Copyright 2012, David Decker - DECKERWEB
 * @license    http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link       http://genesisthemes.de/en/wp-plugins/toolbar-buddy/
 * @link       http://twitter.com/#!/deckerweb
 *
 * @since 1.0
 * @version 1.1
 */

/** BackupBuddy Support & Docs section */
$menu_items['irsbackupbgroup'] = array(
	'parent' => $iresourcegroup,
	'title'  => __( 'BackupBuddy Support &amp; Docs', 'toolbar-buddy' ),
	'href'   => false,
	'meta'   => array( 'title' => _x( 'BackupBuddy Support &amp; Docs', 'Translators: For the tooltip', 'toolbar-buddy' ) )
);

	/** BackupBuddy Support section */
	$menu_items['backupbuddysupport'] = array(
		'parent' => $irsbackupbgroup,
		'title'  => __( 'BackupBuddy Support', 'toolbar-buddy' ),
		'href'   => 'http://ithemes.com/forum/forum/11-pluginbuddy-plugins/',
		'meta'   => array( 'title' => __( 'BackupBuddy Support', 'toolbar-buddy' ) )
	);
	$menu_items['backupbuddysupportdefault'] = array(
		'parent' => $backupbuddysupport,
		'title'  => __( 'BackupBuddy Forum', 'toolbar-buddy' ),
		'href'   => 'http://ithemes.com/forum/forum/74-backupbuddy/',
		'meta'   => array( 'title' => __( 'BackupBuddy Forum', 'toolbar-buddy' ) )
	);
	$menu_items['backupbuddysupportmultisite'] = array(
		'parent' => $backupbuddysupport,
		'title'  => __( 'BackupBuddy Multisite Forum', 'toolbar-buddy' ),
		'href'   => 'http://ithemes.com/forum/forum/120-backupbuddy-multisite/',
		'meta'   => array( 'title' => __( 'BackupBuddy Multisite Forum', 'toolbar-buddy' ) )
	);
	/** BackupBuddy 3.0 Beta Testing Forum */
	if ( class_exists( 'pb_backupbuddy' ) ) {
		$menu_items['backupbuddysupportbb30beta'] = array(
			'parent' => $backupbuddysupport,
			'title'  => __( 'BackupBuddy 3.0 Beta Testing', 'toolbar-buddy' ),
			'href'   => 'http://ithemes.com/forum/forum/201-backupbuddy-30-beta-testing/',
			'meta'   => array( 'title' => __( 'BackupBuddy 3.0 Beta Testing', 'toolbar-buddy' ) )
		);
	}  // end-if BB 3.0 Beta Forum

	/** BackupBuddy Codex section */
	$menu_items['backupbuddydocs'] = array(
		'parent' => $irsbackupbgroup,
		'title'  => __( 'BackupBuddy Codex', 'toolbar-buddy' ),
		'href'   => 'http://ithemes.com/codex/page/BackupBuddy',
		'meta'   => array( 'title' => _x( 'BackupBuddy Codex &amp; Documentation', 'Translators: For the tooltip', 'toolbar-buddy' ) )
	);
	$menu_items['backupbuddydocs-multisite'] = array(
		'parent' => $backupbuddydocs,
		'title'  => __( 'Multisite Documentation', 'toolbar-buddy' ),
		'href'   => 'http://ithemes.com/codex/page/BackupBuddy_Multisite',
		'meta'   => array( 'title' => _x( 'Multisite Documentation', 'Translators: For the tooltip', 'toolbar-buddy' ) )
	);
	$menu_items['backupbuddydocs-videos'] = array(
		'parent' => $backupbuddydocs,
		'title'  => __( 'Video Tutorials', 'toolbar-buddy' ),
		'href'   => esc_url( TBB_VTUTORIALS_BACKUPBUDDY ),
		'meta'   => array( 'title' => _x( 'BackupBuddy Video Tutorials (YouTube Search)', 'Translators: For the tooltip', 'toolbar-buddy' ) )
	);
