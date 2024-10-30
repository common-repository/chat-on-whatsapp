<?php

function ibl_action_woocommerce_before_add_to_cart_button()
{
    $shortcodeid = get_option('ibl_woocommerce_single_contact_names');
    $multiplecontactnames = get_option('ibl_woocommerce_multiple_contact_names');
    $ibl_contact_btn_view = get_option('ibl_contact_btn_view');
    echo '<div class="woocommerce_multiple_main">';
    if (!empty($multiplecontactnames)) {
        foreach($multiplecontactnames as $key => $value) {
            $iblteam_whatsapp_contacts = get_post_meta($value, 'iblteam_whatsapp_contacts', true);
            $createchat = $iblteam_whatsapp_contacts['ibl_create_chat'];
            $countrycode = $iblteam_whatsapp_contacts['ibl_country_code'];
            $phone_num = $iblteam_whatsapp_contacts['ibl_phone_number'];
            $groupchaturl = $iblteam_whatsapp_contacts['ibl_group_chat_url'];
            $prefilledmsg = $iblteam_whatsapp_contacts['ibl_pre_fill_text'];
            $prefilledmsg = str_replace(' ', '%20', $prefilledmsg);
            $linkapp = 'web';
            $targetpage = 'target="_blank"';
            if (wp_is_mobile()) {
                $linkapp = 'api';
                $targetpage = '';
            }

            if (!empty($createchat) && $createchat == 'chatnumber') {
                if (!empty($countrycode) && !empty($phone_num)) {
                    $mobilenum = $countrycode . $phone_num;
                }
            }

            $url = '';
            if (isset($mobilenum)) {
                $number = preg_replace('/[^0-9]/', '', $mobilenum);
                $url = 'https://' . $linkapp . '.whatsapp.com/send?phone=' . $number . '&text=' . $prefilledmsg;
            }
            else {
                $url = $groupchaturl;
            }

?>
<a href="<?php echo esc_url($url); ?>" class="woocomme_image_whatsapp">
<img class="woo_img_float_left" src="<?php  echo esc_url(get_the_post_thumbnail_url($value, 'thumbnail')); ?>">
</a>

<?php
        }
    }

    echo '</div>';
    if ($ibl_contact_btn_view == 'select_single_contact_name') {
        echo "<div>" . do_shortcode('[ibl_whatsapp id="' . $shortcodeid . '"]') . "</div>";
    }
    elseif ($ibl_contact_btn_view == 'select_multiple_contact_name') {
    }
    else {
        echo "";
    }
}

function ibl_action_woocommerce_after_add_to_cart_button()
{
    $shortcodeid = get_option('ibl_woocommerce_single_contact_names');
    $multiplecontactnames = get_option('ibl_woocommerce_multiple_contact_names');
    $ibl_contact_btn_view = get_option('ibl_contact_btn_view');
    echo "<br />";
    echo '<div class="woocommerce_multiple_main ibafter_cart">';
    if (!empty($multiplecontactnames)) {
        foreach($multiplecontactnames as $key => $value) {
            $iblteam_whatsapp_contacts = get_post_meta($value, 'iblteam_whatsapp_contacts', true);
            $createchat = $iblteam_whatsapp_contacts['ibl_create_chat'];
            $countrycode = $iblteam_whatsapp_contacts['ibl_country_code'];
            $phone_num = $iblteam_whatsapp_contacts['ibl_phone_number'];
            $groupchaturl = $iblteam_whatsapp_contacts['ibl_group_chat_url'];
            $prefilledmsg = $iblteam_whatsapp_contacts['ibl_pre_fill_text'];
            $prefilledmsg = str_replace(' ', '%20', $prefilledmsg);
            $linkapp = 'web';
            $targetpage = 'target="_blank"';
            if (wp_is_mobile()) {
                $linkapp = 'api';
                $targetpage = '';
            }

            if (!empty($createchat) && $createchat == 'chatnumber') {
                if (!empty($countrycode) && !empty($phone_num)) {
                    $mobilenum = $countrycode . $phone_num;
                }
            }

            $url = '';
            if (isset($mobilenum)) {
                $number = preg_replace('/[^0-9]/', '', $mobilenum);
                $url = 'https://' . $linkapp . '.whatsapp.com/send?phone=' . $number . '&text=' . $prefilledmsg;
            }
            else {
                $url = $groupchaturl;
            }

?>
<a href="<?php echo esc_url($url); ?>" target="_blank" class="woocomme_image_whatsapp">
  <img  src="<?php echo esc_url(get_the_post_thumbnail_url($value, 'thumbnail')); ?>">
</a>

<?php
        }
    }

    echo '</div>';
}



function custom_css_on_product_page()
{
    $shortcodecssid = get_option('ibl_woocommerce_single_contact_names');
    echo "<style>
  #ibl-whatsapp-btn-" . $shortcodecssid . " { margin-bottom:15px; margin-top:15px; } 
   </style>";
}

add_action('wp_footer', 'custom_css_on_product_page', 10, 0);
$btnpositionwoo = get_option('ibl_btn_position_woocomerce');

if($btnpositionwoo == 'after_add_to_cart')
{
    add_action( 'woocommerce_after_add_to_cart_button', 'ibl_action_woocommerce_after_add_to_cart_button', 10, 0 );
}
elseif($btnpositionwoo == 'before_add_to_cart')
{
    add_action( 'woocommerce_before_add_to_cart_button', 'ibl_action_woocommerce_before_add_to_cart_button', 10, 0 );
}


?>