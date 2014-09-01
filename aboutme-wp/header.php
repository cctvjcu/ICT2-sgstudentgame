<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?> </title>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/includes/fallback.css" />
<!--[if lt IE 9]> 
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/includes/ie8.css" />
<![endif]-->
<link rel="shortcut icon" href="<?php echo get_option('AboutMe_favicon') ?>" type="image/x-icon" />
<?php
$firstfontlink = get_option('AboutMe_fontheadinglink'); 
$secondfontlink = get_option('AboutMe_fontlink'); 
if (!empty($firstfontlink)) { echo stripslashes($firstfontlink); }
if (!empty($secondfontlink)) { echo stripslashes($secondfontlink); }   
?>    
<?php get_template_part( 'includes/styles', 'template'); ?>
<?php 
$customcode = get_option('AboutMe_customcode'); 
if (!empty($customcode)) { echo stripslashes($customcode); }
?>
<?php $class = 'impress-not-supported' ?>
<?php wp_head(); ?>
</head><body id="body" <?php body_class( $class ); ?>>