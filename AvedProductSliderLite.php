<?php 
/*
Plugin Name: AVED Product Slider Lite 
Plugin URI: http://AVEDsoft.com
Description: WooCommerce Product Slider by AVEDsoft
Version: 1.0
Author: AVED soft | Dev. Vadim Kopeiken
Author URI: http://avedsoft.com
License: GPL2
Copyright 2016  AVEDsoft  (email : AVEDsoft@gmail.com)
 
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.
 
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
 
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
?>
<?php


// Add define
define( 'AVED_SLIDER_DIR', plugin_dir_path( __FILE__ ) );
define( 'AVED_SLIDER_URL', plugin_dir_url( __FILE__ ) );

// Register file system
require_once(AVED_SLIDER_DIR.'includes/admin.php');
require_once(AVED_SLIDER_DIR.'includes/core.php');
require_once(AVED_SLIDER_DIR.'includes/shortcodes.php');






?>