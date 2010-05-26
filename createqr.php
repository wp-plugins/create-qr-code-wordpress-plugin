<?php
/*
Plugin Name: Create QR code plugin
Plugin URI: http://www.arjentienkamp.com/weblog/projects/create-qr-code-wordpress-plugin/
Description: Create QR codes for your Wordpress posts and pages
Version: 1.0
Author: Arjen Tienkamp
Author URI: http://www.arjentienkamp.com/weblog/
License: GPL
*/

/*  Copyright 2010  Arjen Tienkamp  (email : atienkamp@gmail.com)

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





function qrcode_show() {	

		echo "<!-- START Create QR code -->\n";
	
		echo "<div class=\"qrcode\">\n";
		
		echo '<img class="qr" src="'.get_bloginfo('siteurl').'/wp-content/plugins/'.dirname(plugin_basename(__FILE__)).'/scripts/php/qr_img.php?d='."";
		
		echo ''.the_permalink().'&e=M&s='.get_option('size').'&t=J"/>'."\n";
		
		echo "</div>\n";
		
		echo "<!-- END Create QR code -->\n";

}









		
?>
<?php

add_action('admin_menu', 'qr_create_menu');

function qr_create_menu() {


	add_menu_page('Create QR Plugin Settings', 'QR Settings', 'administrator', __FILE__, 'qr_settings_page');


	add_action( 'admin_init', 'register_mysettings' );
}



function register_mysettings() {

	register_setting( 'qr-settings-group', 'size' );

}



function qr_settings_page() {
	
	
?>
<div class="wrap">
<h2>Create QR Code</h2>

<form method="post" action="options.php">
    <?php settings_fields( 'qr-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Size of the displayed QR code</th>
        <td>
       
       
        <select name="size" id="size">
        <?php
        for ($i = 1; $i < 20; $i++) {
        if ($i == get_option('size')) $selected = " selected='selected'";
        else $selected = '';
        echo "\n\t<option value='$i' $selected>$i</option>";
        }
        ?>
        </select>
        
        
        </td>
        </tr>
         
    </table>
    
    <p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>

</form>
</div>
<?php } ?>
