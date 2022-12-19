<?php

/**
 * A simple example of an ACF block that works in Beaver Builder.
 */
acf_register_block_type( [
	'name'              => 'bb-example-acf-block',
	'title'             => __( 'Example ACF Block', 'bb-example-acf-blocks' ),
	'description'       => __( 'An example ACF block that can be used in Beaver Builder.' ),
	'category'          => 'bb-example-acf-blocks',
	'icon'              => 'admin-appearance',
	'render_template'   => BB_EXAMPLE_ACF_BLOCKS_DIR . 'blocks/example/template.php',
	'enqueue_style'		=> BB_EXAMPLE_ACF_BLOCKS_URL . 'blocks/example/css/style.css',
	'enqueue_script'	=> BB_EXAMPLE_ACF_BLOCKS_URL . 'blocks/example/js/scripts.js',
] );
