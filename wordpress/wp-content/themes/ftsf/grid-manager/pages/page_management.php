<?php 
// create a extra field on the post page with the block settings
add_action( 'admin_menu', 'main_block_settings' );
add_action( 'save_post', 'save_main_block_settings' );
add_action( 'add_meta_boxes', 'action_add_meta_boxes', 0 );

$db_manager = new FtsfDBManager();
$font_styles = array();
array_push($font_styles, 'Regular', 'Medium', 'Bold', 'Extra bold', 'Extra bold italic', 'Black');

function main_block_settings() {
	add_meta_box( 'my-meta-box', 'Main block settings', 'block_settings', 'page', 'normal', 'high' );
}

function block_settings( $object, $box ) {
	global $db_manager, $font_styles; 
	$page = $db_manager->get_page($object->ID, null);
	
	if($page->get_id() === null) {
		$db_manager->add_post_meta(new Post($object->ID, null, null, null, null, null, null, '', '', false, false, new Color(1, null, null), 'bold', '25px'));
		$page = $db_manager->get_page($object->ID, null);
	}

	?>
	<div class="checkbox-title">
		<input type="checkbox" <?php echo $page->hide_title() ? 'checked' : '' ?> name="hide-title" id="checkbox-title">
		<label for="checkbox-title">Don't show the title in the block</label>
    </div>
    <div class="checkbox-css-animation">
	    <input type="checkbox" class="css-animation" <?php echo $page->css_animation() ? 'checked' : '' ?> name="css-animation" id="css-animation">
	    <label for="css-animation">Add Transparent line animation to the title</label>
    </div>
    <input type="text" name="subtitle" size="30" value="<?php echo $page->get_subtitle() ?>" placeholder="Enter subtitle here" id="subtitle" class="title-field" spellcheck="true" autocomplete="off"/>

	<input type="text" name="quote" size="30" value="<?php echo $page->get_quote() ?>" placeholder="Enter quote here" id="quote" class="title-field" spellcheck="true" autocomplete="off"/>
	
	<div class="font-weight">
		<span>Select font style for title/quote: </span>
		<select name="font-style" id="font-weight-dropdown" class="font-weight-dropdown">
			<?php 			
			foreach ($font_styles as $font_style) {
				$font_class = strtolower(str_replace(" ","-",$font_style));
				
				if($font_class === $page->get_font_style()) {
					echo '<option selected="selected" value="' . $font_class . '" class="' . $font_class . '">' . $font_style . '</option>';
				}
				else {
					echo '<option value="' . $font_class . '" class="' . $font_class . '">' . $font_style . '</option>';
				}
			}
			?>
		</select>
		<span id="example-text" class="<?php echo $page->get_font_style()   ?>"> Example text</span>
	</div>
	
	<div class="grid-color-dropdown">
		<span>Select background color: </span>
		<?php if(!has_post_thumbnail()){
			?>

		<select name="bg-color" id="color-dropdown" class="bg-color-dropdown">
			<?php 
			$colors = $db_manager->get_colors();
			foreach ($colors as $color) {
				if($color->get_id() === $page->get_color()->get_id()) {
					echo '<option selected="selected" value="'. $color->get_id(). '"> '.$color->get_name().' </option>';
					$used_color = $color->get_hex();
				}
				else {
					echo '<option value="'. $color->get_id(). '"> '.$color->get_name().' </option>';
				}
			}

			?>
			</select>
		<?php } else{
			$msg = '<p class="bg-color-warning alert-message">You have a video or image set as a background. Remove it to set background color</p>';

			echo $msg;
		} ?>

		<div class="example-box" style="background-color:<?php echo $used_color ?>;"></div>
	</div>
	<span class="alert-message bg-color-warning"></span>
	

<?php }

function save_main_block_settings( $post_id ) {
	global $db_manager;
	
	if ( !current_user_can( 'edit_post', $post_id ) ) {
		return $post_id;
	}
	
	if ( isset( $_POST['hide-title']  ) ) {
		$hide_title = true;
	} else {
		$hide_title = false;
	}
	if( isset($_POST['css-animation'])){
		$css_animation = true;
	}else{
		$css_animation = false;
	}
	
	if ( intval( $_POST['bg-color'] ) ) {
		$id = $_POST['bg-color'];
	}
	
	$db_manager->update_page_meta(new Post($post_id, null, null, null, null, null, null, sanitize_text_field( $_POST['subtitle'] ), 
		sanitize_text_field( $_POST['quote'] ), $hide_title, $css_animation, new Color($id, null, null), sanitize_text_field( $_POST['font-style'] ), null));
}

// puts the text editor below the extra fields
function action_add_meta_boxes() {
	global $_wp_post_type_features;
	if (isset($_wp_post_type_features['page']['editor']) && $_wp_post_type_features['page']['editor']) {
		unset($_wp_post_type_features['page']['editor']);
		add_meta_box(
			'description_sectionid',
			__('Content for the extended block'),
			'inner_custom_box',
			'page', 'normal', 'low'
		);
	}
}

function inner_custom_box( $post ) {
	the_editor($post->post_content);
}


$our_colors = array();
foreach($db_manager->get_colors() as $color) {
	array_push($our_colors,$color->to_array());	
}