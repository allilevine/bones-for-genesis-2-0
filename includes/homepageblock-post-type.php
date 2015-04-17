<?php
/* BFG Homepage Block Custom Post Type
*/

// let's create the function for the custom type
function add_homepage_blocks() { 
	// creating (registering) the custom type 
	register_post_type( 'homepage_block', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Homepage Blocks', 'bfg' ), /* This is the Title of the Group */
			'singular_name' => __( 'Homepage Block', 'bfg' ), /* This is the individual type */
			'all_items' => __( 'Homepage Blocks', 'bfg' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'bfg' ), /* The add new menu item */
			'add_new_item' => __( 'Add Homepage Block', 'bfg' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'bfg' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Homepage Block', 'bfg' ), /* Edit Display Title */
			'new_item' => __( 'New Homepage Block', 'bfg' ), /* New Display Title */
			'view_item' => __( 'View Homepage Block', 'bfg' ), /* View Display Title */
			'search_items' => __( 'Search Homepage Blocks', 'bfg' ), /* Search Custom Type Title */ 
			'not_found' =>  __( 'Nothing found in the Database.', 'bfg' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'Nothing found in Trash', 'bfg' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the homepage block post type.', 'bfg' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => 'dashicons-welcome-add-page', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'homepage_blocks', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'homepage_blocks', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'revisions', 'sticky', 'page-attributes' )
		) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your custom post type */
	register_taxonomy_for_object_type( 'category', 'custom_type' );
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type( 'post_tag', 'custom_type' );
	
}

	// adding the function to the Wordpress init
	add_action( 'init', 'add_homepage_blocks');
	
	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/
	
	// now let's add custom categories (these act like categories)
	register_taxonomy( 'custom_cat', 
		array('custom_type'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'labels' => array(
				'name' => __( 'Custom Categories', 'bfg' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Custom Category', 'bfg' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Custom Categories', 'bfg' ), /* search title for taxomony */
				'all_items' => __( 'All Custom Categories', 'bfg' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Custom Category', 'bfg' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Custom Category:', 'bfg' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Custom Category', 'bfg' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Custom Category', 'bfg' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Custom Category', 'bfg' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Custom Category Name', 'bfg' ) /* name title for taxonomy */
			),
			'show_admin_column' => true, 
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'custom-slug' ),
		)
	);
	
	// now let's add custom tags (these act like categories)
	register_taxonomy( 'custom_tag', 
		array('custom_type'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => false,    /* if this is false, it acts like tags */
			'labels' => array(
				'name' => __( 'Custom Tags', 'bfg' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Custom Tag', 'bfg' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Custom Tags', 'bfg' ), /* search title for taxomony */
				'all_items' => __( 'All Custom Tags', 'bfg' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Custom Tag', 'bfg' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Custom Tag:', 'bfg' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Custom Tag', 'bfg' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Custom Tag', 'bfg' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Custom Tag', 'bfg' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Custom Tag Name', 'bfg' ) /* name title for taxonomy */
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true,
		)
	);
	
	/*
		looking for custom meta boxes?
		check out this fantastic tool:
		https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
	*/
	

?>
