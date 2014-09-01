<?php if (post_password_required()) { ?>
    <p class="nocomments"><?php _e('This post is password protected. Enter the password to view any comments.', 'aboutme-wp'); ?></p>
    
	<?php return; } ?>

<?php if (have_comments()) : ?>
<hr/>
    <h6>
			<?php
				printf( _n('One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number()),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>');
			?>
    </h6>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    <div>
        <div class="previous"><?php previous_comments_link(__( '&#8249; Older comments', 'aboutme-wp' )); ?></div><!-- end of .previous -->
        <div class="next"><?php next_comments_link(__( 'Newer comments &#8250;', 'aboutme-wp' )); ?></div><!-- end of .next -->
    </div><!-- end of.navigation -->
    <?php endif; ?>

    <ol class="commentlist">
        <?php wp_list_comments('type=comment'); ?>
    </ol>
    
    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    <div>
        <div class="previous"><?php previous_comments_link(__( '&#8249; Older comments', 'aboutme-wp' )); ?></div><!-- end of .previous -->
        <div class="next"><?php next_comments_link(__( 'Newer comments &#8250;', 'aboutme-wp' )); ?></div><!-- end of .next -->
    </div><!-- end of.navigation -->
    <?php endif; ?>

<?php else : ?>

<?php endif; ?>

<?php
if (!empty($comments_by_type['pings'])) : // let's seperate pings/trackbacks from comments
    $count = count($comments_by_type['pings']);
    ($count !== 1) ? $txt = __('Pings&#47;Trackbacks', 'aboutme-wp') : $txt = __('Pings&#47;Trackbacks', 'aboutme-wp');
?>

    <h6 id="pings"><?php printf( __( '%1$d %2$s for "%3$s"', 'aboutme-wp'), $count, $txt, get_the_title() )?></h6>

    <ol class="commentlist">
        <?php wp_list_comments('type=pings&max_depth=<em>'); ?>
    </ol>


<?php endif; ?>
<?php if (comments_open()) : ?>
<?php comment_form(); ?>
<?php endif; ?>