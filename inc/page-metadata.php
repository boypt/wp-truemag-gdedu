<?php

/**
 * Initialize the meta boxes. 
 */
add_action( 'admin_init', 'ct_page_meta_boxes' );

if ( ! function_exists( 'ct_page_meta_boxes' ) ){
	function ct_page_meta_boxes() {
	  $page_meta_box = array(
		'id'        => 'page_meta_box',
		'title'     => 'Page Settings',
		'desc'      => '',
		'pages'     => array( 'page' ),
		'context'   => 'normal',
		'priority'  => 'high',
		'fields'    => array(
			array(
			  'id'          => 'header_style',
			  'label'       => __('Header Stye','cactusthemes'),
			  'desc'        => __('Only use with Page template "Front Page"','cactusthemes'),
			  'std'         => '',
			  'type'        => 'select',
			  'class'       => '',
			  'choices'     => array(
			  	  array(
					'value'       => 0,
					'label'       => 'Default',
					'src'         => ''
				  ),
				  array(
					'value'       => 'carousel',
					'label'       => 'Big Carousel',
					'src'         => ''
				  ),
				  array(
					'value'       => 'classy',
					'label'       => 'Classy Slider',
					'src'         => ''
				  ),
				  array(
					'value'       => 'classy2',
					'label'       => 'Classy Slider 2',
					'src'         => ''
				  ),
				  array(
					'value'       => 'metro',
					'label'       => 'Metro Carousel',
					'src'         => ''
				  ),
				  array(
					'value'       => 'sidebar',
					'label'       => 'Sidebar',
					'src'         => ''
				  )
			   )
			)
		 )
	  );
	  ot_register_meta_box( $page_meta_box );

	}
}


