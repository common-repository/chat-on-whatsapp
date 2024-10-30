<?php
global $post;
$id = "";
if (!empty($post->ID)) {
    $id = $post->ID;
}

$iblteam_whatsapp_contacts = get_post_meta($id, 'iblteam_whatsapp_contacts', true);

if (!empty($iblteam_whatsapp_contacts['ibl_button_title'])) {
    $ibl_button_title = $iblteam_whatsapp_contacts['ibl_button_title'];
}


$ibl_button_bg_color = "";
if (!empty($iblteam_whatsapp_contacts['ibl_button_bg_color'])) {
    $ibl_button_bg_color = $iblteam_whatsapp_contacts['ibl_button_bg_color'];
} else {
    $ibl_button_bg_color = "#a2d67e";
}

$ibl_button_text_color = "";
if (!empty($iblteam_whatsapp_contacts['ibl_button_text_color'])) {
    $ibl_button_text_color = $iblteam_whatsapp_contacts['ibl_button_text_color'];
} else {
    $ibl_button_text_color = '#fff';
}

$ibl_button_widheight = "";
if (!empty($iblteam_whatsapp_contacts['ibl_button_widheight'])) {
    $ibl_button_widheight = $iblteam_whatsapp_contacts['ibl_button_widheight'] . "px";
}

if (!empty($iblteam_whatsapp_contacts['ibl_button_border_color'])) {
    $ibl_button_border_color = $iblteam_whatsapp_contacts['ibl_button_border_color'];
}

$backgroundimageurl = get_the_post_thumbnail_url($id);

if (!empty($backgroundimageurl)) {
    $backgroundimageurl = $backgroundimageurl;
} else {
    $backgroundimageurl = plugins_url('assets/images/avatar.jpg', IBLTEAM_PLUGIN_BASENAME);
}

$ibl_button_border_color1 = "";

if (!empty($iblteam_whatsapp_contacts['ibl_profile_border_color'])) {
    if (!empty($ibl_button_border_color)) {
        $ibl_button_border_color1 = $ibl_button_border_color;
    } else {
        $ibl_button_border_color1 = "#fff";
    }
}


echo '<style>.ibl-wp-profile-main {
    background: ' . esc_html($ibl_button_bg_color) . ';
    color: ' . esc_html($ibl_button_text_color) . ';
}

.ibl-wp-profile-wrap {
    background: ' . esc_html($backgroundimageurl) . 'center center no-repeat;
    background-size: cover;
    border: 4px solid ' . esc_html($ibl_button_border_color1) . ';
    background-color: white";
}

.ibl-wp-profile-icon-only {
    background: ' . esc_html($backgroundimageurl) . 'center center no-repeat;
    background-size: cover;
    width: ' . esc_html($ibl_button_widheight) . ';
    height: ' . esc_html($ibl_button_widheight) . ';
    border: 4px solid ' . esc_html($ibl_button_border_color1) . ';
}
.ibl-widget__chatbox_header{
     background-color: ' . esc_html($ibl_widget_bg_color) . ';
     color : ' . esc_html($ibl_widget_text_color) . ';
}

</style>';