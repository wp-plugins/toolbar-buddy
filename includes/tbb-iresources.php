<?php
/**
 * Display the resource links for the "iResource Group".
 *
 * @package    Toolbar Buddy
 * @subpackage iResources
 * @author     David Decker - DECKERWEB
 * @copyright  Copyright 2012, David Decker - DECKERWEB
 * @license    http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link       http://genesisthemes.de/en/wp-plugins/toolbar-buddy/
 * @link       http://twitter.com/deckerweb
 *
 * @since 1.0.0
 */

/** Set filter for "iBuddy HQ" string */
$tbb_ibuddy_hq_name = apply_filters( 'tbb_filter_ibuddy_hq_name', __( 'iBuddy HQ', 'toolbar-buddy' ) );

/** List the menu items - array */
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
	'ibuddyblogs-webdesign' => array(
		'parent' => $ibuddyblogs,
		'title'  => __( 'WebDesign.com Blog', 'toolbar-buddy' ),
		'href'   => 'http://webdesign.com/news/',
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
		'title'  => __( 'Plugin Tutorials', 'toolbar-buddy' ),
		'href'   => 'http://ithemes.com/codex/page/PluginBuddy',
		'meta'   => array( 'title' => __( 'Plugin Tutorials', 'toolbar-buddy' ) )
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
		'title'  => __( 'Free iThemes plugins', 'toolbar-buddy' ),
		'href'   => 'http://ithemes.com/free-wordpress-plugins/',
		'meta'   => array( 'title' => __( 'Free iThemes plugins', 'toolbar-buddy' ) )
	),

	/** News Planet section */
	'ibuddyffnews' => array(
		'parent' => $ibuddysites,
		'title'  => __( 'iBuddy News Planet', 'toolbar-buddy' ),
		'href'   => 'http://friendfeed.com/ibuddy-news',
		'meta'   => array( 'title' => _x( 'iThemes Builder and Plugin News Planet (official and community news via FriendFeed service)', 'Translators: For the tooltip', 'toolbar-buddy' ) )
	),
);  // end of array
