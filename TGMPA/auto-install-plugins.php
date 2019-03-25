<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Klarity for publication on WordPress.org
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once __dir__ . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'klarity_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function klarity_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		array(
			'name'               => 'WP-SCSS', // The plugin name.
			'slug'               => 'wp-scss', // The plugin slug (typically the folder name).
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
		),
		array(
			'name'               => 'AddToAny Share Buttons',
			'slug'               => 'add-to-any',
			'required'           => false,
			'force_activation'   => false,
		),
		array(
			'name'               => 'Akismet Anti-Spam',
			'slug'               => 'akismet',
			'required'           => false,
			'force_activation'   => false,
		),
		array(
			'name'               => 'Breadcrumb NavXT',
			'slug'               => 'breadcrumb-navxt',
			'required'           => false,
			'force_activation'   => false,
		),
		array(
			'name'               => 'Coming Soon Page & Maintenance Mode by SeedProd',
			'slug'               => 'coming-soon',
			'required'           => false,
			'force_activation'   => false,
		),
		array(
			'name'               => 'Easy Forms for MailChimp',
			'slug'               => 'yikes-inc-easy-mailchimp-extender',
			'required'           => false,
			'force_activation'   => false,
		),
		array(
			'name'               => 'Klarity action block',
			'slug'               => 'klarity-action-block',
			'required'           => false,
			'force_activation'   => false,
		),
		array(
			'name'               => 'Klarity cases overview block',
			'slug'               => 'klarity-cases-overview-block',
			'required'           => false,
			'force_activation'   => false,
		),
		array(
			'name'               => 'Klarity latest posts block',
			'slug'               => 'klarity-latest-posts-block',
			'required'           => false,
			'force_activation'   => false,
		),
		array(
			'name'               => 'Klarity message action block',
			'slug'               => 'klarity-message-action-block',
			'required'           => false,
			'force_activation'   => false,
		),
		array(
			'name'               => 'Klarity progress bar block',
			'slug'               => 'klarity-progress-bar-block',
			'required'           => false,
			'force_activation'   => false,
		),
		array(
			'name'               => 'Klarity question answer block',
			'slug'               => 'klarity-question-answer-block',
			'required'           => false,
			'force_activation'   => false,
		),
		array(
			'name'               => 'Klarity read more block',
			'slug'               => 'klarity-read-more-block',
			'required'           => false,
			'force_activation'   => false,
		),
		array(
			'name'               => 'Klarity section block',
			'slug'               => 'klarity-section-block',
			'required'           => false,
			'force_activation'   => false,
		),
		array(
			'name'               => 'Klarity Vimeo wrapper block',
			'slug'               => 'klarity-vimeo-wrapper-block',
			'required'           => false,
			'force_activation'   => false,
		),
		array(
			'name'               => 'PNG to JPG',
			'slug'               => 'png-to-jpg',
			'required'           => false,
			'force_activation'   => false,
		),
		array(
			'name'               => 'Safe SVG',
			'slug'               => 'safe-svg',
			'required'           => false,
			'force_activation'   => false,
		),
		array(
			'name'               => 'Klarity remove comments ip',
			'slug'               => 'klarity-remove-comments-ip',
			'required'           => false,
			'force_activation'   => false,
		),
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'klarity',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => __DIR__.'/../../../plugins',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => false,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		/*
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'klarity' ),
			'menu_title'                      => __( 'Install Plugins', 'klarity' ),
			/* translators: %s: plugin name. * /
			'installing'                      => __( 'Installing Plugin: %s', 'klarity' ),
			/* translators: %s: plugin name. * /
			'updating'                        => __( 'Updating Plugin: %s', 'klarity' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'klarity' ),
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'klarity'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'klarity'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'klarity'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). * /
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'klarity'
			),
			'notice_can_activate_required'    => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'klarity'
			),get_template_directory()
			'notice_can_activate_recommended' => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'klarity'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'klarity'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'klarity'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'klarity'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'klarity' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'klarity' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'klarity' ),
			/* translators: 1: plugin name. * /
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'klarity' ),
			/* translators: 1: plugin name. * /
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'klarity' ),
			/* translators: 1: dashboard link. * /
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'klarity' ),
			'dismiss'                         => __( 'Dismiss this notice', 'klarity' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'klarity' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'klarity' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
		*/
	);

	tgmpa( $plugins, $config );
}
