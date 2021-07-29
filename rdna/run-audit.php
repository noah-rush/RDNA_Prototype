
<?php 
require_once dirname( __DIR__ ) . '/wp-load.php';

add_action( 'wp_ajax_my_action', 'my_action' );

function run_audit() {
	global $wpdb; // this is how you get access to the database

	echo "schmang it ";
}

?>