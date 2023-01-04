<?php 

    function create_taxonomy(){
        register_taxonomy('menu_tags', array('menu_item'), array(
            'labels' => array(
                'name' => 'Tags',
                'singular_name' => 'Tags',
                'search_items' => 'Search Tag',
                'all_items' => 'All Tags',
                'view_item ' => 'View Tag',
                'edit_item'  => 'Edit Tags',
                'update_item' => 'Update Tags',
                'add_new_item' => 'Add New Tag',
                'new_item_name' => 'New Tag Name',
                'menu_name' => 'Tags',
                'back_to_items'     => '← Back to Tags',
            ),
            'description' => 'Some short info words about the Menu Item. You can also use Tags for adding a special info to a Menu Item',
            'public' => true,
            'hierarchical' => false,
            'rewrite' => array('slug' => 'menu/tags'),
            'show_in_rest' => true,
        ));

        register_taxonomy('menu_categories', array('menu_item'), array(
            'labels' => array(
                'name' => 'Menu Categories',
                'singular_name' => 'Menu Categories',
                'search_items' => 'Search Menu Category',
                'all_items' => 'All Menu Categories',
                'view_item ' => 'View Menu Categories',
                'edit_item'  => 'Edit Menu Categories',
                'update_item' => 'Update Menu Categories',
                'add_new_item' => 'Add New Menu Category',
                'new_item_name' => 'New Menu Category Name',
                'menu_name' => 'Menu Categories',
                'back_to_items'     => '← Back to Menu Categories',
            ),
            'description' => 'Category of a Menu Item', 
            'public' => true,
            'hierarchical' => false,
            'show_in_rest' => true,
        ));
    }

    add_action('init', 'create_taxonomy');

    
    function my_post_types() {
        register_post_type('menu_item', array(
                'show_in_rest' => true,
                'supports' => array('title', 'thumbnail', 'editor', 'excerpt'),
                'public' => true,
                'exclude_from_search' => false,
                'menu_icon' => 'dashicons-food',
                'show_ui' => true,
                'labels' => array(
                    'name' => 'Menu Items',
                    'add_new_item' => 'Add Menu Item',
                    'edit_item' => 'Edit Menu Item',
                    'singular_name' => 'Menu Item',
                    'all_items' => 'All Menu Items',
                ),
                'taxonomies' => array('menu_tags', 'menu_categories'),
                'rewrite' => array('slug' => 'menu_item', 'with_front' => false) ,
            )
        );

        register_post_type('form_message', array(
            'show_in_rest' => true,
            'supports' => array('title', 'editor'),
            'public' => true,
            'publicly_queryable' => false,
            'menu_icon' => 'dashicons-email-alt',
            'rewrite' => array('slug' => 'form_messages'),
            'labels' => array(
                'name' => 'Form Messages',
                'add_new_item' => 'Add Form Message',
                'edit_item' => 'Edit Form Message',
                'singular_name' => 'Form Message',
                'all_items' => 'All Form Messages',
            ),
            'taxonomies' => array('menu_tags', 'menu_categories'),
            'rewrite' => array('slug' => 'menu_item', 'with_front' => false) ,
        )
    );
    }

    add_action('init', 'my_post_types');

    function taxonomies_for_menu_items(){
        register_taxonomy_for_object_type('menu_tags', 'menu_item');
        register_taxonomy_for_object_type('menu_categories', 'menu_item');
    
    add_action('init', 'taxonomies_for_menu_items');
    }

?>
