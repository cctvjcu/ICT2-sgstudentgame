<form method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <input type="text" class="field searchtext" name="s" id="s" placeholder="<?php esc_attr_e('search here &hellip;', 'aboutme-wp'); ?>" />
    <input type="submit" class="button" name="submit" id="searchsubmit" value="<?php esc_attr_e('Search', 'aboutme-wp'); ?>"  />
</form>