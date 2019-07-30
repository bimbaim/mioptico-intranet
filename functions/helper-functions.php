<?php

add_action('template_redirect', 'security_posts');
function security_posts(){
	$type = get_post_type();
	$user_id = get_current_user_id();
	$user_ownership = get_post_meta(get_the_ID(), 'user');
	if($type == 'intranet' && !current_user_can('administrator')){
		$page_levels = get_post_meta(get_the_ID(), 'level', true);
		$user_levels = get_user_meta( $user_id, USER_CATEGORY_META_KEY, true);
		
		
		$results = array_intersect ($page_levels, $user_levels);
		if(empty($results) || !in_array($user_id, $user_ownership)){
				wp_redirect( home_url() ); 
				exit;
				}
		}
		
	if($type == 'store' && !current_user_can('administrator')){
		if(!in_array($user_id, $user_ownership)){
			wp_redirect( home_url() ); 
				exit;
			}
		}
	}
