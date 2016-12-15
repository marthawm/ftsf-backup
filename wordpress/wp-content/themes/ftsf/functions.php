<?php 
DEFINE("ROOT_PATH", dirname( __FILE__ ) ."/" );

function ftsf_theme_setup() {
   add_theme_support( 'post-thumbnails' );

}

function admin_enqueue() {
    global $font_styles, $ftsf_db_manager;
    wp_enqueue_style( 'style_admin', get_template_directory_uri() . '/css/ftsf.css');

    wp_enqueue_script('connectblockpage', get_template_directory_uri() . '/js/connect-page-to-block.js', array(), '1.0.0', true);
    wp_enqueue_script('editpagedetails', get_template_directory_uri() . '/js/edit-page-details.js', array(), '1.0.0', true);
    
    $edit_page_data = array(
      'colors'      => $ftsf_db_manager->get_colors(),
      'fontStyles' => $font_styles
    );
    echo is_plugin_active("featured-video-plus/featured-video-plus.php");
    if(is_plugin_active("featured-video-plus/featured-video-plus.php")) {
        $page_image_thumbnails = array();
        foreach($ftsf_db_manager->get_pages() as $page) {
            $page_image_thumbnails[$page->get_id()] = get_the_post_thumbnail_url($page->get_id());
        }
        
        $page_video_thumbnails = array();
        foreach($ftsf_db_manager->get_pages() as $page) {
            $page_video_thumbnails[$page->get_id()] = get_the_post_video_url($page->get_id());
        }
        
        wp_localize_script('connectblockpage', 'pagesData' , json_encode($ftsf_db_manager->get_pages(), JSON_NUMERIC_CHECK));
        wp_localize_script('connectblockpage', 'pagesImages' , $page_image_thumbnails);
        wp_localize_script('connectblockpage', 'pagesVideos' , $page_video_thumbnails);
        wp_localize_script('editpagedetails', 'editPageData' , $edit_page_data);
        
    }
}

function ftsf_script_enqueue(){
    // css
    wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/ftsf.css', array(), '1.0.0', 'all');
    //javascript
    wp_enqueue_script('autoplay', get_template_directory_uri() . '/js/autoplay.js', array(), '1.0.1', true);
    wp_enqueue_script('blogContent', get_template_directory_uri() . '/js/blogContent.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('mobileGrid', get_template_directory_uri() . '/js/openContentMobile.js', array('jquery'), '1.0.1', true);
     wp_enqueue_script('hamburger-toggle', get_template_directory_uri() . '/js/hamburger-toggle.js', array(), '1.0.1', true);
     wp_enqueue_script('videoresize', get_template_directory_uri() . '/js/resize-video.js', array(), '1.0.1', true);
    wp_enqueue_script('create-play-button', get_template_directory_uri() . '/js/create-play-button.js', array(), '1.0.1', true);

    //scripts for desktop alone go here
  if(!wp_is_mobile()){
      wp_enqueue_script('autoplay', get_template_directory_uri() . '/js/autoplay.js', array(), '1.0.1', true);
      wp_enqueue_script('contactjs', get_template_directory_uri() . '/js/contact.js', array(), '1.0.1', true);
      wp_enqueue_script('registerproject', get_template_directory_uri() . '/js/registerproject.js', array(), '1.0.1', true);
     // wp_enqueue_script('hamburger-toggle', get_template_directory_uri() . '/js/hamburger-toggle.js', array(), '1.0.1', true);
      wp_enqueue_script('photoresize', get_template_directory_uri() . '/js/resize-image.js', array(), '1.0.1', true);
      // wp_enqueue_script('videoresize', get_template_directory_uri() . '/js/resize-video.js', array(), '1.0.1', true);
      wp_enqueue_script('cssanimation', get_template_directory_uri() . '/js/css-animation.js', array(), '1.0.1', true);
      // wp_enqueue_script('create-play-button', get_template_directory_uri() . '/js/create-play-button.js', array(), '1.0.1', true);
      wp_enqueue_script('openContentBlock', get_template_directory_uri() . '/js/openContentBlock.js', array(), '1.0.0', true);
      wp_enqueue_script('mousewheelJQ', get_template_directory_uri() . '/js/jquery.mousewheel.min.js', array('jquery'), '1.0.0', true);
      wp_enqueue_script('horizontalScroll', get_template_directory_uri() . '/js/scrolling.js', array('jquery'), '1.0.0', true);
      wp_enqueue_script('newsletter', get_template_directory_uri() . '/js/newsletter.js', '1.0.0', true);
      wp_enqueue_script('calculate-width', get_template_directory_uri() . '/js/calculate-width.js', array(), '1.0.0', true);
    }
}

include_once('admin/settings.php');
include_once('grid-manager/grid-controller.php');
include_once('grid-manager/pages/page_management.php');

add_action( 'after_setup_theme', 'ftsf_theme_setup' );
add_action('wp_enqueue_scripts', 'ftsf_script_enqueue');
add_action( 'admin_enqueue_scripts', 'admin_enqueue' );


//generate a list of blog posts using ajax
function ftsf_recent_posts_ajax()
  {  //get and set prerequisites
    $blog_colors = ['blog-green.png','blog-red.png','blog-blue.png'];

    $get_posts = $_POST['query_vars'];    
    $get_posts['paged'] = isset($_POST['page']) ? $_POST['page'] : 1 ;
    $get_posts['posts_per_page'] = 9;
    
    $getposts_array = get_posts($get_posts);
    $GLOBALS['wp_query'] = $getposts_array; 

    foreach ($blog_colors as $colors) {//green
        for ($i = 0; $i < count($getposts_array); $i++) { 
            if($i % 3 === 0){

                $color = $blog_colors[$i];
            }
        }
    }
     //$i < count($getposts_array);
    $color = $blog_colors[0];
    
    
    $html='';
    foreach ($getposts_array as $post) {

      //get html variables here      
      $permalink = get_permalink($post->ID);
      $author_name = get_the_author_meta('display_name', $post->post_author);      
      $dir_path = get_bloginfo('stylesheet_directory');      
      $comments_count = get_comments_number('0', '1', '%');

      // old code, can this be deleted?
      // $html.='<div class="blog-item">';
      // $html.='    <div class="blog-overlay" style="background-image: url(\'wp-content/themes/ftsf/images/'.$color.'\');">';
      // $html.='         <span class="blog-title"><a href="'.$permalink.'" rel="'.$post->ID.'">'.$post->post_title.'</a></span>';
      // $html.='         <span class="blog-author">'.$author_name.'</span>';
      // $html.='         <div class="blog-social-wrap">';
      // $html.='            <img class="blog-comment-image" src="'.$dir_path.'/images/blog-comment.png" alt="">';
      // $html.='             <span class="blog-comment-number">'.$comments_count.'</span>';
      // $html.='             <img class="blog-favorite-image" src="'.$dir_path.'/images/blog-favorite.png" alt="">';
      // $html.='             <span class="blog-favorite-number">12</span>';
      // $html.='         </div>';                    
      // $html.='     </div>';
      // $html.=' </div>';

      $html.='<div class="blog-item">';
      $html.='  <a class="blog-item-link" href="'.$permalink.'" rel="'.$post->ID.'">';
      $html.='  <div class="blog-overlay" style="background-image: url(\'wp-content/themes/ftsf/images/'.$color.'\');">';   
      $html.='    <span class="blog-title">'.$post->post_title.'</span>';
      $html.='    <span class="blog-author">'.$author_name.'</span>';                   
      $html.='  </div>';
      $html.='  </a>';
      $html.='  <div class="blog-social-wrap">';
      $html.='    <a href="#" class="blog-comment-link">';
      $html.='      <img class="blog-comment-image" src="'.$dir_path.'/images/blog-comment.png" alt="">';
      $html.='      <span class="blog-comment-number">'.$comments_count.'</span>';
      $html.='    </a>';
      $html.='    <a href="#" class="blog-favorite-link">';
      $html.='      <img class="blog-favorite-image" src="'.$dir_path.'/images/blog-favorite.png" alt="">'; 
      $html.='      <span class="blog-favorite-number">12</span>';
      $html.='    </a>';
      $html.='  </div>';            
      $html.='</div>';


    }
    // HTML output
    header("Content-Type: application/html");
    echo $html;

    exit;

  }
 
add_action('wp_ajax_ftsf_recent_posts_ajax', 'ftsf_recent_posts_ajax');
add_action('wp_ajax_nopriv_ftsf_recent_posts_ajax', 'ftsf_recent_posts_ajax');
add_action('wp_ajax_ftsf_single_post_ajax', 'ftsf_single_post_ajax');
add_action('wp_ajax_nopriv_ftsf_single_post_ajax', 'ftsf_single_post_ajax');
// add_action( 'wp_ajax_load_search_results', 'load_search_results' );
// add_action( 'wp_ajax_nopriv_load_search_results', 'load_search_results' );

//view a single post=>returns JSON data
function ftsf_single_post_ajax()
  {
    $get_posts = array(
       'post_type' => 'post',
       'posts_per_page' => 100000
       );  //posts_per_page should be a big number to resolve limitting blog view
    
    $getposts_array = get_posts($get_posts);

    foreach ($getposts_array as $post) {
      $data = array();
      // get the post's attributes here
      $data['id'] = $post->ID;
      $data['title'] = $post->post_title;
      $data['content'] = $post->post_content;
      $posts_arr[] = $data;
    }
    // JSON output
    header("Content-Type: application/json");
    echo json_encode($posts_arr);

    exit;
  }


/*function load_search_results() {
    $query = $_POST['query'];
    
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        's' => $query
    );
    $search = new WP_Query( $args );
    
    ob_start();
    
    if ( $search->have_posts() ) : 
    
    ?>

     <h2 class="page-title"><?php printf( __( 'Search Results for: %s', 'ftsf' ), get_search_query() ); ?></h2>
       

        <?php
            while ( $search->have_posts() ) : $search->the_post();
                get_template_part( 'content', get_post_format() );
            endwhile;
            
    else :
        get_template_part( 'content', 'none' );
    endif;
    
    $content = ob_get_clean();
    
    echo $content;
    die();
            
}*/
 


