<?php

//For front page
function kvdc_show_authors_in_categories() {
	$categories = get_terms(array(
		'taxonomy' => USER_CATEGORY_NAME,
		'hide_empty' => true
	));
	
	echo '<ul>';
	foreach( $categories as $category ) {
		echo '<li>';
		echo $category->name;
		echo " (#{$category->count})";
			$args = array( 
				'role' => 'Author', 
				'meta_key'	=> USER_CATEGORY_META_KEY,
				'meta_value'	=> '"' . $category->term_id . '"',
				'meta_compare'	=> 'LIKE'
			);

			$authors = new WP_User_Query( $args );

			echo '<ul>';
				foreach( $authors->results as $author ) {
					echo '<li>';
						echo $author->display_name;
					echo '</li>';
				}
			echo '</ul>';
		
		echo '</li>';
	}
	echo '</ul>';
}
