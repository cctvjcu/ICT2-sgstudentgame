<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="shortcut icon" href="<?php echo of_get_option('favicon'); ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo bloginfo('name'); ?></title>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/general.css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/buddypress.css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bbpress.css" />
<?php if (of_get_option('color_scheme')=="0" or of_get_option('color_scheme')=="1") { ?>
<!-- link href="http://fonts.googleapis.com/css?family=Oswald:400,700,300" rel="stylesheet" type="text/css" -->
<link href='http://fonts.googleapis.com/css?family=VT323' rel='stylesheet' type='text/css'>
<!-- Included CSS Files -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/red_css/main.css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/red_css/devices.css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/red_css/paralax_slider.css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/red_css/jquery.fancybox.css?v=2.1.2" type="text/css"  media="screen" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/red_css/bxSlider.css" />
<!--[if IE]>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/red_css/ie.css">
<![endif]-->
<?php } ?>
<?php if (of_get_option('color_scheme')=="2") { ?>
<!-- link href="http://fonts.googleapis.com/css?family=Oswald:400,700,300" rel="stylesheet" type="text/css" -->
<link href='http://fonts.googleapis.com/css?family=VT323' rel='stylesheet' type='text/css'>
<!-- Included CSS Files -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/blue_css/main.css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/blue_css/devices.css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/blue_css/paralax_slider.css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/blue_css/jquery.fancybox.css?v=2.1.2" type="text/css"  media="screen" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/blue_css/bxSlider.css" />
<!--[if IE]>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/blue_css/ie.css">
<![endif]-->
<?php }
 ?>
<style>


html{
<?php
if(of_get_option('background_fix') != 1){
    ?>
	background:url(<?php echo of_get_option('footer_bg'); ?>) <?php if(of_get_option('repeat') == 'b1'){echo "no-repeat";}elseif(of_get_option('repeat') == 'b2'){echo "repeat-y";}elseif(of_get_option('repeat') == 'b3'){echo "repeat-x";}else{echo "repeat";} ?> center bottom <?php echo of_get_option('bg_color'); ?>;
<?php

}
?>
background-color:<?php echo of_get_option('bg_color'); ?>;
}
body{
<?php
if(of_get_option('background_fix') == 1){

    ?>
        background-attachment: fixed !important;
<?php

}
?>
	background:url(<?php echo of_get_option('header_bg'); ?>) no-repeat center top;
}

</style>

<?php wp_head(); ?>
</head>
<body  <?php body_class(); ?>>
<?php
$general_post_show  = of_get_option('general_post_show');
	if((is_home()) || (is_front_page())){
update_option('posts_per_page',$general_post_show);
} else {
update_option('posts_per_page',5);
}
?>
<?php if (of_get_option('color_scheme')=="0" or of_get_option('color_scheme')=="1") { ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/red_css/post.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/red_css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<?php } ?>
<?php if (of_get_option('color_scheme')=="2") { ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/blue_css/post.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/blue_css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<?php } ?>
<!--********************************************* Main wrapper Start *********************************************-->
<div id="main_wrapper">
<!--********************************************* Logo Start *********************************************-->
<div id="logo">
  <?php if (of_get_option('logo')!=""){ ?>
  <a href="<?php  echo home_url(); ?>"> <img src="<?php echo of_get_option('logo'); ?>" alt="logo"  /> </a>
  <?php } else { ?>
  <a href="<?php  echo home_url(); ?>"><img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/red_css/images/logo.png"  /></a>
  <?php } ?>
  <div id="social_ctn">
    <?php if (of_get_option('color_scheme')=="0" or of_get_option('color_scheme')=="1") { ?>
    <a class="social_t"><img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/red_css/images/social_tleft.png" /></a>
    <?php } ?>
    <?php if (of_get_option('color_scheme')=="2") { ?>
    <a class="social_t"><img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/blue_css/images/social_tleft.png" /></a>
    <?php } ?>
    <?php if ( of_get_option('rss') ) { ?>
    <a href="<?php echo of_get_option('rss_link'); ?>" id="rss"><img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/red_css/images/blank.gif" width="100%" height="37px" /></a>
    <?php } ?>
    <?php if ( of_get_option('facebook') ) { ?>
    <a href="<?php echo of_get_option('facebook_link'); ?>" id="facebook"><img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/red_css/images/blank.gif" width="100%" height="37px" /></a>
    <?php } ?>
    <?php if ( of_get_option('twitter') ) { ?>
    <a href="<?php echo of_get_option('twitter_link'); ?>" id="twitter"><img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/red_css/images/blank.gif" width="100%" height="37px" /></a>
    <?php } ?>
    <?php if ( of_get_option('googleplus') ) { ?>
    <a href="<?php echo of_get_option('google_link'); ?>" id="google_plus"><img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/red_css/images/blank.gif" width="100%" height="37px" /></a>
    <?php } ?>
    <?php if ( of_get_option('youtube') ) { ?>
    <a href="<?php echo of_get_option('youtube_link'); ?>" id="you_tube"><img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/red_css/images/blank.gif" width="100%" height="37px" /></a>
    <?php } ?>
	<?php if ( of_get_option('steam') ) { ?>
    <a href="<?php echo of_get_option('steam_link'); ?>" id="steam"><img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/red_css/images/blank.gif" width="100%" height="37px" /></a>
    <?php } ?>
    <?php if (of_get_option('color_scheme')=="0" or of_get_option('color_scheme')=="1") { ?>
    <a class="social_t"><img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/red_css/images/social_tright.png" /></a>
    <?php } ?>
    <?php if (of_get_option('color_scheme')=="2") { ?>
    <a class="social_t"><img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/blue_css/images/social_tright.png" /></a>
    <?php } ?>
  </div>
</div>
<!--********************************************* Logo end *********************************************-->
<!--********************************************* Main_in Start *********************************************-->
<div id="main_in">
<!--********************************************* Mainmenu Start *********************************************-->
<div id="menu_wrapper">

  <div id="menu_left"></div>
   <?php if(has_nav_menu('header-menu')) { ?>
  <ul id="menu">
    <?php wp_nav_menu(); ?>
  </ul>
   <?php }else { ?>
   <ul  id="menu"><li>
    <a href=""><?php _e('No menu assigned!', 'orizon'); ?></a>
   </li></ul>
   <?php } ?>
  <a href="#" id="pull"><?php _e('Menu', 'orizon'); ?></a>
  <div id="menu_right"></div>
  <div class="clear"></div>
</div>