<?php

$firstcolor = get_option('AboutMe_first_color'); 
$secondcolor = get_option('AboutMe_second_color'); 
$thirdcolor = get_option('AboutMe_third_color'); 
$fourthcolor = get_option('AboutMe_fourth_color'); 
$firstsize = get_option('AboutMe_your_name_size'); 
$secondsize = get_option('AboutMe_your_job_size');
$firstskillcolor = get_option('AboutMe_first_skill_color'); 
$secondskillcolor = get_option('AboutMe_second_skill_color'); 
$thirdskillcolor = get_option('AboutMe_third_skill_color'); 
$fourthskillcolor = get_option('AboutMe_fourth_skill_color');
$fifthskillcolor = get_option('AboutMe_fifth_skill_color');
$bgimage = get_option('AboutMe_bg_image');
$sliderimage = get_option('AboutMe_slider_image'); 
$menutextsize = get_option('AboutMe_menu_text_size');
$firstfont = get_option('AboutMe_titlefontfamily'); 
$secondfont = get_option('AboutMe_fontfamily');
$h1size = get_option('AboutMe_h1');
$h2size = get_option('AboutMe_h2');
$h3size = get_option('AboutMe_h3');
$h4size = get_option('AboutMe_h4');
$h5size = get_option('AboutMe_h5');
$h6size = get_option('AboutMe_h6');
$psize = get_option('AboutMe_p');

?>

<style type="text/css">
::-webkit-scrollbar {
	width:15px;
}
::-webkit-scrollbar-thumb {
	background:<?php if (!empty($firstcolor)) { echo get_option('AboutMe_first_color'); } else { echo '#000000'; } ?>;
}
::-webkit-scrollbar-thumb:window-inactive {
	background:<?php if (!empty($firstcolor)) { echo get_option('AboutMe_first_color'); } else { echo '#000000'; } ?>;
}
body {
    <?php if (!empty($secondfont)) { echo stripslashes($secondfont); } else { echo 'font-family: PTSans;'; } ?>    
	color:<?php if (!empty($secondcolor)) { echo get_option('AboutMe_second_color'); } else { echo '#545454'; } ?>;
}
#home h1,.searchfor {
	<?php if (!empty($firstfont)) { echo stripslashes($firstfont); } else { echo "font-family: arvobold;"; } ?>
}    
h1,h2,h3,h4,h5,h6,ul#navigation li span {
	<?php if (!empty($firstfont)) { echo stripslashes($firstfont); } else { echo "font-family: arvoregular;"; } ?>
}
h1 {
	font-size: <?php if (!empty($h1size)) { echo stripslashes($h1size); } else { echo "70px"; } ?>;
}
h2 {
	font-size: <?php if (!empty($h2size)) { echo stripslashes($h2size); } else { echo "60px"; } ?>;
}
h3 {
	font-size: <?php if (!empty($h3size)) { echo stripslashes($h3size); } else { echo "45px"; } ?>;
}
h4, summary {
	font-size: <?php if (!empty($h4size)) { echo stripslashes($h4size); } else { echo "38px"; } ?>;
}
h5 {
	font-size: <?php if (!empty($h5size)) { echo stripslashes($h5size); } else { echo "30px"; } ?>;
}
h6 {
	font-size: <?php if (!empty($h6size)) { echo stripslashes($h6size); } else { echo "24px"; } ?>;
}
p {
	font-size: <?php if (!empty($psize)) { echo stripslashes($psize); } else { echo "20px"; } ?>;
}
#page,p,.skills li,.ff-container label,.ff-items a,input[type="text"],input[type="password"],input[type="email"],textarea,input[type="submit"],#credits,button
{
    <?php if (!empty($secondfont)) { echo stripslashes($secondfont); } else { echo 'font-family: PTSans;'; } ?>
} 
b,strong {
    <?php if (!empty($secondfont)) { echo stripslashes($secondfont); } else { echo 'font-family: PTSansBold;'; } ?>
    font-weight:bold;    
}
i,em,blockquote,blockquote p,blockquote cite,.footnote {
   <?php if (!empty($secondfont)) { echo stripslashes($secondfont); } else { echo 'font-family: PTSansItalic;'; } ?>
   font-style:italic;        
}        
#home, #resume, #resume:before, #resume:after, #skills:before, #skills:after, #skills, #portfolio, #portfolio:before, #portfolio:after, .map-effect, .map-effect2, .box{
	background-color: <?php if (!empty($fourthcolor)) { echo get_option('AboutMe_fourth_color'); } else { echo '#ffffff'; } ?>;
}
::-moz-selection {
background: <?php if (!empty($thirdcolor)) { echo get_option('AboutMe_third_color'); } else { echo '#b72228'; } ?>;
color: <?php if (!empty($fourthcolor)) { echo get_option('AboutMe_fourth_color'); } else { echo '#ffffff'; } ?>;
}
::selection {
background: <?php if (!empty($thirdcolor)) { echo get_option('AboutMe_third_color'); } else { echo '#b72228'; } ?>;
color: <?php if (!empty($fourthcolor)) { echo get_option('AboutMe_fourth_color'); } else { echo '#ffffff'; } ?>;
}
h1, h2, h3, h4, h5, h6 {
	color:<?php if (!empty($firstcolor)) { echo get_option('AboutMe_first_color'); } else { echo '#000000'; } ?>;
}
#resume .first, #credits, #credits p, #credits .footnote, #cboxTitle
{
	color:<?php if (!empty($firstcolor)) { echo get_option('AboutMe_first_color'); } else { echo '#000000'; } ?> !important;
}
p, #home h2 {
	color:<?php if (!empty($secondcolor)) { echo get_option('AboutMe_second_color'); } else { echo '#545454'; } ?> !important;
}
#page img
{
	background-color: <?php if (!empty($fourthcolor)) { echo get_option('AboutMe_fourth_color'); } else { echo '#ffffff'; } ?>;
}
blockquote, blockquote p, .panel ul li:before, blockquote cite a 
{
	color: <?php if (!empty($fourthcolor)) { echo get_option('AboutMe_fourth_color'); } else { echo '#ffffff'; } ?> !important;
}
blockquote
{
	border-left: 5px solid <?php if (!empty($thirdcolor)) { echo get_option('AboutMe_third_color'); } else { echo '#b72228'; } ?>;
	background-color: <?php if (!empty($secondcolor)) { echo get_option('AboutMe_second_color'); } else { echo '#545454'; } ?>;
}
a, .active-header, .inactive-header:hover {
	color: <?php if (!empty($thirdcolor)) { echo get_option('AboutMe_third_color'); } else { echo '#b72228'; } ?>;
}
a:hover {
	color: <?php if (!empty($thirdcolor)) { echo get_option('AboutMe_third_color'); } else { echo '#b72228'; } ?>;
}
.overview-button, .trigger, .home-button, .panel {
	background-color: <?php if (!empty($firstcolor)) { echo get_option('AboutMe_first_color'); } else { echo '#000'; } ?>;
	border-right-color: <?php if (!empty($thirdcolor)) { echo get_option('AboutMe_third_color'); } else { echo '#b72228'; } ?>;
}
.date-button, .search-button, .panel2 {
	background-color: <?php if (!empty($firstcolor)) { echo get_option('AboutMe_first_color'); } else { echo '#000'; } ?>;
	border-left-color: <?php if (!empty($thirdcolor)) { echo get_option('AboutMe_third_color'); } else { echo '#b72228'; } ?>;
	color: <?php if (!empty($fourthcolor)) { echo get_option('AboutMe_fourth_color'); } else { echo '#ffffff'; } ?>;
}
.overview-button:hover, .trigger:hover, .home-button:hover {
	background-color: <?php if (!empty($thirdcolor)) { echo get_option('AboutMe_third_color'); } else { echo '#b72228'; } ?>;
	border-right-color: <?php if (!empty($firstcolor)) { echo get_option('AboutMe_first_color'); } else { echo '#000'; } ?>;
}
.search-button:hover {
	background-color: <?php if (!empty($thirdcolor)) { echo get_option('AboutMe_third_color'); } else { echo '#b72228'; } ?>;
	border-left-color: <?php if (!empty($firstcolor)) { echo get_option('AboutMe_first_color'); } else { echo '#000'; } ?>;
}
.panel a
{
	color: <?php if (!empty($fourthcolor)) { echo get_option('AboutMe_fourth_color'); } else { echo '#ffffff'; } ?>;
}
.panel a:hover
{
	color: <?php if (!empty($thirdcolor)) { echo get_option('AboutMe_third_color'); } else { echo '#b72228'; } ?>;
}
.panel2
{
	border-top-color: <?php if (!empty($thirdcolor)) { echo get_option('AboutMe_third_color'); } else { echo '#b72228'; } ?>;
}
ul#navigation li a {
	background-color: <?php if (!empty($thirdcolor)) { echo get_option('AboutMe_third_color'); } else { echo '#b72228'; } ?>;
	border-left-color: <?php if (!empty($firstcolor)) { echo get_option('AboutMe_first_color'); } else { echo '#000'; } ?>;
}
ul#navigation li a:hover {
	background-color: <?php if (!empty($firstcolor)) { echo get_option('AboutMe_first_color'); } else { echo '#000'; } ?>;
	border-left-color: <?php if (!empty($thirdcolor)) { echo get_option('AboutMe_third_color'); } else { echo '#b72228'; } ?>;
}
ul#navigation li span {
	color:<?php if (!empty($fourthcolor)) { echo get_option('AboutMe_fourth_color'); } else { echo '#ffffff'; } ?>;
	font-size: <?php if (!empty($menutextsize)) { echo get_option('AboutMe_menu_text_size'); } else { echo '28px'; } ?>;
}
#home h1 {
	font-size: <?php if (!empty($firstsize)) { echo get_option('AboutMe_your_name_size'); } else { echo '90px'; } ?>;
}
#home h2 {
	font-size: <?php if (!empty($secondsize)) { echo get_option('AboutMe_your_job_size'); } else { echo '60px'; } ?>;
}
.theme-default .nivo-directionNav a {
	background:url('<?php if (!empty($sliderimage)) { echo get_option('AboutMe_slider_image'); } else { echo get_template_directory_uri() .'/images/nivo-arrows.png'; } ?>') no-repeat;
}
.theme-default a.nivo-nextNav {
	background-position:-40px 0;
	right:0px;
}
.theme-default a.nivo-prevNav {
	left:0px;
}
.label
{
    background-color: <?php if (!empty($secondcolor)) { echo get_option('AboutMe_second_color'); } else { echo '#545454'; } ?>;
	color: <?php if (!empty($fourthcolor)) { echo get_option('AboutMe_fourth_color'); } else { echo '#ffffff'; } ?>;
	border-left-color: <?php if (!empty($thirdcolor)) { echo get_option('AboutMe_third_color'); } else { echo '#b72228'; } ?>;
}
.sticky, .comment-body
{
    border-bottom-color: <?php if (!empty($thirdcolor)) { echo get_option('AboutMe_third_color'); } else { echo '#b72228'; } ?>;
}
.ff-container label 
{
	background: <?php if (!empty($secondcolor)) { echo get_option('AboutMe_first_color'); } else { echo '#000'; } ?>;
	color: <?php if (!empty($fourthcolor)) { echo get_option('AboutMe_fourth_color'); } else { echo '#ffffff'; } ?>;
}
.ff-container label:hover, .ff-container input.ff-selector-type-all:checked ~ label.ff-label-type-all, .ff-container input.ff-selector-type-1:checked ~ label.ff-label-type-1, .ff-container input.ff-selector-type-2:checked ~ label.ff-label-type-2, .ff-container input.ff-selector-type-3:checked ~ label.ff-label-type-3 {
 background: <?php if (!empty($thirdcolor)) { echo get_option('AboutMe_third_color'); } else { echo '#b72228'; } ?>;
}
.ff-items a {
	background: <?php if (!empty($thirdcolor)) { echo get_option('AboutMe_third_color'); } else { echo '#b72228'; } ?>;
}
.ff-items a span {
	background: <?php if (!empty($thirdcolor)) { echo get_option('AboutMe_third_color'); } else { echo '#b72228'; } ?>;
	color: <?php if (!empty($fourthcolor)) { echo get_option('AboutMe_fourth_color'); } else { echo '#ffffff'; } ?>;
}
iframe
{
    border-color: <?php if (!empty($fourthcolor)) { echo get_option('AboutMe_fourth_color'); } else { echo '#ffffff'; } ?>;
}
.statusMessage {
	border: 10px solid <?php if (!empty($fourthcolor)) { echo get_option('AboutMe_fourth_color'); } else { echo '#ffffff'; } ?>;
	background-color: <?php if (!empty($thirdcolor)) { echo get_option('AboutMe_third_color'); } else { echo '#b72228'; } ?>;
}
.statusMessage p {
	color:<?php if (!empty($fourthcolor)) { echo get_option('AboutMe_fourth_color'); } else { echo '#ffffff'; } ?> !important;
}
input[type="submit"], hr
{
    color: <?php if (!empty($fourthcolor)) { echo get_option('AboutMe_fourth_color'); } else { echo '#ffffff'; } ?> !important;
    background: <?php if (!empty($thirdcolor)) { echo get_option('AboutMe_third_color'); } else { echo '#b72228'; } ?>;
}
input[type="submit"]:hover, #cboxContent, #cboxLoadedContent, #cboxLoadingOverlay {
	background-color:<?php if (!empty($firstcolor)) { echo get_option('AboutMe_first_color'); } else { echo '#000000'; } ?>
}
.accordion-header, .accordion-content
{
	border-bottom:1px dashed <?php if (!empty($secondcolor)) { echo get_option('AboutMe_second_color'); } else { echo '#545454'; } ?>;
}
#cboxOverlay, .cboxIframe {
  background-color: <?php if (!empty($fourthcolor)) { echo get_option('AboutMe_fourth_color'); } else { echo '#ffffff'; } ?>;
}
#resume .first
{
    color: <?php if (!empty($firstcolor)) { echo get_option('AboutMe_first_color'); } else { echo '#000000'; } ?>;
}
.skills li
{
    color: <?php if (!empty($fourthcolor)) { echo get_option('AboutMe_fourth_color'); } else { echo '#ffffff'; } ?>;
}
.skills .jq {
	background:<?php if (!empty($firstskillcolor)) { echo get_option('AboutMe_first_skill_color'); } else { echo '#b72228'; } ?>;
}
.skills .css {
	background:<?php if (!empty($secondskillcolor)) { echo get_option('AboutMe_second_skill_color'); } else { echo '#6286a8'; } ?>;
}
.skills .html {
	background:<?php if (!empty($thirdskillcolor)) { echo get_option('AboutMe_third_skill_color'); } else { echo '#88B8E6'; } ?>;
}
.skills .php {
	background:<?php if (!empty($fourthskillcolor)) { echo get_option('AboutMe_fourth_skill_color'); } else { echo '#BEDBE9'; } ?>;
}
.skills .sql {
	background:<?php if (!empty($fifthskillcolor)) { echo get_option('AboutMe_fifth_skill_color'); } else { echo '#d4d4d4'; } ?>;
}

</style>