<?php
/**
 * Display links for active DisplayBuddy plugin.
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
 * Display DisplayBuddy settings links
 *
 * @since 1.0.0
 */

	/** Set default */
	$dpb_slides_check = 0;

	/** Slides-specific: Check for active DisplayBuddy modules */
	if ( class_exists( 'pb_slides' )
		&& (
			! class_exists( 'pluginbuddy_accordion' )
			&& ! class_exists( 'IT_Boom_Bar' )
			&& ! class_exists( 'iThemesBillboard' )
			&& ! class_exists( 'pluginbuddy_carousel' )
			&& ! class_exists( 'PluginBuddyCopiousComments' )
			&& ! class_exists( 'PluginBuddyFeaturedPosts' )
			&& ! class_exists( 'iThemesRotatingImages' )
			&& ! class_exists( 'rotatingtext' )
			&& ! class_exists( 'pluginbuddy_slideshow' )
			&& ! class_exists( 'pluginbuddy_tipsy' )
			&& ! class_exists( 'PluginBuddyVideoShowcase' )
		)
	) {

        	$dpb_get_started = admin_url( 'admin.php?page=pb_DisplayBuddy_series' );
		$dpb_slides_check = 'slides_only';

	} else {

        	$dpb_get_started = admin_url( 'admin.php?page=pluginbuddy-displaybuddy' );
		$dpb_slides_check = 'slides_together';

	}  // end-if slides module check

	/** BoomBar-specific: Check for active DisplayBuddy modules */
	if ( class_exists( 'IT_Boom_Bar' )
		&& (
			! class_exists( 'pluginbuddy_accordion' )
			&& ! class_exists( 'iThemesBillboard' )
			&& ! class_exists( 'pluginbuddy_carousel' )
			&& ! class_exists( 'PluginBuddyCopiousComments' )
			&& ! class_exists( 'PluginBuddyFeaturedPosts' )
			&& ! class_exists( 'iThemesRotatingImages' )
			&& ! class_exists( 'rotatingtext' )
			&& ! class_exists( 'pb_slides' )
			&& ! class_exists( 'pluginbuddy_slideshow' )
			&& ! class_exists( 'pluginbuddy_tipsy' )
			&& ! class_exists( 'PluginBuddyVideoShowcase' )
		)
	) {

		$dpb_get_started = false;

	}  // end-if boombar module check


	/** DisplayBuddy Start section */
	$menu_items['displaybuddystart'] = array(
		'parent' => $displaybgroup,
		'title'  => ( $dpb_get_started ) ? __( 'DisplayBuddy Start', 'toolbar-buddy' ) : __( 'DisplayBuddy', 'toolbar-buddy' ),
		'href'   => $dpb_get_started,
		'meta'   => array( 'target' => '', 'title' => ( $dpb_get_started ) ? __( 'DisplayBuddy Start', 'toolbar-buddy' ) : __( 'DisplayBuddy', 'toolbar-buddy' ) )
	);

	/** Module: Accordion */
	if ( class_exists( 'pluginbuddy_accordion' ) ) {

		/** Accordion Content */
		if ( current_user_can( 'edit_posts' ) ) {

			$menu_items['dpbaccordion'] = array(
				'parent' => $displaybuddystart,
				'title'  => __( 'Accordions', 'toolbar-buddy' ),
				'href'   => admin_url( 'edit.php?post_type=pb_accordion_items' ),
				'meta'   => array( 'target' => '', 'title' => _x( 'Accordions', 'Translators: For the tooltip', 'toolbar-buddy' ) )
			);
			$menu_items['dpbaccordion-add'] = array(
				'parent' => $dpbaccordion,
				'title'  => __( 'Add new Accordion', 'toolbar-buddy' ),
				'href'   => admin_url( 'post-new.php?post_type=pb_accordion_items' ),
				'meta'   => array( 'target' => '', 'title' => __( 'Add new Accordion', 'toolbar-buddy' ) )
			);

		}  // end-if accordion content

		/** Settings */
		if ( current_user_can( 'activate_plugins' ) ) {

			$menu_items['dpbaccordion-settings'] = array(
				'parent' => $dpbaccordion,
				'title'  => __( 'Accordion Settings', 'toolbar-buddy' ),
				'href'   => admin_url( 'admin.php?page=pluginbuddy_accordion-settings' ),
				'meta'   => array( 'target' => '', 'title' => __( 'Accordion Settings', 'toolbar-buddy' ) )
			);

		}  // end-if cap check

		/** Support */
		$menu_items['displaybuddysupport-accordion'] = array(
			'parent' => $displaybuddysupport,
			'title'  => __( 'Accordion Forum', 'toolbar-buddy' ),
			'href'   => 'http://ithemes.com/forum/forum/118-accordion/',
			'meta'   => array( 'title' => __( 'Accordion Forum', 'toolbar-buddy' ) )
		);

		/** Codex */
		$menu_items['displaybuddydocs-accordion'] = array(
			'parent' => $displaybuddydocs,
			'title'  => __( 'Accordion Documentation', 'toolbar-buddy' ),
			'href'   => 'http://ithemes.com/codex/page/Accordion',
			'meta'   => array( 'title' => __( 'Accordion Documentation', 'toolbar-buddy' ) )
		);

	}  // end-if Accordion


	/** Module: Billboard */
	if ( class_exists( 'iThemesBillboard' ) ) {

		/** Settings */
		if ( current_user_can( 'activate_plugins' ) ) {

			$menu_items['dpb-billboard'] = array(
				'parent' => $displaybuddystart,
				'title'  => __( 'Billboard', 'toolbar-buddy' ),
				'href'   => admin_url( 'admin.php?page=ithemes-billboard' ),
				'meta'   => array( 'target' => '', 'title' => __( 'Billboard', 'toolbar-buddy' ) )
			);

		}  // end-if cap check

		/** Support */
		$menu_items['displaybuddysupport-billboard'] = array(
			'parent' => $displaybuddysupport,
			'title'  => __( 'Billboard Forum', 'toolbar-buddy' ),
			'href'   => 'http://ithemes.com/forum/forum/24-billboard/',
			'meta'   => array( 'title' => __( 'Billboard Forum', 'toolbar-buddy' ) )
		);

		/** Codex */
		$menu_items['displaybuddydocs-billboard'] = array(
			'parent' => $displaybuddydocs,
			'title'  => __( 'Billboard Documentation', 'toolbar-buddy' ),
			'href'   => 'http://ithemes.com/codex/page/Billboard',
			'meta'   => array( 'title' => __( 'Billboard Documentation', 'toolbar-buddy' ) )
		);

	}  // end-if Billboard


	/** Module: iThemes Boom Bar */
	if ( class_exists( 'IT_Boom_Bar' ) ) {

		/** Settings */
		if ( current_user_can( 'edit_posts' ) ) {

			$menu_items['dpbboombar'] = array(
				'parent' => $displaybuddystart,
				'title'  => __( 'Boom Bars', 'toolbar-buddy' ),
				'href'   => admin_url( 'edit.php?post_type=it_boom_bar' ),
				'meta'   => array( 'target' => '', 'title' => __( 'Boom Bars', 'toolbar-buddy' ) )
			);

			$menu_items['dpbboombar-add'] = array(
				'parent' => $dpbboombar,
				'title'  => __( 'Add new Boom Bar', 'toolbar-buddy' ),
				'href'   => admin_url( 'post-new.php?post_type=it_boom_bar' ),
				'meta'   => array( 'target' => '', 'title' => __( 'Add new Boom Bar', 'toolbar-buddy' ) )
			);

		}  // end-if cap check

		/** Support */
		$menu_items['displaybuddysupport-boombar'] = array(
			'parent' => $displaybuddysupport,
			'title'  => __( 'BoomBar Forum', 'toolbar-buddy' ),
			'href'   => 'http://ithemes.com/forum/forum/203-boombar/',
			'meta'   => array( 'title' => __( 'BoomBar Forum', 'toolbar-buddy' ) )
		);

		/** Codex */
		// @TODO: Not yet available at iThemes Docu wiki...

	}  // end-if Boom Bar


	/** Module: Carousel */
	if ( class_exists( 'pluginbuddy_carousel' ) ) {

		/** Settings */
		if ( current_user_can( 'activate_plugins' ) ) {

			$menu_items['dpb-carousel'] = array(
				'parent' => $displaybuddystart,
				'title'  => __( 'Carousel', 'toolbar-buddy' ),
				'href'   => admin_url( 'admin.php?page=pluginbuddy_carousel-settings' ),
				'meta'   => array( 'target' => '', 'title' => __( 'Carousel', 'toolbar-buddy' ) )
			);

		}  // end-if cap check

		/** Support */
		$menu_items['displaybuddysupport-carousel'] = array(
			'parent' => $displaybuddysupport,
			'title'  => __( 'Carousel Forum', 'toolbar-buddy' ),
			'href'   => 'http://ithemes.com/forum/forum/111-carousel/',
			'meta'   => array( 'title' => __( 'Carousel Forum', 'toolbar-buddy' ) )
		);

		/** Codex */
		$menu_items['displaybuddydocs-carousel'] = array(
			'parent' => $displaybuddydocs,
			'title'  => __( 'Carousel Documentation', 'toolbar-buddy' ),
			'href'   => 'http://ithemes.com/codex/page/Carousel',
			'meta'   => array( 'title' => __( 'Carousel Documentation', 'toolbar-buddy' ) )
		);

	}  // end-if Carousel


	/** Module: CopiusComments */
	if ( class_exists( 'PluginBuddyCopiousComments' ) ) {

		/** Settings */
		if ( current_user_can( 'activate_plugins' ) ) {

			$menu_items['dpb-copiuscomments'] = array(
				'parent' => $displaybuddystart,
				'title'  => __( 'CopiusComments', 'toolbar-buddy' ),
				'href'   => admin_url( 'admin.php?page=pluginbuddy-copiouscomments-settings' ),
				'meta'   => array( 'target' => '', 'title' => __( 'CopiusComments', 'toolbar-buddy' ) )
			);

		}  // end-if cap check

		/** Support */
		$menu_items['displaybuddysupport-tipsy'] = array(
			'parent' => $displaybuddysupport,
			'title'  => __( 'CopiusComments Forum', 'toolbar-buddy' ),
			'href'   => 'http://ithemes.com/forum/forum/108-copiouscomments/',
			'meta'   => array( 'title' => __( 'CopiusComments Forum', 'toolbar-buddy' ) )
		);

		/** Codex */
		$menu_items['displaybuddydocs-tipsy'] = array(
			'parent' => $displaybuddydocs,
			'title'  => __( 'CopiusComments Documentation', 'toolbar-buddy' ),
			'href'   => 'http://ithemes.com/codex/page/CopiousComments',
			'meta'   => array( 'title' => __( 'CopiusComments Documentation', 'toolbar-buddy' ) )
		);

	}  // end-if CopiusComments


	/** Module: Featured Posts */
	if ( class_exists( 'PluginBuddyFeaturedPosts' ) ) {

		/** Settings */
		if ( current_user_can( 'activate_plugins' ) ) {

			$menu_items['dpb-featuredposts'] = array(
				'parent' => $displaybuddystart,
				'title'  => __( 'Featured Posts', 'toolbar-buddy' ),
				'href'   => admin_url( 'admin.php?page=pluginbuddy-featuredposts-settings' ),
				'meta'   => array( 'target' => '', 'title' => __( 'Featured Posts', 'toolbar-buddy' ) )
			);

		}  // end-if cap check

		/** Support */
		$menu_items['displaybuddysupport-featuredposts'] = array(
			'parent' => $displaybuddysupport,
			'title'  => __( 'Featured Posts Forum', 'toolbar-buddy' ),
			'href'   => 'http://ithemes.com/forum/forum/101-featured-posts/',
			'meta'   => array( 'title' => __( 'Featured Posts Forum', 'toolbar-buddy' ) )
		);

		/** Codex */
		$menu_items['displaybuddydocs-featuredposts'] = array(
			'parent' => $displaybuddydocs,
			'title'  => __( 'Featured Posts Documentation', 'toolbar-buddy' ),
			'href'   => 'http://ithemes.com/codex/page/FeaturedPosts',
			'meta'   => array( 'title' => __( 'Featured Posts Documentation', 'toolbar-buddy' ) )
		);

	}  // end-if Featured Posts


	/** Module: Rotating Images */
	if ( class_exists( 'iThemesRotatingImages' ) ) {

		/** Settings */
		if ( current_user_can( 'activate_plugins' ) ) {

			$menu_items['dpb-rotatingimages'] = array(
				'parent' => $displaybuddystart,
				'title'  => __( 'Rotating Images', 'toolbar-buddy' ),
				'href'   => admin_url( 'admin.php?page=ithemes-rotating-images' ),
				'meta'   => array( 'target' => '', 'title' => __( 'Rotating Images', 'toolbar-buddy' ) )
			);

		}  // end-if cap check

		/** Support */
		$menu_items['displaybuddysupport-rotatingimages'] = array(
			'parent' => $displaybuddysupport,
			'title'  => __( 'Rotating Images Forum', 'toolbar-buddy' ),
			'href'   => 'http://ithemes.com/forum/forum/70-rotating-images/',
			'meta'   => array( 'title' => __( 'Rotating Images Forum', 'toolbar-buddy' ) )
		);

		/** Codex */
		$menu_items['displaybuddydocs-rotatingimages'] = array(
			'parent' => $displaybuddydocs,
			'title'  => __( 'Rotating Images Documentation', 'toolbar-buddy' ),
			'href'   => 'http://ithemes.com/codex/page/Rotating_Images',
			'meta'   => array( 'title' => __( 'Rotating Images Documentation', 'toolbar-buddy' ) )
		);

	}  // end-if Rotating Images


	/** Module: Rotating Text */
	if ( class_exists( 'rotatingtext' ) ) {

		/** Settings */
		if ( current_user_can( 'activate_plugins' ) ) {

			$menu_items['dpb-rotatingtext'] = array(
				'parent' => $displaybuddystart,
				'title'  => __( 'Rotating Text', 'toolbar-buddy' ),
				'href'   => admin_url( 'admin.php?page=rotatingtext-settings' ),
				'meta'   => array( 'target' => '', 'title' => __( 'Rotating Text', 'toolbar-buddy' ) )
			);

		}  // end-if cap check

		/** Support */
		$menu_items['displaybuddysupport-rotatingtext'] = array(
			'parent' => $displaybuddysupport,
			'title'  => __( 'Rotating Text Forum', 'toolbar-buddy' ),
			'href'   => 'http://ithemes.com/forum/forum/102-rotating-text/',
			'meta'   => array( 'title' => __( 'Rotating Text Forum', 'toolbar-buddy' ) )
		);

		/** Codex */
		$menu_items['displaybuddydocs-rotatingtext'] = array(
			'parent' => $displaybuddydocs,
			'title'  => __( 'Rotating Text Documentation', 'toolbar-buddy' ),
			'href'   => 'http://ithemes.com/codex/page/RotatingText',
			'meta'   => array( 'title' => __( 'Rotating Text Documentation', 'toolbar-buddy' ) )
		);

	}  // end-if Rotating Text


	/** Module: Slides */
	if ( class_exists( 'pb_slides' ) ) {

		/** Settings */
		if ( ( $dpb_slides_check == 'slides_only' ) && current_user_can( 'activate_plugins' ) ) {

			$menu_items['dpb-slides'] = array(
				'parent' => $displaybuddystart,
				'title'  => __( 'Slides', 'toolbar-buddy' ),
				'href'   => admin_url( 'admin.php?page=pb_slides_settings' ),
				'meta'   => array( 'target' => '', 'title' => __( 'Slides', 'toolbar-buddy' ) )
			);

		} elseif ( $dpb_slides_check == 'slides_together' ) {

			$menu_items['dpb-slides-start'] = array(
				'parent' => $displaybuddystart,
				'title'  => __( 'Slides: Getting Started', 'toolbar-buddy' ),
				'href'   => admin_url( 'admin.php?page=pb_DisplayBuddy_series' ),
				'meta'   => array( 'target' => '', 'title' => __( 'Slides: Getting Started', 'toolbar-buddy' ) )
			);

			/** Settings */
			if ( current_user_can( 'activate_plugins' ) ) {

				$menu_items['dpb-slides-settings'] = array(
					'parent' => $displaybuddystart,
					'title'  => __( 'Slides: Settings', 'toolbar-buddy' ),
					'href'   => admin_url( 'admin.php?page=pb_slides_settings' ),
					'meta'   => array( 'target' => '', 'title' => __( 'Slides: Settings', 'toolbar-buddy' ) )
				);

			 }  // end-if cap check

		}  // end-if Slides check

		/** Support */
		$menu_items['displaybuddysupport-slides'] = array(
			'parent' => $displaybuddysupport,
			'title'  => __( 'Slides Forum', 'toolbar-buddy' ),
			'href'   => 'http://ithemes.com/forum/forum/170-slides/',
			'meta'   => array( 'title' => __( 'Slides Forum', 'toolbar-buddy' ) )
		);

		/** Codex */
		$menu_items['displaybuddydocs-slides'] = array(
			'parent' => $displaybuddydocs,
			'title'  => __( 'Slides Documentation', 'toolbar-buddy' ),
			'href'   => 'http://ithemes.com/codex/page/Slides',
			'meta'   => array( 'title' => __( 'Slides Documentation', 'toolbar-buddy' ) )
		);

	}  // end-if Slides


	/** Module: Slideshow */
	if ( class_exists( 'pluginbuddy_slideshow' ) ) {

		/** Settings */
		if ( current_user_can( 'activate_plugins' ) ) {

			$menu_items['dpb-slideshow'] = array(
				'parent' => $displaybuddystart,
				'title'  => __( 'Slideshow', 'toolbar-buddy' ),
				'href'   => admin_url( 'admin.php?page=pluginbuddy_slideshow-settings' ),
				'meta'   => array( 'target' => '', 'title' => __( 'Slideshow', 'toolbar-buddy' ) )
			);

		}  // end-if cap check

		/** Support */
		$menu_items['displaybuddysupport-slideshow'] = array(
			'parent' => $displaybuddysupport,
			'title'  => __( 'Slideshow Forum', 'toolbar-buddy' ),
			'href'   => 'http://ithemes.com/forum/forum/109-slideshow/',
			'meta'   => array( 'title' => __( 'Slideshow Forum', 'toolbar-buddy' ) )
		);

		/** Codex */
		$menu_items['displaybuddydocs-slideshow'] = array(
			'parent' => $displaybuddydocs,
			'title'  => __( 'Slideshow Documentation', 'toolbar-buddy' ),
			'href'   => 'http://ithemes.com/codex/page/Slideshow',
			'meta'   => array( 'title' => __( 'Slideshow Documentation', 'toolbar-buddy' ) )
		);

	}  // end-if Slideshow


	/** Module: Tipsy */
	if ( class_exists( 'pluginbuddy_tipsy' ) ) {

		/** Settings */
		if ( current_user_can( 'activate_plugins' ) ) {

			$menu_items['dpb-tipsy'] = array(
				'parent' => $displaybuddystart,
				'title'  => __( 'Tipsy', 'toolbar-buddy' ),
				'href'   => admin_url( 'admin.php?page=pluginbuddy_tipsy-settings' ),
				'meta'   => array( 'target' => '', 'title' => __( 'Tipsy', 'toolbar-buddy' ) )
			);

		}  // end-if cap check

		/** Support */
		$menu_items['displaybuddysupport-tipsy'] = array(
			'parent' => $displaybuddysupport,
			'title'  => __( 'Tipsy Forum', 'toolbar-buddy' ),
			'href'   => 'http://ithemes.com/forum/forum/122-tipsy/',
			'meta'   => array( 'title' => __( 'Tipsy Forum', 'toolbar-buddy' ) )
		);

		/** Codex */
		$menu_items['displaybuddydocs-tipsy'] = array(
			'parent' => $displaybuddydocs,
			'title'  => __( 'Tipsy Documentation', 'toolbar-buddy' ),
			'href'   => 'http://ithemes.com/codex/page/Tipsy',
			'meta'   => array( 'title' => __( 'Tipsy Documentation', 'toolbar-buddy' ) )
		);

	}  // end-if Tipsy


	/** Module: Video Showcase */
	if ( class_exists( 'PluginBuddyVideoShowcase' ) ) {

		/** Settings */
		if ( current_user_can( 'activate_plugins' ) ) {

			$menu_items['dpb-videoshowcase'] = array(
				'parent' => $displaybuddystart,
				'title'  => __( 'Video Showcase', 'toolbar-buddy' ),
				'href'   => admin_url( 'admin.php?page=pluginbuddy-videoshowcase-settings' ),
				'meta'   => array( 'target' => '', 'title' => __( 'Video Showcase', 'toolbar-buddy' ) )
			);

		}  // end-if cap check

		/** Support */
		$menu_items['displaybuddysupport-videoshowcase'] = array(
			'parent' => $displaybuddysupport,
			'title'  => __( 'Video Showcase Forum', 'toolbar-buddy' ),
			'href'   => 'http://ithemes.com/forum/forum/110-videoshowcase/',
			'meta'   => array( 'title' => __( 'Video Showcase Forum', 'toolbar-buddy' ) )
		);

		/** Codex */
		$menu_items['displaybuddydocs-videoshowcase'] = array(
			'parent' => $displaybuddydocs,
			'title'  => __( 'Video Showcase Documentation', 'toolbar-buddy' ),
			'href'   => 'http://ithemes.com/codex/page/VideoShowcase',
			'meta'   => array( 'title' => __( 'Video Showcase Documentation', 'toolbar-buddy' ) )
		);

	}  // end-if Video Showcase


	/** DisplayBuddy Support & Docs section */
	$menu_items['irsdisplaybgroup'] = array(
		'parent' => $iresourcegroup,
		'title'  => __( 'DisplayBuddy Support &amp; Docs', 'toolbar-buddy' ),
		'href'   => false,
		'meta'   => array( 'title' => _x( 'DisplayBuddy Support &amp; Docs', 'Translators: For the tooltip', 'toolbar-buddy' ) )
	);

		/** DisplayBuddy Support section */
		$menu_items['displaybuddysupport'] = array(
			'parent' => $irsdisplaybgroup,
			'title'  => __( 'DisplayBuddy Support', 'toolbar-buddy' ),
			'href'   => 'http://ithemes.com/forum/forum/100-displaybuddy-series/',
			'meta'   => array( 'title' => __( 'DisplayBuddy Support', 'toolbar-buddy' ) )
		);


		/** DisplayBuddy Codex section */
		$menu_items['displaybuddydocs'] = array(
			'parent' => $irsdisplaybgroup,
			'title'  => __( 'DisplayBuddy Codex', 'toolbar-buddy' ),
			'href'   => 'http://ithemes.com/codex/page/DisplayBuddy',
			'meta'   => array( 'title' => __( 'DisplayBuddy Codex', 'toolbar-buddy' ) )
		);
