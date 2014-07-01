<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package gdedu
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
<div class="top">晚上好！欢迎来到广东教育视频网 [<a href="#" class="r">登录</a>] 广东-广州 [<a href="#" class="b">更换</a>] <span><a href="#" class="w">设置</a> | <a href="#" class="w">帮助中心</a> | <a href="#" class="w">退出</a> </span></div>

<div class="logo">
  <div class="logo_left"></div>
  <div id="head_searchbox" class="logo_right"><?php get_search_form(); ?></div>
</div>

<nav id="site-navigation" class="main-navigation" role="navigation">
        <div class="nav">
            <?php wp_nav_menu( array(
                'theme_location' => 'primary',
                'link_before' => '<span>',
                'link_after' => '</span>'
            )); ?>
        </div>
</nav><!-- #site-navigation -->


	<div id="content" class="site-content">

<?php
		global $global_title;
		if(is_category()){
			$global_title = single_cat_title('',false);
		}elseif(is_tag()){
			$global_title = single_tag_title('',false);
		}elseif(is_tax()){
			$global_title = single_term_title('',false);
		}elseif(is_author()){
			$global_title = __("Author: ",'cactusthemes') . get_the_author();
		}elseif(is_day()){
			$global_title = __("Archives for ",'cactusthemes') . date_i18n(get_option('date_format') ,strtotime(get_the_date()));
		}elseif(is_month()){
			$global_title = __("Archives for ",'cactusthemes') . get_the_date('F, Y');
		}elseif(is_year()){
			$global_title = __("Archives for ",'cactusthemes') . get_the_date('Y');
		}elseif(is_home()){
			if(get_option('page_for_posts')){ $global_title = get_the_title(get_option('page_for_posts'));
			}else{
				$global_title = get_bloginfo('name');
			}
		}elseif(is_404()){
			$global_title = '404!';
		}else{
			global $post;
			if($post)
				$global_title = $post->post_title;
		}
