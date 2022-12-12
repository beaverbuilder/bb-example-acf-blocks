<?php

/**
 * An ACF block for testing all field types.
 *
 * This block doesn't render anything. It's used for testing all ACF
 * field types to ensure they look and work correctly in Beaver Builder.
 */
acf_register_block_type( [
	'name'              => 'bb-testing-acf-block',
	'title'             => __( 'Testing ACF Block', 'bb-example-acf-blocks' ),
	'description'       => __( 'An ACF block for testing all field types.' ),
	'category'          => 'bb-example-acf-blocks',
	'icon'              => 'admin-settings',
	'render_template'   => BB_EXAMPLE_ACF_BLOCKS_DIR . 'blocks/testing/template.php',
] );
