<?php 

add_shortcode("resume", "resumecode");


function resumecode($atts, $content = null) {
	extract(shortcode_atts(array(
		"place" => 'place',
		"time" => 'time'
	), $atts));
	if ( $place == 'place' ) {
		return '<span>'.$content.'</span>';
	} elseif ( $time == 'time' ) {
		return '<span class="first"><span class="place"></span><span class="time">'.$time.'</span></span><span class="second">'.$content.'</span>';
	} else {
		return '<span class="first"><span class="place">'.$place.'</span><span class="time">'.$time.'</span></span><span class="second">'.$content.'</span>';
	}
}

?>