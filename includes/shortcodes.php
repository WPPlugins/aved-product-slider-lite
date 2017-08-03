<?php
 // Shortcodes
	
// Shortcode for out slider in posts
function AVED_Slider_show_SAS() {

    $absolute_dir = AVED_SLIDER_URL;
    $dir = AVED_SLIDER_URL;$cssDir = $dir.'assets/css/style.css';
    $dir .= "assets/js/slick.min.js";
    $param_slider   =  get_option('AVED_slider_option');
    if(gettype($param_slider) == 'array'){
        $data ="<h3 class='slider-aved-title'>".$param_slider['title']."</h3><div class='content'><div class='your-class'>";
        foreach ($param_slider['slides_ids'] as $key => $value) {
        		 $data .= "<div class='slide visible'>";
                 $data .= get_product_by_id($param_slider['settings']['front'],$value);;
                 $data .= "</div>"; 

        }
        $data .= "</div>
                </div>
               ";
    }
    else
    {
        $data = "no information in data base";
    }

    return $data;
}
 // Register shortcode
add_shortcode( 'show_SAS', 'AVED_Slider_show_SAS' );

// Get product by ID
function get_product_by_id($param_to_load,$id){
    $product = get_post($id);
    if(!is_array($product))return;
    $meta_values = get_post_meta($id);
    if(!is_array($meta_values)){return;}
    $product_out['ID']     = $product->ID;
    $product_out['name']   = $product->post_name;
    $product_out['price']  = $meta_values['_price'][0];
    $product_out['img']    = $meta_values['_use_static_image'][0];
    $product_out['stock']  = $meta_values['_stock_status'][0];
    $product_out['href']   = $product->guid;
    if(!is_array($product_out))return;
    if(strlen($product_out['img']) < 5 ){
        $product_out['img'] = get_site_url().'/wp-content/plugins/woocommerce/assets/images/placeholder.png';
     }
     if($param_to_load['link'] != 1){ $product_out['href'] = '#';}
     if(strlen($param_to_load['text_button']) < 1){$param_to_load['text_button'] = 'Buy';}
    $data = '  
    <div class="woocommerce">';
    $data.='<div class="product-wrapper">
        <ul>
            <li style="list-style:none; float:left;">
                       <a href="'.
                       $product_out['href']
                       .'" tabindex="0"></a>
                        <a href="'.
                        $product_out['href'].
                        '" class="thumb" tabindex="0">';

                        if($param_to_load['img'] == 1)$data.='<img src="'.$product_out['img'].'" alt="Placeholder" width="254" class="woocommerce-placeholder wp-post-image" height="203">';

                        $data.='</a>';        
                        if($param_to_load['name'] == 1)$data.='<h3>Product1</h3>';

                        if($param_to_load['price'] == 1)$data.='
                        <span class="price">
                            <span class="amount">$'.$product_out['price'] .'</span>
                        </span>';
                        $data.= '<div style="clear:both"></div>';
                        if($param_to_load['buy'])
                        $data.='<a style="button add-to-cart" href="'.do_shortcode('[add_to_cart_url id="'.$product_out['ID'].'"]').'"><input type="button" class="button add-to-cart" value="'.$param_to_load['text_button'].'"/></a>';
                    $data.='           
                 </div>
             </li>
         </ul>
    </div>
';
 return $data;
}


?>