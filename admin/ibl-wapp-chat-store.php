<?php

// Check if our nonce is set.

if (!isset($_POST['chat_on_whatsapp_nonce'])) {
    return;
}

// Verify that the nonce is valid.

if (!wp_verify_nonce($_POST['chat_on_whatsapp_nonce'], 'chat_on_whatsapp_nonce')) {
    return;
}

// If this is an autosave, our form has not been submitted, so we don't want to do anything.

if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
}

// Check the user's permissions.

if (isset($_POST['post_type']) && 'whatsapp-chat' == $_POST['post_type']) {
    if (!current_user_can('edit_page', $post_id)) {
        return;
    }
}
else {
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
}

// Sanitize user input.

$my_all_contacts_data = array(
    'ibl_create_chat' => sanitize_text_field($_POST['ibl_create_chat']) ,
    'ibl_phone_number' => sanitize_text_field($_POST['ibl_phone_num']) ,
    'ibl_country_code' => sanitize_text_field($_POST['countrycode']) ,
    'ibl_country_name' => sanitize_text_field($_POST['countryname']) ,
    'ibl_flag_code' => sanitize_text_field($_POST['flagcode']) ,
    'ibl_group_chat_url' => sanitize_text_field($_POST['group_chat_full_url']) ,
    'ibl_pre_fill_text' => sanitize_text_field($_POST['prepopulated_text']) ,
    'ibl_show_profile_icon' => sanitize_text_field($_POST['show_profile_icon']) ,
    'ibl_button_title' => sanitize_text_field($_POST['button_title']) ,
    'ibl_button_bg_color' => sanitize_text_field($_POST['button_bg_color']) ,
    'ibl_button_text_color' => sanitize_text_field($_POST['button_text_color']) ,
    'ibl_button_widheight' => sanitize_text_field($_POST['button_widhight']) ,
    'ibl_profile_border_color' => sanitize_text_field($_POST['profile_border_color']) ,
    'ibl_button_border_color' => sanitize_text_field($_POST['button_border_color']) ,
    'ibl_contact_title' => sanitize_text_field($_POST['contact_title'])
);
update_post_meta($post_id, 'iblteam_whatsapp_contacts', $my_all_contacts_data);
?>