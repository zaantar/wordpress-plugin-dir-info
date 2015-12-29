<?php
/*
 * Plugin Name: Plugin dir info
 * Description: Shows plugin directory name next to plugin version in Dashboard > Plugins
 * Author: Jan Štětina
 * Author URI: http://zaantar.eu
 * Version: 2015.12.29
 * Text Domain: plugin-dir-info
 * License: GPL2
 */

final class Plugin_Dir_Info {

	private static $instance;


	public static function initialize() {
		if ( null == self::$instance ) {
			self::$instance = new self();
		}
	}


	private function __construct() {
		add_filter( 'plugin_row_meta', array( $this, 'filter_plugin_row_meta' ), 2, 11 );
	}


	public function filter_plugin_row_meta( $plugin_meta, $plugin_file ) {

		$plugin_dir = basename( plugin_dir_path( $plugin_file ) );

		$plugin_meta[] = sprintf( __( 'Located in <code>%s</code>', 'plugin-dir-info' ), $plugin_dir );

		return $plugin_meta;
	}

}


Plugin_Dir_Info::initialize();
