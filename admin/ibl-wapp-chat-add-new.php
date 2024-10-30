<?php
/********************************************
PLUGIN CUSTOM POST TYPE
**********************************************/

if (get_option('activated_whatsapp_options') != CHAT_OPTIONS) {
    return;
}

/**
 *
 */
class ibl_whatsappme_chat_posttype

{
    public function __construct()
    {
        add_action('init', array(
            $this,
            'ibl_whatsapp_chat_post'
        ));
        add_filter('manage_whatsapp-chat_posts_columns', array(
            $this,
            'iblteam_whatsapp_accounts_columns'
        ) , 10, 1);
        add_action('manage_whatsapp-chat_posts_custom_column', array(
            $this,
            'iblteam_whatsapp_show_columns'
        ) , 10, 2);
        add_filter('post_updated_messages', array(
            $this,
            'iblteam_whatsapp_post_messages'
        ) , 10, 1);
        add_filter('post_row_actions', array(
            $this,
            'iblteam_remove_row_actions'
        ) , 10, 1);
    }

    public function ibl_whatsapp_chat_post()
    {
        $labels = array(
            'name' => esc_attr_x('All Whatsapp Contacts', IBLTEAM_TEXTDOMAIN) ,
            'singular_name' => esc_attr_x('Whatsapp contact', IBLTEAM_TEXTDOMAIN) ,
            'menu_name' => esc_attr_x('Chat On Whatsapp', IBLTEAM_TEXTDOMAIN) ,
            'name_admin_bar' => esc_attr_x('Whatsapp Contacts', IBLTEAM_TEXTDOMAIN) ,
            'add_new' => esc_attr_x('Add New Contact', IBLTEAM_TEXTDOMAIN) ,
            'add_new_item' => esc_attr_x('Add New Contact', IBLTEAM_TEXTDOMAIN) ,
            'new_item' => esc_attr_x('New Contact', IBLTEAM_TEXTDOMAIN) ,
            'edit_item' => esc_attr_x('Edit Contact', IBLTEAM_TEXTDOMAIN) ,
            'view_item' => esc_attr_x('View Contact', IBLTEAM_TEXTDOMAIN) ,
            'all_items' => esc_attr_x('All Whatsapp Contacts', IBLTEAM_TEXTDOMAIN) ,
            'search_items' => esc_attr_x('Search Whatsapp contacts', IBLTEAM_TEXTDOMAIN) ,
            'parent_item_colon' => esc_attr_x('Parent Whatsapp contacts:', IBLTEAM_TEXTDOMAIN) ,
            'not_found' => esc_attr_x('No Whatsapp contacts found.', IBLTEAM_TEXTDOMAIN) ,
            'not_found_in_trash' => esc_attr_x('No Whatsapp contacts found in Trash.', IBLTEAM_TEXTDOMAIN) ,
            'featured_image' => esc_attr_x('Whatsapp Profile', IBLTEAM_TEXTDOMAIN) ,
            'set_featured_image' => esc_attr_x('Select a Profile', IBLTEAM_TEXTDOMAIN) ,
            'remove_featured_image' => esc_attr_x('Remove Whatsapp Profile', IBLTEAM_TEXTDOMAIN)
        );
        $args = array(
            'labels' => $labels,
            'description' => esc_attr_x('Description.', IBLTEAM_TEXTDOMAIN) ,
            'public' => false,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => 'ibl_chat_whatsapp',
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'whatsapp-chat'
            ) ,
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => null,
            'menu_icon' => esc_url(plugins_url('assets/images/wordpress-Appicon_menu.png', IBLTEAM_PLUGIN_BASENAME)),
            'supports' => array(
                'title',
                'thumbnail'
            )
        );
        register_post_type('whatsapp-chat', $args);
    }

    public function iblteam_whatsapp_accounts_columns($columns)
    {
        $columns = array(
            'cb' => '<input type="checkbox" />',
            'title' =>  esc_attr_x('Contact Name',IBLTEAM_TEXTDOMAIN),
            'wapp_profile' =>  esc_attr_x('Profile',IBLTEAM_TEXTDOMAIN),
            'wapp_number' =>  esc_attr_x('Number/Group URL',IBLTEAM_TEXTDOMAIN),
            'wapp_contact_name' =>  esc_attr_x('Contact Title',IBLTEAM_TEXTDOMAIN),
            'whatsapp_shortcode' =>  esc_attr_x('Shortcode',IBLTEAM_TEXTDOMAIN)
        );
        return $columns;
    }

    public function iblteam_whatsapp_show_columns($name, $post_id)
    {
        $data_account = get_post_meta($post_id, 'iblteam_whatsapp_contacts', true);
        switch ($name) {
        case 'wapp_profile':
            $the_post_thumbnail = get_the_post_thumbnail_url($post_id, 'thumbnail');
            if (!empty($the_post_thumbnail)) {
                $the_post_thumbnail = $the_post_thumbnail;
            }
            else {
                $the_post_thumbnail = plugins_url('assets/images/avatar.jpg', IBLTEAM_PLUGIN_BASENAME);
            }

            echo "<img src='" . esc_html($the_post_thumbnail) . "' class='ibl-wpprofile-size'>";
            break;

        case 'wapp_number':
            $countrycode = (!empty($data_account['ibl_country_code']) ? $data_account['ibl_country_code'] : "");
            $groupchatURL = (!empty($data_account['ibl_group_chat_url']) ? $data_account['ibl_group_chat_url'] : "");
            $mobilenum = $countrycode . " " . $data_account['ibl_phone_number'];
            echo (!empty($data_account['ibl_phone_number']) ? esc_html($mobilenum) : esc_html($groupchatURL));
            break;

        case 'wapp_contact_name':
            echo (!empty($data_account['ibl_contact_title']) ? esc_html($data_account['ibl_contact_title']) : "");
            break;

        case 'whatsapp_shortcode':
            echo '<input type="text" class="iblteam-whatsapp-shortcode" name="whatsapp_shortcode" value="[ibl_whatsapp id=&quot;' . esc_html($post_id) . '&quot;]" readonly>';
            break;
        }
    }

    // Gallery custom messages

    public function iblteam_whatsapp_post_messages($messages)
    {
        global $post;
        $post_ID = $post->ID;
        $messages['post'] = array(
            0 => '',
            1 => sprintf(__('Whatsapp Contact published. Shortcode is: %s', IBLTEAM_TEXTDOMAIN) , '&nbsp;&nbsp;<input type="text" class="iblteam-whatsapp-shortcode" name="whatsapp_shortcode" value="[ibl_whatsapp id=&quot;' . esc_html($post_ID) . '&quot;]" readonly>') ,
            6 => sprintf(__('Whatsapp Contact published. Shortcode is: %s', IBLTEAM_TEXTDOMAIN) , '&nbsp;&nbsp;<input type="text" class="iblteam-whatsapp-shortcode" name="whatsapp_shortcode" value="[ibl_whatsapp id=&quot;' . esc_html($post_ID) . '&quot;]" readonly>') ,
        );
        return $messages;
    }

    public function iblteam_remove_row_actions($actions)
    {
        if (get_post_type() === 'whatsapp-chat') unset($actions['view']);
        return $actions;
    }
}

$whatsappchat = new ibl_whatsappme_chat_posttype();