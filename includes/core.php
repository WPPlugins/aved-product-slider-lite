<?php 
// init scripts & styles in pages
function AVED_Slider_init_Script_visual(){
	wp_enqueue_script( 'jquery' );
 	wp_enqueue_script("AVED_Slider_script",AVED_SLIDER_URL."assets/js/slick.js", false, "1.0");  	
 	wp_enqueue_script("AVED_Slider_script_slick_min",AVED_SLIDER_URL."assets/js/slick.min.js", false, "1.0"); 
 	wp_enqueue_script("AVED_Slider_script_slick",AVED_SLIDER_URL."assets/js/script.js", false, "1.0"); 
	wp_enqueue_style("AVED_Slider_style",AVED_SLIDER_URL."assets/css/style.css");
	wp_enqueue_style("AVED_Slider_style_slick",AVED_SLIDER_URL."assets/css/slick.css");
	wp_enqueue_style("AVED_Slider_style_slick_theme",AVED_SLIDER_URL."assets/css/slick-theme.css");
	
}
add_action('wp_enqueue_scripts', 'AVED_Slider_init_Script_visual');
// Init admin scripts and styles
function AVED_Slider_admin_initialization(){
	wp_enqueue_style("AVED_Slider_style_admin",AVED_SLIDER_URL."assets/css/admin.css");
}
add_action('admin_init','AVED_Slider_admin_initialization');
function get_woo_product(){
   

    $args = array(
        'posts_per_page'   => -1,
        'offset'           => 0,
        'orderby'          => 'date',
        'order'            => 'DESC',
        'meta_key'         => '_mw_metakey',
        'meta_value'       => 'wm_spot',
        'post_type'        => 'product',
        'suppress_filters' => true
    );

    $tmp = get_posts( $args );

    $i = 0;
    if(isset($tmp)){
        foreach ($tmp as $key ) {
            $post_meta_arg = get_post_meta( $key->ID);
            $product[$i]['ID'] = $key->ID;
            $product[$i]['post_title'] = $key->post_title;
            $product[$i]['post_type'] = $key->post_type;
            $product[$i]['post_excerpt'] = $key->post_excerpt;
            $product[$i]['price'] = $post_meta_arg['price'];
            $product[$i]['post_name'] = $key->post_name;
            $product[$i]['wm_type'] =$post_meta_arg['_mw_table_type'][0];
            $product[$i]['wm_parent_id'] =$post_meta_arg['_mw_identificator'][0];
            $product[$i]['_mw_metakey'] = $post_meta_arg['_mw_metakey'];
            $i++;

        }
    }

    return $product;

}
?>