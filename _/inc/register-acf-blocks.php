<?php

add_action('acf/init', 'sino_acf_init');
function sino_acf_init() {
	
	// Check function exists
	if( function_exists('acf_register_block') ) {
		
		// Register the Sino button block
		acf_register_block(array(
			'name'				=> 'sino-button',
			'title'				=> __('Sino button'),
			'description'		=> __('A custom button block for Sino.'),
			'render_callback'	=> 'sino_button_block_render_callback',
			'category'			=> 'design',
			'icon'				=> 'button',
			'keywords'			=> array( 'button', 'sino' ),
		));
	}
}

    function sino_button_block_render_callback( $block ) {
	
	    // convert name ("acf/testimonial") into path friendly slug ("testimonial")
	    $slug = str_replace('acf/', '', $block['name']);
	
	    // include a template part from within the "template-parts/block" folder
	    if( file_exists( get_theme_file_path("_/inc/blocks/content-{$slug}.php") ) ) {
		    include( get_theme_file_path("_/inc/blocks/content-{$slug}.php") );
        }
        
    }

?>