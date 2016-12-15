<?php
	$register =  get_page_by_title('register');
?>

<section id="mySidenav" class="project-sidenav close">
	<div>
		<a href="javascript:void(0)" class="closebtn" onclick="toggleRegisterProject()">&times;</a>
	</div> 
	<div class="contact-section">
		<div class="contact-content">
			<p class="contact-title">Register project</p>
			<form>
				<?php 
					echo do_shortcode( $register->post_content); 
				?>
			</form>	
		</div>
	</div>

</section>
