<?php get_header(); ?>
<?php $hidesearch = get_option('AboutMe_hide_search'); ?>  
<a href="<?php echo home_url(); ?>" class="home-button"><img src="<?php echo get_template_directory_uri(); ?>/images/home.png" alt="" /></a>
<div class="panel">
    <?php wp_nav_menu( array( 'theme_location' => 'sub-menu' )); ?>
    <div class="clr"></div>
</div>
<div class="panel2 topspace">
    <?php include get_template_directory() . '/searchbox.php'; ?>
    <div class="clr"></div>
</div>
<a class="trigger" href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/menu.png" alt="" /></a> 
<a style="top:10px !important;" class="<?php if ($hidesearch == "true") { echo 'hide'; } else { echo 'search-button'; } ?>" href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/search.png" alt="" /></a>  
<div id="impress">
    <!-- PAGE  -->
    <div id="page" class="step" data-x="-800" data-y="2800" data-z="-1000" data-rotate="90" data-scale="4">
        <div class="map-effect">
            <div class="about-panel">
                <div class="page-info">
                    <h6 class="searchfor">
				<?php if ( is_day() ) : ?>
					<?php printf( __( 'Daily Archives: <span>%s</span>', 'aboutme-wp' ), get_the_date() ); ?>
				<?php elseif ( is_month() ) : ?>
					<?php printf( __( 'Monthly Archives: <span>%s</span>', 'aboutme-wp' ), get_the_date( 'F Y' ) ); ?>
				<?php elseif ( is_year() ) : ?>
					<?php printf( __( 'Yearly Archives: <span>%s</span>', 'aboutme-wp' ), get_the_date( 'Y' ) ); ?>
				<?php else : ?>
					<?php _e( 'Blog Archives', 'aboutme-wp' ); ?>
				<?php endif; ?>
                    </h6>
                    <hr/>
                    <div id="content"> 
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <div <?php post_class(); ?>>
                            <h5 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_title();?></a></h5>
                            <div class="entrytext">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php if ( has_post_thumbnail() ) { the_post_thumbnail(array(150,150)); } ?></a>     
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                        <div class="postclr"></div>
                        <div class="post-edit"><?php edit_post_link(__('Edit', 'aboutme-wp')); ?></div> 
                        <?php endwhile; ?>
                    </div>
        
                    <?php if (  $wp_query->max_num_pages > 1 ) : ?>
                    <div class="navigation">
                        <div class="previous"><?php next_posts_link( __( '&#8249; Older posts', 'aboutme-wp' ) ); ?></div>
                        <div class="next"><?php previous_posts_link( __( 'Newer posts &#8250;', 'aboutme-wp' ) ); ?></div>
                    </div>
                    <?php endif; ?>
                    <?php else : ?>
                    <h4 class="searchfor"><?php _e('Your search for', 'aboutme-wp');?> <?php the_search_query(); ?> <?php _e('did not match any entries', 'aboutme-wp');?></h4>
                    <p><?php _e('You can return', 'aboutme-wp'); ?> <a href="<?php echo home_url('/'); ?>"><?php _e( '&larr; Home', 'aboutme-wp' ); ?></a> <?php _e( 'or search for the page you were looking for;', 'aboutme-wp' ); ?></p>
                    <?php get_search_form(); ?>
                    <?php endif; ?>  
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>