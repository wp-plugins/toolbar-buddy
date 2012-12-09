<?php
/**
 * Display links for active LoopBuddy plugin.
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
 * Display LoopBuddy settings links
 *
 * @since 1.0.0
 */
	/** LoopBuddy Settings section */
	$menu_items['loopbuddysettings'] = array(
		'parent' => $loopbgroup,
		'title'  => __( 'LoopBuddy Settings', 'toolbar-buddy' ),
		'href'   => admin_url( 'admin.php?page=pluginbuddy_loopbuddy-settings' ),
		'meta'   => array( 'target' => '', 'title' => __( 'LoopBuddy Settings', 'toolbar-buddy' ) )
	);
	$menu_items['loopbuddysettings-start'] = array(
		'parent' => $loopbuddysettings,
		'title'  => __( 'LoopBuddy: Getting Started', 'toolbar-buddy' ),
		'href'   => admin_url( 'admin.php?page=pluginbuddy_loopbuddy' ),
		'meta'   => array( 'target' => '', 'title' => __( 'LoopBuddy: Getting Started', 'toolbar-buddy' ) )
	);

	/** LoopBuddy Edit Loops section */
	$menu_items['loopbuddyedit'] = array(
		'parent' => $loopbgroup,
		'title'  => __( 'Edit Loops', 'toolbar-buddy' ),
		'href'   => '#',
		'meta'   => array( 'target' => '', 'title' => __( 'Edit Loops', 'toolbar-buddy' ) )
	);

		/** LoopBuddy Query Editor section */
		$menu_items['loopbuddyedit-queries'] = array(
			'parent' => $loopbuddyedit,
			'title'  => __( 'Query Editor', 'toolbar-buddy' ),
			'href'   => admin_url( 'admin.php?page=pluginbuddy_loopbuddy-queries' ),
			'meta'   => array( 'target' => '', 'title' => __( 'Query Editor', 'toolbar-buddy' ) )
		);

		/** LoopBuddy Layout Editor section */
		$menu_items['loopbuddyedit-layouts'] = array(
			'parent' => $loopbuddyedit,
			'title'  => _x( 'Layout Editor', 'Translators: LoopBuddy Layouts', 'toolbar-buddy' ),
			'href'   => admin_url( 'admin.php?page=pluginbuddy_loopbuddy-layouts' ),
			'meta'   => array( 'target' => '', 'title' => _x( 'Layout Editor', 'Translators: LoopBuddy Layouts', 'toolbar-buddy' ) )
		);


	/** LoopBuddy Support & Docs section */
	$menu_items['irsloopbgroup'] = array(
		'parent' => $iresourcegroup,
		'title'  => __( 'LoopBuddy Support &amp; Docs', 'toolbar-buddy' ),
		'href'   => false,
		'meta'   => array( 'title' => _x( 'LoopBuddy Support &amp; Docs', 'Translators: For the tooltip', 'toolbar-buddy' ) )
	);

		/** LoopBuddy Support section */
		$menu_items['loopbuddysupport'] = array(
			'parent' => $irsloopbgroup,
			'title'  => __( 'LoopBuddy Support', 'toolbar-buddy' ),
			'href'   => 'http://ithemes.com/forum/forum/116-loopbuddy/',
			'meta'   => array( 'title' => __( 'LoopBuddy Support', 'toolbar-buddy' ) )
		);

		/** LoopBuddy Codex section */
		$menu_items['loopbuddydocs'] = array(
			'parent' => $irsloopbgroup,
			'title'  => __( 'LoopBuddy Codex', 'toolbar-buddy' ),
			'href'   => 'http://ithemes.com/codex/page/LoopBuddy',
			'meta'   => array( 'title' => _x( 'LoopBuddy Codex &amp; Documentation', 'Translators: For the tooltip', 'toolbar-buddy' ) )
		);
		$menu_items['loopbuddyvideos'] = array(
			'parent' => $irsloopbgroup,
			'title'  => __( 'Video Tutorials', 'toolbar-buddy' ),
			'href'   => esc_url( TBB_VTUTORIALS_LOOPBUDDY ),
			'meta'   => array( 'title' => _x( 'LoopBuddy Video Tutorials (YouTube Search)', 'Translators: For the tooltip', 'toolbar-buddy' ) )
		);
