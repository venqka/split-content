<?php
/*
Plugin Name: Split content
Plugin URI: devnecks.com
Description: This plugin creates adds realted posts in the midle of posts content
Author: venqka
Author URI: devnecks.com
Version: 1.0
*/

function dn_split_content( $content ) {

	ob_start();

		if( function_exists( 'echo_crp' ) ) { 
			echo_crp(); 
		}

	$related_posts = ob_get_clean();
	
	if( is_single() ) {


		$parts = explode( '</p>', $content );

		$parts[1] .= $related_posts;

		ob_start();
			
			$output = '';

			foreach ( $parts as $part ) {
				$output .= $part;
			}

			echo $output;

		$content = ob_get_clean();	
	}	
	return $content;
}
add_filter( 'the_content', 'dn_split_content' );