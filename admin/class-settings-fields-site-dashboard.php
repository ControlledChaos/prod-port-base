<?php
/**
 * Settings for the Dashboard tab on the Site Settings page.
 *
 * @package    Production_Portfolios
 * @subpackage Admin
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@productionportfolios.com>
 */

namespace CC_Plugin\Admin\Partials;

use CC_Plugin\Admin\Partials\Field_Callbacks\Dashboard_Callbacks as Callbacks;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Settings for the Dashboard tab.
 *
 * @since  1.0.0
 * @access public
 */
class Settings_Fields_Site_Dashboard {

	/**
	 * Holds the values to be used in the fields callbacks.
	 *
	 * @var array
	 */
	private $options;

	/**
	 * Get an instance of the class.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object Returns the instance.
	 */
	public static function instance() {

		// Varialbe for the instance to be used outside the class.
		static $instance = null;

		if ( is_null( $instance ) ) {

			// Set variable for new instance.
			$instance = new self;

			// Require the class files.
			$instance->dependencies();

		}

		// Return the instance.
		return $instance;

	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
    public function __construct() {

		// Register settings sections and fields.
		add_action( 'admin_init', [ $this, 'settings' ] );

	}

	/**
	 * Class dependency files.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function dependencies() {

		// Callbacks for the Dashboard tab.
		require PPP_PATH . 'admin/partials/field-callbacks/class-dashboard-callbacks.php';

	}

	/**
	 * Dashboard settings.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 *
	 * @link  https://codex.wordpress.org/Settings_API
	 */
	public function settings() {

		// Dashboard settings section.
		add_settings_section(
			'ppp-site-dashboard',
			__( 'Dashboard Settings', 'prod-port' ),
			[],
			'ppp-site-dashboard'
		);

		// Use the custom welcome panel.
		add_settings_field(
			'ppp_custom_welcome',
			__( 'Custom Welcome', 'prod-port' ),
			[ Callbacks::instance(), 'custom_welcome' ],
			'ppp-site-dashboard',
			'ppp-site-dashboard',
			[ esc_html__( 'Use the custom Welcome panel on the Dashboard', 'prod-port' ) ]
		);

		register_setting(
			'ppp-site-dashboard',
			'ppp_custom_welcome'
		);

		// Hide the try Gutenberg panel.
		add_settings_field(
			'ppp_hide_try_gutenberg',
			__( 'Hide Try Gutenberg', 'prod-port' ),
			[ Callbacks::instance(), 'hide_try_gutenberg' ],
			'ppp-site-dashboard',
			'ppp-site-dashboard',
			[ esc_html__( 'Hide the "Try Gutenberg" panel on the Dashboard', 'prod-port' ) ]
		);

		register_setting(
			'ppp-site-dashboard',
			'ppp_hide_try_gutenberg'
		);

		// Hide the welcome panel.
		add_settings_field(
			'ppp_hide_welcome',
			__( 'Hide Welcome', 'prod-port' ),
			[ Callbacks::instance(), 'hide_welcome' ],
			'ppp-site-dashboard',
			'ppp-site-dashboard',
			[ esc_html__( 'Hide the Welcome panel on the Dashboard', 'prod-port' ) ]
		);

		register_setting(
			'ppp-site-dashboard',
			'ppp_hide_welcome'
		);

		// Hide the welcome panel dismiss button.
		add_settings_field(
			'ppp_remove_welcome_dismiss',
			__( 'Remove Welcome Dismiss', 'prod-port' ),
			[ Callbacks::instance(), 'remove_welcome_dismiss' ],
			'ppp-site-dashboard',
			'ppp-site-dashboard',
			[ esc_html__( 'Remove the Welcome panel dismiss button', 'prod-port' ) ]
		);

		register_setting(
			'ppp-site-dashboard',
			'ppp_remove_welcome_dismiss'
		);

		// Hide WordPress News widget.
		add_settings_field(
			'ppp_hide_wp_news',
			__( 'Hide WordPress News', 'prod-port' ),
			[ Callbacks::instance(), 'hide_wp_news' ],
			'ppp-site-dashboard',
			'ppp-site-dashboard',
			[ esc_html__( 'Hide the WordPress News widget on the Dashboard', 'prod-port' ) ]
		);

		register_setting(
			'ppp-site-dashboard',
			'ppp_hide_wp_news'
		);

		// Hide Quick Draft (QuickPress) widget.
		add_settings_field(
			'ppp_hide_quickpress',
			__( 'Hide Quick Draft', 'prod-port' ),
			[ Callbacks::instance(), 'hide_quickpress' ],
			'ppp-site-dashboard',
			'ppp-site-dashboard',
			[ esc_html__( 'Hide the Quick Draft widget on the Dashboard', 'prod-port' ) ]
		);

		register_setting(
			'ppp-site-dashboard',
			'ppp_hide_quickpress'
		);

		// Hide At a Glance widget.
		add_settings_field(
			'ppp_hide_at_glance',
			__( 'Hide At a Glance', 'prod-port' ),
			[ Callbacks::instance(), 'hide_at_glance' ],
			'ppp-site-dashboard',
			'ppp-site-dashboard',
			[ esc_html__( 'Hide the At a Glance widget on the Dashboard', 'prod-port' ) ]
		);

		register_setting(
			'ppp-site-dashboard',
			'ppp_hide_at_glance'
		);

		// Hide Activity widget.
		add_settings_field(
			'ppp_hide_activity',
			__( 'Hide Activity', 'prod-port' ),
			[ Callbacks::instance(), 'hide_activity' ],
			'ppp-site-dashboard',
			'ppp-site-dashboard',
			[ esc_html__( 'Hide the Activity widget on the Dashboard', 'prod-port' ) ]
		);

		register_setting(
			'ppp-site-dashboard',
			'ppp_hide_activity'
		);

	}

}

/**
 * Put an instance of the class into a function.
 *
 * @since  1.0.0
 * @access public
 * @return object Returns an instance of the class.
 */
function ppp_settings_fields_site_dashboard() {

	return Settings_Fields_Site_Dashboard::instance();

}

// Run an instance of the class.
ppp_settings_fields_site_dashboard();