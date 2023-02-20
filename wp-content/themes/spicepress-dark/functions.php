<?php
// Global variables define
define('SPICEPRESS_DARK_PARENT_TEMPLATE_DIR_URI',get_template_directory_uri());
define('SPICEPRESS_DARK_TEMPLATE_DIR_URI',get_stylesheet_directory_uri());
define('SPICEPRESS_DARK_TEMPLATE_DIR',get_stylesheet_directory());

if ( ! function_exists( 'wp_body_open' ) ) {

    function wp_body_open() {
        /**
         * Triggered after the opening <body> tag.
         */
        do_action( 'wp_body_open' );
    }
}

add_action('wp_enqueue_scripts', 'spicepress_dark_theme_css', 999);
function spicepress_dark_theme_css() {
    wp_enqueue_style('spicepress-dark-parent-style', SPICEPRESS_DARK_PARENT_TEMPLATE_DIR_URI . '/style.css');
     if (get_theme_mod('custom_color_enable') == true) {
        spicepress_dark_custom_light();
    }
    else {
    wp_enqueue_style('spicepress-dark-default-style', SPICEPRESS_DARK_TEMPLATE_DIR_URI . '/css/default.css');
    }
    wp_enqueue_style('spicepress-dark-style', SPICEPRESS_DARK_TEMPLATE_DIR_URI . '/css/dark.css');
    wp_enqueue_style('spicepress-dark-media-responsive-css', SPICEPRESS_DARK_TEMPLATE_DIR_URI."/css/media-responsive.css" );
   
}

if ( ! function_exists( 'spicepress_dark_theme_setup' ) ) :

function spicepress_dark_theme_setup() {

//Load text domain for translation-ready
load_theme_textdomain('spicepress-dark', SPICEPRESS_DARK_TEMPLATE_DIR . '/languages');

if ( is_admin() ) {
	require SPICEPRESS_DARK_TEMPLATE_DIR . '/admin/admin-init.php';
}

// Add default posts and comments RSS feed links to head.

add_theme_support( 'automatic-feed-links' );

/* Let WordPress manage the document title. */

add_theme_support( 'title-tag' );

}
endif;
add_action( 'after_setup_theme', 'spicepress_dark_theme_setup' );

/**
 * Import options from SpicePress
 *
 */
function spicepress_dark_get_lite_options() {
	$spicepress_dark_mods = get_option( 'theme_mods_spicepress' );
	if ( ! empty( $spicepress_dark_mods ) ) {
		foreach ( $spicepress_dark_mods as $spicepress_dark_mod_k => $spicepress_dark_mod_v ) {
			set_theme_mod( $spicepress_dark_mod_k, $spicepress_dark_mod_v );
		}
	}
}
add_action( 'after_switch_theme', 'spicepress_dark_get_lite_options' );

function spicepress_dark_sanitize_checkbox( $checked ) {
    // Boolean check.
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

function spicepress_dark_sidebar_enable_customizer($wp_customize) {

 $wp_customize->add_setting(
            'apply_dark_sidebar_enable',array(
                'capability' => 'edit_theme_options',
                'default' => false,
                'sanitize_callback' => 'spicepress_dark_sanitize_checkbox',
    ));

    $wp_customize->add_control(
            'apply_dark_sidebar_enable',
            array(
                'type' => 'checkbox',
                'label' => esc_html__('Click here to apply these settings', 'spicepress-dark'),
                'section' => 'sidebar_widget_color_settings',
            )
    );
}
add_action('customize_register', 'spicepress_dark_sidebar_enable_customizer');

function spicepress_dark_custom_style(){?>    
    <style type="text/css">
    <?php if(get_theme_mod('apply_ftrsibar_link_hover_clr_enable',false)==true) : ?>
        body.dark .footer-sidebar .widget a, body.dark .footer-sidebar .widget_recent_entries .post-date, body .footer-sidebar .widget li a,body .footer-sidebar .widget.widget_block p a  {
            color: <?php echo esc_attr(get_theme_mod('footer_widget_link_color','#ffffff')); ?>;
        }
    body .widget_archive a:focus,body .widget_categories a:focus,body .widget_links a:focus,
    body .widget_meta a:focus,body .widget_nav_menu a:focus,body .widget_pages a:focus,
    body .widget_recent_comments a:focus,body .widget_recent_entries a:focus,body .footer-sidebar .widget.widget_block p a:hover,body .footer-sidebar .widget.widget_block p a:focus {
        color: <?php echo esc_attr(get_theme_mod('footer_widget_link_hover_color','#2d6ef8')); ?>!important;
    }   
    <?php endif;?>
    <?php if(get_theme_mod('apply_dark_sidebar_enable',false)==true) : ?>
        .dark .sidebar .widget li a,.dark .sidebar .wp-block-tag-cloud a,.dark .sidebar .tagcloud a,body .sidebar .widget.widget_block p a {
        color: <?php echo esc_attr(get_theme_mod('sidebar_widget_link_color','#999999')); ?>!important;
    	}

        body.dark .sidebar .section-header .widget-title, 
        body.dark .sidebar .wp-block-search .wp-block-search__label, 
        body.dark .sidebar .widget.widget_block h1, 
        body.dark .sidebar .widget.widget_block h2, 
        body.dark .sidebar .widget.widget_block h3, 
        body.dark .sidebar .widget.widget_block h4, 
        body.dark .sidebar .widget.widget_block h5, 
        body.dark .sidebar .widget.widget_block h6, 
        body.dark .sidebar .widget.widget_block .wc-block-product-search__label {
            color: <?php echo esc_attr(get_theme_mod('sidebar_widget_title_color','#ffffff')); ?>!important;
        }

        body .sidebar p, 
        .sidebar .wp-block-latest-posts__post-excerpt {
            color: <?php echo esc_attr(get_theme_mod('sidebar_widget_text_color','#64646d')); ?>!important;
        }

    <?php endif;?>
    <?php if(get_theme_mod('apply_sibar_link_hover_clr_enable',false)==true):?>
    	body.dark .sidebar .widget li a:hover,body.dark .sidebar .wp-block-tag-cloud a:hover,body.dark .sidebar .tagcloud a:hover,body .sidebar .widget.widget_block p a:hover,body .sidebar .widget.widget_block p a:focus {
        color: <?php echo esc_attr(get_theme_mod('sidebar_widget_link_hover_color','#D9534F')); ?>!important;
    	}
    <?php endif;?>
    <?php if(get_theme_mod('apply_menu_clr_enable',false)==true) : ?>
        .dark .navbar-custom .navbar-nav li > a {
        color: <?php echo esc_attr(get_theme_mod('menus_link_color','#061018')); ?>;
    }
    .dark .navbar-custom .navbar-nav li > a:hover {
        color: <?php echo esc_attr(get_theme_mod('menus_link_hover_color','#061018')); ?>;
    }
    .dark .navbar-custom .navbar-nav li.active > a {
        color: <?php echo esc_attr(get_theme_mod('menus_link_active_color','#061018')); ?>!important;
    }
    <?php endif;?>
    </style>
    <?php
}
add_action('wp_head','spicepress_dark_custom_style');

//Add custom color function
function spicepress_dark_custom_light() {
    $spicepress_dark_link_color = get_theme_mod('link_color','#ce1b28');
    list($r, $g, $b) = sscanf($spicepress_dark_link_color, "#%02x%02x%02x");
    $r = $r - 50;
    $g = $g - 25;
    $b = $b - 40;
    if ( $spicepress_dark_link_color != '#ff0000' ) :?>
    <style type="text/css">
    table a, table a:hover, table a:focus,.dark a:hover:not(.slide-btn-area-sm a, .page-breadcrumb > li a, .comment-detail .reply a), .dark a:focus:not(.slide-btn-area-sm a, .page-breadcrumb > li a, .comment-detail .reply a), dl dd a, dl dd a:hover, dl dd a:focus {
        color: <?php echo esc_attr($spicepress_dark_link_color); ?>;
    }
    .dark .sidebar .tagcloud a:hover,.dark .sidebar .wp-block-tag-cloud a:hover{
        background-color: <?php echo esc_attr($spicepress_dark_link_color); ?>;
    }
    .services5 .post-thumbnail i.fa {
        background:  <?php echo esc_attr($spicepress_dark_link_color); ?>;
    }
    .services5 .post:hover .post-thumbnail i.fa {
        color:  <?php echo esc_attr($spicepress_dark_link_color); ?>!important;
        }
    body .services5 .post:hover {
        background: <?php echo esc_attr($spicepress_dark_link_color); ?>;
    }
    form.search-form input.search-submit, input[type="submit"], .woocommerce-product-search input[type="submit"], button[type="submit"] {
        background-color:  <?php echo esc_attr($spicepress_dark_link_color); ?>;
    }
    #testimonial-carousel2 .testmonial-block {
        border-left: 4px solid  <?php echo esc_attr($spicepress_dark_link_color); ?>;
    }
    .page-title-section .overlay {
        background-color:  <?php echo esc_attr($spicepress_dark_link_color); ?>;;
    }
    .widget li:before {
        color:  <?php echo esc_attr($spicepress_dark_link_color); ?>;
    }
    /*.widget.widget_block p:not(.wp-block-tag-cloud) a, .footer-sidebar .widget.widget_block p:not(.wp-block-tag-cloud) a {
         color:  <?php echo esc_attr($spicepress_dark_link_color); ?>!important;
    }*/
    body.dark .sidebar li a:hover,body.dark .sidebar li a:focus {
        color: <?php echo esc_attr($spicepress_dark_link_color); ?>!important;
    }   
    body.dark .entry-meta a:hover,body.dark .entry-meta a:focus { color: <?php echo esc_attr($spicepress_dark_link_color); ?> }  
    .dark .blog-section .more-link:hover,.dark .blog-section .more-link:focus {
         color: <?php echo esc_attr($spicepress_dark_link_color); ?>!important;
    }   
    .site-title a:hover, .site-title:focus {
    color: <?php echo esc_attr($spicepress_dark_link_color); ?>;
    }
    .widget_archive a:hover, .widget_categories a:hover, .widget_links a:hover,
    .widget_meta a:hover, .widget_nav_menu a:hover, .widget_pages a:hover,
    .widget_recent_comments a:hover, .widget_recent_entries a:hover,
    .widget_archive a:focus, .widget_categories a:focus, .widget_links a:focus,
    .widget_meta a:focus, .widget_nav_menu a:focus, .widget_pages a:focus,
    .widget_recent_comments a:focus, .widget_recent_entries a:focus {
        color: <?php echo esc_attr($spicepress_dark_link_color); ?> !important;
    } 
    .dark .navbar-custom .navbar-nav > li > a:focus, 
    .dark .navbar-custom .navbar-nav > li > a:hover, 
    .dark .navbar-custom .navbar-nav .open > a, 
    .dark .navbar-custom .navbar-nav .open > a:focus, 
    .dark .navbar-custom .navbar-nav .open > a:hover {
        color: <?php echo esc_attr($spicepress_dark_link_color); ?>;
        background-color: transparent;
    }  
    .dark blockquote a:hover,.dark blockquote a:hover{
       color: <?php echo esc_attr($spicepress_dark_link_color); ?>;
    }
    .sidebar .widget.widget_block p a:hover,
    .sidebar .widget.widget_block p a:focus, 
    .footer-sidebar .widget.widget_block p a:hover,
    .footer-sidebar .widget.widget_block p a:focus {
        color: <?php echo esc_attr($spicepress_dark_link_color); ?> !important;
    }
    .blog-section .post.sticky .entry-header .entry-title > a:hover, .blog-section .post.sticky a:hover {
        color: <?php echo esc_attr($spicepress_dark_link_color); ?>;
    }
    </style>
<?php
endif;
}