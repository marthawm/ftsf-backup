<?php if (!wp_is_mobile()){ ?>

<?php get_header(); ?>
	<div class="main-container">
		​<?php include('newsletter.php');?>
		<?php include('adminfixes.php');?>
		<?php include('desktop-home.php');?>
		<?php include('contact.php');?>
		<?php include('registerproject.php');?>

		<div class="grid-section">
			<?php include('grid.php');?>
		</div>
		<?php get_footer(); ?>
	</div>

<?php } else { ?>

<?php get_header(); ?>

	<?php include('mobile/home.php');?>
	<?php include('mobile/grid.php');?>
	<?php include('mobile/footer.php');?>
	<?php include('contact.php');?>
	<?php include('registerproject.php');?>
	

<?php }  ?>