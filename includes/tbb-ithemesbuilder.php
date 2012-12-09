<?php
/**
 * Display links for active iThemes Builder Framework.
 *
 * @package    Toolbar Buddy
 * @subpackage iThemes Builder Support
 * @author     David Decker - DECKERWEB
 * @copyright  Copyright 2012, David Decker - DECKERWEB
 * @license    http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link       http://genesisthemes.de/en/wp-plugins/toolbar-buddy/
 * @link       http://twitter.com/deckerweb
 *
 * @since 1.0.0
 */

/**
 * Conditionally remove original Builder toolbar items
 * Only if constant is set to "TRUE"!
 *
 * Usage: define( 'TBB_REMOVE_BUILDER_ORIGINAL_TOOLBAR', TRUE );
 *
 * @since 1.2.0
 */
if ( defined( 'TBB_REMOVE_BUILDER_ORIGINAL_TOOLBAR' ) && TBB_REMOVE_BUILDER_ORIGINAL_TOOLBAR ) {

	add_action( 'wp_before_admin_bar_render', 'ddw_tbb_remove_builder_original', 99 );
	/**
	 * Remove original Builder toolbar items
	 *
	 * @since 1.2.0
	 */
	function ddw_tbb_remove_builder_original() {

		global $wp_admin_bar;

		$wp_admin_bar->remove_menu( 'builder' );
	}

}  // end-if constant check


/**
 * Check for theme support for "builder-my-theme-menu"
 *
 * @since 1.0.0
 */
if ( current_theme_supports( 'builder-my-theme-menu' ) ) {

	/**
	 * Display Builder settings links
	 *
	 * @since 1.0.0
	 */

		/** Builder Settings & Layouts section */
		if ( current_user_can( 'switch_themes' ) ) {

			/** Builder Settings section */
			$menu_items['buildersettings'] = array(
				'parent' => $ithemesgroup,
				'title'  => __( 'Builder Settings', 'toolbar-buddy' ),
				'href'   => admin_url( 'admin.php?page=theme-settings' ),
				'meta'   => array( 'target' => '', 'title' => __( 'Builder Settings', 'toolbar-buddy' ) )
			);
			$menu_items['buildersettings-menus'] = array(
				'parent' => $buildersettings,
				'title'  => __( 'Builder Menus', 'toolbar-buddy' ),
				'href'   => admin_url( 'nav-menus.php' ),
				'meta'   => array( 'target' => '', 'title' => __( 'Builder Menus', 'toolbar-buddy' ) )
			);
			$menu_items['buildersettings-importexport'] = array(
				'parent' => $buildersettings,
				'title'  => __( 'Import &amp; Export', 'toolbar-buddy' ),
				'href'   => admin_url( 'admin.php?page=theme-settings&editor_tab=import-export' ),
				'meta'   => array( 'target' => '', 'title' => __( 'Import &amp; Export', 'toolbar-buddy' ) )
			);
			$menu_items['buildersettings-start'] = array(
				'parent' => $buildersettings,
				'title'  => __( 'Builder: Getting Started', 'toolbar-buddy' ),
				'href'   => admin_url( 'admin.php?page=ithemes-builder-theme' ),
				'meta'   => array( 'target' => '', 'title' => __( 'Builder: Getting Started', 'toolbar-buddy' ) )
			);


			/** Builder Layouts section */
			$menu_items['builderlayouts'] = array(
				'parent' => $ithemesgroup,
				'title'  => _x( 'Layout Editor', 'Translators: Builder Layouts', 'toolbar-buddy' ),
				'href'   => admin_url( 'admin.php?page=layout-editor' ),
				'meta'   => array( 'target' => '', 'title' => _x( 'Layout Editor', 'Translators: Builder Layouts', 'toolbar-buddy' ) )
			);
			$menu_items['builderlayouts-views'] = array(
				'parent' => $builderlayouts,
				'title'  => __( 'Views', 'toolbar-buddy' ),
				'href'   => admin_url( 'admin.php?page=layout-editor&editor_tab=views' ),
				'meta'   => array( 'target' => '', 'title' => __( 'Views', 'toolbar-buddy' ) )
			);

		}  // end-if Builder settings & layouts

		/** Builder Manage Content section */
		if ( TBB_BUILDER_MANAGE_CONTENT_DISPLAY && current_user_can( 'edit_posts' ) ) {
		$menu_items['buildercontent'] = array(
			'parent' => $ithemesgroup,
			'title'  => __( 'Manage Content', 'toolbar-buddy' ),
			'href'   => admin_url( 'widgets.php' ),
			'meta'   => array( 'target' => '', 'title' => __( 'Manage Content', 'toolbar-buddy' ) )
		);

				/** Builder Blocks hook in - see below for plugins */
				$wp_admin_bar->add_group( array(
					'parent' => $buildercontent,
					'id'     => $builderblocksgroup,
				) );

			/** Regular WordPress Widgets admin */
			if ( current_user_can( 'edit_theme_options' ) ) {
				$menu_items['buildercontent-widgets'] = array(
					'parent' => $buildercontent,
					'title'  => __( 'Builder Widgets', 'toolbar-buddy' ),
					'href'   => admin_url( 'widgets.php' ),
					'meta'   => array( 'target' => '', 'title' => __( 'Builder Widgets', 'toolbar-buddy' ) )
				);
			}  // end-if cap check

			$menu_items['builderwidgets-views'] = array(
				'parent' => $buildercontent,
				'title'  => __( 'All Widget Content', 'toolbar-buddy' ),
				'href'   => admin_url( 'edit.php?post_type=widget_content' ),
				'meta'   => array( 'target' => '', 'title' => __( 'All Widget Content', 'toolbar-buddy' ) )
			);
			$menu_items['builderwidgets-add'] = array(
				'parent' => $buildercontent,
				'title'  => __( 'Add new Widget Content', 'toolbar-buddy' ),
				'href'   => admin_url( 'post-new.php?post_type=widget_content' ),
				'meta'   => array( 'target' => '', 'title' => __( 'Add new Widget Content', 'toolbar-buddy' ) )
			);

		}  // end-if Builder manage content


		/** Builder Support & Docs section */
		$menu_items['irsbuildergroup'] = array(
			'parent' => $iresourcegroup,
			'title'  => __( 'Builder Support &amp; Docs', 'toolbar-buddy' ),
			'href'   => false,
			'meta'   => array( 'title' => _x( 'Builder Support &amp; Docs', 'Translators: For the tooltip', 'toolbar-buddy' ) )
		);

			/** Builder Support section */
			$menu_items['buildersupport'] = array(
				'parent' => $irsbuildergroup,
				'title'  => __( 'Builder Support', 'toolbar-buddy' ),
				'href'   => 'http://ithemes.com/forum/forum/4-ithemes-theme-support/',
				'meta'   => array( 'title' => __( 'Builder Support', 'toolbar-buddy' ) )
			);
			$menu_items['buildersupport-builder'] = array(
				'parent' => $buildersupport,
				'title'  => __( 'Builder Forum', 'toolbar-buddy' ),
				'href'   => 'http://ithemes.com/forum/forum/74-backupbuddy/',
				'meta'   => array( 'title' => __( 'Builder Forum', 'toolbar-buddy' ) )
			);
			$menu_items['buildersupport-plugins'] = array(
				'parent' => $buildersupport,
				'title'  => __( 'Builder Plugins Forum', 'toolbar-buddy' ),
				'href'   => 'http://ithemes.com/forum/forum/129-builder-plugins/',
				'meta'   => array( 'title' => __( 'Builder Plugins Forum', 'toolbar-buddy' ) )
			);
			$menu_items['buildersupport-blocks'] = array(
				'parent' => $buildersupport,
				'title'  => __( 'Builder Blocks Forum', 'toolbar-buddy' ),
				'href'   => 'http://ithemes.com/forum/forum/130-builder-blocks/',
				'meta'   => array( 'title' => __( 'Builder Blocks Forum', 'toolbar-buddy' ) )
			);

			/** Builder Codex section */
			$menu_items['builderdocs'] = array(
				'parent' => $irsbuildergroup,
				'title'  => __( 'Builder Codex', 'toolbar-buddy' ),
				'href'   => 'http://ithemes.com/codex/page/Builder',
				'meta'   => array( 'title' => _x( 'Builder Codex &amp; Documentation', 'Translators: For the tooltip', 'toolbar-buddy' ) )
			);
			$menu_items['builderdocs-b30'] = array(
				'parent' => $builderdocs,
				'title'  => __( 'Builder 3.0 Introduction', 'toolbar-buddy' ),
				'href'   => 'http://ithemes.com/codex/page/Builder_3.0',
				'meta'   => array( 'title' => _x( 'Builder 3.0 Introduction', 'Translators: For the tooltip', 'toolbar-buddy' ) )
			);
			$menu_items['builderdocs-documentation'] = array(
				'parent' => $builderdocs,
				'title'  => __( 'Builder Documentation', 'toolbar-buddy' ),
				'href'   => 'http://ithemes.com/codex/page/Builder_Documentation',
				'meta'   => array( 'title' => _x( 'Builder Documentation', 'Translators: For the tooltip', 'toolbar-buddy' ) )
			);
			$menu_items['builderdocs-childthemes'] = array(
				'parent' => $builderdocs,
				'title'  => __( 'Builder Child Themes', 'toolbar-buddy' ),
				'href'   => 'http://ithemes.com/codex/page/Builder_Child_Themes',
				'meta'   => array( 'title' => _x( 'Builder Child Themes', 'Translators: For the tooltip', 'toolbar-buddy' ) )
			);
			$menu_items['builderdocs-videos'] = array(
				'parent' => $builderdocs,
				'title'  => __( 'Video Tutorials', 'toolbar-buddy' ),
				'href'   => esc_url( TBB_VTUTORIALS_BUILDER ),
				'meta'   => array( 'title' => _x( 'Builder Video Tutorials (YouTube Search)', 'Translators: For the tooltip', 'toolbar-buddy' ) )
			);

	/** End of Builder links */

}  // end-if theme_support "builder-my-theme-menu"


/**
 * Additional Builder-specific plugins hook in
 *
 * @since 1.0.0
 */

	/**
	 * Builder Style Manager
	 *
	 * @since 1.0.0
	 */
	if ( ( ( function_exists( 'is_plugin_active' ) && is_plugin_active( 'builder-style-manager/init.php' ) ) || function_exists( 'it_builder_style_manager_init' ) ) && ( current_theme_supports( 'builder-my-theme-menu' ) && current_user_can( 'switch_themes' ) ) ) {
		$menu_items['builder-stylemanager'] = array(
			'parent' => $buildersettings,
			'title'  => __( 'Style Manager', 'toolbar-buddy' ),
			'href'   => admin_url( 'admin.php?page=builder-style-manager' ),
			'meta'   => array( 'target' => '', 'title' => __( 'Style Manager', 'toolbar-buddy' ) )
		);
	}  // end-if Builder Style Manager


	/**
	 * Builder SEO & Meta
	 *
	 * @since 1.0.0
	 */
	if ( ( ( function_exists( 'is_plugin_active' ) && is_plugin_active( 'builder-seo-plugin/init.php' ) ) || function_exists( 'it_builder_seo_plugin_init' ) ) && ( current_theme_supports( 'builder-my-theme-menu' ) && current_user_can( 'switch_themes' ) ) ) {
		$menu_items['builder-seometa'] = array(
			'parent' => $buildersettings,
			'title'  => __( 'SEO &amp; Meta', 'toolbar-buddy' ),
			'href'   => admin_url( 'admin.php?page=builder-seo' ),
			'meta'   => array( 'target' => '', 'title' => __( 'SEO &amp; Meta', 'toolbar-buddy' ) )
		);
	}  // end-if Builder SEO & Meta


	/**
	 * Builder Block - Events
	 *
	 * @since 1.2.0
	 */
	if ( ( ( function_exists( 'is_plugin_active' ) && is_plugin_active( 'builder-block-events/init.php' ) ) || class_exists( 'BB_Events' ) ) && ( current_theme_supports( 'builder-my-theme-menu' ) && current_user_can( 'edit_posts' ) ) ) {

		/** Post Type Events */
		$menu_items['bblockevents'] = array(
			'parent' => $builderblocksgroup,
			'title'  => __( 'All Events', 'toolbar-buddy' ),
			'href'   => admin_url( 'edit.php?post_type=it_bb_event' ),
			'meta'   => array( 'target' => '', 'title' => __( 'All Events', 'toolbar-buddy' ) )
		);
		$menu_items['bblockevents-add'] = array(
			'parent' => $bblockevents,
			'title'  => __( 'Add new Event', 'toolbar-buddy' ),
			'href'   => admin_url( 'post-new.php?post_type=it_bb_event' ),
			'meta'   => array( 'target' => '', 'title' => __( 'Add new Event', 'toolbar-buddy' ) )
		);
		$menu_items['bblockevents-start'] = array(
			'parent' => $bblockevents,
			'title'  => __( 'Start Here', 'toolbar-buddy' ),
			'href'   => admin_url( 'edit.php?post_type=it_bb_event&page=getting_started' ),
			'meta'   => array( 'target' => '', 'title' => _x( 'Start Here - User Guide', 'Translators: For the tooltip', 'toolbar-buddy' ) )
		);
		/** Events settings */
		if ( current_user_can( 'edit_themes' ) ) {
			$menu_items['bblockevents-settings'] = array(
				'parent' => $bblockevents,
				'title'  => __( 'Settings', 'toolbar-buddy' ),
				'href'   => admin_url( 'edit.php?post_type=it_bb_event&page=bb-events-editor' ),
				'meta'   => array( 'target' => '', 'title' => _x( 'Settings for Events', 'Translators: For the tooltip', 'toolbar-buddy' ) )
			);
		}  // end-if cap check

		/** Post Type Venues (locations) */
		$menu_items['bblockvenues'] = array(
			'parent' => $builderblocksgroup,
			'title'  => __( 'All Venues', 'toolbar-buddy' ),
			'href'   => admin_url( 'edit.php?post_type=it_bb_event_venue' ),
			'meta'   => array( 'target' => '', 'title' => _x( 'All Venues - Event Locations', 'Translators: For the tooltip', 'toolbar-buddy' ) )
		);
		$menu_items['bblockvenues-add'] = array(
			'parent' => $bblockvenues,
			'title'  => __( 'Add new Venue', 'toolbar-buddy' ),
			'href'   => admin_url( 'post-new.php?post_type=it_bb_event_venue' ),
			'meta'   => array( 'target' => '', 'title' => __( 'Add new Venue', 'toolbar-buddy' ) )
		);
		/** Venues settings */
		if ( current_user_can( 'edit_themes' ) ) {
			$menu_items['bblockvenues-positions'] = array(
				'parent' => $bblockvenues,
				'title'  => __( 'Settings', 'toolbar-buddy' ),
				'href'   => admin_url( 'edit.php?post_type=it_bb_event_venue&page=bb-events-venue-editor' ),
				'meta'   => array( 'target' => '', 'title' => _x( 'Settings for Venues', 'Translators: For the tooltip', 'toolbar-buddy' ) )
			);
		}  // end-if cap check

	}  // end-if Builder Block Events


	/**
	 * Builder Block - Church
	 *
	 * @since 1.0.0
	 */
	if ( ( ( function_exists( 'is_plugin_active' ) && is_plugin_active( 'builder-block-church/init.php' ) ) || function_exists( 'it_builder_block_church_init' ) ) && ( current_theme_supports( 'builder-my-theme-menu' ) && current_user_can( 'edit_posts' ) ) ) {

		/** Post Type Sermons */
		$menu_items['bblocksermons'] = array(
			'parent' => $builderblocksgroup,
			'title'  => __( 'Sermons', 'toolbar-buddy' ),
			'href'   => admin_url( 'edit.php?post_type=sermon' ),
			'meta'   => array( 'target' => '', 'title' => __( 'Sermons', 'toolbar-buddy' ) )
		);
		$menu_items['bblocksermons-add'] = array(
			'parent' => $bblocksermons,
			'title'  => __( 'Add new Sermon', 'toolbar-buddy' ),
			'href'   => admin_url( 'post-new.php?post_type=sermon' ),
			'meta'   => array( 'target' => '', 'title' => __( 'Add new Sermon', 'toolbar-buddy' ) )
		);
		$menu_items['bblocksermons-categories'] = array(
			'parent' => $bblocksermons,
			'title'  => __( 'Sermon Categories', 'toolbar-buddy' ),
			'href'   => admin_url( 'edit-tags.php?taxonomy=sermon_category&post_type=sermon' ),
			'meta'   => array( 'target' => '', 'title' => __( 'Sermon Categories', 'toolbar-buddy' ) )
		);
		$menu_items['bblocksermons-tags'] = array(
			'parent' => $bblocksermons,
			'title'  => __( 'Sermon Tags', 'toolbar-buddy' ),
			'href'   => admin_url( 'edit-tags.php?taxonomy=sermon_tag&post_type=sermon' ),
			'meta'   => array( 'target' => '', 'title' => __( 'Sermon Tags', 'toolbar-buddy' ) )
		);

		/** Post Type Staff */
		$menu_items['bblockstaff'] = array(
			'parent' => $builderblocksgroup,
			'title'  => __( 'Staff Members', 'toolbar-buddy' ),
			'href'   => admin_url( 'edit.php?post_type=staff' ),
			'meta'   => array( 'target' => '', 'title' => _x( 'Staff Members', 'Translators: For the tooltip', 'toolbar-buddy' ) )
		);
		$menu_items['bblockstaff-add'] = array(
			'parent' => $bblockstaff,
			'title'  => __( 'Add new Staff Member', 'toolbar-buddy' ),
			'href'   => admin_url( 'post-new.php?post_type=sermon' ),
			'meta'   => array( 'target' => '', 'title' => __( 'Add new Staff Member', 'toolbar-buddy' ) )
		);
		$menu_items['bblockstaff-positions'] = array(
			'parent' => $bblockstaff,
			'title'  => __( 'Staff Positions', 'toolbar-buddy' ),
			'href'   => admin_url( 'edit-tags.php?taxonomy=staff_positions&post_type=staff' ),
			'meta'   => array( 'target' => '', 'title' => __( 'Staff Positions', 'toolbar-buddy' ) )
		);

	}  // end-if Builder Block Church


	/**
	 * Builder Block - Restaurant
	 *
	 * @since 1.0.0
	 */
	if ( ( ( function_exists( 'is_plugin_active' ) && is_plugin_active( 'builder-block-restaurant/init.php' ) ) || function_exists( 'it_builder_block_restaurant_init' ) ) && ( current_theme_supports( 'builder-my-theme-menu' ) && current_user_can( 'edit_posts' ) ) ) {

		/** Post Type Restaurant Menu Items */
		$menu_items['bblockmenus'] = array(
			'parent' => $builderblocksgroup,
			'title'  => __( 'Menu Items', 'toolbar-buddy' ),
			'href'   => admin_url( 'edit.php?post_type=restaurant_menu_item' ),
			'meta'   => array( 'target' => '', 'title' => _x( 'Restaurant Menu Items', 'Translators: For the tooltip', 'toolbar-buddy' ) )
		);
		$menu_items['bblockmenus-add'] = array(
			'parent' => $bblockmenus,
			'title'  => __( 'Add new Menu Item', 'toolbar-buddy' ),
			'href'   => admin_url( 'post-new.php?post_type=restaurant_menu_item' ),
			'meta'   => array( 'target' => '', 'title' => __( 'Add new Menu Item', 'toolbar-buddy' ) )
		);
		$menu_items['bblockmenus-courses'] = array(
			'parent' => $bblockmenus,
			'title'  => __( 'Courses', 'toolbar-buddy' ),
			'href'   => admin_url( 'edit-tags.php?taxonomy=restaurant_course&post_type=restaurant_menu_item' ),
			'meta'   => array( 'target' => '', 'title' => __( 'Courses', 'toolbar-buddy' ) )
		);
		$menu_items['bblockmenus-allergies'] = array(
			'parent' => $bblockmenus,
			'title'  => __( 'Allergies', 'toolbar-buddy' ),
			'href'   => admin_url( 'edit-tags.php?taxonomy=restaurant_allergy&post_type=restaurant_menu_item' ),
			'meta'   => array( 'target' => '', 'title' => __( 'Allergies', 'toolbar-buddy' ) )
		);

		/** Post Type Restaurant Locations */
		$menu_items['bblocklocations'] = array(
			'parent' => $builderblocksgroup,
			'title'  => __( 'Locations', 'toolbar-buddy' ),
			'href'   => admin_url( 'edit.php?post_type=restaurant_location' ),
			'meta'   => array( 'target' => '', 'title' => _x( 'Restaurant Locations', 'Translators: For the tooltip', 'toolbar-buddy' ) )
		);
		$menu_items['bblocklocations-add'] = array(
			'parent' => $bblocklocations,
			'title'  => __( 'Add new Location', 'toolbar-buddy' ),
			'href'   => admin_url( 'post-new.php?post_type=restaurant_location' ),
			'meta'   => array( 'target' => '', 'title' => __( 'Add new Location', 'toolbar-buddy' ) )
		);
		$menu_items['bblocklocations-features'] = array(
			'parent' => $bblocklocations,
			'title'  => __( 'Features', 'toolbar-buddy' ),
			'href'   => admin_url( 'edit-tags.php?taxonomy=restaurant_feature&post_type=restaurant_location' ),
			'meta'   => array( 'target' => '', 'title' => _x( 'Restaurant Features', 'Translators: For the tooltip', 'toolbar-buddy' ) )
		);
		$menu_items['bblocklocations-cousines'] = array(
			'parent' => $bblocklocations,
			'title'  => __( 'Cuisines', 'toolbar-buddy' ),
			'href'   => admin_url( 'edit-tags.php?taxonomy=restaurant_cuisine&post_type=restaurant_location' ),
			'meta'   => array( 'target' => '', 'title' => _x( 'Restaurant Cuisines', 'Translators: For the tooltip', 'toolbar-buddy' ) )
		);

	}  // end-if Builder Block Restaurant

/** End of Builder-specific plugins */
