		<div id="slider">
        <?php
		$header_style = ot_get_option('header_home_style','carousel');
		if(is_page_template('page-templates/front-page.php')){
			$header_style = get_post_meta(get_the_ID(),'header_style',true)?get_post_meta(get_the_ID(),'header_style',true):$header_style;
		}
		$condition = ot_get_option('header_home_condition','lastest');
		$ids = ot_get_option('header_home_postids','');
		$categories = ot_get_option('header_home_cat','');
		$tags = ot_get_option('header_home_tag','');
		$sort_by = ot_get_option('header_home_order','DESC');
		$count = ot_get_option('header_home_number',12);
		$themes_pur='';
		if(function_exists('ot_get_option')){ $themes_pur= ot_get_option('theme_purpose');}
		if($header_style!='sidebar'){
			$content_helper = new CT_ContentHelper;	
			global $header_query;
			$header_query = $content_helper->tm_get_popular_posts($condition, $tags, $count, $ids,$sort_by, $categories, $args = array(),$themes_pur);
		}
		if($header_style=='carousel'){
			get_template_part( 'header', 'home-carousel' );
		}elseif($header_style=='classy'){
			get_template_part( 'header', 'home-classy' );
		}elseif($header_style=='classy2'){
			get_template_part( 'header', 'home-classy-horizon' );
		}elseif($header_style=='metro'){
			get_template_part( 'header', 'home-metro' );
		}else{
			if ( is_active_sidebar( 'maintop_sidebar' ) ) :
			$maintop_layout = ot_get_option('maintop_layout','full');	
			if($maintop_layout=='boxed'){ ?>
            <div class="container">
            <?php } ?>
                <?php dynamic_sidebar( 'maintop_sidebar' ); ?>
            <?php if($maintop_layout=='boxed'){ ?>
            </div><!--/container-->
            <?php } ?>
            <?php endif;
		} //else $header_style ?>
        </div><!--/slider-->
