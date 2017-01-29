<?php
function pt_taxonomies() {
    // Project Category
    $labels = array(
        'name'                => esc_html__( 'Project Category', 'pt' ),
        'singular_name'       => esc_html__( 'Project Category' ),
        'search_items'        => esc_html__( 'Search Project Categories' ),
        'all_items'           => esc_html__( 'All Project Categories' ),
        'parent_item'         => esc_html__( 'Parent Project Category' ),
        'parent_item_colon'   => esc_html__( 'Parent Project Category:' ),
        'edit_item'           => esc_html__( 'Edit Project Category' ),
        'update_item'         => esc_html__( 'Update Project Category' ),
        'add_new_item'        => esc_html__( 'Add New Project Category' ),
        'new_item_name'       => esc_html__( 'New Project Category' ),
        'menu_name'           => esc_html__( 'Project Category' )
    );

    $args = array(
        'hierarchical'        => true,
        'labels'              => $labels,
        'show_ui'             => true,
        'show_in_nav_menus'   => false,
        'show_admin_column'   => true,
        'query_var'           => true,
        'show_admin_column'   => true,
        'rewrite'             => array( 'slug' => 'project-category' )
    );

    register_taxonomy( 'project-category', array('projects'), $args );

}
add_action( 'init', 'pt_taxonomies', 0 );