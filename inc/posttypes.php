<?php

// Projects
function pt_type_projects() {
  $labels = array(
    'name' =>  esc_html__('Projects', 'pt'),
    'singular_name' => esc_html__('Project', 'pt'),
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Project',
    'edit_item' => 'Edit Project',
    'new_item' => 'New Project',
    'all_items' => 'All Projects',
    'view_item' => 'View Project',
    'search_items' => 'Search Projects',
    'not_found' =>  'No Projects found',
    'not_found_in_trash' => 'No Projects found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'Projects'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true,
    'show_in_nav_menus' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'projects' ),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'menu_icon' => 'dashicons-clipboard',
    'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt')
  ); 

  register_post_type( 'projects', $args );
}
add_action( 'init', 'pt_type_projects' );
