<?php
function ftsf_recent_posts()
{?>
  
   <div id="blog-items-container" class="blog-overview-box">'</div>   
   <div class="blog-overview-box1"></div>
   <div class="ajax-blog-loading "></div>
   <div class="ajax-blog-title" style="text-align:center; font-size:20px; font-weight:bold;"></div>
   <div class="ajax-blog-content"></div>
   <div class="blog-footer">
       <div class="blog-page-numbers">
       <?php wp_pagenavi();?>
       </div>
   </div>
   <div class="blog-search">
<form action="/" method="get">
   <label for="search"></label>
   <input class="blog-search-field" type="text" name="search" placeholder="Search..." value="" />
</form>
       </div>
   <?php
}