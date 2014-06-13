<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 */
?>
    <footer class="dark-div">
		<?php if ( is_404() && is_active_sidebar( 'footer_404_sidebar' ) ) { ?>
    	<div id="bottom">
            <div class="container">
                <div class="row">
					<?php dynamic_sidebar( 'footer_404_sidebar' ); ?>                    
                </div><!--/row-->
            </div><!--/container-->
        </div><!--/bottom-->
		<?php } elseif ( is_active_sidebar( 'footer_sidebar' ) ) { ?>
    	<div id="bottom">
            <div class="container">
                <div class="row">
					<?php dynamic_sidebar( 'footer_sidebar' ); ?>                    
                </div><!--/row-->
            </div><!--/container-->
        </div><!--/bottom-->
		<?php } ?>
		<?php tm_display_ads('adv_foot');?>
					
        <div id="bottom-nav">
        	<div class="container">
                <div class="row">
					<div class="copyright col-md-6"><?php echo ot_get_option('copyright',get_bloginfo('name').' - '.get_bloginfo('description')); ?></div>
					<nav class="col-md-6">
                    	<ul class="bottom-menu list-inline pull-right">
                        	<?php
								if(has_nav_menu( 'footer-navigation' )){
									wp_nav_menu(array(
										'theme_location'  => 'footer-navigation',
										'container' => false,
										'items_wrap' => '%3$s'
									));	
								}?>
                        </ul>
                    </nav>
				</div><!--/row-->
            </div><!--/container-->
        </div>
    </footer>
    <div class="wrap-overlay"></div>
</div><!--wrap-->
<?php if(ot_get_option('mobile_nav',1)){ ?>
<div id="off-canvas">
    <div class="off-canvas-inner">
        <nav class="off-menu">
            <ul>
            <li class="canvas-close"><a href="#"><i class="fa fa-times"></i> <?php _e('Close','cactusthemes'); ?></a></li>
			<?php
                if(has_nav_menu( 'main-navigation' )){
                    wp_nav_menu(array(
                        'theme_location'  => 'main-navigation',
                        'container' => false,
                        'items_wrap' => '%3$s'
                    ));	
                }else{?>
                    <li><a href="<?php echo home_url(); ?>/"><?php _e('Home','cactusthemes'); ?></a></li>
                    <?php wp_list_pages('title_li=' ); ?>
            <?php } ?>
            </ul>
        </nav>
    </div>
</div><!--/off-canvas-->
<script>off_canvas_enable=1;</script>
<?php }?>
<?php if(ot_get_option('theme_layout',false)){ ?>
</div><!--/boxed-container-->
<?php }?>
<div class="bg-ad">
	<div class="container">
    	<div class="bg-ad-left">
			<?php tm_display_ads('ad_bg_left');?>
        </div>
        <div class="bg-ad-right">
			<?php tm_display_ads('ad_bg_right');?>
        </div>
    </div>
</div>
</div><!--/body-wrap-->
<?php if(!ot_get_option('theme_layout') && (ot_get_option('adsense_slot_ad_bg_left')||ot_get_option('ad_bg_left')||ot_get_option('adsense_slot_ad_bg_right')||ot_get_option('ad_bg_right')) ){ //fullwidth layout ?>
<script>
	enable_side_ads = true;
</script>
<?php } ?>
<a href="#top" id="gototop" class="notshow" title="Go to top"><i class="fa fa-angle-up"></i></a>



<?php echo ot_get_option('google_analytics_code', ''); ?>
<?php wp_footer(); ?>
</body>
</html>
