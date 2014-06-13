<?php 
	// Navigation part of template
	$topnav_style = ot_get_option('topnav_style','dark');
	$fixed = ot_get_option('topnav_fixed');
?>
	<?php tm_display_ads('ad_top_1');?>
		<?php if(ot_get_option('disable_mainmenu') != "1"){?>
        <div id="top-nav" class="<?php echo $topnav_style=='light'?'topnav-light light-div':'topnav-dark'; echo $fixed?' fixed-nav':''; ?>">
			<nav class="navbar <?php echo $topnav_style=='dark'?'navbar-inverse':'' ?> navbar-static-top" role="navigation">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle<?php if(ot_get_option('mobile_nav',1)){ echo ' off-canvas-toggle"';}else{ ?>" data-toggle="collapse" data-target=".navbar-collapse"<?php } ?>>
						  <span class="sr-only"><?php _e('Toggle navigation','cactusthemes') ?></span>
						  <i class="fa fa-reorder fa-lg"></i>
						</button>
                        <?php if(ot_get_option('logo_image') == ''):?>
						<a class="logo" href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri() ?>/images/logo.png" alt="logo"></a>
                        <?php else:?>
                        <a class="logo" href="<?php echo get_home_url(); ?>" title="<?php wp_title( '|', true, 'right' ); ?>"><img src="<?php echo ot_get_option('logo_image'); ?>" alt="<?php wp_title( '|', true, 'right' ); ?>"/></a>
						<?php endif;?>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="main-menu collapse navbar-collapse">
						<!--<form class="navbar-form navbar-right search-form" role="search">
							<label class="" for="s">Search for:</label>
							<input type="text" placeholder="SEARCH" name="s" id="s" class="form-control">
							<input type="submit" id="searchsubmit" value="Search">
						</form>-->
						<ul class="nav navbar-nav navbar-right hidden-xs">
						<?php
							if(has_nav_menu( 'main-navigation' )){
								wp_nav_menu(array(
									'theme_location'  => 'main-navigation',
									'container' => false,
									'items_wrap' => '%3$s',
									'walker'=> new custom_walker_nav_menu()
								));	
							}else{?>
								<li><a href="<?php echo home_url(); ?>/"><?php _e('Home','cactusthemes') ?></a></li>
								<?php wp_list_pages('depth=1&number=5&title_li=' ); ?>
						<?php } ?>
						</ul>
                        <?php if(!ot_get_option('mobile_nav',1)){ //is classic dropdown ?>
                            <!--mobile-->
                            <ul class="nav navbar-nav navbar-right visible-xs classic-dropdown">
                            <?php
                                if(has_nav_menu( 'main-navigation' )){
                                    wp_nav_menu(array(
                                        'theme_location'  => 'main-navigation',
                                        'container' => false,
                                        'items_wrap' => '%3$s'
                                    ));	
                                }else{?>
                                    <li><a href="<?php echo home_url(); ?>/"><?php _e('Home','cactusthemes') ?></a></li>
                                    <?php wp_list_pages('depth=1&number=5&title_li=' ); ?>
                            <?php } ?>
                            </ul>
                        <?php } ?>
					</div><!-- /.navbar-collapse -->
				</div>
			</nav>
		</div><!-- #top-nav -->
		<?php }
		
		$search_icon = ot_get_option('search_icon');
		$show_top_headline = ot_get_option('show_top_headline');
		$social_account = array(
			'facebook',
			'twitter',
			'linkedin',
			'tumblr',
			'google-plus',
			'pinterest',
			'youtube',
			'flickr',
		);
		?>
        <div id="headline" class="<?php echo $topnav_style=='light'?'topnav-light light-div':'topnav-dark'; echo $fixed?' is-fixed-nav':''; ?>">
            <div class="container">
                <div class="row">
                	<?php if(is_front_page()){
						$count = 0;
						foreach($social_account as $social){
							if($link = ot_get_option('acc_'.$social,false)){
								$count++;
							}
						}
						if($search_icon==1 && $show_top_headline == 0 && $count == 0 ){
							 echo '<style>
							 	#headline{ display:none}
							 </style>';
						}
					?>
                    <div class="headline-content col-md-6 col-sm-6 hidden-xs">
                    	<?php if ( is_active_sidebar( 'headline_sidebar' ) ) : ?>
							<?php dynamic_sidebar( 'headline_sidebar' ); ?>
                        <?php else:
								
								$number_item = ot_get_option('number_item_head_show');
								$icon_headline = ot_get_option('icon_headline');
								$title_headline = ot_get_option('title_headline');
								$cat= ot_get_option('cat_head_video');
								if($show_top_headline!=0){
                             		echo do_shortcode('[headline link="yes" icon="'.$icon_headline.'" sortby="rand" cat="'.$cat.'" posttypes="post" number="'.$number_item.'" title="'.$title_headline.'" ]');
								}?>
                        <?php endif; ?>
                    </div>
                    <?php }elseif(is_active_sidebar('pathway_sidebar')){
							echo '<div class="pathway pathway-sidebar col-md-6 hidden-xs">';
							dynamic_sidebar('pathway_sidebar');
							echo '</div>';
						}else{?>
                    <div class="pathway col-md-6 col-sm-6 hidden-xs">
                    	<?php if(function_exists('tm_breadcrumbs')){ tm_breadcrumbs(); } ?>
                    </div>
                    <?php } ?>
                    <div class="social-links col-md-6 col-sm-6">
                    	<div class="pull-right">
                        <?php 
						$file = get_post_meta($post->ID, 'tm_video_file', true);
						$url = trim(get_post_meta($post->ID, 'tm_video_url', true));
						$user_turnoff = ot_get_option('user_turnoff_load_next');
						$auto_load= ot_get_option('auto_load_next_video');
						if((strpos($file, 'youtube.com') !== false)&&(@$using_yt_param !=1) ||(strpos($url, 'youtube.com') !== false )&&(@$using_yt_param !=1) || (strpos($file, 'vimeo.com') !== false)||(strpos($url, 'vimeo.com') !== false )) { 
						if(is_single()){
						?>
                            <div class="tm-autonext" id="tm-autonext">
                            <script>
                            jQuery(document).ready(function(e) {
                                jQuery('#tm-autonext').toggle(function(){
									  jQuery('#tm-autonext span#autonext').removeClass('autonext');
									  jQuery('#tm-autonext .tooltip-inner').html('<?php _e('Auto Next OFF','cactusthemes') ?>');
									  jQuery('#tm-autonext .gptooltip.turnoffauto').attr('data-original-title', '<?php _e('Auto Next OFF','cactusthemes') ?>');
                                },
                                function(){
									  jQuery('#tm-autonext span#autonext').addClass('autonext');
									  jQuery('#tm-autonext .tooltip-inner').html('<?php _e('Auto Next ON','cactusthemes') ?>');
									  jQuery('#tm-autonext .gptooltip.turnoffauto').attr('data-original-title', '<?php _e('Auto Next ON','cactusthemes') ?>');
                                });	
                            });
                            </script>
                            <?php if($user_turnoff==1){?>
                            <span class="autonext" id="autonext" >
                                <a href="#" data-toggle="tooltip" title="<?php _e('Auto Next ON','cactusthemes') ?>" class="gptooltip turnoffauto" data-animation="true">
                                    <i class="fa fa-play"></i>
                                </a>
                            </span>
                            <?php }?>
                            </div>
                        <?php 
						}
						} ?>
                        <?php 
						foreach($social_account as $social){
							if($link = ot_get_option('acc_'.$social,false)){
							?>
                        	<a class="social-icon<?php echo $topnav_style=='dark'?' maincolor1 bordercolor1hover bgcolor1hover':'' ?>" href="<?php echo $link ?>"><i class="fa fa-<?php echo $social ?>"></i></a>
                        <?php } } ?>
                        <?php 
						if($search_icon!=1){ ?>
                        <a class="search-toggle social-icon<?php echo $topnav_style=='dark'?' maincolor1 bordercolor1hover bgcolor1hover':'' ?>" href="#"><i class="fa fa-search"></i></a>
                        <?php }?>
                        <div class="headline-search">
							<?php if ( is_active_sidebar( 'search_sidebar' ) ) : ?>
                                <?php dynamic_sidebar( 'search_sidebar' ); ?>
                            <?php else: ?>
                                <form class="dark-form" action="<?php echo home_url() ?>">
                                    <div class="input-group">
                                        <input type="text" name="s" class="form-control" placeholder="<?php echo __('Seach for videos','cactusthemes');?>">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default maincolor1 maincolor1hover" type="submit"><i class="fa fa-search"></i></button>
                                        </span>
                                    </div>
                                </form>
                            <?php endif; ?>
                            </div><!--/heading-search-->
                        </div>
                    </div>
                </div><!--/row-->
				
				<?php tm_display_ads('ad_top_2');?>
            </div><!--/container-->			
        </div><!--/headline-->
