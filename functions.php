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
          if ( ! $product->post->post_excerpt  ) return;
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
function sns_button_script () {

  if( is_product() ) {
    wp_enqueue_script('sns_toggle_script', get_stylesheet_directory_uri().'/js/togglebtn.js', array('jquery'),filemtime(get_stylesheet_directory() . '/js/togglebtn.js' ));
  }
}
add_action( 'wp_enqueue_scripts', 'sns_button_script');

// Hide search button on right panel active
function search_btn_hide () {

    wp_enqueue_script('search_btn_script', get_stylesheet_directory_uri().'/js/searchbtnhide.js', array('jquery'),filemtime(get_stylesheet_directory() . '/js/searchbtnhide.js' ));
}
add_action( 'wp_enqueue_scripts', 'search_btn_hide');

// Add product-attr.php for venue category
add_action( 'woocommerce_single_product_summary', 'my_single_product_summary', 2 );
function my_single_product_summary(){
    global $product;

    if ( is_singular('product') && (has_term( 'venue', 'product_cat')) ) {
      remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
      add_action( 'woocommerce_single_product_summary', 'my_custom_single_excerpt', 20 );
    }
}

function my_custom_single_excerpt(){
    global $post, $product;

    $short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );

    if ( ! $short_description )
        return;

    // The custom text
    $custom_text = get_template_part( '/woocommerce/product', 'attr' );

    ?>
    <div class="woocommerce-product-details__short-description">
        <?php echo $custom_text; // WPCS: XSS ok. ?>
    </div>
    <?php
}
?>
