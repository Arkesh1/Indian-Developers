<?php
if ( function_exists( 'rwmb_meta' ) ) {
	function cloux_taxonomy_meta_boxes( $meta_boxes ){
		$meta_boxes[] = array(
			'title' => esc_html__( 'Game Settings', 'cloux' ),
			'taxonomies' => 'esport-team',
			'fields' => array(
				array(
					'name' => esc_html__( 'Team Logo', 'cloux' ),
					'id' => 'team-logo',
					'type' => 'image_advanced',
					'max_file_uploads' => 1,
				),
			),
		);

		return $meta_boxes;
	}
	add_filter( 'rwmb_meta_boxes', 'cloux_taxonomy_meta_boxes' );
}