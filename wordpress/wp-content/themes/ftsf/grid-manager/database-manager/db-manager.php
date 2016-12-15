<?php
	require_once("table-managers/Color.php");
	require_once("table-managers/Column.php");
	require_once("table-managers/Position.php");
	require_once("table-managers/Post.php");
	require_once("table-managers/Pattern.php");
	
	Class FtsfDBManager {
			private $wpdb;
			private $charset_collate;
			private $table_prefix;
			private $table_colors;
			private $table_columns;
			private $table_positions;
			private $table_posts_meta;
			private $table_posts;
			private $table_patterns;
			
			private $get_page_query;
			
			public function __construct(){
				$this->wpdb = $GLOBALS['wpdb'];
				$this->charset_collate   = $this->wpdb->get_charset_collate();
				$this->table_prefix 	 = $this->wpdb->prefix . 'ftsf_grid_';
				$this->table_colors 	 = $this->table_prefix . 'colors';
				$this->table_columns 	 = $this->table_prefix . 'columns';
				$this->table_positions 	 = $this->table_prefix . 'positions';
				$this->table_posts_meta  = $this->table_prefix . 'posts_meta';
				$this->table_patterns    = $this->table_prefix . 'patterns';
				
				$this->table_posts 		 = $this->wpdb->prefix . 'posts';
				
				$this->get_page_query = "SELECT 
					$this->table_posts.ID AS 'id', 			$this->table_posts.post_content,
					$this->table_posts.post_title, 			$this->table_posts.post_status,
					$this->table_posts.post_name,				$this->table_posts.post_type,
					$this->table_posts_meta.id AS 'meta_id', 	$this->table_posts_meta.post_subtitle,
					$this->table_posts_meta.post_quote,		$this->table_posts_meta.hide_title,
					$this->table_posts_meta.css_animation,		$this->table_posts_meta.post_color_id,	
					$this->table_posts_meta.font_style,
					$this->table_posts_meta.font_size
					FROM $this->table_posts 
					CROSS JOIN $this->table_posts_meta
					WHERE $this->table_posts.id = $this->table_posts_meta.post_id 
					AND $this->table_posts.post_type = 'page'";
			}
			
		public function create_tables(){					
			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			
				$sql_color = "CREATE TABLE IF NOT EXISTS $this->table_colors (
					`id` int(11) NOT NULL AUTO_INCREMENT,
					`hex` varchar(7) NOT NULL,
					`color_name` varchar(50) NOT NULL,
					PRIMARY KEY (`id`)
					) $this->charset_collate;";	
						
					dbDelta( $sql_color );					
									
						
				$sql_columns = "CREATE TABLE IF NOT EXISTS $this->table_columns (
					`id` int(11) NOT NULL AUTO_INCREMENT,
					`pattern_id` int(11) NOT NULL,
					`column` int(11) NOT NULL,
					KEY `FK_pattern_id` (`pattern_id`),
					PRIMARY KEY (`id`)
					) $this->charset_collate;";			
						
					dbDelta($sql_columns);						
							
				
				$sql_positions = "CREATE TABLE IF NOT EXISTS $this->table_positions (
					`id` int(11) NOT NULL AUTO_INCREMENT,
					`column_id` int(11) NOT NULL,
					`block_pattern_id` int(11) NOT NULL,
					`post_meta_id` int(11) NOT NULL,
					KEY `FK_column_id` (`column_id`),
					KEY `FK_post_meta_id` (`post_meta_id`),				
					PRIMARY KEY(`id`)			
					) $this->charset_collate;";
											
					dbDelta($sql_positions);
					
				$sql_posts_meta = "CREATE TABLE IF NOT EXISTS $this->table_posts_meta (
					`id` int(11) NOT NULL AUTO_INCREMENT,
					`post_id` bigint(20) UNSIGNED NOT NULL,
					`post_subtitle` text NOT NULL DEFAULT '',
					`post_quote` text NOT NULL DEFAULT '',
					`hide_title` bit(1) NOT NULL DEFAULT 0,
					`css_animation` bit(1) NOT NULL DEFAULT 0,
					`post_color_id` int(11) NOT NULL DEFAULT 1,
					`font_style` varchar(20) NOT NULL DEFAULT 'bold',
					`font_size` varchar(20) NOT NULL DEFAULT '25px',
					KEY `FK_post_id` (`post_id`),
					KEY `FK_post_color_id` (`post_color_id`),
					PRIMARY KEY(`id`)
					) $this->charset_collate;";
											
					dbDelta($sql_posts_meta);
					
				$sql_patterns = "CREATE TABLE IF NOT EXISTS $this->table_patterns (
					`id` int(11) NOT NULL AUTO_INCREMENT,
					`pattern_id` int(11) NOT NULL,
					`block_amount` int(11) NOT NULL,
					PRIMARY KEY(`id`)
				) $this->charset_collate;";
				
					dbDelta($sql_patterns);
							
				$fk_table_posts_meta = "ALTER TABLE $this->table_posts_meta
					ADD CONSTRAINT `FK_post_id` FOREIGN KEY (`post_id`) REFERENCES $this->table_posts (`id`) ON DELETE CASCADE,
					ADD CONSTRAINT 	`FK_post_color_id` FOREIGN KEY (`post_color_id`) REFERENCES $this->table_colors (`id`) ON DELETE CASCADE;";
							
					$wpdb->query($fk_table_posts_meta);
						
				$fk_table_positions = "ALTER TABLE $this->table_positions
					ADD CONSTRAINT `FK_column_id` FOREIGN KEY (`column_id`) REFERENCES $this->table_columns (`id`) ON DELETE CASCADE,
					ADD CONSTRAINT `FK_post_meta_id` FOREIGN KEY (`post_meta_id`) REFERENCES $this->table_posts_meta (`id`) ON DELETE CASCADE,
					ADD UNIQUE INDEX `block_id_UNIQUE` (`column_id`, `block_pattern_id`);";
																		
					$wpdb->query($fk_table_positions);
					
				$unique_table_colors = "ALTER TABLE $this->table_colors 
					ADD UNIQUE INDEX `hex_UNIQUE` (`hex` ASC), 
					ADD UNIQUE INDEX `color_name_UNIQUE` (`color_name` ASC);";
				
					$wpdb->query($unique_table_colors);
					
				$unique_table_columns = "ALTER TABLE $this->table_columns
					ADD CONSTRAINT `FK_pattern_id` FOREIGN KEY (`pattern_id`) REFERENCES $this->table_patterns (`id`) ON DELETE CASCADE, 
					ADD UNIQUE INDEX `column_UNIQUE` (`column` ASC);";
				
					$wpdb->query($unique_table_columns);
					
				$unique_table_patterns = "ALTER TABLE $this->table_patterns 
					ADD UNIQUE INDEX `pattern_id_UNIQUE` (`pattern_id` ASC);";
				
					$wpdb->query($unique_table_patterns);
		}
		
		public function set_default_data(){
			if(count($this->get_colors()) == 0){
				$colors = array();
				$pages = array();
				$patterns = array();
				$columns = array();
				
				/*Add default colors*/
				array_push($colors, 
					new Color(1, "#00C3E5", "ftsf_blue"),
					new Color(2, "#75c398", "ftsf_green"),
					new Color(3, "#f56462", "ftsf_red")
				);
						
				foreach( $colors as $color ){
					$this->add_color($color);
				}
				
				/*Add default page if none exist yet*/				
				if(count(get_pages(array('post_type' => 'page','post_status' => 'publish', 'sort_column' => 'menu_order'))) == 0) {
					$this->wpdb->insert($this->table_posts,array(
						"post_content"=>"This is the default generated block. Please add pages to add more blocks.",
						"post_title"=>"Default Block",
						"post_date"=> date("c"),
						"post_date_gmt"=> date("c"),
						"post_excerpt"=>"",
						"to_ping"=>"",
						"pinged"=>"",
						"post_type"=>"page",
						"post_content_filtered"=>""
					));
				}
				
				/*Add default metadata for all existing pages*/
				$id = 1;
				foreach(get_pages(array('post_type' => 'page','post_status' => 'publish')) as $page) {
					array_push($pages, new Post($page->ID, $page->post_content, $page->post_title, 
										$page->post_status, $page->post_name, $page->post_type, $id, '', '', 
										false, false, $colors[array_rand($colors, 1)], "bold", "25px"));
					
					$this->add_post_meta(end($pages));
					$id++;
				}
					
				/*Add default patterns*/
				array_push($patterns, 
					new Pattern(1, 1, 6),
					new Pattern(2, 2, 2),
					new Pattern(3, 3, 4)
				);
				
				foreach( $patterns as $pattern ) {
					$this->add_pattern($pattern);
				}
				
				/*Add default columns for all existing pages*/
				$selected_patterns = 0;
				$id = 1;
							
				while(count($pages) > $selected_patterns) {					
					$pattern = $patterns[array_rand($patterns, 1)];
					$selected_patterns += $pattern->get_block_amount();
					
					array_push($columns, new Column($id, $pattern, $id));
					$this->add_column(new Column($id, $pattern, $id));
					$id++;
				}
				
				/*Add default positions for all blocks*/
				$added_pages = 0;
				$id = 0;
				foreach($columns as $column) {
					for($i = 1; $i <= $column->get_pattern()->get_block_amount(); $i++){
						if(count($pages) > $added_pages) {
							$this->add_position(new Position($added_pages+1, $columns[$id], $pages[$added_pages], $i));
							$added_pages++;
						}						
					}
					$id++;
				}
				
			}
		}
		
		public function delete_tables(){				
			$this->wpdb->query("DROP TABLE IF EXISTS $this->table_positions, $this->table_columns, $this->table_posts_meta, $this->table_colors, $this->table_patterns;");
		}
		
		/**Add Functions**/	
		public function add_color($color_obj) {
			$this->wpdb->insert($this->table_colors,array(
				"color_name"=> $color_obj->get_name(),
				"hex"=> $color_obj->get_hex()
			));		
		}
		
		public function add_pattern($pattern_obj) {
			$this->wpdb->insert($this->table_patterns,array(
				"pattern_id"=> $pattern_obj->get_pattern_id(),
				"block_amount"=> $pattern_obj->get_block_amount()
			));
		}
		
		public function add_column($column_obj) {	
			$this->wpdb->insert($this->table_columns,array(
				"pattern_id"=>$column_obj->get_pattern()->get_id(),
				"column"=>$column_obj->get_column()
			));
		}
		
		public function add_post_meta($post_obj) {
			$this->wpdb->insert($this->table_posts_meta,array(
				"post_id"=>$post_obj->get_id(),
				"post_subtitle"=>$post_obj->get_subtitle(),
				"post_quote"=>$post_obj->get_quote(),
				"hide_title"=>$post_obj->hide_title(),
				"css_animation"=>$post_obj->css_animation(),
				"post_color_id"=>$post_obj->get_color()->get_id(),
				"font_style"=>$post_obj->get_font_style(),
				"font_size"=>$post_obj->get_font_size()	
			));
		}
		
		public function add_position($position_obj) {
			$this->wpdb->insert($this->table_positions,array(
				"column_id"=>$position_obj->get_column()->get_id(),
				"block_pattern_id"=>$position_obj->get_block_pattern_id(),
				"post_meta_id"=>$position_obj->get_post()->get_meta_id()
			));
		}
		
		/**Get Functions**/
		public function get_colors() {	
			$result = $this->wpdb->get_results( "SELECT * FROM $this->table_colors");
			$colors = array();
			
			foreach ($result as $color) {
				array_push($colors, new Color($color->id, $color->hex, $color->color_name));
			}
			return $colors;
		}
		
		public function get_color($id) {
			$result = $this->wpdb->get_results("SELECT * FROM $this->table_colors WHERE `id` = $id");
			
			return new Color($result[0]->id, $result[0]->hex, $result[0]->color_name);
		}
		
		public function get_patterns() {
			$result = $this->wpdb->get_results( "SELECT * FROM $this->table_patterns");
			$patterns = array();
			
			foreach ($result as $pattern) {
				array_push($patterns, new Pattern($pattern->id, $pattern->pattern_id, $pattern->block_amount));
			}
			return $patterns;
		}
		
		public function get_pattern($id) {
			$result = $this->wpdb->get_results( "SELECT * FROM $this->table_patterns WHERE `id` = $id");
			
			return new Pattern($result[0]->id, $result[0]->pattern_id, $result[0]->block_amount);
		}
		
		public function get_columns() {
			$result = $this->wpdb->get_results( "SELECT * FROM $this->table_columns");
			$columns = array();
			
			foreach ($result as $column) {
				array_push($columns, new Column($column->id, $this->get_pattern($column->pattern_id), $column->column));
			}
			return $columns;
		}
		
		public function get_column($id) {
			$result = $this->wpdb->get_results( "SELECT * FROM $this->table_columns where `id` = $id");

			return new Column($result[0]->id, $this->get_pattern($result[0]->pattern_id), $result[0]->column);
		}
		
		public function get_column_by_column($column) {
			$result = $this->wpdb->get_results( "SELECT * FROM $this->table_columns where `column` = $column");

			return new Column($result[0]->id, $this->get_pattern($result[0]->pattern_id), $result[0]->column);
		}
		
		
		public function get_pages() {
			
			$query = $this->get_page_query . "AND $this->table_posts.post_status = 'publish';";
			$result = $this->wpdb->get_results($query);
			$pages = array();
			
			foreach($result as $page){
			array_push($pages, new Post(
				$page->id, $page->post_content, $page->post_title, $page->post_status, $page->post_name, $page->post_type, $page->meta_id, 
				$page->post_subtitle, $page->post_quote, $page->hide_title, $page->css_animation, $this->get_color($page->post_color_id), $page->font_style, $page->font_size));
			}
			return $pages;
		}
		
		public function get_page($id, $meta_id) {
			$query = $this->get_page_query;
			if($id !== null){			
				$query .= " AND $this->table_posts.id = $id;";
			}else{
				$query .= " AND $this->table_posts_meta.id = $meta_id;";
			}
			
			$result = $this->wpdb->get_results($query);
			
			return new Post($result[0]->id, $result[0]->post_content, $result[0]->post_title, $result[0]->post_status, 
							$result[0]->post_name, $result[0]->post_type, $result[0]->meta_id, $result[0]->post_subtitle,
							$result[0]->post_quote, $result[0]->hide_title, $result[0]->css_animation, $this->get_color($result[0]->post_color_id),
							$result[0]->font_style, $result[0]->font_size);
		}
		
		public function get_positions() {
			$result = $this->wpdb->get_results(
										"SELECT 
										$this->table_positions.id,
										$this->table_positions.column_id,
										$this->table_positions.block_pattern_id,
										$this->table_positions.post_meta_id
										FROM $this->table_positions
										CROSS JOIN $this->table_columns
										WHERE $this->table_positions.column_id = $this->table_columns.id
										ORDER BY $this->table_columns.column;"
									);
			$positions = array();
			
			foreach($result as $position) {
				array_push($positions, new Position($position->id, $this->get_column($position->column_id), $this->get_page(null, $position->post_meta_id), $position->block_pattern_id));
			}
			return $positions;
		}
		
		public function get_position($column_id, $block_pattern_id) {
			$result = $this->wpdb->get_results(
										"SELECT 
										$this->table_positions.id,
										$this->table_positions.column_id,
										$this->table_positions.block_pattern_id,
										$this->table_positions.post_meta_id
										FROM $this->table_positions
										CROSS JOIN $this->table_columns
										WHERE $this->table_positions.column_id = $this->table_columns.id
										AND $this->table_positions.column_id = $column_id
										AND $this->table_positions.block_pattern_id = $block_pattern_id
										ORDER BY $this->table_columns.column;"
									);

				return new Position($result[0]->id, $this->get_column($result[0]->column_id), $this->get_page(null, $result[0]->post_meta_id), $result[0]->block_pattern_id);
		}
		
		
		
		/*Update Functions*/
		public function update_color($color_obj) {
			$query = array();
			
			if($color_obj->get_hex() !== null) { $query['hex'] = $color_obj->get_hex(); }
			if($color_obj->get_name() !== null) { $query['color_name'] = $color_obj->get_name(); }
			
			$this->wpdb->update($this->table_colors, $query, array( 'id' => $color_obj->get_id() ));
		}
		
		public function update_pattern($pattern_obj) {
			$query = array();
		
			if($pattern_obj->get_pattern_id() !== null) { $query['pattern_id'] = $pattern_obj->get_pattern_id(); }
			if($pattern_obj->get_block_amount() !== null) { $query['block_amount'] = $pattern_obj->get_block_amount(); }
			
			$this->wpdb->update($this->table_patterns, $query, array( 'id' => $pattern_obj->get_id() ));
		}
		
		public function update_page_meta($page_obj) {
			$query = array();
			
			if($page_obj->get_subtitle() !== null) { $query['post_subtitle'] = $page_obj->get_subtitle(); }
			if($page_obj->get_quote() !== null) { $query['post_quote'] = $page_obj->get_quote(); }
			if($page_obj->hide_title() !== null) { $query['hide_title'] = $page_obj->hide_title(); }
			if($page_obj->css_animation() !== null) { $query['css_animation']= $page_obj->css_animation(); }
			if($page_obj->get_color() !== null){
				if($page_obj->get_color()->get_id() !== null) { $query['post_color_id'] = $page_obj->get_color()->get_id(); }
			}		
			if($page_obj->get_font_style() !== null) { $query['font_style'] = $page_obj->get_font_style(); }
			if($page_obj->get_font_size() !== null) { $query['font_size'] = $page_obj->get_font_size(); }
			
			$this->wpdb->update($this->table_posts_meta, $query, array( 'post_id' => $page_obj->get_id() ));
		}
		
		public function update_column($column_obj) {
			$query = array();
			
			if($column_obj->get_pattern()->get_id() !== null) { $query['pattern_id'] = $column_obj->get_pattern()->get_id(); }
			if($column_obj->get_column() !== null) { $query['column'] = $column_obj->get_column(); }
			
			$this->wpdb->update($this->table_columns, $query, array( 'id' => $column_obj->get_id() ));
		}
		
		public function update_position($position_obj) {
			$query = array();
			
			if($position_obj->get_column() !== null){
				if($position_obj->get_column()->get_id() !== null) { $query['column_id'] = $position_obj->get_column()->get_id(); }
			}
			if($position_obj->get_block_pattern_id() !== null) { $query['block_pattern_id'] = $position_obj->get_block_pattern_id(); }
			if($position_obj->get_post() !== null){
				if($position_obj->get_post()->get_meta_id() !== null) { $query['post_meta_id'] = $position_obj->get_post()->get_meta_id(); }
			}
			
			$this->wpdb->update($this->table_positions, $query, array( 'id' => $position_obj->get_id() ));
		}
		
		/*Delete functions*/
		public function delete_color($id) {
			$this->wpdb->delete($this->table_colors ,array( 'id' => $id ));
		}
		
		public function delete_pattern($id) {
			$this->wpdb->delete($this->table_patterns ,array( 'id' => $id ));
		}
		
		public function delete_page_meta($id) {
			$this->wpdb->delete($this->table_pages_meta ,array( 'id' => $id ));
		}
		
		public function delete_column($id) {
			$this->wpdb->delete($this->table_columns ,array( 'id' => $id ));
		}
		
		public function delete_position($id) {
			$this->wpdb->delete($this->table_positions ,array( 'id' => $id ));
		}
	}
