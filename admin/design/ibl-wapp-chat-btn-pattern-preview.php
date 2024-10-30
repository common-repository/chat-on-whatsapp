<?php
global $post;
$id = $post->ID;

if (!empty($iblteam_whatsapp_contacts['ibl_button_title'])) {
    $ibl_button_title = $iblteam_whatsapp_contacts['ibl_button_title'];
}


$icon_resizeableclass = "";

if (!empty($iblteam_whatsapp_contacts['ibl_button_widheight'])) {
    $ibl_button_widheight = $iblteam_whatsapp_contacts['ibl_button_widheight'];
    if ($ibl_button_widheight >= 40 && $ibl_button_widheight <= 100) {
        $icon_resizeableclass = 'icon_resizeable';
    }
}



?>
<input type="hidden" name="full_image_real_path" id="full_image_real_path" value="<?php
echo esc_url(plugins_url('assets/images/avatar.jpg', IBLTEAM_PLUGIN_BASENAME)); ?>">
<div id="ibl-whatsapp-full-btn">
    <div class="ibl-wp-profile-main">
        <div class="wp-profile-dp">
            <div class="ibl-wp-profile-wrap"></div>
            <div class="ibl-wpbtn-info">
                <div class="ibl-whatsapp-contact-name"><?php echo esc_html(get_the_title($id)); ?></div>
                <div class="ibl-wpbtn-title"><?php echo (!empty($ibl_button_title) ? esc_html($ibl_button_title) : ""); ?></div>
            </div>
        </div>
    </div>
</div>
<div class="wp-profile-dp iblbtnpreview">
    <div class="ibl-wp-profile-icon-only <?php echo esc_html($icon_resizeableclass); ?>"></div>
</div>


