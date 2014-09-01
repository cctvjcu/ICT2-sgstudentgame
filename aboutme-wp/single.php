<?php get_header(); ?>
<?php $hidesearch = get_option('AboutMe_hide_search'); ?>  
<a href="<?php echo home_url(); ?>" class="home-button"><img src="<?php echo get_template_directory_uri(); ?>/images/home.png" alt="" /></a>
<div class="panel">
    <?php wp_nav_menu( array( 'theme_location' => 'sub-menu' )); ?>
    <div class="clr"></div>
</div>
<div class="panel2">
    <?php include get_template_directory() . '/searchbox.php'; ?>
    <div class="clr"></div>
</div>
<a class="trigger" href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/menu.png" alt="" /></a> 
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div class="date-button"><?php the_date(); ?></div>
<a class="<?php if ($hidesearch == "true") { echo 'hide'; } else { echo 'search-button'; } ?>" href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/search.png" alt="" /></a>    
<div id="impress">
    <!-- PAGE  -->
    <div id="page" class="step" data-x="-800" data-y="2800" data-z="-1000" data-rotate="90" data-scale="4">
        <div class="map-effect">
            <div class="about-panel">
                <div class="page-info">
                    <div id="content"> 
                        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <h3><?php the_title(); ?></h3>
                            <?php the_content(); ?>
                            <div class="clr"></div>
                            <p>Categories: <?php echo the_category( ' , ',' ', ''); ?></p>     
                            <?php the_tags( '<p>Tags: ',' ', '</p>'); ?>  
                            <?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
                        </div>
                        <?php endwhile; ?>
                        <?php wp_link_pages(); ?>     
                    </div>
                    <?php comments_template(); ?> 
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>