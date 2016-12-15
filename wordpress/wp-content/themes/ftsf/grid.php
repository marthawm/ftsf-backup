<?php

require_once('grid-manager/database-manager/db-manager.php');
require_once('grid-manager/grid-generation/generate-block.php');


$ftsf_db_manager = new FtsfDBManager();
$grid = $ftsf_db_manager->get_positions();

$current_column = null;
$pattern_id = null;
foreach($grid as $position){
    if( $current_column != $position->get_column()->get_column() ){
        if( $pattern_id != null ){
            include("grid-manager/grid-generation/patterns/pattern$pattern_id.php");
            for( $i=1; $i<=$block_amount; $i++){
                add_page_content( $pages[$i], $current_column, $i );
            }
        }
        $block_amount = $position->get_column()->get_pattern()->get_block_amount();
        $current_column = $position->get_column()->get_column();
        $pattern_id = $position->get_column()->get_pattern()->get_pattern_id();
        $pages = array();
    }
	$post_obj = $position->get_post();
    $pages[$position->get_block_pattern_id()] = $post_obj;
}
// TODO: remove hackz

for( $i=1; $i<=$block_amount; $i++){
    add_page_content( $pages[$i], $current_column, $i );
}
include("grid-manager/grid-generation/patterns/pattern$pattern_id.php");