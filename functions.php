<?php 

// Make theme available for translation
// Translations can be filed in the /languages/ directory
load_theme_textdomain( 'grieshaber', TEMPLATEPATH . '/languages' );
 
$locale = get_locale();
$locale_file = TEMPLATEPATH . "/languages/$locale.php";
if ( is_readable($locale_file) )
    require_once($locale_file);
 
 
// Get the page number
function get_page_number() {
    if ( get_query_var('paged') ) {
        print ' | ' . __( 'Page ' , 'grieshaber') . get_query_var('paged');
    }
} // end get_page_number

// Register widgetized areas
function theme_widgets_init() {
	  // Area 1
		register_sidebar( array (
        'name'          => 'LEFT',
        'id'            => 'left',
    ) );	
    // Area 2
		register_sidebar( array (
        'name'          => 'RIGHT',
        'id'            => 'right',
    ) );	

} // end theme_widgets_init
add_action( 'init', 'theme_widgets_init' );


/*****************************/
add_theme_support('menus');
function register_theme_menus(){
    register_nav_menus(
    array(
        'main_menu' => __( 'MAIN' ),
        'meta_menu' => __( 'META' )
        )
        );
}
add_action('init' ,'register_theme_menus');

/*****************************/

function remove_menus () {
    global $menu;
    // check if admin and hide these for admins
    if( (current_user_can('install_themes')) ) {
        $restricted = array();
    }
    // hide these for other roles
    else {
        $restricted = array(
            __('Dashboard'),
            __('Links'),
            __('SEO'),
	__('Duplicator'),
            __('Appearance'),
            __('Tools'),
            __('Users'),
            __('Settings'),
	__('Contact'),
            __('Comments'),
	__('Widgets'),
	 __('Profile'),
            __('Plugins')
        );
    }
    end ($menu);
    while (prev($menu)){
        $value = explode(' ',$menu[key($menu)][0]);
        if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
    }
}
add_action('admin_menu', 'remove_menus');

function is_post_type($type){
    global $wp_query;
    if($type == get_post_type($wp_query->post->ID)) return true;
    return false;
}
/*************Add postthumbs support******************************/

add_theme_support( 'post-thumbnails' ); 
set_post_thumbnail_size( 250, 250, array( 'center', 'center')  );

add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );
function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}


/***************Remove elements from inserted image****************************/
function the_post_thumbnail_remove_class($output) {
        $output = preg_replace('/class=".*?"/', '', $output);
        return $output;
}
add_filter('post_thumbnail_html', 'the_post_thumbnail_remove_class');



/*******/
function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}


/* Custom ajax loader */
add_filter('wpcf7_ajax_loader', 'my_wpcf7_ajax_loader');
function my_wpcf7_ajax_loader () {
	return  get_bloginfo('stylesheet_directory') . '/images/ajax-loader.gif';
}





/// REMOVE COMMENTS
add_action( 'admin_menu', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
// Removes from post and pages
add_action('init', 'remove_comment_support', 100);

function remove_comment_support() {
    remove_post_type_support( 'page', 'comments' );
}
// Removes from admin bar
function mytheme_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );







function remove_editor() {
  remove_post_type_support('page', 'editor');
  remove_post_type_support('post', 'editor');
  
}
add_action('admin_init', 'remove_editor');


add_filter('acf_the_content', 'eae_encode_emails');
add_filter('acf/load_value', 'eae_encode_emails');



/**/
function searchfilter($query) {

    if ($query->is_search && !is_admin() ) {
        $query->set('post_type',array('aktuell','page'));
    }

return $query;
}

add_filter('pre_get_posts','searchfilter');



// Custom Scripting to Move JavaScript from the Head to the Footer

function remove_head_scripts() {
remove_action('wp_head', 'wp_print_scripts');
remove_action('wp_head', 'wp_print_head_scripts', 9);
remove_action('wp_head', 'wp_enqueue_scripts', 1);

add_action('wp_footer', 'wp_print_scripts', 5);
add_action('wp_footer', 'wp_enqueue_scripts', 5);
add_action('wp_footer', 'wp_print_head_scripts', 5);
}
add_action( 'wp_enqueue_scripts', 'remove_head_scripts' );

// END Custom Scripting to Move JavaScript



/**
 * Disable the emoji's
 */
function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );    
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );  
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param    array  $plugins  
 * @return   array             Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}





// RENAME POST LABELS

function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Ansprechpartner';
    $submenu['edit.php'][5][0] = 'Ansprechpartner';
    $submenu['edit.php'][10][0] = 'Add Ansprechpartner';
    $submenu['edit.php'][16][0] = 'Ansprechpartner Tags';
    echo '';
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Ansprechpartner';
    $labels->singular_name = 'Ansprechpartner';
    $labels->add_new = 'Add Ansprechpartner';
    $labels->add_new_item = 'Add Ansprechpartner';
    $labels->edit_item = 'Edit Ansprechpartner';
    $labels->new_item = 'Ansprechpartner';
    $labels->view_item = 'View Ansprechpartner';
    $labels->search_items = 'Search Ansprechpartner';
    $labels->not_found = 'No find';
    $labels->not_found_in_trash = 'No Ansprechpartner';
    $labels->all_items = 'Alle Ansprechpartner';
    $labels->menu_name = 'Ansprechpartner';
    $labels->name_admin_bar = 'Ansprechpartner';
}
 
add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );




// OPTION PAGES 

if( function_exists('acf_add_options_page') ) {   
 
acf_add_options_page(array(
        'page_title'    => 'General Settings',
        'menu_title'    => 'Company Data',
        'menu_slug'     => 'general-settings',
        'position'     => '4'

    ));
}



function remove_extra_image_sizes() {
    foreach ( get_intermediate_image_sizes() as $size ) {
        if ( !in_array( $size, array( 'thumbnail', 'medium', 'medium_large','logo-size', 'large' ) ) ) {
            remove_image_size( $size );
        }
    }
}
 
add_action('init', 'remove_extra_image_sizes');
















?>