add_action( 'woocommerce_after_shop_loop_item_title', 'output_product_excerpt', 20 );
    function output_product_excerpt() {
    global $post;
    echo '<div class="my-excerpt">'.wp_trim_words($post->post_excerpt,10).'</div>';
}
