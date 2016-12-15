
	<nav class="menu">
		<div class="menu-container">
		
			<ul class="menu-list">
				<?php
					$items = wp_get_nav_menu_items('hamburger');
					if($items !== false){
						$classes = "";
						foreach ($items as $item){
							foreach ($item->classes as $css){
								$classes = $classes.$css." ";
							}
							echo "<li class='menu-item'><a href='".$item->url."' class='menu-link ".$classes."'>".$item->title."</li>";
						}
						echo "<li class='menu-item'><a class='menu-link' onclick='toggleContactForm()'>Contact</a></li>";
					}
				else{
						echo "Create an wordpress menu named: hamburger";
					}
				?>
			</ul>
            <button class="register-project" onclick="toggleRegisterProject()">Register Project</button>
		</div>

		<a class="menu-toggle">
			<div class="menu-hamburger"></div>
		</a>
	</nav>
