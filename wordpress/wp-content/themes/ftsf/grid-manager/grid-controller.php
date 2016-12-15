<?php
add_action( 'after_switch_theme', 'ftsf_grid_db_init' );
add_action( 'admin_menu', 'ftsf_grid_menu' );
add_action( 'switch_theme', 'ftsf_grid_db_clean');
	
require_once('database-manager/db-manager.php');

$ftsf_db_manager = new FtsfDBManager();

function ftsf_grid_db_init() {
	global $ftsf_db_manager;
	
	$ftsf_db_manager->create_tables();
	$ftsf_db_manager->set_default_data();
}

function ftsf_grid_db_clean() {
    global $ftsf_db_manager;   
    $ftsf_db_manager->delete_tables();
}

function ftsf_grid_menu() {
    add_menu_page( 'Fairtrade Software Foundation Grid','FTSF Grid', 'manage_options', 'grid_management','ftsf_grid_management');
}

function ftsf_grid_management(){
    if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( '' ) );
	}
    require('pages/grid_management.php');
}