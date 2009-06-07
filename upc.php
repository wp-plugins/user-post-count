<?php
/*
Plugin Name: User Post count
Plugin URI:
Description: Shows the total count of post by author.
Author: Littleboy
Version: 1.0
Author URI: http://babysofts.com
*/

function upc_wp_dashboard() {
 include("usercount.php");
}
function upc_wp_dashboard_add() {
	wp_add_dashboard_widget( 'upc_wp_dashboard', __( 'User Post Count' ),'upc_wp_dashboard');
}
add_action('wp_dashboard_setup', 'upc_wp_dashboard_add');

?>