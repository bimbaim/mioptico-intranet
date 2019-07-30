<?php

/**
 * Disply callback for the  page.
 */
 function users_management_page_callback() {
     ?>
<div class="wrap">
	<h1 class="wp-heading-inline">Users</h1>
	<a href="http://localhost/wordpress/wordpress/wp-admin/user-new.php" class="page-title-action">Add New</a>
	<hr class="wp-header-end">

<!-- Filter-->	
<ul class="subsubsub">
	<li class="all"><a href="users.php" class="current" aria-current="page">All <span class="count">(2)</span></a> |</li>
	<li class="administrator"><a href="users.php?role=administrator">Administrator <span class="count">(1)</span></a> |</li>
	<li class="author"><a href="users.php?role=author">Author <span class="count">(1)</span></a></li>
</ul>
	     
<!-- Table -->	     
<table class="widefat fixed" cellspacing="0">
    <thead>
    <tr>

            <th id="cb" class="manage-column column-cb check-column" scope="col">
				<input type="checkbox" value="" name="cb">
            </th> 
            <th id="name" class="manage-column column-name" scope="col">Name</th>
            <th id="email" class="manage-column column-email num" scope="col">Email</th>
            <th id="level" class="manage-column column-level num" scope="col">Level</th>

    </tr>
    </thead>

    <tfoot>
    <tr>

            <th class="manage-column column-cb check-column" scope="col"></th>
            <th class="manage-column column-name" scope="col">Name</th>
            <th class="manage-column column-email num" scope="col">Email</th>
            <th class="manage-column column-level num" scope="col">Level</th>

    </tr>
    </tfoot>

    <tbody>
		<?php 
		$args = array(
			'role__not_in' => 'Administrator'
		);

		// The Query
		$user_query = new WP_User_Query( $args );
		
		// User Loop
		if ( ! empty( $user_query->get_results() ) ) {
			foreach ( $user_query->get_results() as $user ) {
				//~ echo '<p>' . $user->display_name . '</p>';
				 echo '<tr class="alternate">';
					echo '<th class="check-column" scope="row"><input type="checkbox" value="'.$user->ID.'" name="cb[]"></th>';
					echo '<td class="column-name">' . $user->display_name . '</td>';
					echo '<td class="column-email">' . $user->user_email . '</td>';
					$user_levels = get_user_meta( $user->ID, USER_CATEGORY_META_KEY, true );
					foreach ($user_levels as $level){
						$term = get_term_by( 'id', $level, USER_CATEGORY_NAME );
						echo '<td class="column-level">'. $term->name .'</td>';
						}
					
				echo '</tr>';
			}
		} else {
			//~ echo 'No users found.';
			echo '<tr class="alternate">No users found.</tr>';
		}
		?>
       
<!--
        <tr>
            <th class="check-column" scope="row"></th>
            <td class="column-columnname"></td>
            <td class="column-columnname"></td>
        </tr>
        <tr class="alternate" valign="top"> 
            <th class="check-column" scope="row"></th>
            <td class="column-columnname">
                <div class="row-actions">
                    <span><a href="#">Action</a> |</span>
                    <span><a href="#">Action</a></span>
                </div>
            </td>
            <td class="column-columnname"></td>
        </tr>
        <tr valign="top">
            <th class="check-column" scope="row"></th>
            <td class="column-columnname">
                <div class="row-actions">
                    <span><a href="#">Action</a> |</span>
                    <span><a href="#">Action</a></span>
                </div>
            </td>
            <td class="column-columnname"></td>
        </tr>
-->
    </tbody>
</table>
<div>    
     <?php
 }
