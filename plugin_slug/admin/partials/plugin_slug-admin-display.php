<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       author_uri
 * @since      1.0.0
 *
 * @package    Plugin_slug
 * @subpackage Plugin_slug/admin/partials
 */
		
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap">
    <h1><?php echo esc_html( get_admin_page_title() ); ?> <a class="page-title-action" href="http://127.0.0.1/wordpress/wp-admin/user-new.php">Add New</a></h1>
   
    <ul class="subsubsub">
		<li class="all"><a class="current" href="users.php">All <span class="count">(<?php echo $this->userCount['total_users']; ?>)</span></a> |</li>
		<li class="administrator"><a href="users.php?role=administrator">Administrator <span class="count">(<?php echo $this->userCount['avail_roles']['administrator']; ?>)</span></a> |</li>
		<li class="customer"><a href="users.php?role=customer">Customer <span class="count">(<?php echo $this->userCount['avail_roles']['customer']; ?>)</span></a></li>
	</ul>
	
	<div class="tablenav top">
		<div class="alignleft actions bulkactions">
			<label class="screen-reader-text" for="bulk-action-selector-top">Select bulk action</label><select id="bulk-action-selector-top" name="action">
				<option value="-1">Bulk Actions</option>
					<option value="delete">Delete</option>
				</select>

				<input type="submit" value="Apply" class="button action" id="doaction">
		</div>
		
		<div class="alignleft actions">
			<label for="new_role" class="screen-reader-text">Change role to…</label>
				<select id="new_role" name="new_role">
					<option value="">Change role to…</option>
					<?php wp_dropdown_roles( $selected ); ?>	
				</select>

				<input type="submit" value="Change" class="button" id="changeit" name="changeit">
		</div>

		<div class="tablenav-pages one-page"><span class="displaying-num">2 items</span>
			<span class="pagination-links"><span aria-hidden="true" class="tablenav-pages-navspan">«</span>
			<span aria-hidden="true" class="tablenav-pages-navspan">‹</span>
			<span class="paging-input"><label class="screen-reader-text" for="current-page-selector">Current Page</label><input type="text" aria-describedby="table-paging" size="1" value="1" name="paged" id="current-page-selector" class="current-page"><span class="tablenav-paging-text"> of <span class="total-pages">1</span></span></span>
			<span aria-hidden="true" class="tablenav-pages-navspan">›</span>
			<span aria-hidden="true" class="tablenav-pages-navspan">»</span></span>
		</div>
		<br class="clear">
	</div>
    
    <table class="wp-list-table widefat fixed striped users">
		<thead>
			<tr>
				<td class="manage-column column-cb check-column" id="cb">
					<label for="cb-select-all-1" class="screen-reader-text">Select All</label>
					<input type="checkbox" id="cb-select-all-1">
				</td>
				<th class="manage-column column-username column-primary sortable desc" id="username" scope="col">
					<a href="http://127.0.0.1/wordpress/wp-admin/users.php?orderby=login&amp;order=asc">
						<span>Username</span><span class="sorting-indicator"></span>
					</a>
				</th>
				<th class="manage-column column-name" id="name" scope="col">Name</th>
				<th class="manage-column column-email sortable desc" id="email" scope="col">
					<a href="http://127.0.0.1/wordpress/wp-admin/users.php?orderby=email&amp;order=asc"><span>Email</span><span class="sorting-indicator"></span></a>
				</th>
				<th class="manage-column column-role" id="role" scope="col">Role</th>
				<th class="manage-column column-posts num" id="posts" scope="col">Posts</th>	
			</tr>
		</thead>

		<tbody data-wp-lists="list:user" id="the-list">
		
		<?php foreach($this->users as $user){ ?>	
		<tr id="user-2">
			<th scope="row" class="check-column">
				<label class="screen-reader-text" for="user_2">Select <?php echo $user->user_login ?></label>
				<input type="checkbox" name="users[]" id="user_2" class="customer" value="2">
			</th>

			<td class="username column-username has-row-actions column-primary" data-colname="Username">
				<img width="32" height="32" alt="" src="http://0.gravatar.com/avatar/0eaae5f39d59619699eb896bf43572a6?s=32&amp;d=mm&amp;r=g" srcset="http://0.gravatar.com/avatar/0eaae5f39d59619699eb896bf43572a6?s=64&amp;d=mm&amp;r=g 2x" class="avatar avatar-32 photo"> 
				<strong><a href="#"><?php echo $user->user_login ?></a></strong><br>
				
				<div class="row-actions"><span class="edit">
				<a href="#">Edit</a> | </span><span class="delete"><a class="submitdelete" href="#">Delete</a></span>
				</div>

				<button type="button" class="toggle-row"><span class="screen-reader-text">Show more details</span></button>
			</td>

			<td class="name column-name" data-colname="Name"><?php echo $user->user_login ?></td>
			
			<td class="email column-email" data-colname="Email">
				<a href="mailto:<?php echo $user->user_email ?>"><?php echo $user->user_email ?></a>
			</td>

			<td class="role column-role" data-colname="Role">Customer</td>
			<td class="posts column-posts num" data-colname="Posts">0</td>

		</tr>
		<?php } ?>
		<tfoot>
		<tr>
			<td class="manage-column column-cb check-column"><label for="cb-select-all-2" class="screen-reader-text">Select All</label><input type="checkbox" id="cb-select-all-2"></td><th class="manage-column column-username column-primary sortable desc" scope="col"><a href="http://127.0.0.1/wordpress/wp-admin/users.php?orderby=login&amp;order=asc"><span>Username</span><span class="sorting-indicator"></span></a></th><th class="manage-column column-name" scope="col">Name</th><th class="manage-column column-email sortable desc" scope="col"><a href="http://127.0.0.1/wordpress/wp-admin/users.php?orderby=email&amp;order=asc"><span>Email</span><span class="sorting-indicator"></span></a></th><th class="manage-column column-role" scope="col">Role</th><th class="manage-column column-posts num" scope="col">Posts</th>	</tr>
		</tfoot>

	</table>
	<?php

    	echo '<pre>';
    	print_r($this->users);
    	echo '</pre>';
    	
    ?>
    
</div>