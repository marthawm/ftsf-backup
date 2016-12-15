<?php
$db_manager = new FtsfDBManager();

if( $_POST['grid-data'] ) {
	$grid_data = json_decode(stripslashes(sanitize_text_field($_POST['grid-data'])), true);
	foreach($grid_data as $data) {
		$position = $db_manager->get_position($data[column_id], $data[block_pattern_id]);
		if($position->get_id() !== null) {
			$position->get_post()->set_meta_id($data[meta_id]);
			$db_manager->update_position($position);
		}
		else{
			$db_manager->add_position(new Position(null, $db_manager->get_column_by_column($data[column_id]), new Post(
				null, null, null, null, null, null, $data[meta_id], null, null, null, null, null, null
			), $data[block_pattern_id]));
		}

	}
}
?>
<div id="grid-manager">
	<div class="grid-manager-title">
	<h1>Manage grid blocks</h1>

	<h3>Select a block to connect a page</h3>
	</div>
	<div class="grid-section-manager">
		<?php include(ROOT_PATH.'grid.php');?>
	</div>

	<h3>Select a page to add to the selected block</h3>
	<p>First select a block from the grid above, then select the content you want in there.</p>
		<select class="select-page" disabled>
			<option class="page-list" value="">No page selected</option>
			<?php
				$pages = get_pages(); 
				foreach($pages as $page){
					echo '<option class="page-list" value=\''.$page->ID.'\'>'.$page->post_title.'</option>';
				}
			?>
		</select>

	<form method="post">
		<input name="grid-data" class="hidden-div"></input>
		
		<div class="save-settings">
			<input type="submit" class="button button-primary button-large" value="Save">
			<span class="alert-message"></span>
		</div>
	</form>
<!--Drop down to select a pattern-->
	<h3>Select a Pattern to view </h3>
	<p>This option is only available when you have at least created 12 pages.<p>
			<select class="select-pattern" id="gridManager">
				<option class="page-list"  value="">All Patterns</option>
				<?php
					$patterns = $db_manager->get_patterns(); 
					foreach($patterns  as $pattern){
						echo '<option class="pagelist"  value="'. $pattern->get_id(). '"> '."Pattern ".$pattern->get_id().' </option>';
					}
					
				?>
			</select>
</div>
