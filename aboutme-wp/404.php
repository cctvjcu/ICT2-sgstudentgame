<?php get_header(); ?>

<a href="<?php echo home_url(); ?>" class="home-button"><img src="<?php echo get_template_directory_uri(); ?>/images/home.png" alt="" /></a>
<div class="panel">
    <?php wp_nav_menu( array( 'theme_location' => 'sub-menu' )); ?>
    <div class="clr"></div>
</div>
<a class="trigger" href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/menu.png" alt="" /></a>
<div id="impress">
    <!-- PAGE  -->
    <div id="page" class="step" data-x="-800" data-y="2800" data-z="-1000" data-rotate="90" data-scale="4">
        <div class="map-effect">
            <div class="jabout-panel">
                <div class="page-info">
                    <div id="content"> 
                        <div class="post-entry">
                            <h4><?php _e('404 &#8212; Page Not Found!', 'aboutme-wp'); ?></h4>
                            <p><?php _e( 'You can return', 'aboutme-wp'); ?> <a href="<?php echo home_url(); ?>/" title="<?php esc_attr_e( 'Home', 'aboutme-wp' ); ?>"><?php _e( '&larr; Home', 'aboutme-wp'); ?></a> <?php _e( 'or search for the page you were looking for;', 'aboutme-wp'); ?></p>
                            <?php get_search_form(); ?>
                            <div class="postclr"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>