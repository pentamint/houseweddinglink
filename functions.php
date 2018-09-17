
<?php
/**
 * @package OneSocial Child Theme
 * The parent theme functions are located at /onesocial/buddyboss-inc/theme-functions.php
 * Add your own functions in this file.
 */

/**
 * Sets up theme defaults
 *
 * @since OneSocial Child Theme 1.0.0
 */
function onesocial_child_theme_setup()
{
  /**
   * Makes child theme available for translation.
   * Translations can be added into the /languages/ directory.
   * Read more at: http://www.buddyboss.com/tutorials/language-translations/
   */

  // Translate text from the PARENT theme.
  load_theme_textdomain( 'onesocial', get_stylesheet_directory() . '/languages' );

  // Translate text from the CHILD theme only.
  // Change 'onesocial' instances in all child theme files to 'onesocial_child_theme'.
  // load_theme_textdomain( 'onesocial_child_theme', get_stylesheet_directory() . '/languages' );

}
add_action( 'after_setup_theme', 'onesocial_child_theme_setup' );

/**
 * Enqueues scripts and styles for child theme front-end.
 *
 * @since OneSocial Child Theme  1.0.0
 */
function onesocial_child_theme_scripts_styles()
{
  /**
   * Scripts and Styles loaded by the parent theme can be unloaded if needed
   * using wp_deregister_script or wp_deregister_style.
   *
   * See the WordPress Codex for more information about those functions:
   * http://codex.wordpress.org/Function_Reference/wp_deregister_script
   * http://codex.wordpress.org/Function_Reference/wp_deregister_style
   **/

  /*
   * Styles
   */
  wp_enqueue_style( 'onesocial-child-custom', get_stylesheet_directory_uri().'/css/custom.css' );
}
add_action( 'wp_enqueue_scripts', 'onesocial_child_theme_scripts_styles', 9999 );


/****************************** CUSTOM FUNCTIONS ******************************/

// Add your own custom functions here

// Remove Gravatar
add_filter('bp_core_fetch_avatar_no_grav', '__return_true');

/**
 * Add the product's short description (excerpt) to the WooCommerce shop/category pages. The description displays after the product's nam$
 *
 * Ref: https://gist.github.com/om4james/9883140
 *
 */
function woocommerce_after_shop_loop_item_title_short_description() {
        global $product;
        if ( ! $product->post->post_excerpt ) return;
        ?>
        <div itemprop="description">
                <?php echo apply_filters( 'woocommerce_short_description', $product->post->post_excerpt ) ?>
        </div>
        <?php
}
add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_after_shop_loop_item_title_short_description', 5);

/**
 * Use it like [my_orders order_counts=10] (order_counts is optional, if missing it lists all the orders).
 *
 * Ref: https://stackoverflow.com/questions/29980505/in-woocommerce-is-there-a-shortcode-page-to-view-all-orders
 *
 */
function shortcode_my_orders( $atts ) {
    extract( shortcode_atts( array(
        'order_count' => -1
    ), $atts ) );

    ob_start();
    wc_get_template( 'myaccount/my-orders.php', array(
        'current_user'  => get_user_by( 'id', get_current_user_id() ),
        'order_count'   => $order_count
    ) );
    return ob_get_clean();
}
add_shortcode('my_orders', 'shortcode_my_orders');

// Add floating menu widget
function pm_register_sidebar() {
	register_sidebar(array(
		'name' => 'Floating Menu',
		'id' => 'extra-menu-footer-widget',
		'before_widget' => '<div class="extra-menu-footer">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
}
add_action( 'widgets_init', 'pm_register_sidebar' );

function pm_footer_widget () {
	echo '<div class="footer-widget">';
	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('extra-menu-footer-widget') ) ;
	echo '</div>';
}
add_action('wp_footer', 'pm_footer_widget');

// Add single product foating menu widget
function pm_register_sidebar2() {
	register_sidebar(array(
		'name' => 'Product Floating Menu',
		'id' => 'product-floating-menu-widget',
		'before_widget' => '<div class="product-floating-menu-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
}
add_action( 'widgets_init', 'pm_register_sidebar2' );

function pm_footer_widget2 () {
	echo '<div class="footer-widget">';
	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('product-floating-menu-widget') ) ;
	echo '</div>';
}
add_action('wp_footer', 'pm_footer_widget2');

// Toggle social share button

//Register hook to load scripts
add_action('wp_enqueue_scripts', 'my_togglebtn_script');

//Load scripts (and/or styles)
function my_togglebtn_script () {

   if(is_page()){ //Check if we are viewing a page
	global $wp_query;

        //Check which template is assigned to current page we are looking at
        $template_name = get_post_meta( $wp_query->post->ID, '_wp_page_template', true );
	if($template_name == 'single-product.php'){
           //If page is using slider portfolio template then load our slider script
	   wp_enqueue_script('my_toggle_script', get_template_directory_uri() .'/js/togglebtn.js');
	}
   }
}

?>
