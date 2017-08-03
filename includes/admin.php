<?php
// add admin menu
function AVED_slider_option(){add_menu_page('AVED Slider Option', 'AVED Slider Option', 8,__FILE__, 'Aved_slider_option_loader');}
// *********************************** //
// Option
function Aved_slider_option_loader()
{
    if(current_user_can('administrator') )
    {

        $action = $_POST['Save'];
        if($action == 'SAVE')
        {
            if (gettype( ($_POST['slider_product']) ) == 'array' )  
            {
                $array = $_POST['slider_product'];
                foreach ($array['slides_ids'] as $key => $value) 
                {
                    $array['slides_ids'][$key] = (int)$value;
                }
                
                update_option('AVED_slider_option',$array);
            }
        }
        if($_POST['Save'] == 'SAVE' )
        {
            echo '<script type="text/javascript">alert("Option saved!");</script>';
        }
        $params = get_option('AVED_slider_option');
        $_POST['AVED_slider_option'] = array();
        if(gettype($params)  != 'array'){   $params = '';   }
        ?>
        <div id="aved_slider_lite">
        <div class="option_table">
            <form method="post">
                <div class="main">
                    <h3>AVEDsoft Product Slider Option</h3>
                    <h4>Input this shortcode in post [show_SAS]</h4>
                    <hr>
                    <input id="saved_slider" type="submit" name="Save" value="SAVE"/>
                    <input id="count" type="hidden" name="slider_product[count]" value="<?php echo $params['count']?>"/>
                </div>
                <div class="front-option">
                    <h3>Front-End Option</h3>
                   
                    <table>
                        <tr>
                            <td>Show Image</td>
                            <td>    
                                <input type="checkbox" name="slider_product[settings][front][img]"  value="1"                                 <?php echo checked( '1', $params['settings']['front']['img'] ); ?> />
                            </td>
                           <td>Title Slider</td>
                            <td><input type="text" size="40" name="slider_product[title]" value="<?php echo $params['title']?>"></td>
                             
                        </tr>
                         <tr>
                            <td>Show Price</td>
                            <td>
                                <input type="checkbox" name="slider_product[settings][front][price]"  value="1"                                <?php echo checked( '1', $params['settings']['front']['price'] ); ?> >
                            </td>
                             <td>Button text</td>
                            <td>    
                                <input type="text" name="slider_product[settings][front][text_button]" size="40"  value="<?php echo $params['settings']['front']['text_button']?>
                                "/>
                            </td>
                        </tr>
                         <tr>
                            <td>Show Name</td>
                            <td>
                                <input type="checkbox" name="slider_product[settings][front][name]"  value="1"<?php checked( '1', $params['settings']['front']['name'] ); ?> />
                            </td>
                        </tr>
                         <tr>
                            <td>Active Link</td>
                            <td>
                                <input type="checkbox" name="slider_product[settings][front][link]"  value="1"                                <?php checked( '1', $params['settings']['front']['link'] ); ?> />
                            </td>
                        </tr>
                        <tr>
                            <td>Show Buy Button</td>
                            <td>    
                                <input type="checkbox" name="slider_product[settings][front][buy]"  value="1"                                 <?php echo checked( '1', $params['settings']['front']['buy'] ); ?> />
                            </td>
                        </tr>
                    </table>
               
                </div>
                <div class="slide_table">
                    <h3>Slides </h3>
                    <p>Input ID items</p>
                    <?php foreach ($params['slides_ids'] as $key => $value) { ?>
                    		<div id="<?php echo $key ?>">
                                ID<input type="text" name="slider_product[slides_ids][<?php echo $key ?>]" value="<?php echo $value?>" />
                                <input class="del" type="button" name="<?php echo $key ?>" value="Delete">
                                <hr>
                            </div><?php }?>
                </div>
            </form>
            <input id="addSlide" type="button" name="AddSlide" value="add Slide" onclick="addSlide()" />
        </div>
        <script type="text/javascript"> 
            <?php ?>
            var $j = jQuery.noConflict();
            function addSlide(){
            	var count = $j('#count').val();
            	count = Number(count);
            	$j('div.slide_table').append('<div id="slide_'+count+'">ID&nbsp<input type="text" name="slider_product[slides_ids][slide_'+count+']" value=""/>   			<input class="del" type="button" name="slide_'+count+'" value="Delete"><hr></div>');
            	count++;
            	$j('#count').val(String(count));
                }
            $j('.del').on('click',function(){
            	var paramDel =  $j(this).attr('name');
            	$j('div#'+paramDel).remove();
            });
        </script>
        </div>
    <?php
    }
    else
        echo "Error accses !";
}
    // end option.
    // ***************************************************************** //
    // add admin menu
    add_action('admin_menu', 'AVED_slider_option'); ?>