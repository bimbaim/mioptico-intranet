<?php

/**
 * Custom Metabox
 **/

function kvdc_add_custom_box()
{
   
        add_meta_box(
            'assign_level',           // Unique ID
            'Level',  // Box title
            'kvdc_level_metabox_content',  // Content callback, must be of type callable
            'intranet',  // Post type
            'side'                 // Position
        );
       $screens = ['intranet', 'store'];
       foreach($screens as $screen){ 
       add_meta_box(
            'asign_user',           // Unique ID
            'User',  // Box title
            'kvdc_user_metabox_content',  // Content callback, must be of type callable
            $screen, // Post type
            'side'           //Position      
        );
        }
    
}
add_action('add_meta_boxes', 'kvdc_add_custom_box');

function kvdc_user_metabox_content($post)
{
    $value = get_post_meta($post->ID, 'user', true);
    $args = array(
    'show_option_all'         => null, // string
    'show_option_none'        => "SELECT USER", // string
    'hide_if_only_one_author' => null, // string
    'orderby'                 => 'display_name',
    'order'                   => 'ASC',
    'include'                 => null, // string
    'exclude'                 => null, // string
    'multi'                   => false,
    'show'                    => 'display_name',
    'echo'                    => true,
    'selected'                => $value,
    'include_selected'        => false,
    'name'                    => 'user_field', // string
    'id'                      => 'user_field', // integer
    'class'                   => 'postbox', // string 
    'blog_id'                 => $GLOBALS['blog_id'],
    'who'                     => null, // string,
    'role'                    => null, // string|array,
    'role__in'                => null, // array    
    'role__not_in'            => null, // array        
		); 
	
	wp_dropdown_users( $args );	    
}

function kvdc_level_metabox_content($post)
{
    $meta_values = get_post_meta($post->ID, 'level', true);

					$user_category_terms = get_terms( array(
						'taxonomy' => USER_CATEGORY_NAME,
						'hide_empty' => 0
					) );
					
					$select_options = array();
					
					foreach ( $user_category_terms as $term ) {
						$select_options[$term->term_id] = $term->name;
					}
					
					$meta_values = get_user_meta( $user->ID, USER_CATEGORY_META_KEY, true );
					
					echo kvdc_custom_form_select(
						USER_CATEGORY_META_KEY,
						$meta_values,
						$select_options,
						'',
						array( 'multiple' =>'multiple' )
					);
				
}


function wporg_save_postdata($post_id)
{
	if (array_key_exists('user_field', $_POST)) {
        update_post_meta(
            $post_id,
            'user',
            $_POST['user_field']
        );
    }
    if (array_key_exists('_level', $_POST)) {
        update_post_meta(
            $post_id,
            'level',
            $_POST['_level']
        );
    }

}
add_action('save_post', 'wporg_save_postdata');
