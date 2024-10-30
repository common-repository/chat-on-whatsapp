<?php
$ibl_show_widget_box = get_option('ibl_show_widget_box');
$ibl_widget_title = get_option('ibl_widget_title');
$ibl_widget_description = get_option('ibl_widget_description');
$ibl_widget_bg_color = get_option('ibl_widget_bg_color');
$ibl_widget_text_color = get_option('ibl_widget_text_color');
$ibl_widget_styles = get_option('ibl_widget_styles');
$ibl_widget_position = get_option('ibl_widget_position');
$ibl_select_contact_names = get_option('ibl_select_contact_names');




        if ($ibl_show_widget_box == 'on') {
?>
   <div class="main-footer-widget-chatbox">
    <div id="ibl-whats-openPopup" class="ibl-whatsapp-btn-widget">
        <img class="ibl-widget-icon-whatsapp pulse" src="<?php
            echo esc_url(plugins_url("assets/images/output-onlinepngtools.png", IBLTEAM_PLUGIN_BASENAME)); ?>">
    </div>
    <div class="ibl-widget__chatbox" id="iblchatbox">
        <div class="ibl-widget__chatbox_header">
            <div class="dialog"><a class="close-thik"></a></div>
            <div class="ibl-widget__chatbox_head_title">
                <?php
                    echo (!empty($ibl_widget_title) ? esc_html($ibl_widget_title) : "") ?>
            </div>
            <div class="ibl-widget__chatbox_head_description">
                <?php
                    echo (!empty($ibl_widget_description) ? esc_html($ibl_widget_description) : "") ?>
            </div>
        </div>
        <div class="ibl-widget__chat_contacts">
            <?php
                foreach($ibl_select_contact_names as $key => $value) {
                    $post = get_page_by_title($value, OBJECT, 'whatsapp-chat');
                    $id = $post->ID;
                    $iblteam_whatsapp_contacts = get_post_meta($id, 'iblteam_whatsapp_contacts', true);
                    if (!empty($iblteam_whatsapp_contacts['ibl_create_chat'])) {
                        $createchat = $iblteam_whatsapp_contacts['ibl_create_chat'];
                    }
                
                    if (!empty($iblteam_whatsapp_contacts['ibl_country_code'])) {
                        $countrycode = $iblteam_whatsapp_contacts['ibl_country_code'];
                    }
                
                    if (!empty($iblteam_whatsapp_contacts['ibl_phone_number'])) {
                        $phone_num = $iblteam_whatsapp_contacts['ibl_phone_number'];
                    }
                
                    if ($iblteam_whatsapp_contacts['ibl_pre_fill_text'] != "") {
                        $prefilledmsg = $iblteam_whatsapp_contacts['ibl_pre_fill_text'];
                    }
                
                    if ($iblteam_whatsapp_contacts['ibl_all_weekly_days'] != "") {
                        $allweekdays = $iblteam_whatsapp_contacts['ibl_all_weekly_days'];
                    }
                
                   
                    $btntextcolor = $iblteam_whatsapp_contacts['ibl_button_text_color'];
                    $profilebordercolor = $iblteam_whatsapp_contacts['ibl_profile_border_color'];
                    $btntlabel = $iblteam_whatsapp_contacts['ibl_button_title'];
                    $groupchaturl = $iblteam_whatsapp_contacts['ibl_group_chat_url'];
            
                    $prefilledmsg = str_replace(' ', '%20', $prefilledmsg);
                    $linkapp = 'web';
                    $targetpage = 'target="_blank"';
                    if (wp_is_mobile()) {
                        $linkapp = 'api';
                        $targetpage = '';
                    }
                
                    if (isset($createchat) && $createchat == 'chatnumber') {
                        if (isset($countrycode) && isset($phone_num)) {
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
                
                    $wapp_profile = get_the_post_thumbnail_url($id);
                    if (!empty($wapp_profile)) {
                        $wapp_profile = $wapp_profile;
                    }
                    else {
                        $wapp_profile = plugins_url('assets/images/avatar.jpg', IBLTEAM_PLUGIN_BASENAME);
                    }
                
                
                ?>
            <div class="ibl_wine-row ibl-widget-contact-row">
                <img class="ibl-contact-widget-img" src="<?php echo  esc_url($wapp_profile); ?>">
                <div class="ibl_wine-text-container ibl-widget-contact-row-container">
                    <div class="ibl-widget-title"><?php echo  esc_html($value); ?></div>
                    <div class="ibl-widget-contact-title-profession"><?php
                        echo  esc_html($iblteam_whatsapp_contacts['ibl_contact_title']); ?></div>
                </div>
                <div class="send-msPopup" id="send-btn" >
                    <a href="<?php  echo esc_url($url); ?>" target="_blank"> 
                    <img class="ibl-widget-icon-whatsapp-img" src=" <?php
                        echo esc_url(plugins_url('assets/images/Whatsapp_send icon.png', IBLTEAM_PLUGIN_BASENAME)); ?>">
                    </a>
                </div>
            </div>
            <?php
              
                } //foreach loop over
                ?>
        </div>
    </div>
</div>
</div>
<?php
        }

    
