<?php if (!wp_is_mobile()){ ?>

	<div class="grid-container">
		<div class="grid-wrap-4">
			<div class="grid-item-9 block"<?php add_custom_block_attributes($pages[1], $current_column, 1); ?> >
				<?php add_block_content($pages[1]); ?>

			</div>
			<div class="grid-item-10 block"<?php add_custom_block_attributes($pages[2], $current_column, 2); ?> >
				<?php add_block_content($pages[2]); ?>
			</div>
		</div>
		<div class="grid-wrap-5">
			<div class="grid-item-11 block"<?php add_custom_block_attributes($pages[3], $current_column, 3); ?> >
				<?php add_block_content($pages[3]); ?>
			</div>
			<div class="grid-item-12 block"<?php add_custom_block_attributes($pages[4], $current_column, 4); ?> >
				<?php add_block_content($pages[4]); ?>
			</div>
		</div> 
	</div>

<?php } else { ?>

			<div class="mobile-grid-item width-50 left-spacing" <?php add_custom_block_attributes($pages[1], $current_column, 1); ?>>
				<?php add_block_content($pages[1]); ?></div></a>
			</div>
			<div class="mobile-grid-item square" <?php add_custom_block_attributes($pages[2], $current_column, 2); ?>>
				<?php add_block_content($pages[2]); ?></div></a>
			</div>	
			<div class="mobile-grid-item width-50 right-spacing" <?php add_custom_block_attributes($pages[3], $current_column, 3); ?>>
				<?php add_block_content($pages[3]); ?></div></a>
			</div>
			<div class="mobile-grid-item width-50 left-spacing" <?php add_custom_block_attributes($pages[4], $current_column, 4); ?>>
				<?php add_block_content($pages[4]); ?></div></a>
			</div>
		</div>
	</section>


<?php }  ?>