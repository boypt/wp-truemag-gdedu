<?php
$single_layout_blog = ot_get_option('single_layout_blog');
if($single_layout_blog=='full_width'){
$single_show_image = get_post_meta(get_the_ID(),'show_feature_image', true);
if($single_show_image=='3'){if(function_exists('ot_get_option')){
	$single_show_image = ot_get_option('single_show_image');}
}
if($single_show_image!='1'){
?>  
		<div class="single-full-width" id="player">
        	<div class="container">
            	<div class="video-player">
                	<div class="player-content">
                    	<div id="player-embed">
                        <?php 
                        if(has_post_thumbnail()){
							$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'full', true); ?>
                            <div id="post-thumb"><img src="<?php echo $thumbnail[0] ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>"></div><br />
                        <?php 
						?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                  </div>
               </div>
           </div>
<?php 						
		} 
	}
}
?>