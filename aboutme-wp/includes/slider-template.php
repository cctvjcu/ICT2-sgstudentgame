<?php
$args = array(
    'post_type' => 'slides',
    'posts_per_page'	=> 99
);	
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) {
?>
<div class="slider-wrapper theme-default">
    <div id="slider" class="nivoSlider"> 
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <?php echo the_post_thumbnail('square-large');  ?>
        <?php endwhile; ?>
    </div>
</div>
<?php 
}
wp_reset_postdata();
?>