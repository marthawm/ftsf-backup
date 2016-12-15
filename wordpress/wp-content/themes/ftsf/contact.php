<?php
	$contact =  get_page_by_title('contact');
?>

<section id="mySidenav" class="sidenav close">
	<div>
		<a href="javascript:void(0)" class="closebtn" onclick="toggleContactForm()">&times;</a>
	</div>
	<div class="contact-section">
		<div class="contact-content">
			<p class="contact-title">contact</p>
			<form>
				<?php 
					echo do_shortcode( $contact->post_content); 
				?>
			</form>	
		</div>
	</div> 
</section>