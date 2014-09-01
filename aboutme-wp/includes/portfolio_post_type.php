<?php

function register_cpt_portfolio() {

    $labels = array( 
		
		    'name'              => __( 'Portfolios', 'aboutme-wp' ),
            'singular_name'     => __( 'portfolio', 'aboutme-wp' ),
            'add_new'           => __( 'Add New Item', 'aboutme-wp' ),
            'add_new_item'      => __( 'Add New Portfolio item', 'aboutme-wp' ),
            'edit_item'         => __( 'Edit Portfolio Item', 'aboutme-wp' ),
            'new_item'          => __( 'New Portfolio Item', 'aboutme-wp' ),
            'view_item'         => __( 'View Portfolio Item', 'aboutme-wp' ),
            'search_items'      => __( 'Search Portfolios Items', 'aboutme-wp' ),
            'not_found'         => __( 'No portfolio item found', 'aboutme-wp' ),
            'not_found_in_trash'=> __( 'No portfolio items found in Trash', 'aboutme-wp' ),
            'parent_item_colon' => __( 'Parent Portfolio items:', 'aboutme-wp' ),
            'menu_name'         => __( 'Portfolio', 'aboutme-wp' )
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,        
        'supports' => array( 'title' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 100,
        'menu_icon'  => get_template_directory_uri() . '/images/camera.png',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'supports' => array('title','thumbnail')
    );
    register_post_type( 'aboutme_portfolio', $args );
}
 add_action('init', 'register_cpt_portfolio');
    $portfoliolink_2_metabox = array( 
        'id' => 'portfoliolink',
        'title' => 'Item Image Url / Embed Video Url / Link',
        'page' => array('aboutme_portfolio'),
        'context' => 'normal',
        'priority' => 'default',
        'fields' => array(                     
                    array(
                        'name'          => 'Item Image Url / Embed Video Url / Link',
                        'desc'          => '',
                        'id'                => 'aboutme_portfoliourl',
                        'class'             => 'aboutme_portfoliourl',
                        'type'          => 'text',
                        'rich_editor'   => 0,            
                        'max'           => 0             
                    ),
                    )
    ); 
    $portfoliolink_3_metabox = array( 
        'id' => 'filterselect',
        'title' => 'Select Filter',
        'page' => array('aboutme_portfolio'),
        'context' => 'normal',
        'priority' => 'default',
        'fields' => array(                     
                    array(
                        'name'          => 'Select Filter',
                        'desc'          => '',
                        'id'                => 'aboutme_filterselect',
                        'class'             => 'aboutme_filterselect',
                        'type'          => 'select',
                        'rich_editor'   => 0,            
                        'max'           => 0             
                    ),
                    )
    );  
	
    $portfoliolink_33_metabox = array( 
        'id' => 'typeselect',
        'title' => 'Select Post Type',
        'page' => array('aboutme_portfolio'),
        'context' => 'normal',
        'priority' => 'default',
        'fields' => array(                    
                    array(
                        'name'          => 'Post Type',
                        'desc'          => '',
                        'id'                => 'aboutme_typeselect',
                        'class'             => 'aboutme_typeselect',
                        'type'          => 'select',
                        'rich_editor'   => 0,            
                        'max'           => 0             
                    ),
                    )
    );  		
add_action('admin_menu', 'aboutme_add_portfoliolink_2_meta_box');
add_action('admin_menu', 'aboutme_add_portfoliolink_3_meta_box');
add_action('admin_menu', 'aboutme_add_portfoliolink_33_meta_box');

    function aboutme_add_portfoliolink_2_meta_box() {
     
        global $portfoliolink_2_metabox;        
     
        foreach($portfoliolink_2_metabox['page'] as $page) {
            add_meta_box($portfoliolink_2_metabox['id'], $portfoliolink_2_metabox['title'], 'aboutme_show_portfoliolink_2_box', $page, 'normal', 'default', $portfoliolink_2_metabox);
        }

    }
    function aboutme_add_portfoliolink_3_meta_box() {
     
        global $portfoliolink_3_metabox;        
     
        foreach($portfoliolink_3_metabox['page'] as $page) {
            add_meta_box($portfoliolink_3_metabox['id'], $portfoliolink_3_metabox['title'], 'aboutme_show_portfoliolink_3_box', $page, 'normal', 'default', $portfoliolink_3_metabox);
        }

    }
function aboutme_add_portfoliolink_33_meta_box() {
     
        global $portfoliolink_33_metabox;        
     
        foreach($portfoliolink_33_metabox['page'] as $page) {
            add_meta_box($portfoliolink_33_metabox['id'], $portfoliolink_33_metabox['title'], 'aboutme_show_portfoliolink_33_box', $page, 'side', 'high', $portfoliolink_33_metabox);
        }

    }		
    function aboutme_show_portfoliolink_2_box()  {
        global $post;
        global $portfoliolink_2_metabox;
        global $aboutme_prefix;
        global $wp_version;
        echo '<input type="hidden" name="aboutme_portfoliolink_2_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';         
        echo '<table class="form-table">';    
        foreach ($portfoliolink_2_metabox['fields'] as $field) {
            $meta = get_post_meta($post->ID, $field['id'], true);             
            echo '<tr>',
                    '<th style="width:20%"><label for="', $field['id'], '">', stripslashes($field['name']), '</label></th>',
                    '<td class="aboutme_field_type_' . str_replace(' ', '_', $field['type']) . '">';
            switch ($field['type']) {
                case 'text':
                    echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : @$field['std'], '" size="30" style="width:97%" /><br/>', '', stripslashes($field['desc']);
                    break;
            }
            echo '<br/>Youtube example link: http://www.youtube.com/embed/1iIZeIy7TqM <br/>Vimeo example link: http://player.vimeo.com/video/24535181<td>',
                '</tr>';
        }
         
        echo '</table>';
    }

	    function aboutme_show_portfoliolink_3_box()  {
        global $post;
        global $portfoliolink_3_metabox;
        global $aboutme_prefix;
        global $wp_version;
        echo '<input type="hidden" name="aboutme_portfoliolink_3_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';         
        echo '<table class="form-table">';    
        foreach ($portfoliolink_3_metabox['fields'] as $field) {
            $meta = get_post_meta($post->ID, $field['id'], true);            
            echo '<tr>',
                    '<th style="width:20%"><label for="', $field['id'], '">', stripslashes($field['name']), '</label></th>',
                    '<td class="aboutme_field_type_' . str_replace(' ', '_', $field['type']) . '">';
            switch ($field['type']) {
                case 'select':
                    echo '<select name="', $field['id'], '" id="', $field['id'], '"><option';
					if ($meta == '1') { echo ' selected="selected"'; }
					echo ' value="1">' . get_option('AboutMefirst_filter') . '</option><option'; 
					if ($meta == '2') { echo ' selected="selected"'; }
					echo '  value="2">' . get_option('AboutMesecond_filter') . '</option><option';
					if ($meta == '3') { echo ' selected="selected"'; }
					echo '  value="3">' . get_option('AboutMethird_filter') . '</option>';
                    break;
            }
            echo    '</select><br/><br/>You can edit filters from About Me Settings, which is on the bottom of the left menu.<td>',
                '</tr>';
        }
         
        echo '</table>';
    } 

 function aboutme_show_portfoliolink_33_box()  {
        global $post;
        global $portfoliolink_33_metabox;
        global $aboutme_prefix;
        global $wp_version;
        echo '<input type="hidden" name="aboutme_portfoliolink_33_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';         
        foreach ($portfoliolink_33_metabox['fields'] as $field) {
            $meta = get_post_meta($post->ID, $field['id'], true);            
            switch ($field['type']) {
                case 'select':
                    echo '<select style="width:100%;" name="', $field['id'], '" id="', $field['id'], '">
                    <option'; 
					if ($meta == 'clbphoto') { echo ' selected="selected"'; }
                    echo ' value="clbphoto" >Photo</option><option';
                    if ($meta == 'clbiframe') { echo ' selected="selected"'; }
                    echo ' value="clbiframe">Video</option><option'; 
                    if ($meta == 'plink') { echo ' selected="selected"'; }
                    echo ' value="plink">Link</option>'; 
                    break;
            }
            echo    '</select>';
        }

    } 

    add_action('save_post', 'aboutme_portfoliolink_2_save');
    function aboutme_portfoliolink_2_save($post_id) {
        global $post;
        global $portfoliolink_2_metabox;
		global $portfoliolink_3_metabox;
		global $portfoliolink_33_metabox;
        if (!wp_verify_nonce(@$_POST['aboutme_portfoliolink_2_meta_box_nonce'], basename(__FILE__))) {
            return $post_id;
        }
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $post_id;
        }
        if ('page' == $_POST['post_type']) {
            if (!current_user_can('edit_page', $post_id)) {
                return $post_id;
            }
        } elseif (!current_user_can('edit_post', $post_id)) {
            return $post_id;
        }
         
        foreach ($portfoliolink_2_metabox['fields'] as $field) {
         
            $old = get_post_meta($post_id, $field['id'], true);
            $new = $_POST[$field['id']];
             
            if ($new && $new != $old) {
                if($field['type'] == 'date') {
                    $new = aboutme_format_date($new);
                    update_post_meta($post_id, $field['id'], $new);
                } else {
                    if(is_string($new)) {
                        $new = $new;
                    } 
                    update_post_meta($post_id, $field['id'], $new);
                     
                     
                }
            } elseif ('' == $new && $old) {
                delete_post_meta($post_id, $field['id'], $old);
            }
        }
		   foreach ($portfoliolink_3_metabox['fields'] as $field) {
         
            $old = get_post_meta($post_id, $field['id'], true);
            $new = $_POST[$field['id']];
             
            if ($new && $new != $old) {
                if($field['type'] == 'date') {
                    $new = aboutme_format_date($new);
                    update_post_meta($post_id, $field['id'], $new);
                } else {
                    if(is_string($new)) {
                        $new = $new;
                    } 
                    update_post_meta($post_id, $field['id'], $new);
                     
                     
                }
            } elseif ('' == $new && $old) {
                delete_post_meta($post_id, $field['id'], $old);
            }
        }
		   
		   foreach ($portfoliolink_33_metabox['fields'] as $field) {
         
            $old = get_post_meta($post_id, $field['id'], true);
            $new = $_POST[$field['id']];
             
            if ($new && $new != $old) {
                if($field['type'] == 'date') {
                    $new = aboutme_format_date($new);
                    update_post_meta($post_id, $field['id'], $new);
                } else {
                    if(is_string($new)) {
                        $new = $new;
                    } 
                    update_post_meta($post_id, $field['id'], $new);
                     
                     
                }
            } elseif ('' == $new && $old) {
                delete_post_meta($post_id, $field['id'], $old);
            }
        }
    }

add_action('do_meta_boxes', 'aboutme_primage_box');

function aboutme_primage_box() {

	remove_meta_box( 'postimagediv', 'aboutme_portfolio', 'side' );

	add_meta_box('postimagediv', __('Item Thumbnail', 'aboutme-wp'), 'post_thumbnail_meta_box', 'aboutme_portfolio', 'side', 'high');

}
?>