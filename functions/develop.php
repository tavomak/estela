<?php

//añadir capacidad de woocommerce a usuarios editores

function add_theme_caps() {
    // gets the author role
    $role = get_role( 'editor' );

    // This only works, because it accesses the class instance.
    // would allow the author to edit others' posts for current theme only
    //$role = get_role( 'editor' );
    $role->add_cap( 'edit_products' );
    $role->add_cap( 'manage_woocommerce' );
    $role->add_cap( 'view_woocommerce_reports' );
    $role->add_cap( 'manage_woocommerce_products' );
    $role->add_cap( 'edit_others_products' );
}
add_action( 'admin_init', 'add_theme_caps');

/* Disable WordPress Admin Bar for all users but admins. */
  show_admin_bar(false);


// CUSTOM ADMIN LOGIN HEADER LOGO

function my_custom_login_logo()
{
    echo '<style  type="text/css"> h1 a {  background-image:url(' . get_bloginfo('template_directory') . '/assets/img/dash-logo.png)  !important;} </style>';
}
add_action('login_head',  'my_custom_login_logo');

// CUSTOM ADMIN DASHBOARD HEADER LOGO

function custom_admin_logo()
{
    echo '<style type="text/css">#header-logo { background-image: url(' . get_bloginfo('template_directory') . '/assets/img/dash-logo.jpg) !important; }</style>';
}
add_action('admin_head', 'custom_admin_logo');

// Admin footer modification

function remove_footer_admin ()
{
    echo '<span id="footer-thankyou">Developed by <a href="http://www.estelaestudio.com" target="_blank">Estela estudio de diseño</a></span>';
}
add_filter('admin_footer_text', 'remove_footer_admin');

/*contacto modal
function add_last_nav_item($items) {
  return $items .= '<li><a type="button" data-toggle="modal" data-target="#say-hellow">Contact</a></li>';
}
add_filter('wp_nav_menu_items','add_last_nav_item');
//
//Gets post cat slug and looks for single-[cat slug].php and applies it
add_filter('single_template', 'check_for_category_single_template');
function check_for_category_single_template( $t )
{
  foreach( (array) get_the_category() as $cat )
  {
    if ( file_exists(TEMPLATEPATH . "/single-category-{$cat->slug}.php") ) return TEMPLATEPATH . "/single-category-{$cat->slug}.php";
    if($cat->parent)
    {
      $cat = get_the_category_by_ID( $cat->parent );
      if ( file_exists(TEMPLATEPATH . "/single-category-{$cat->slug}.php") ) return TEMPLATEPATH . "/single-category-{$cat->slug}.php";
    }
  }
  return $t;
}
function custom_excerpt_length( $length ) {
        return 10;
    }
    add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );*/
?>
