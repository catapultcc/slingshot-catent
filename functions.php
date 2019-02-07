<?php 
require_once('sections/class-tgm-plugin-activation.php');

/*====================================
	CSS EN JS INLADEN THEMA
====================================*/
function theme_styles() {
    wp_enqueue_script( 'jquery' );
	
	/* STIJL */
    wp_enqueue_style( 'boots-4-min-style', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css');
    wp_enqueue_style( 'animate-css-style', 'https://cdn.jsdelivr.net/npm/animate.css@3.7.0/animate.min.css');
    wp_enqueue_style( 'owlslider-style', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css');
    wp_enqueue_style( 'owlslider-style-default', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css');
	wp_enqueue_style( 'fontawesome-5-style', 'https://pro.fontawesome.com/releases/v5.4.1/css/all.css');
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/style.css?v=1.0.8');
      
	/* SCRIPTS */
	wp_enqueue_script( 'boots-4-script', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', '3.0.0', '' , true );
	wp_enqueue_script( 'typed-script', 'https://cdn.jsdelivr.net/npm/typed.js@2.0.9', '2.0.9', '' , true );
	wp_enqueue_script( 'wow', 'https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js', array('jquery'), '1.1.2' );
    wp_enqueue_script( 'jquery-ui', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js', '1.12.1', '' , true);
	wp_enqueue_script( 'owlslider-script', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', '2.3.4', '' , true );
	wp_enqueue_script( 'eigen-script', get_template_directory_uri() . '/js/scripts.js', '3.0.0', '' , true );
	
}
add_action( 'wp_enqueue_scripts', 'theme_styles' );


/*====================================
	THEMA OPTIES
====================================*/
function Ari_customize_register( $wp_customize ) {
  require_once('sections/themacustom.php');
}
add_action( 'customize_register', 'Ari_customize_register' );

/*====================================
	THEMA OPTIES ACF
====================================*/
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Thema opties',
		'menu_title'	=> 'Thema opties',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}


/*====================================
	SVG UPLOAD SUPPORT
====================================*/
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


/*====================================
	EXCERPT
====================================*/
function custom_excerpt_length( $length ) {
	return 60;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// [....] weghalen
function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


/*====================================
	weglaten wp_generator
====================================*/
remove_action('wp_head', 'wp_generator');
add_theme_support( 'post-thumbnails' ); 


/*====================================
	MENU AANMAKEN
====================================*/
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'second-header-menu' => __( 'Second header Menu' ),
      'footer-menu' => __( 'Footer Menu' ),
    )
  );
}
add_action( 'init', 'register_my_menus' );


/*====================================
	SIDEBARS
====================================*/
    if ( function_exists('register_sidebar') )
        register_sidebar(array('name'=>'Sidebar',
        'id' => 'blog',
        'description' => 'These widgets will appear in the left sidebar.',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
    if ( function_exists('register_sidebar') )
    	{ 
			register_sidebars(4, array('name'=>'Footer %d',
			     'before_widget' => '<div class="widget">',
				'after_widget' => '</div>',
				'before_title' => '<h5 class="tekst-paars mt-3 mb-3">',
				'after_title' => '</h5>'						   
			)); 	    	    
	    }
	    
	    
add_action( 'tgmpa_register', 'catapult_register_required_plugins' );
function catapult_register_required_plugins() {
$plugins = array(

        array(
            'name'               => 'Advanced custom fields pro',
            'slug'               => 'advanced-custom-fields-pro',
            'source'             => get_stylesheet_directory() . '/lib/plugins/advanced-custom-fields-pro.zip',
            'required'           => false,
            'external_url'       => '',
        ),
        array(
            'name'               => 'CC Dashboard',
            'slug'               => 'cc-dashboard',
            'source'             => get_stylesheet_directory() . '/lib/plugins/cc-dashboard.zip',
            'required'           => true,
            'external_url'       => '',
        ),
		array(
            'name'               => 'GitHub Updater',
            'slug'               => 'github-updater-develop',
            'source'             => get_stylesheet_directory() . '/lib/plugins/github-updater-develop.zip',
            'required'           => true,
            'external_url'       => '',
        ),
        array(
            'name'               => 'Wordfence Security',
            'slug'               => 'wordfence', 
            'source'             => 'https://downloads.wordpress.org/plugin/wordfence.6.2.3.zip',
            'required'           => false,
            'external_url'       => 'https://nl.wordpress.org/plugins/wordfence/',
        ),
	    array(
            'name'               => 'Yoast SEO',
            'slug'               => 'wordpress-seo', 
            'source'             => 'https://downloads.wordpress.org/plugin/wordpress-seo.5.0.2.zip',
            'required'           => false,
            'external_url'       => 'https://downloads.wordpress.org/plugin/wordpress-seo.5.0.2.zip',
        ),

    );

    $config = array(
        'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
        'page_title'                      => __( 'Installeer benodigde plugins', 'tgmpa' ),
        'menu_title'                      => __( 'Installeer plugins', 'tgmpa' ),
        'installing'                      => __( 'Plugin installeren: %s', 'tgmpa' ), // %s = plugin name.
        'oops'                            => __( 'Er ging iets mis met de plugin API.', 'tgmpa' ),
        'notice_can_install_required'     => _n_noop( 'Dit thema is de volgende plugins nodig: %1$s.', 'Dit thema is de volgende plugins nodig: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
        'notice_can_install_recommended'  => _n_noop( 'De volgende plugins zijn optineel: %1$s.', 'De volgende plugins zijn optineel: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
        'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'tgmpa' ), // %1$s = plugin name(s).
        'notice_can_activate_required'    => _n_noop( 'De volgende belangijke plugin staat uit: %1$s.', 'De volgende belangijke plugin staat uit: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
        'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 		'tgmpa' ), // %1$s = plugin name(s).
        'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'tgmpa' ), // %1$s = plugin name(s).
        'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
        'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'tgmpa' ), // %1$s = plugin name(s).
        'install_link'                    => _n_noop( 'Begin met installeren van de plugins', 'Begin met installeren van de plugins', 'tgmpa' ),
        'activate_link'                   => _n_noop( 'Activeer de plugins', 'Activeer de plugins', 'tgmpa' ),
        'return'                          => __( 'Keer terug naar de installer', 'tgmpa' ),
        'plugin_activated'                => __( 'Plugin met succes geactiveerd', 'tgmpa' ),
        'complete'                        => __( 'Alle plugins zijn geinstalleerd en geactiveerd %s', 'tgmpa' ), // %s = dashboard link.
        'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );
    tgmpa( $plugins, $config );

}

/*====================================
	CUSTOM POST TYPES
====================================*/


/*===========================
	Locaties 
=============================*/

function locaties() {

	$labels = array(
		'name'                => _x( 'Locaties', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Locaties', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Locaties', 'text_domain' ),
		'name_admin_bar'      => __( 'Locaties', 'text_domain' ),
		'parent_item_colon'   => __( 'Huidige item:', 'text_domain' ),
		'all_items'           => __( 'Alle items', 'text_domain' ),
		'add_new_item'        => __( 'Nieuw item', 'text_domain' ),
		'add_new'             => __( 'Nieuw item', 'text_domain' ),
		'new_item'            => __( 'Nieuw item', 'text_domain' ),
		'edit_item'           => __( 'Bewerk item', 'text_domain' ),
		'update_item'         => __( 'Update item', 'text_domain' ),
		'view_item'           => __( 'Bekijk item', 'text_domain' ),
		'search_items'        => __( 'item zoeken', 'text_domain' ),
		'not_found'           => __( 'item niet gevonden', 'text_domain' ),
		'not_found_in_trash'  => __( 'item niet gevonden in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'Locaties', 'text_domain' ),
		'description'         => __( 'Locaties', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', 'editor' ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 6,
		'menu_icon'           => 'dashicons-admin-appearance',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => false,
		'can_export'          => true,
		'has_archive'         => false,		
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'locaties', $args );

}
add_action( 'init', 'locaties', 0 );


/*===========================
	VACATURES 
=============================*/

function vacatures() {

	$labels = array(
		'name'                => _x( 'Vacatures', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Vacatures', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Vacatures', 'text_domain' ),
		'name_admin_bar'      => __( 'Vacatures', 'text_domain' ),
		'parent_item_colon'   => __( 'Huidige item:', 'text_domain' ),
		'all_items'           => __( 'Alle items', 'text_domain' ),
		'add_new_item'        => __( 'Nieuw item', 'text_domain' ),
		'add_new'             => __( 'Nieuw item', 'text_domain' ),
		'new_item'            => __( 'Nieuw item', 'text_domain' ),
		'edit_item'           => __( 'Bewerk item', 'text_domain' ),
		'update_item'         => __( 'Update item', 'text_domain' ),
		'view_item'           => __( 'Bekijk item', 'text_domain' ),
		'search_items'        => __( 'item zoeken', 'text_domain' ),
		'not_found'           => __( 'item niet gevonden', 'text_domain' ),
		'not_found_in_trash'  => __( 'item niet gevonden in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'Vacatures', 'text_domain' ),
		'description'         => __( 'Vacatures', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', 'editor' ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 6,
		'menu_icon'           => 'dashicons-id',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => false,
		'can_export'          => true,
		'has_archive'         => true,		
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'vacatures', $args );

}
add_action( 'init', 'vacatures', 0 );


/*===========================
	DOWNLOADS 
=============================*/

function downloads() {

	$labels = array(
		'name'                => _x( 'Downloads', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Downloads', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Downloads', 'text_domain' ),
		'name_admin_bar'      => __( 'Downloads', 'text_domain' ),
		'parent_item_colon'   => __( 'Huidige item:', 'text_domain' ),
		'all_items'           => __( 'Alle items', 'text_domain' ),
		'add_new_item'        => __( 'Nieuw item', 'text_domain' ),
		'add_new'             => __( 'Nieuw item', 'text_domain' ),
		'new_item'            => __( 'Nieuw item', 'text_domain' ),
		'edit_item'           => __( 'Bewerk item', 'text_domain' ),
		'update_item'         => __( 'Update item', 'text_domain' ),
		'view_item'           => __( 'Bekijk item', 'text_domain' ),
		'search_items'        => __( 'item zoeken', 'text_domain' ),
		'not_found'           => __( 'item niet gevonden', 'text_domain' ),
		'not_found_in_trash'  => __( 'item niet gevonden in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'Downloads', 'text_domain' ),
		'description'         => __( 'Downloads', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', 'editor' ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => true,
		'public'              => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 8,
		'menu_icon'           => 'dashicons-media-default',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,		
		'exclude_from_search' => false,
		'publicly_queryable'  => false,
		'capability_type'     => 'post',
	);
	register_post_type( 'downloads', $args );

}
add_action( 'init', 'downloads', 0 );



/*===========================
	VISIE 
=============================*/

function toekomstvisie () {

	$labels = array(
		'name'                => _x( 'Toekomstvisie ', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Toekomstvisie ', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Toekomstvisie ', 'text_domain' ),
		'name_admin_bar'      => __( 'Toekomstvisie ', 'text_domain' ),
		'parent_item_colon'   => __( 'Huidige item:', 'text_domain' ),
		'all_items'           => __( 'Alle items', 'text_domain' ),
		'add_new_item'        => __( 'Nieuw item', 'text_domain' ),
		'add_new'             => __( 'Nieuw item', 'text_domain' ),
		'new_item'            => __( 'Nieuw item', 'text_domain' ),
		'edit_item'           => __( 'Bewerk item', 'text_domain' ),
		'update_item'         => __( 'Update item', 'text_domain' ),
		'view_item'           => __( 'Bekijk item', 'text_domain' ),
		'search_items'        => __( 'item zoeken', 'text_domain' ),
		'not_found'           => __( 'item niet gevonden', 'text_domain' ),
		'not_found_in_trash'  => __( 'item niet gevonden in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'Toekomstvisie ', 'text_domain' ),
		'description'         => __( 'Toekomstvisie ', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', 'editor', 'page-attributes' ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 8,
		'menu_icon'           => 'dashicons-visibility',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive' 		  => false,		
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'toekomstvisie', $args );

}
add_action( 'init', 'toekomstvisie', 0 );