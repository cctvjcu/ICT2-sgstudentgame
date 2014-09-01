<?php	
$args = array(
    'post_type' => 'aboutme_portfolio',
    'posts_per_page' => 99
);	
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) {
?>
<div class="portfolio-panel">
    <?php 
    $portfolio = get_option('AboutMe_portfolio_text'); 
    $allfilter = get_option('AboutMe_all_items');
    $firstfilter = get_option('AboutMefirst_filter');
    $secondfilter = get_option('AboutMesecond_filter');
    $thirdfilter = get_option('AboutMethird_filter');
    ?>
    <?php if (!empty($portfolio)) { echo '<h2>' . $portfolio . '</h2>'; } ?>
    <?php 
    if (!empty($allfilter)) { 
        $visibility = 'show'; 
    }
    else {
        $visibility = 'hide';
    }
    ?>
    <div class="ff-container">
        <input id="select-type-all" name="radio-set-1" type="radio" class="ff-selector-type-all ie8" checked="checked" />
        <label for="select-type-all" class="ff-label-type-all ie8"><?php echo $allfilter ?></label>        
        <?php if (!empty($firstfilter)) { echo '<input id="select-type-1" name="radio-set-1" type="radio" class="ff-selector-type-1 ie8 ' . $visibility . '" /><label for="select-type-1" class="ff-label-type-1 ie8">' . $firstfilter . '</label>'; } ?>
        <?php if (!empty($secondfilter)) { echo '<input id="select-type-2" name="radio-set-1" type="radio" class="ff-selector-type-2 ie8 ' . $visibility . '" /><label for="select-type-2" class="ff-label-type-2 ie8">' . $secondfilter . '</label>'; } ?>
        <?php if (!empty($thirdfilter)) { echo '<input id="select-type-3" name="radio-set-1" type="radio" class="ff-selector-type-3 ie8 ' . $visibility . '" /><label for="select-type-3" class="ff-label-type-3 ie8">' . $thirdfilter . '</label>'; } ?>
        <div class="clr"></div>
        <ul class="ff-items">
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <?php if ( get_post_meta( get_the_id(), 'aboutme_portfoliourl', true) != '' ) { ?>
            <li class="ff-item-type-<?php echo( get_post_meta( get_the_id(), 'aboutme_filterselect', true ) ); ?>"> 
                <a class="<?php echo( get_post_meta( get_the_id(), 'aboutme_typeselect', true ) ); ?>" href="<?php echo esc_url( get_post_meta( get_the_id(), 'aboutme_portfoliourl', true ) ); ?>">
                    <span><?php echo get_the_title( get_the_id() ); ?></span> 
                    <?php the_post_thumbnail('portfolio-thumbnail'); ?>
                </a>
            </li>
            <?php } ?>	
            <?php endwhile; ?>      
        </ul>
    </div>
</div>   		
<?php 
}
wp_reset_postdata();
?>