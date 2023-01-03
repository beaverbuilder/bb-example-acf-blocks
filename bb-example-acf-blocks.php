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
 * Bail if ACF blocks aren't available.
 */
if ( ! function_exists( 'acf_register_block_type' ) ) {
	return false;
}

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
 * Load our example blocks and fields.
 */
add_action( 'acf/init', function() {
	$paths = glob( BB_EXAMPLE_ACF_BLOCKS_DIR . 'blocks/*' );

	foreach ( $paths as $path ) {

		// Load the block
		if ( file_exists( "$path/block.json" ) ) {
			register_block_type( "$path/block.json" );
		} else {
			continue;
		}

		// Load the fields
		if ( file_exists( "$path/fields.json" ) ) {
			$fields = json_decode( file_get_contents( "$path/fields.json" ), 1 );

			// Only load if no fields exist in the database with this key
			if ( empty( acf_get_fields( $fields[0]['key'] ) ) ) {
				acf_add_local_field_group( $fields[0] );
			}
		}
	}
} );
