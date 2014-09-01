<?php
if ( !defined('ABSPATH')) exit;
define( 'DISALLOW_UNFILTERED_HTML', true );

add_filter( 'show_admin_bar', '__return_false' ); 
add_theme_support( 'menus' );
add_theme_support( 'automatic-feed-links' );
$args = array(
	'default-color' => 'ffffff',
	'default-image' => get_template_directory_uri() . '/images/bg.png',
);
add_theme_support( 'custom-background', $args );

add_theme_support( 'post-thumbnails' );
add_image_size( 'square-large', 370, 370, true );
add_image_size( 'portfolio-thumbnail', 164, 120, true );

if ( ! function_exists( 'aboutme_image_sizes' ) ) {
function aboutme_image_sizes($sizes) {
    $addsizes = array(
        "square-large" => __( 'Square image', 'aboutme-wp'),
        "portfolio-thumbnail" => __( 'Portfolio Thumbnail', 'aboutme-wp')
    );
    $newsizes = array_merge($sizes, $addsizes);
    return $newsizes;
}
}

load_theme_textdomain( 'aboutme-wp', get_template_directory() .'/languages' );
$locale = get_locale();
$locale_file = get_template_directory() . "/languages/$locale.php";
if ( is_readable($locale_file) )
	require_once($locale_file);

/* ----------------------------------------------------------
Declare vars
------------------------------------------------------------- */
$themename = "About Me";
$shortname = "AboutMe";
 
/*---------------------------------------------------
register settings
----------------------------------------------------*/
register_sidebar( @$args );
dynamic_sidebar( @$index );

if ( ! function_exists( 'theme_settings_init' ) ) {
function theme_settings_init(){
register_setting( 'theme_settings', 'theme_settings' );
wp_enqueue_style('panel_style', get_template_directory_uri() . '/includes/panel.css', false, '1.0');
wp_enqueue_script('panel_script', get_template_directory_uri() . '/includes/panel.js', false, '1.0');
}
add_action( 'admin_init', 'theme_settings_init' );
}    
    
if ( ! function_exists( 'load_theme_scripts' ) ) {
function load_theme_scripts() {
    wp_enqueue_style( 'farbtastic' );
    wp_enqueue_script( 'farbtastic' );
}
add_action('admin_init', 'load_theme_scripts');
    
}

if ( ! function_exists( 'aboutme_menu' ) ) {
function aboutme_menu() {
register_nav_menus(
array(
'sub-menu' => __( 'Main Menu', 'aboutme-wp' )
)
);
}
add_action( 'init', 'aboutme_menu' );
}

/*---------------------------------------------------
add settings page to menu
----------------------------------------------------*/

if ( ! function_exists( 'add_settings_page' ) ) {
function add_settings_page() {
add_theme_page( __( 'Theme Settings', 'aboutme-wp'), __( 'Theme Settings', 'aboutme-wp'), 'manage_options', 'settings', 'theme_settings_page');
}
add_action( 'admin_menu', 'add_settings_page' );    
}

/*---------------------------------------------------
Custom comment Links
----------------------------------------------------*/

add_filter('comment_reply_link', 'ajax_reply');
add_filter('cancel_comment_reply_link', 'ajax_reply');
add_filter('get_comment_link', 'redirect_after_comment');

function redirect_after_comment($location)
{
    return preg_replace("/#comment-([\d]+)/", "#/page", $location);
}
function ajax_reply($content) {
       $pattern = "#respond";
       $replacement = "#respond#/page";
       $content = str_replace($pattern, $replacement, $content);  
       return $content;
}

/*---------------------------------------------------
turn off Magic Quotes of Tinymce
----------------------------------------------------*/
if (get_magic_quotes_gpc()) {
    $process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
    while (list($key, $val) = each($process)) {
        foreach ($val as $k => $v) {
            unset($process[$key][$k]);
            if (is_array($v)) {
                $process[$key][stripslashes($k)] = $v;
                $process[] = &$process[$key][stripslashes($k)];
            } else {
                $process[$key][stripslashes($k)] = stripslashes($v);
            }
        }
    }
    unset($process);
}
if ( ! isset( $content_width ) ) $content_width = 900;
if ( is_singular() ) wp_enqueue_script( "comment-reply" );

/*---------------------------------------------------
Tinymce custom buttons
----------------------------------------------------*/
if ( ! function_exists( 'add_iframe' ) ) {
function add_iframe($arr) {
	$arr['extended_valid_elements'] = "iframe[id|class|title|style|align|frameborder|height|longdesc|marginheight|marginwidth|name|scrolling|src|width]";
	return $arr;
}
add_filter('tiny_mce_before_init', 'add_iframe');
}    
 
global $allowedposttags;
$allowedposttags["iframe"] = array(
        "id" => array(),
		"class" => array(),
		"title" => array(),
		"style" => array(),
		"align" => array(),
		"frameborder" => array(),
		"longdesc" => array(),
		"marginheight" => array(),
		"marginwidth" => array(),
		"name" => array(),
		"scrolling" => array(),
		"src" => array(),
        "height" => array(),
        "width" => array()
);

if ( ! function_exists( 'add_button' ) ) {
function add_button() {  
   if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )  
   {  
     add_filter('mce_external_plugins', 'add_plugin');  
     add_filter('mce_buttons', 'register_button');  
   }  
}  
}

if ( ! function_exists( 'register_button' ) ) {
function register_button($buttons) {  
   array_push($buttons, "accordion");
   array_push($buttons, "resume");  
   return $buttons;  
} 
}

if ( ! function_exists( 'add_plugin' ) ) {
function add_plugin($plugin_array) {  
   $plugin_array['accordion'] = get_stylesheet_directory_uri() .'/includes/panel.js';  
   $plugin_array['resume'] = get_stylesheet_directory_uri() .'/includes/panel.js'; 
   return $plugin_array;  
}
}
/*---------------------------------------------------
add lightbox to all post images
----------------------------------------------------*/
add_filter('the_content', 'my_addlightboxrel');
function my_addlightboxrel($content) {
       global $post;
       $pattern ="/<a(.*?)href=('|\")(.*?).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>/i";
       $replacement = '<a$1href=$2$3.$4$5 class="clbphoto" title="'.$post->post_title.'"$6>';
       $content = preg_replace($pattern, $replacement, $content);
       return $content;
}
/*---------------------------------------------------
custom more link
----------------------------------------------------*/
if ( ! function_exists( 'new_excerpt_more' ) ) {
function new_excerpt_more($more) {
       global $post;
	return '<a class="moretag" href="'. get_permalink($post->ID) . '"> Read More...</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');
}
 
/* ---------------------------------------------------------
Declare options
----------------------------------------------------------- */
 
$theme_options = array (
 
array( "name" => $themename." Options",
"type" => "title"),
 
/* ---------------------------------------------------------
General section
----------------------------------------------------------- */
array( "name" => "General",
"type" => "section"),
array( "type" => "open"),
 
array( "name" => "Custom Favicon",
"desc" => "",
"id" => $shortname."_favicon",
"type" => "media",
"std" => get_template_directory_uri() ."/images/favicon.ico"),

array( "name" => "Custom Header Script",
"desc" => "You can use this field to add custom scripts,styles,Google Analystics Tracking code etc.",
"id" => $shortname."_customcode",
"type" => "textarea",
"std" => ""),

array( "name" => "Warning Text For Old Browsers",
"desc" => "Warning Text For Old Browsers (If you don't want to show, leave blank)",
"id" => $shortname."_warning",
"type" => "textarea",
"std" => ""),

array( "name" => "Hide Sub-Navigation",
"desc" => "Hide Sub-Navigation",
"id" => $shortname."_hide_subnav",
"type" => "checkbox",
"std" => ""),

array( "name" => "Hide Search Box",
"desc" => "Hide Search Box",
"id" => $shortname."_hide_search",
"type" => "checkbox",
"std" => ""),
 
array( "name" => "Hide Vard",
"desc" => "Hide Vcard and Menu Icon",
"id" => $shortname."_hide_homepage",
"type" => "checkbox",
"std" => ""),

array( "name" => "Hide About Me",
"desc" => "Hide About Me and Menu Icon",
"id" => $shortname."_hide_about",
"type" => "checkbox",
"std" => ""),

array( "name" => "Hide Resume",
"desc" => "Hide Resume and Menu Icon",
"id" => $shortname."_hide_resume",
"type" => "checkbox",
"std" => ""),

array( "name" => "Hide Skills",
"desc" => "Hide Skills and Menu Icon",
"id" => $shortname."_hide_skills",
"type" => "checkbox",
"std" => ""),

array( "name" => "Hide Portfolio",
"desc" => "Hide Portfolio and Menu Icon",
"id" => $shortname."_hide_portfolio",
"type" => "checkbox",
"std" => ""),

array( "name" => "Hide Contact",
"desc" => "Hide Contact and Menu Icon",
"id" => $shortname."_hide_contact",
"type" => "checkbox",
"std" => ""),

array( "name" => "Show Blog",
"desc" => "Show Blog Menu Icon",
"id" => $shortname."_hide_blog",
"type" => "checkbox",
"std" => ""),

array( "name" => "Blog Page Link",
"desc" => "Create a blank page (select blog page template for this page). After that copy the page link and paste here.",
"id" => $shortname."_blog_link",
"type" => "text",
"std" => "#"),

array( "name" => "Hide Footer",
"desc" => "Hide Footer and Menu Icon",
"id" => $shortname."_hide_footer",
"type" => "checkbox",
"std" => ""),
 
array( "type" => "close"),

/* ---------------------------------------------------------
Menu section
----------------------------------------------------------- */

array( "name" => "Menu",
"type" => "section"),
array( "type" => "open"),

array( "name" => "Menu Text Sizes",
"desc" => "Menu Text Sizes",
"id" => $shortname."_menu_text_size",
"type" => "text",
"std" => "28px"),
 
array( "name" => "Homepage Text",
"desc" => "Homepage menu text",
"id" => $shortname."_homepage_text",
"type" => "text",
"std" => ""),

array( "name" => "About Me Text",
"desc" => "About me menu text",
"id" => $shortname."_aboutme_text",
"type" => "text",
"std" => ""),

array( "name" => "Resume Text",
"desc" => "Resume menu text",
"id" => $shortname."_resume_text",
"type" => "text",
"std" => ""),

array( "name" => "Skills Text",
"desc" => "Skills menu text",
"id" => $shortname."_skills_text",
"type" => "text",
"std" => ""),

array( "name" => "Portfolio Text",
"desc" => "Portfolio menu text",
"id" => $shortname."_portfolio_text",
"type" => "text",
"std" => ""),

array( "name" => "Blog Text",
"desc" => "Blog menu text",
"id" => $shortname."_blog_text",
"type" => "text",
"std" => ""),

array( "name" => "Contact Text",
"desc" => "Contact menu text",
"id" => $shortname."_contact_text",
"type" => "text",
"std" => ""),
    
array( "type" => "close"),    
    
/* ---------------------------------------------------------
Fonts
----------------------------------------------------------- */

array( "name" => "Fonts",
"type" => "section"),
array( "type" => "open"),
    
array( "name" => "First Link (Titles)",
"desc" => "Google Web Fonts Stylesheet Link (For more information please look at the HELP DOCUMENTION)",
"id" => $shortname."_titlefontlink",
"type" => "text",
"std" => ""),

array( "name" => "First Font-Family",
"desc" => "",
"id" => $shortname."_titlefontfamily",
"type" => "text",
"std" => ""), 

array( "name" => "Second Link",
"desc" => "Google Web Fonts Stylesheet Link",
"id" => $shortname."_fontlink",
"type" => "text",
"std" => ""),

array( "name" => "Second Font-Family",
"desc" => "",
"id" => $shortname."_fontfamily",
"type" => "text",
"std" => ""), 

array( "name" => "H1 (px)",
"desc" => "",
"id" => $shortname."_h1",
"type" => "text",
"std" => "70px"),
    
array( "name" => "H2 (px)",
"desc" => "",
"id" => $shortname."_h2",
"type" => "text",
"std" => "60px"),

array( "name" => "H3 (px)",
"desc" => "",
"id" => $shortname."_h3",
"type" => "text",
"std" => "45px"),

array( "name" => "H4 (px)",
"desc" => "",
"id" => $shortname."_h4",
"type" => "text",
"std" => "38px"),

array( "name" => "H5 (px)",
"desc" => "",
"id" => $shortname."_h5",
"type" => "text",
"std" => "30px"),

array( "name" => "H6 (px)",
"desc" => "",
"id" => $shortname."_h6",
"type" => "text",
"std" => "24px"),

array( "name" => "P (px)",
"desc" => "",
"id" => $shortname."_p",
"type" => "text",
"std" => "20px"),
    
array( "type" => "close"),    

/* ---------------------------------------------------------
Styles section
----------------------------------------------------------- */

array( "name" => "Styles",
"type" => "section"),
array( "type" => "open"),   

array( "name" => "First Color",
"desc" => "First Color",
"id" => $shortname."_first_color",
"type" => "text",
"std" => "#000000"),

array( "name" => "Second Color",
"desc" => "Second Color",
"id" => $shortname."_second_color",
"type" => "text",
"std" => "#363636"),

array( "name" => "Third Color",
"desc" => "Third Color",
"id" => $shortname."_third_color",
"type" => "text",
"std" => "#b72228"),

array( "name" => "Fourth Color",
"desc" => "Fourth Color",
"id" => $shortname."_fourth_color",
"type" => "text",
"std" => "#ffffff"),
    
array( "name" => "Slider Arrow Images (80x40 px)",
"desc" => "",
"id" => $shortname."_slider_image",
"type" => "media",
"std" => get_template_directory_uri() ."/images/nivo-arrows.png"),    

array( "type" => "close"),

/* ---------------------------------------------------------
Vcard section
----------------------------------------------------------- */
array( "name" => "Vcard",
"type" => "section"),
array( "type" => "open"),
 
array( "name" => "First Column",
"desc" => "Your Name",
"id" => $shortname."_your_name",
"type" => "text",
"std" => ""),

array( "name" => "1. Font Size",
"desc" => "First Column Font Size (px)",
"id" => $shortname."_your_name_size",
"type" => "text",
"std" => "90px"),

array( "name" => "Second Column",
"desc" => "Your Surname or Your Job",
"id" => $shortname."_your_job",
"type" => "text",
"std" => ""),

array( "name" => "2. Font Size",
"desc" => "Second Column Font Size (px)",
"id" => $shortname."_your_job_size",
"type" => "text",
"std" => "60px"),

array( "name" => "Facebook",
"desc" => "Facebook Link",
"id" => $shortname."_facebook_uid",
"type" => "text",
"std" => ""),

array( "name" => "Twitter",
"desc" => "Twitter Link",
"id" => $shortname."_twitter_uid",
"type" => "text",
"std" => ""),

array( "name" => "Flickr",
"desc" => "Flickr Link",
"id" => $shortname."_flickr_uid",
"type" => "text",
"std" => ""),
    
array( "name" => "Linkedin",
"desc" => "Linkedin Link",
"id" => $shortname."_linkedin_uid",
"type" => "text",
"std" => ""),    

array( "name" => "Delicious",
"desc" => "Delicious Link",
"id" => $shortname."_delicious_uid",
"type" => "text",
"std" => ""),

array( "name" => "StumbleUpon",
"desc" => "StumbleUpon Link",
"id" => $shortname."_stumble_uid",
"type" => "text",
"std" => ""),

array( "name" => "You Tube",
"desc" => "You Tube Link",
"id" => $shortname."_youtube_uid",
"type" => "text",
"std" => ""),

array( "name" => "Devianart",
"desc" => "Devianart Link",
"id" => $shortname."_devianart_uid",
"type" => "text",
"std" => ""),

array( "name" => "Digg",
"desc" => "Digg Link",
"id" => $shortname."_digg_uid",
"type" => "text",
"std" => ""),

array( "name" => "Techrohni",
"desc" => "Techrohni Link",
"id" => $shortname."_techrohni_uid",
"type" => "text",
"std" => ""),

array( "name" => "Mail Icon",
"desc" => "Mail Link",
"id" => $shortname."_mail_uid",
"type" => "text",
"std" => ""),

array( "name" => "RSS",
"desc" => "RSS Link",
"id" => $shortname."_rss_uid",
"type" => "text",
"std" => ""),
    
array( "name" => "Custom Icon Link",
"desc" => "",
"id" => $shortname."_custom_uid",
"type" => "text",
"std" => ""),

array( "name" => "Custom Icon Image",
"desc" => "Custom Icon Link",
"id" => $shortname."_customicon_uid",
"type" => "media",
"std" => ""),
    
array( "name" => "Second Custom Icon Link",
"desc" => "",
"id" => $shortname."_secondcustom_uid",
"type" => "text",
"std" => ""),

array( "name" => "Second Custom Icon Image",
"desc" => "Second Custom Icon Link",
"id" => $shortname."_secondcustomicon_uid",
"type" => "media",
"std" => ""),  

array( "name" => "Third Custom Icon Link",
"desc" => "",
"id" => $shortname."_thirdcustom_uid",
"type" => "text",
"std" => ""),

array( "name" => "Third Custom Icon Image",
"desc" => "Third Custom Icon Link",
"id" => $shortname."_thirdcustomicon_uid",
"type" => "media",
"std" => ""),          
 
array( "type" => "close"),
 
/* ---------------------------------------------------------
About me section
----------------------------------------------------------- */
array( "name" => "About",
"type" => "section"),
array( "type" => "open"),

array( "name" => "Description",
"desc" => "",
"id" => $shortname."_description",
"type" => "editor",
"std" => ""),

array( "name" => "Name",
"desc" => "Your Name",
"id" => $shortname."_about_name",
"type" => "text",
"std" => ""),

array( "name" => "Address",
"desc" => "Your Address",
"id" => $shortname."_about_address",
"type" => "text",
"std" => ""),

array( "name" => "E-Mail",
"desc" => "Your E-Mail",
"id" => $shortname."_about_email",
"type" => "text",
"std" => ""),

array( "name" => "Phone",
"desc" => "Phone Number",
"id" => $shortname."_about_phone",
"type" => "text",
"std" => ""),

array( "name" => "Age",
"desc" => "Your Age",
"id" => $shortname."_about_age",
"type" => "text",
"std" => ""),

array( "name" => "Birth Place",
"desc" => "Your Birth Place",
"id" => $shortname."_about_birth",
"type" => "text",
"std" => ""),

array( "name" => "Freelance",
"desc" => "Freelance",
"id" => $shortname."_about_freelance",
"type" => "text",
"std" => ""),
 
array( "type" => "close"),

/* ---------------------------------------------------------
Resume section
----------------------------------------------------------- */

array( "name" => "Resume",
"type" => "section"),
array( "type" => "open"),

array( "name" => "Resume",
"desc" => "<br/>Your experiences, education etc. You can use html tags or resume shortcode like the following example; [resume place='Univercity name' time='2008-2010']Your Description[/resume]",
"id" => $shortname."_resume",
"type" => "editor",
"std" => "<h2>Experience</h2>[resume place='Univercity name' time='2008-2010']Your Description[/resume]"),

array( "type" => "close"),

/* ---------------------------------------------------------
Skills section
----------------------------------------------------------- */
array( "name" => "Skills",
"type" => "section"),
array( "type" => "open"),

array( "name" => "First Skill",
"desc" => "First Skill Name",
"id" => $shortname."_first_skill",
"type" => "text",
"std" => ""),

array( "name" => "First Percent",
"desc" => "Percent for First Skill (between 1-100)",
"id" => $shortname."_first_percent",
"type" => "text",
"std" => ""),

array( "name" => "First Skill Color",
"desc" => "First Skill Color",
"id" => $shortname."_first_skill_color",
"type" => "text",
"std" => "#b72228"),

array( "name" => "Second Skill",
"desc" => "Second Skill Name",
"id" => $shortname."_second_skill",
"type" => "text",
"std" => ""),

array( "name" => "Second Percent",
"desc" => "Percent for Second Skill",
"id" => $shortname."_second_percent",
"type" => "text",
"std" => ""),

array( "name" => "Second Skill Color",
"desc" => "Second Skill Color",
"id" => $shortname."_second_skill_color",
"type" => "text",
"std" => "#6286a8"),

array( "name" => "Third Skill",
"desc" => "Third Skill Name",
"id" => $shortname."_third_skill",
"type" => "text",
"std" => ""),

array( "name" => "Third Percent",
"desc" => "Percent for Third Skill",
"id" => $shortname."_third_percent",
"type" => "text",
"std" => ""),

array( "name" => "Third Skill Color",
"desc" => "Third Skill Color",
"id" => $shortname."_third_skill_color",
"type" => "text",
"std" => "#88B8E6"),

array( "name" => "Fourth Skill",
"desc" => "Fourth Skill Name",
"id" => $shortname."_fourth_skill",
"type" => "text",
"std" => ""),

array( "name" => "Fourth Percent",
"desc" => "Percent for Fourth Skill",
"id" => $shortname."_fourth_percent",
"type" => "text",
"std" => ""),

array( "name" => "Fourth Skill Color",
"desc" => "Fourth Skill Color",
"id" => $shortname."_fourth_skill_color",
"type" => "text",
"std" => "#BEDBE9"),

array( "name" => "Fifth Skill",
"desc" => "Fifth Skill Name",
"id" => $shortname."_fifth_skill",
"type" => "text",
"std" => ""),

array( "name" => "Fifth Percent",
"desc" => "Percent for Fifth Skill",
"id" => $shortname."_fifth_percent",
"type" => "text",
"std" => ""),

array( "name" => "Fifth Skill Color",
"desc" => "Fifth Skill Color",
"id" => $shortname."_fifth_skill_color",
"type" => "text",
"std" => "#d4d4d4"),

 
array( "type" => "close"),

/* ---------------------------------------------------------
Portfolio section
----------------------------------------------------------- */

array( "name" => "Portfolio Filters",
"type" => "section"),
array( "type" => "open"),

array( "name" => "All Items",
"desc" => "All Items Text ( If you don't want to use filters, leave all the fields blank )",
"id" => $shortname."_all_items",
"type" => "text",
"std" => ""),

array( "name" => "First Filter",
"desc" => "First filter text",
"id" => $shortname."first_filter",
"type" => "text",
"std" => ""),

array( "name" => "Second Filter",
"desc" => "Second filter text",
"id" => $shortname."second_filter",
"type" => "text",
"std" => ""),

array( "name" => "Third Filter",
"desc" => "Third filter text",
"id" => $shortname."third_filter",
"type" => "text",
"std" => ""),

array( "type" => "close"),

/* ---------------------------------------------------------
Contact section
----------------------------------------------------------- */
array( "name" => "Contact",
"type" => "section"),
array( "type" => "open"),

array( "name" => "Contact Header",
"desc" => "Contact Information Header",
"id" => $shortname."_contact_header",
"type" => "text",
"std" => ""),

array( "name" => "Contact Form Header",
"desc" => "Contact Form Header",
"id" => $shortname."_contactform_header",
"type" => "text",
"std" => ""),

array( "name" => "Recipient Name",
"desc" => "Recipient Name of the contact form e-mail",
"id" => $shortname."_contactform_recipient",
"type" => "text",
"std" => ""),

array( "name" => "E-Mail Subject",
"desc" => "Subject of the contact form e-mail",
"id" => $shortname."_contactform_subject",
"type" => "text",
"std" => ""),
 
array( "name" => "Contact Form E-Mail",
"desc" => "Contact form will be send to this email address",
"id" => $shortname."_contactform_email",
"type" => "text",
"std" => ""),

array( "name" => "Google Map Link",
"desc" => "Google map iframe code",
"id" => $shortname."_contactform_map",
"type" => "textarea",
"std" => ""),

array( "name" => "Name Field Text",
"desc" => "Name field text",
"id" => $shortname."_name_field",
"type" => "text",
"std" => ""),

array( "name" => "E-Mail Field Text",
"desc" => "E-Mail field text",
"id" => $shortname."_email_field",
"type" => "text",
"std" => ""),

array( "name" => "Message Field Text",
"desc" => "Message field text",
"id" => $shortname."_message_field",
"type" => "text",
"std" => ""),

array( "name" => "Send Button Text",
"desc" => "Send button text",
"id" => $shortname."_send_button",
"type" => "text",
"std" => ""),

array( "name" => "Sending Message",
"desc" => "Contact form sending message",
"id" => $shortname."_sending_message",
"type" => "text",
"std" => "Sending your message. Please wait..."),

array( "name" => "Success Message",
"desc" => "Contact form success message",
"id" => $shortname."_success_message",
"type" => "text",
"std" => "Thanks for sending your message! I'll get back to you shortly."),

array( "name" => "Failure Message",
"desc" => "Contact form failure message",
"id" => $shortname."_failure_message",
"type" => "text",
"std" => "There was a problem sending your message. Please try again."),

array( "name" => "Incomplete Message",
"desc" => "Contact form incomplete message",
"id" => $shortname."_incomplete_message",
"type" => "text",
"std" => "Please complete all the fields in the form before sending."),
 
array( "type" => "close"),
 
/* ---------------------------------------------------------
Footer section
----------------------------------------------------------- */
array( "name" => "Footer",
"type" => "section"),
array( "type" => "open"),
 
array( "name" => "Footer Credit",
"desc" => "You can customize footer credit on footer area her.",
"id" => $shortname."_footer_text",
"type" => "text",
"std" => "Thank you for visiting my website.  I look forward to hearing from you soon !"),
 
array( "type" => "close")
 
);
 
/*---------------------------------------------------
Theme Panel Output
----------------------------------------------------*/

function theme_settings_page() {
if ( ! did_action( 'wp_enqueue_media' ) ){
    wp_enqueue_media();
}    
global $themename,$theme_options;
$i=0;
$message='';
if ( 'save' == @$_REQUEST['action'] ) {

foreach ($theme_options as $value) {
update_option( @$value['id'], @$_REQUEST[ $value['id'] ] ); }

 
foreach ($theme_options as $value) {
if( isset( $_REQUEST[ @$value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
$message='saved';
}
else if( 'reset' == @$_REQUEST['action'] ) {
 
foreach ($theme_options as $value) {
delete_option( @$value['id'] ); }
$message='reset';
}
 
if ( $message=='saved' ) echo '<div id="message" class="updated"><p><strong>'.$themename.' settings saved.</strong></p></div>';
if ( $message=='reset' ) echo '<div id="message" class="updated"><p><strong>'.$themename.' settings reset.</strong></p></div>';
 
?>
<script type="text/javascript">
jQuery(document).ready(function (){
"use strict";

jQuery('.input_title h3').click(function(){
if(jQuery(this).parent().next('.all_options').css('display')==='none')
{    
jQuery(this).removeClass('inactive');
jQuery(this).addClass('active');
 
}
else
{    
jQuery(this).removeClass('active');
jQuery(this).addClass('inactive');
}
 
jQuery(this).parent().next('.all_options').slideToggle('slow');
return false;
});
})(jQuery);	
</script>
<div id="panelwrapper">
<div class="options_wrap">
<div id="icon-options-general"></div>
<h1><?php _e( ' Theme Options', 'aboutme-wp' )?></h1>
<script type="text/javascript">
jQuery(document).ready(function($){
 $('#pickerAboutMe_first_color').farbtastic('#colorAboutMe_first_color'); 
 $('#pickerAboutMe_second_color').farbtastic('#colorAboutMe_second_color');
 $('#pickerAboutMe_third_color').farbtastic('#colorAboutMe_third_color');
 $('#pickerAboutMe_fourth_color').farbtastic('#colorAboutMe_fourth_color');
 $('#pickerAboutMe_first_skill_color').farbtastic('#colorAboutMe_first_skill_color'); 
 $('#pickerAboutMe_second_skill_color').farbtastic('#colorAboutMe_second_skill_color');
 $('#pickerAboutMe_third_skill_color').farbtastic('#colorAboutMe_third_skill_color');
 $('#pickerAboutMe_fourth_skill_color').farbtastic('#colorAboutMe_fourth_skill_color');
 $('#pickerAboutMe_fifth_skill_color').farbtastic('#colorAboutMe_fifth_skill_color');
});
</script>
<ul>
<li><a class="button-primary" href="<?php echo get_stylesheet_directory_uri() . '/documentation/index.html' ?>"> Help Documentation</a> </li>
<li><a class="button-secondary" href="http://themeforest.net/user/egemenerd">Visit Support</a></li>
</ul>
<div>
<form method="post">
 
<?php foreach ($theme_options as $value) {
 
switch ( $value['type'] ) {
 
case "open": ?>
<?php break;
 
case "close": ?>
</div>
</div><br />

<?php break;
 
case 'text': ?>
<div class="option_input">
<label for="<?php echo $value['id']; ?>">
<?php echo $value['name']; ?></label>
<input id="color<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" name="<?php echo $value['id']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>" />
<small><?php echo $value['desc']; ?> <div id="picker<?php echo $value['id']; ?>"></div></small>
<div class="clearfix"></div>
</div>
<?php break;
 
case 'textarea': ?>
<div class="option_input">
<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
<textarea name="<?php echo $value['id']; ?>" rows="" cols=""><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id']) ); } else { echo $value['std']; } ?></textarea>
<small><?php echo $value['desc']; ?></small>
<div class="clearfix"></div>
</div>
<?php break;
 
case 'editor': ?>
<div class="option_input">
<?php wp_editor( stripslashes(get_option( $value['id'])), $value['id']); ?> 
<div class="clearfix"></div>
<div style="font-size:10px; color:#F00;"><?php echo $value['desc']; ?></div>
<div class="clearfix"></div>
</div>
<?php break;
    
case 'media': ?>
<div class="option_input">
<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
<input id="<?php echo $value['id']; ?>_image" type="text" name="<?php echo $value['id']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>" /> 
<input id="<?php echo $value['id']; ?>_image_button" class="button" type="button" value="Upload Image" />
<script type="text/javascript">
jQuery(document).ready(function($){ 
    var custom_uploader; 
    $('#<?php echo $value['id']; ?>_image_button').click(function(e) { 
        e.preventDefault();
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();
            $('#<?php echo $value['id']; ?>_image').val(attachment.url);
        });
        custom_uploader.open(); 
    }); 
});    
</script>    
<div class="clearfix"></div>
</div>
<?php break;        
 
case 'select': ?>
<div class="option_input">
<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
<?php foreach ($value['options'] as $option) { ?>
<option <?php if (get_option( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option>
<?php } ?>
</select>
<small><?php echo $value['desc']; ?></small>
<div class="clearfix"></div>
</div>
<?php break;
 
case "checkbox": ?>
<div class="option_input">
<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
<?php if(get_option($value['id'])){ $checked = 'checked="checked"'; }else{ $checked = "";} ?>
<input id="<?php echo $value['id']; ?>" type="checkbox" name="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
<small><?php echo $value['desc']; ?></small>
<div class="clearfix"></div>
</div>
<?php break;
 
case "section":
$i++; ?>
<div class="input_section">
<div class="input_title">
 
<h3><img src="<?php echo get_template_directory_uri();?>/images/settings.png" alt="">&nbsp;<?php echo $value['name']; ?></h3>
<span class="submit"><input name="save<?php echo $i; ?>" type="submit" value="Save changes" class="button-primary" /></span>
<div class="clearfix"></div>
</div>
<div class="all_options">
<?php break;
 
}
}?>
<input type="hidden" name="action" value="save" class="button-primary" />
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" class="button-primary" />
<input type="hidden" name="action" value="reset" />
</p>
</form>
</div>
<div>
<p>This theme was made by <a title="egemenerd" href="http://themeforest.net/user/egemenerd" target="_blank" >Egemenerd</a>.</p>
</div>
</div>
</div>
<?php
}
?>