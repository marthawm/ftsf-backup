document.addEventListener('DOMContentLoaded', blogPage);

function blogPage(){

	var block_url;

	(function($){

		var admin_ajax ="wp-admin/admin-ajax.php";		


		$(document).on('click','.block', function(event){
			event.preventDefault();	

			window.block_url = $(this).find('a:first').attr('href').toLowerCase().split(" ").join("-");
			history.pushState({}, '', window.block_url);
		})
			
		$(document).on('click','.blog-title a', function(event){
			event.preventDefault();

			var post_id = $(this).attr('rel');
			var blog_url = $(this).attr('href');					
			
			$.ajax({ 
				//cache: true,
				url: admin_ajax,
				type: 'get',
				dataType: "json",				
				data: { 
					action:'ftsf_single_post_ajax'
				},
				
				success: function(result){
					if(result){
						$.each(result, function(index, value, content){
							if(value['id'] == post_id){
								$(".blog-overview-box").hide();
								$(".wp-pagenavi" ).hide();
								$(".ajax-blog-title").html(value['title']);
								$(".ajax-blog-content").html(value['content']); 
								 //console.log(value['content']);
								 // console.log(value);							
							}
						})					
					}
					history.pushState({}, '', blog_url);
				},
				error: function(xhr){
					console.log(xhr);
				}
			})

		})

		$(document).on('click','.block-page-title', function(event){
			event.preventDefault();

             $(".ajax-blog-title" ).html('');
	 		 $(".ajax-blog-content" ).html('');
             $(".blog-overview-box").show();
             $(".wp-pagenavi" ).show();
             history.pushState({}, '', window.block_url);
                         

		})
		//function to return page number
		function page_number(element){

			element.find('page smaller').remove();
			return parseInt( element.html() );

		}

		
		$(document).on('click','.blog-page-numbers a, .grid-container, .mobile-grid-container', function(event, element){
			event.preventDefault();	
			var page  = page_number($(this).clone());
			
			$.ajax({
				url: admin_ajax,
				type: 'post',
				data: {
					action: 'ftsf_recent_posts_ajax',
					query_vars: admin_ajax.query_vars,
					page: page
				},
				dataType:'html',
				success: function(html) {
				 // console.log(typeof html);
				  $('#blog-items-container').html(html);					
				},
				beforeSend: function(){
					// make page more user friendly//afterSend()
				}
			})

		})

				
	})(jQuery);
	
}


