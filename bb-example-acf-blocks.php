<?php
/**
 * Plugin Name: Example ACF Blocks for Beaver Builder
 * Plugin URI: https://www.wpbeaverbuilder.com
 * Description: Example ACF Blocks that can be used in Beaver Builder.
 * Version: 0.1
 * Author: Beaver Builder
 * Author URI: https://www.wpbeaverbuilder.com
 * Copyright: (c) 2022 Beaver Builder
 * License: GNU General Public License v2.0
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: bb-example-acf-blocks
 * Requires at least: 6.0
 * Tested up to: 6.1
 * Requires PHP: 7.4
 */

define( 'BB_EXAMPLE_ACF_BLOCKS_VERSION', '0.1' );
define( 'BB_EXAMPLE_ACF_BLOCKS_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'BB_EXAMPLE_ACF_BLOCKS_URL', esc_url( trailingslashit( plugins_url( '/', __FILE__ ) ) ) );

/**
 * Add a custom block category for our example blocks.
 */
add_action( 'block_categories_all', function( $categories ) {
	return array_merge(
			$categories,
			[
				[
					'slug'  => 'bb-example-acf-blocks',
					'title' => __( 'Example ACF Blocks', 'bb-example-acf-blocks' ),
				],
			]
		);
}, 10, 2 );

/**
 * Load our example blocks.
 */
add_action( 'acf/init', function() {
	require_once BB_EXAMPLE_ACF_BLOCKS_DIR . 'blocks/example/block.php';
	require_once BB_EXAMPLE_ACF_BLOCKS_DIR . 'blocks/example/form.php';

	require_once BB_EXAMPLE_ACF_BLOCKS_DIR . 'blocks/testing/block.php';
	require_once BB_EXAMPLE_ACF_BLOCKS_DIR . 'blocks/testing/form.php';
} );
