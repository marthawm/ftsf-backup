<?php if (!wp_is_mobile()){ 

//change this directory to where you would like the file to be
    include dirname(__FILE__).'/../../blog-overview.php';

    function add_block_content( $post ){
        if( $post != null ) {
            if( has_post_video( $post->get_id() )){
                $src = get_the_post_video_url( $post->get_id() );
                // $ext = substr($src, strpos($src,".")+1);
                echo    "<video class='block-video' loop='true' muted>
                            <source src='$src' type='video/mp4' />
                        </video>";
            }
            elseif( !$post->hide_title() ){
                set_block_title($post);

                if( $post->get_subtitle() != '' ){
                    set_block_subtitle($post);
                }
            }
            elseif( $post->get_quote() != '' ){
                set_block_quote($post);
            }
        }
    }

    function set_block_title($post){
        $title = $post->get_title();
        $home = get_home_url()."/";
        if($post->css_animation() && !has_post_thumbnail($post->get_id()) && !has_post_video( $post->get_id())){
            echo "<a href='$home#$title' style='text-decoration: none;'><h2 class='title ".$post->get_font_style()."'><span class='strike'>$title</span></h2></a>";
        }
        else{
            echo"<a href='$home#$title' style='text-decoration:none;'><h2 class='title ".$post->get_font_style()."'>$title</h2></a>";
        }
    }

    function set_block_subtitle($post){
        $subtitle = $post->get_subtitle();
        echo "<span class='subtitle'>$subtitle</span>";
    }

    function set_block_quote($post){
        $quote = $post->get_quote();
        echo "<h2 class='quote ".$post->get_font_style()."'>$quote</h2>";
    }
    function ftsf_get_background_image( $post ){
        if( has_post_thumbnail( $post->get_id() )){
            $src = get_the_post_thumbnail_url($post->get_id());
            return "$src ";

        }
    }

    function add_custom_block_attributes($post, $column, $bpid){
        if( $post != null ) {
            $bck_color = $post->get_color()->get_hex();
            $style = " style='background-color: $bck_color; background-image: url(".ftsf_get_background_image($post).");'";
            echo $style;
            $title = $post->get_name();
            $id = "$title-$column-$bpid";
            $data = " data-grid-column='$column' data-grid-bpid='$bpid' data-grid-content-id='$id' data-grid-page-id='" . $post->get_id() . "'";
            echo $data;
        } else {
            $id = "$title-$column-$bpid";
            $data = " data-grid-column='$column' data-grid-bpid='$bpid' data-grid-content-id='$id' data-grid-page-id=''";
            echo $data;
        }
    }

    //Please use proper indentation for readability
    function add_page_content( $post, $column, $bpid ){
        if( $post != null ){
            if( $post->get_content() != "" ){

                $title = $post->get_name();
                $home = get_home_url()."/";
                $page_title =  $post->get_title();
                $id = " id='$title-$column-$bpid'";

                echo "<div data-grid-column='$column' data-grid-bpid='$bpid' $id class='content-block'>";
                ?>
                <h2 class='block-page-title'><?php echo $page_title ?></h2>
                <div class='close close-image'><a></a></div>
                <div class='page-styling'>
                    <?php
                    if($page_title == 'blogs'){
                        add_shortcode('ftsf-recent-post', 'ftsf_recent_posts');// add shortcode => [ftsf-recent-post] to blog page
                        $blog =  get_page_by_title('blogs'); ?>
                        <div class="">
                            <?php echo do_shortcode( $blog->post_content); ?>
                        </div>

                    <?php }else{ ?>

                        <div class="">
                            <?php echo $post->get_content(); ?>
                        </div>

                    <?php } ?>
                </div>
                </div>
                <?php
            }
        }
    }

} else { 

//change this directory to where you would like the file to be
    include dirname(__FILE__).'/../../blog-overview.php';
    function add_block_content( $post ){
        if( $post != null ) {
            if( has_post_video( $post->get_id() )){
                $src = get_the_post_video_url( $post->get_id() );
                // $ext = substr($src, strpos($src,".")+1);
                echo    "<div class='video-mobile-div'><video class='block-video-mobile' loop='true' muted>
                            <source src='$src' type='video/mp4' />
                        </video>";
            }
            elseif( !$post->hide_title() ){
                set_block_title($post);

                if( $post->get_subtitle() != '' ){
                    set_block_subtitle($post);
                }
            }
            elseif( $post->get_quote() != '' ){
                set_block_quote($post);
            }
        }
    }

    function set_block_title($post){
        $title = $post->get_title();
        $home = get_home_url()."/";
        if($post->css_animation() && !has_post_thumbnail($post->get_id()) && !has_post_video( $post->get_id())){
            echo "<a href='$home#$title' style='text-decoration: none;'><p class='title ".$post->get_font_style()."'><span class='strike'>$title</span></p></a>";
        }
        else{
            echo"<a class='grid-link' href='$home#$title' target=''><div class='grid-item-content'>
                        <h2 class='mobile-title-grid'>$title</h2>";
        }
    }

    function set_block_subtitle($post){
        $subtitle = $post->get_subtitle();
        echo "<span class='subtitle-mobile-grid'>$subtitle</span>";
    }

    function set_block_quote($post){
        $quote = $post->get_quote();
        echo "<a class='grid-link' href='$home#$title' target=''><div class='grid-item-content'>
                        <span class='quote-mobile-grid'>&#8220;$quote&#8221;</span>";
    }

    function ftsf_get_background_image( $post ){
        if( has_post_thumbnail( $post->get_id() )){
            $src = get_the_post_thumbnail_url($post->get_id());
            return "$src ";

        }
    }

    function add_custom_block_attributes($post, $column, $bpid){
        if( $post != null ) {
            $bck_color = $post->get_color()->get_hex();
            $style = " style='background-color: $bck_color; background-position: center; background-size: cover; background-image: url(".ftsf_get_background_image($post).");'";
            echo $style;
            $title = $post->get_name();
            $id = "$title-$column-$bpid";
            $data = " data-grid-column='$column' data-grid-bpid='$bpid' data-grid-content-id='$id' data-grid-page-id='" . $post->get_id() . "'";
            echo $data;
        } else {
            $id = "$title-$column-$bpid";
            $data = " data-grid-column='$column' data-grid-bpid='$bpid' data-grid-content-id='$id' data-grid-page-id=''";
            echo $data;
        }
    }

    //Please use proper indentation for readability
    function add_page_content( $post, $column, $bpid ){
        if( $post != null ){
            if( $post->get_content() != "" ){

                $title = $post->get_name();
                $home = get_home_url()."/";
                $page_title =  $post->get_title();
                $id = " id='$title-$column-$bpid'";

                echo "<div data-grid-column='$column' data-grid-bpid='$bpid' $id class='content-block'>";
                ?>
                <div class='close close-image'><a></a></div>
                <h2 class='block-page-title'><?php echo $page_title ?></h2>
                    <div class='page-styling'>
                        <?php
                        if($page_title == 'blogs'){
                            add_shortcode('ftsf-recent-post', 'ftsf_recent_posts');// add shortcode => [ftsf-recent-post] to blog page
                            $blog =  get_page_by_title('blogs'); ?>
                            <div class="">
                                <?php echo do_shortcode( $blog->post_content); ?>
                            </div>

                        <?php }else{ ?>

                            <div class="">
                                <?php echo $post->get_content(); ?>
                            </div>

                        <?php } ?>
                    </div>
                </div>
                <?php
            }
        }
    }
 }  

