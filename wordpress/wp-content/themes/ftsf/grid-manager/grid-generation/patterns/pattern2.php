<?php if (!wp_is_mobile()){ ?>

	<div class="grid-container">
		<div class="grid-wrap-3">
			<div class="grid-item-7 block"<?php add_custom_block_attributes($pages[1], $current_column, 1); ?> >
				<?php add_block_content($pages[1]); ?>
			</div>
			<div class="grid-item-8 block"<?php add_custom_block_attributes($pages[2], $current_column, 2); ?> >
				<?php add_block_content($pages[2]); ?>
			</div>
		</div> 
	</div>


<?php } else { ?>



			<div class="mobile-grid-item width-33 left-spacing" <?php add_custom_block_attributes($pages[1], $current_column, 1); ?>>
				<?php add_block_content($pages[1]); ?></div></a>
			</div>
			<div class="mobile-grid-item width-50 right-spacing" <?php add_custom_block_attributes($pages[2], $current_column, 2); ?>>
				<?php add_block_content($pages[2]); ?></div></a>
			</div>



<?php }  ?>