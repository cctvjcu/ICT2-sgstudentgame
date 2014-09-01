<?php
add_action( 'wp_enqueue_scripts', 'script_register' ); 
function script_register() {
wp_enqueue_script("jquery");
wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js','','',true);
wp_enqueue_script('impress', get_template_directory_uri() . '/js/impress.js','','',true);
wp_enqueue_script('lightbox', get_template_directory_uri() . '/js/jquery.colorbox-min.js','','',true);
if ( is_page_template('homepage.php') ) {    
wp_enqueue_script('nivo', get_template_directory_uri() . '/js/jquery.nivo.slider.js','','',true);
wp_enqueue_script('raphael', get_template_directory_uri() . '/js/raphael.js','','',true);
wp_enqueue_script('initjs', get_template_directory_uri() . '/js/init.js','','',true);
}
wp_enqueue_script('impresstrg', get_template_directory_uri() . '/js/impresstrigger.js','','',true);
}
?>