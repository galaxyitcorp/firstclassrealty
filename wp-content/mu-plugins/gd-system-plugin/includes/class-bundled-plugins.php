<?php

namespace WPaaS;

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

final class Bundled_Plugins {

	/**
	 * Class constructor.
	 */
	public function __construct() {

		global $wp_version;

		$bundled_plugins = [
			'limit-login-attempts-reloaded/limit-login-attempts-reloaded.php' => ! $this->is_plugin_active( 'sucuri-scanner/sucuri.php' ),
			'stock-photos/stock-photos.php' => true,
			'worker/init.php' => true,
		];

		/**
		 * Filter the list of bundled plugins.
		 *
		 * @since 2.0.0
		 *
		 * @var array
		 */
		$bundled_plugins = (array) apply_filters( 'wpaas_bundled_plugins', $bundled_plugins );

		/**
		 * Fires just before the bundled plugins are loaded.
		 *
		 * @since 3.12.0
		 *
		 * @param array $bundled_plugins
		 */
		do_action( 'wpaas_before_bundled_plugins_loaded', $bundled_plugins );

		foreach ( $bundled_plugins as $basename => $enabled ) {

			if ( $enabled ) {

				$this->maybe_load_plugin( $basename );

			}

		}

	}

	/**
	 * Maybe load a bundled plugin.
	 *
	 * @param  string $basename
	 *
	 * @return bool
	 */
	private function maybe_load_plugin( $basename ) {

		$path = Plugin::base_dir() . "plugins/{$basename}";

		if (
			$this->is_plugin_active( $basename )
			||
			$this->is_plugin_activating( $basename )
			||
			! is_readable( $path )
		) {

			return false;

		}

		Plugin::$data['bundled_plugins_loaded'][ $basename ] = dirname( $basename );

		add_filter( 'load_textdomain_mofile', [ $this, 'load_textdomain_mofile' ], 10, 2 );

		require_once $path;

		return true;

	}

	/**
	 * Check if a plugin is currently active.
	 *
	 * @param  string $basename
	 *
	 * @return bool
	 */
	private function is_plugin_active( $basename ) {

		if ( ! function_exists( 'is_plugin_active' ) ) {

			require_once ABSPATH . 'wp-admin/includes/plugin.php';

		}

		return is_plugin_active( $basename );

	}

	/**
	 * Check if a plugin is currently activating.
	 *
	 * @param  string $basename
	 *
	 * @return bool
	 */
	private function is_plugin_activating( $basename ) {

		return ( is_admin() && filter_input( INPUT_GET, 'plugin' ) === $basename && in_array( filter_input( INPUT_GET, 'action' ), [ 'error_scrape', 'activate' ], true ) );

	}

	/**
	 * Fix textdomain paths for bundled plugins.
	 *
	 * @filter load_textdomain_mofile
	 *
	 * @param  string $mofile
	 * @param  string $domain
	 *
	 * @return string
	 */
	public function load_textdomain_mofile( $mofile, $domain ) {

		if ( in_array( $domain, Plugin::bundled_plugins_loaded(), true ) && 'en_US' !== get_locale() ) {

			$path   = Plugin::base_dir() . sprintf( 'plugins/%1$s/languages/%1$s-%2$s.mo', $domain, get_locale() );
			$mofile = is_readable( $path ) ? $path : $mofile;

		}

		return $mofile;

	}

}
