<?php if (!wp_is_mobile()){ ?>

	<div class="grid-container">
		<div class="grid-wrap-1">
			<div class="grid-item-1 block" <?php add_custom_block_attributes($pages[1], $current_column, 1); ?> >
				<?php add_block_content($pages[1]); ?>
			</div>
			<div class="grid-item-2 block" <?php add_custom_block_attributes($pages[2], $current_column, 2); ?> >
				<?php add_block_content($pages[2]); ?>
			</div>
			<div class="grid-item-3 block" <?php add_custom_block_attributes($pages[3], $current_column, 3); ?> >
				<?php add_block_content($pages[3]); ?>
			</div>
		</div> 
		<div class="grid-wrap-2">
			<div class="grid-item-4 block" <?php add_custom_block_attributes($pages[4], $current_column, 4); ?> >
				<?php add_block_content($pages[4]); ?>
			</div>
			<div class="grid-item-5 block" <?php add_custom_block_attributes($pages[5], $current_column, 5); ?> >
				<?php add_block_content($pages[5]); ?>
			</div>
			<div class="grid-item-6 block" <?php add_custom_block_attributes($pages[6], $current_column, 6); ?> >
				<?php add_block_content($pages[6]); ?>
			</div>
		</div> 
	</div>

<?php } else { ?>
	<section class="mobile-grid">
		<div class="mobile-grid-container">
		
			<div class="mobile-grid-item width-50 right-spacing" <?php add_custom_block_attributes($pages[1], $current_column, 1); ?> >
				<?php add_block_content($pages[1]); ?></div></a>
			</div>
			<div class="mobile-grid-item width-50 left-spacing" <?php add_custom_block_attributes($pages[2], $current_column, 2); ?>>
				<?php add_block_content($pages[2]); ?></div></a>
			</div>
			<div class="mobile-grid-item width-100" <?php add_custom_block_attributes($pages[3], $current_column, 3); ?> >
				<?php add_block_content($pages[3]); ?></div></a>
			</div>
			<div class="mobile-grid-item square" <?php add_custom_block_attributes($pages[4], $current_column, 4); ?> >
				<?php add_block_content($pages[4]); ?></div></a>
			</div>
			<div class="mobile-grid-item width-33 right-spacing"  <?php add_custom_block_attributes($pages[5], $current_column, 5); ?> >
				<?php add_block_content($pages[5]); ?></div></a>
			</div>
			<div class="mobile-grid-item width-33 both-side-spacing" <?php add_custom_block_attributes($pages[6], $current_column, 6); ?> >
				<?php add_block_content($pages[6]); ?></div></a>
			</div>



<?php }  ?>
