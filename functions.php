<?php

/**
 * Author: Wilmin José Sánchez | @mettawordfit
 * URL: 
 * Custom functions, support, custom post types and more.
 */

require_once 'modules/is-debug.php';

/*------------------------------------*\
    External Modules/Files
\*------------------------------------*/

// Cargue cualquier archivo externo que tenga aquí

/*------------------------------------*\
    Theme Support
\*------------------------------------*/

if (!isset($content_width)) {
    $content_width = 900;
}


function chemytours_setup() {

 // Agregar Thumbnail Theme Support.
 add_theme_support('post-thumbnails');

 add_image_size('square', 350, 350, true);
 add_image_size('gallery', 550, 450, true);
 add_image_size('portrait', 350, 724, true); 
 add_image_size('boxes', 120, 375, true);
 add_image_size('medium', 700, 400, true);
 add_image_size('logo', 300, 90, true);
 add_image_size('blog', 966, 644, true); 

 // Habilita los enlaces de feed RSS de publicaciones y comentarios a head.
 add_theme_support('automatic-feed-links');

 // Habilite la compatibilidad con HTML5.
 add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));

 // Soporte de localización.
 load_theme_textdomain('html5blank', get_template_directory() . '/languages');

} add_action('after_setup_theme', 'chemytours_setup');


/*------------------------------------*\
    Functions
\*------------------------------------*/

// Chemy tours Navegación
function chemytours_nav()
{
    wp_nav_menu(
        array(
            'theme_location'  => 'header-menu',
            'menu'            => '',
            'container'       => 'div',
            'container_class' => 'menu-{menu slug}-container',
            'container_id'    => '',
            'menu_class'      => 'menu',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul>%3$s</ul>',
            'depth'           => 0,
            'walker'          => '',
        )
    );
}

// Cargar secuencias de comandos chemytours (header.php)
function chemytours_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
        if (HTML5_DEBUG) {
            // jQuery
            wp_register_script('jquery', get_template_directory_uri() . '/js/lib/jquery.js', array(), '3.6.1');

            // Conditionizr
            wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0');

            // Modernizr
            wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr.js', array(), '2.8.3');

            // Bootstrap5
            wp_register_script('bootstrap5', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '5.2.0');

            // Lightbox
            wp_register_script('lightbox', get_template_directory_uri() . '/js/lightbox.min.js', array(), '2.0.0');

            // Carousel
            wp_register_script('carousel', get_template_directory_uri() . '/js/owl.carousel.js', array(), '2.3.4');

            // Animate on scroll
            wp_register_script('animate', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), '2.3.1');

            // Font-awesome
            wp_register_script('font-awesome', get_template_directory_uri() . '/js/font-awesome.min.js', array(), '1.0.0');



            // Custom scripts
            wp_register_script('scripts', get_template_directory_uri() . '/js/scripts.js',
                array('bootstrap5','font-awesome','lightbox','carousel','animate'),'1.0.0');

            // poner en cola Scripts
            wp_enqueue_script('jquery');
            wp_enqueue_script('scripts');

        } 
    }
}


// Cargar Chemy tours styles css
function chemytours_styles()
{
    if (HTML5_DEBUG) {
        // normalize-css
        wp_register_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '8.0.1');

        // Custom CSS
        wp_register_style('style', get_template_directory_uri() . '/style.css', array('normalize'), '1.0');

        // Bootstrap5
        wp_register_style('bootstrap5', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '5.2.0');

        // Lightbox
        wp_register_style('lightbox', get_template_directory_uri() . '/css/lightbox.min.css', array(), '2.0.0');

        // GoogleFonts
        wp_register_style('fonts','https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;600&family=Poppins:wght@100;200;300;400;500;600;700&family=Josefin+Sans:wght@100;200;300;400;500;600;700&display=swap' 
        , array(), '1.0.0');

         // Carousel
         wp_register_style('carousel', get_template_directory_uri() . '/css/carousel.css', array(), '1.0');

           // Animate on scroll
           wp_register_style('animate', 'https://unpkg.com/aos@2.3.1/dist/aos.css', array(), '1.0');

           // Font-awesome
         wp_register_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '1.0');
      

        // Register CSS
        wp_enqueue_style('normalize');
        wp_enqueue_style('font-awesome');
        wp_enqueue_style('bootstrap5');
        wp_enqueue_style('style');
        wp_enqueue_style('carousel');
        wp_enqueue_style('fonts');
        wp_enqueue_style('lightbox');
        wp_enqueue_style('animate');

    } else {

        // Custom CSS
        wp_register_style('chemytours_css', get_template_directory_uri() . '/style.css', array(), '1.0');
        // Register CSS
        wp_enqueue_style('chemytours_css');
    }
}

// Registrar chemytours Navegación
function register_chemytours_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu'  => esc_html('Header Menu', 'html5blank'), // Main Navigation
        'footer-menu'   => esc_html('Footer Menu', 'html5blank') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Elimine el <div> que rodea la navegación dinámica para limpiar el marcado
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Eliminar las clases inyectadas, los ID y los ID de página de los elementos de navegación <li>
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Eliminar valores de atributos rel no válidos en la lista de categorías
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes, true);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// Remove the width and height attributes from inserted images
function remove_width_attribute($html)
{
    $html = preg_replace('/(width|height)="\d*"\s/', "", $html);
    return $html;
}


// If Dynamic Sidebar Exists
if (function_exists('register_sidebar')) {
   
    register_sidebar(array(
        'name'          => esc_html('Footer-1'),
        'description'   => esc_html('Description for this widget-area...'),
        'id'            => 'widget-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html('Footer-2'),
        'description'   => esc_html('Description for this widget-area...'),
        'id'            => 'widget-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html('Footer-3'),
        'description'   => esc_html('Description for this widget-area...'),
        'id'            => 'widget-3',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));

    
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;

    if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
        remove_action('wp_head', array(
            $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
            'recent_comments_style'
        ));
    }
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base'    => str_replace($big, '%#%', get_pagenum_link($big)),
        'format'  => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total'   => $wp_query->max_num_pages,
    ));
}

// Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
function html5wp_index($length)
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo esc_html($output);
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . esc_html_e('View Article', 'html5blank') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions($html)
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', '', $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar($avatar_defaults)
{
    $myavatar                   = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = 'Custom Gravatar';
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() and comments_open() and (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ('div' == $args['style']) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo esc_html($tag) ?> <?php comment_class(empty($args['has_children']) ? '' : 'parent') ?> id="comment-<?php comment_ID(); ?>">
        <?php if ('div' != $args['style']) : ?>
            <div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
            <?php endif; ?>
            <div class="comment-author vcard">
                <?php if ($args['avatar_size'] != 0) echo get_avatar($comment, $args['avatar_size']); ?>
                <?php printf(esc_html('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
            </div>
            <?php if ($comment->comment_approved == '0') : ?>
                <em class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.') ?></em>
                <br />
            <?php endif; ?>

            <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)) ?>">
                    <?php
                    printf(esc_html('%1$s at %2$s'), get_comment_date(), get_comment_time()) ?></a><?php edit_comment_link(esc_html_e('(Edit)'), '  ', '');
                                                                                                ?>
            </div>

            <?php comment_text() ?>

            <div class="reply">
                <?php comment_reply_link(array_merge($args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
            </div>
            <?php if ('div' != $args['style']) : ?>
            </div>
        <?php endif; ?>
    <?php }

/*------------------------------------*\
    Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('wp_enqueue_scripts', 'chemytours_header_scripts'); // Add Custom Scripts to wp_head
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'chemytours_styles'); // Add Theme Stylesheet
add_action('init', 'register_chemytours_menu'); // Add HTML5 Blank Menu
add_action('init', 'create_post_type_chemytours'); // Add our HTML5 Blank Custom Post Type
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter( 'nav_menu_css_class', 'my_css_attributes_filter', 100, 1 ); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter( 'nav_menu_item_id', 'my_css_attributes_filter', 100, 1 ); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter( 'page_css_class', 'my_css_attributes_filter', 100, 1 ); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('post_thumbnail_html', 'remove_width_attribute', 10); // Remove width and height dynamic attributes to post images
add_filter('image_send_to_editor', 'remove_width_attribute', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
    Custom Post Types
\*------------------------------------*/

// Custom Post type
function create_post_type_chemytours()
{
    register_taxonomy_for_object_type('category', 'html5-blank'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'html5-blank');
    register_post_type(
        'villas', // Register Custom Post Type
        array(
            'labels'       => array(
                'name'               => esc_html('Villas', 'chemytours'), // Rename these to suit
                'singular_name'      => esc_html('Villas', 'chemytours'),
                'add_new'            => esc_html('Añadir nueva', 'chemytours'),
                'add_new_item'       => esc_html('Añadir nueva villa', 'chemytours'),
                'edit'               => esc_html('Edit', 'chemytours'),
                'edit_item'          => esc_html('Editar publicación', 'chemytours'),
                'new_item'           => esc_html('Nueva publicación', 'chemytours'),
                'view'               => esc_html('Ver', 'chemytours'),
                'view_item'          => esc_html('Ver', 'chemytours'),
                'search_items'       => esc_html('Buscar publicación', 'chemytours'),
                'not_found'          => esc_html('No se encontraron publicaciones', 'chemytours'),
                'not_found_in_trash' => esc_html('No se encontraron publicaciones en la Papelera', 'chemytours'),
            ),
            'menu_icon' => 'dashicons-store',
            'public'       => true,
            'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
            'has_archive'  => true,
            'supports'     => array(
                'title',
                'editor',
                'comments',
                'revisions',
                'excerpt',
                'thumbnail'
            ), // Go to Dashboard Custom HTML5 Blank post for supports
            'can_export'   => true, // Allows export in Tools > Export
            'menu_position' => 4, 
            'taxonomies'   => array(
                'post_tag',
                'category'
            ) // Add Category and Post Tags support
        )
    );


    register_post_type(
        'servicios', // Register Custom Post Type
        array(
            'labels'       => array(
                'name'               => esc_html('Servicios', 'chemytours'), // Rename these to suit
                'singular_name'      => esc_html('Servicios', 'chemytours'),
                'add_new'            => esc_html('Añadir nuevo', 'chemytours'),
                'add_new_item'       => esc_html('Añadir nuevo servicio', 'chemytours'),
                'edit'               => esc_html('Edit', 'chemytours'),
                'edit_item'          => esc_html('Editar publicación', 'chemytours'),
                'new_item'           => esc_html('Nueva publicación', 'chemytours'),
                'view'               => esc_html('Ver', 'chemytours'),
                'view_item'          => esc_html('Ver', 'chemytours'),
                'search_items'       => esc_html('Buscar publicación', 'chemytours'),
                'not_found'          => esc_html('No se encontraron publicaciones', 'chemytours'),
                'not_found_in_trash' => esc_html('No se encontraron publicaciones en la Papelera', 'chemytours'),
            ),
            'public'       => true,
            'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
            'has_archive'  => true,
            'supports'     => array(
                'title',
                'editor',
                'comments',
                'revisions',
                'excerpt',
                'thumbnail'
            ), // Go to Dashboard Custom HTML5 Blank post for supports
            'can_export'   => true, // Allows export in Tools > Export
            'menu_position' => 4 // Add Category and Post Tags support
        )
    );
}

/*------------------------------------*\
    ShortCode Functions
\*------------------------------------*/


