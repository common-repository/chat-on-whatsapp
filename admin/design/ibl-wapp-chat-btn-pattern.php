<div class="iblback-chatbtn-container">
<?php

if (!empty($iblteam_whatsapp_contacts['ibl_create_chat'])) {
    $ibl_create_chat = $iblteam_whatsapp_contacts['ibl_create_chat'];
}

if (!empty($iblteam_whatsapp_contacts['ibl_phone_number'])) {
    $ibl_phone_number = $iblteam_whatsapp_contacts['ibl_phone_number'];
}

if (!empty($iblteam_whatsapp_contacts['ibl_country_code'])) {
    $ibl_country_code = $iblteam_whatsapp_contacts['ibl_country_code'];
}

if (!empty($iblteam_whatsapp_contacts['ibl_country_name'])) {
    $ibl_country_name = $iblteam_whatsapp_contacts['ibl_country_name'];
}

if (!empty($iblteam_whatsapp_contacts['ibl_flag_code'])) {
    $ibl_flag_code = $iblteam_whatsapp_contacts['ibl_flag_code'];
}

if (!empty($iblteam_whatsapp_contacts['ibl_group_chat_url'])) {
    $ibl_group_chat_url = $iblteam_whatsapp_contacts['ibl_group_chat_url'];
}

if (!empty($iblteam_whatsapp_contacts['ibl_pre_fill_text'])) {
    $ibl_pre_fill_text = $iblteam_whatsapp_contacts['ibl_pre_fill_text'];
}

if (!empty($iblteam_whatsapp_contacts['ibl_contact_title'])) {
    $ibl_contact_title = $iblteam_whatsapp_contacts['ibl_contact_title'];
}

if (!empty($iblteam_whatsapp_contacts['ibl_show_profile_icon'])) {
    $ibl_show_profile_icon = $iblteam_whatsapp_contacts['ibl_show_profile_icon'];
}

if (!empty($iblteam_whatsapp_contacts['ibl_button_title'])) {
    $ibl_button_title = $iblteam_whatsapp_contacts['ibl_button_title'];
}

if (!empty($iblteam_whatsapp_contacts['ibl_button_bg_color'])) {
    $ibl_button_bg_color = $iblteam_whatsapp_contacts['ibl_button_bg_color'];
}

if (!empty($iblteam_whatsapp_contacts['ibl_button_text_color'])) {
    $ibl_button_text_color = $iblteam_whatsapp_contacts['ibl_button_text_color'];
}

if (!empty($iblteam_whatsapp_contacts['ibl_button_widheight'])) {
    $ibl_button_widheight = $iblteam_whatsapp_contacts['ibl_button_widheight'];
}

if (!empty($iblteam_whatsapp_contacts['ibl_profile_border_color'])) {
    $ibl_profile_border_color = $iblteam_whatsapp_contacts['ibl_profile_border_color'];
}

if (!empty($iblteam_whatsapp_contacts['ibl_button_border_color'])) {
    $ibl_button_border_color = $iblteam_whatsapp_contacts['ibl_button_border_color'];
}

?>   

<div class="iblback_box_title"><?php esc_html_e('Creating Contacts / Communicating into groups',IBLTEAM_TEXTDOMAIN ); ?></div>
<div class="iblback_chatdetails">
    <p>
        <input type="radio" id="ibl_create_chat" class="ibl_create_radio_chat" name="ibl_create_chat" value="chatnumber" <?php
            if (!empty($ibl_create_chat)) {
                if ($ibl_create_chat == "chatnumber") {
                    echo "checked";
                }
            } ?>>
        <label for="ibl_create_chat"><?php esc_html_e('Number',IBLTEAM_TEXTDOMAIN ); ?></label>
    </p>
    <div class="chatnumber iblback_waap-box">
        <input id="phone" type="tel" name="ibl_phone_num" value="<?php
            echo (!empty($ibl_phone_number) ? esc_html($ibl_phone_number) : ""); ?>">
        <input  type="hidden" name="countrycode" id="countrycode" value="<?php
            echo (!empty($ibl_country_code) ? esc_html($ibl_country_code) : ""); ?>">
        <input type="hidden" name="countryname" id="countryname" value="<?php
            echo (!empty($ibl_country_name) ? esc_html($ibl_country_name) : ""); ?>"/>
        <input type="hidden" name="flagcode" id="flagcode" value="<?php
            echo (!empty($ibl_flag_code) ? esc_html($ibl_flag_code) : ""); ?>"/>
        <input type="hidden" name="pluginpath"  id="pluginpath" value="<?php
            echo (!empty(IBLTEAM_PLUGIN_URL) ? esc_html(IBLTEAM_PLUGIN_URL) : ""); ?>"/>
        <span id="valid-msg" class="hide">Valid</span>
        <span id="error-msg" class="hide">Invalid number</span>
        <div class="iblback_small_text"> enter your number</div>
    </div>
    <p>
        <input type="radio" id="ibl_group_chat" class="ibl_create_radio_chat" name="ibl_create_chat" value="groupchaturl" <?php
            if (!empty($ibl_create_chat)) {
                if ($ibl_create_chat == "groupchaturl") {
                    echo "checked";
                }
            } ?>>
        <label for="ibl_group_chat"><?php esc_html_e('Group Chat URL',IBLTEAM_TEXTDOMAIN ); ?></label>
    </p>
    <div class="groupchaturl iblback_waap-box">
        <div class="ibl-wapp-inputs-wrap">
            <input class="ibl-inputbox" id="ibl_groupchaturl" type="text" name="group_chat_full_url" value="<?php
                echo (!empty($ibl_group_chat_url) ? $ibl_group_chat_url : ""); ?>">
            <span class="ibl-focus-inputbox"></span>
        </div>
        <div class="iblback_small_text"><?php esc_html_e('Enter whatsapp Group URL',IBLTEAM_TEXTDOMAIN ); ?>  </div>
    </div>
</div>
<?php
    $searchString = '"';
    
    if (!empty($iblteam_whatsapp_contacts['ibl_pre_fill_text'])) {
        $ibl_pre_fill_text = $iblteam_whatsapp_contacts['ibl_pre_fill_text'];
        $prefilledmsg = $ibl_pre_fill_text;
        if (strpos($prefilledmsg, $searchString) !== false) {
            $prefilledmsg = str_replace('"', '\'', $prefilledmsg);
        }
        else {
            $prefilledmsg = str_replace('\'', '"', $prefilledmsg);
        }
    }
    
    ?>
<div class="">
    <div class="contactboxmarginbootom">
        <div class="iblback_box_title"><?php esc_html_e('Contact title',IBLTEAM_TEXTDOMAIN ); ?> </div>
        <div class="ibl-wapp-inputs-wrap ibl-margin-top">
            <input class="ibl-inputbox" type="text" name="contact_title" value="<?php
                echo (!empty($ibl_contact_title) ? esc_html($ibl_contact_title) : ""); ?>">
            <span class="ibl-focus-inputbox"></span>
        </div>
        <div class="iblback_small_text"><?php esc_html_e('Enter Contact Support Name e.g. (Technical Support)',IBLTEAM_TEXTDOMAIN ); ?> </div>
    </div>
    <div class="iblback_chat_text_box">
        <div class="iblback_box_title"><?php esc_html_e('Pre Populated Text',IBLTEAM_TEXTDOMAIN ); ?></div>
        <div class="ibl-wapp-inputs-wrap ibl-margin-top">
            <input class="ibl-inputbox" type="text" name="prepopulated_text" value="<?php
                echo (!empty($prefilledmsg) ? esc_html($prefilledmsg) : ""); ?>">
            <span class="ibl-focus-inputbox"></span>
        </div>
        <div class="iblback_small_text"><?php esc_html_e('Enter Pre-defined message which will direct message to you',IBLTEAM_TEXTDOMAIN ); ?> </div>
    </div>
    <div class="iblback_button_section">
        <div class='iblback_btnpart_section ibl-part1'>
            <div>
                <div class="iblback_box_title iblback_show_profile_choice"><?php esc_html_e('Show Profile Icon Only',IBLTEAM_TEXTDOMAIN ); ?>    </div>
                <div class="iblback_profile_chk">
                    <label class="iblradioswitch">
                    <input type="checkbox" name="show_profile_icon" id="chkPassport" <?php
                        if (!empty($ibl_show_profile_icon)) {
                            if ($ibl_show_profile_icon == 'on') {
                                echo "checked";
                            }
                        } ?> >
                    <span class="wsppslider wsppround"></span>
                    </label>
                </div>
                <table class="iblback-margin-top form-table" id="ibl_wsapp_btn_title">
                    <tr>
                        <td><?php esc_html_e('Button title',IBLTEAM_TEXTDOMAIN ); ?>   </td>
                        <td width="330">
                            <div class="ibl-wapp-inputs-wrap" data-validate="Name is required">
                                <input class="ibl-inputbox" type="text" name="button_title" value="<?php
                                    echo (!empty($ibl_button_title) ? esc_html($ibl_button_title) : ""); ?>">
                                <span class="ibl-focus-inputbox"></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="iblback_btn_colors"><?php esc_html_e('Button Background Color',IBLTEAM_TEXTDOMAIN ); ?></td>
                        <td width="330">
                            <input type="text" class="color-field-picker" name="button_bg_color" autocomplete="off" value="<?php
                                echo (!empty($ibl_button_bg_color) ? esc_html($ibl_button_bg_color): ""); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="iblback_btn_colors"><?php esc_html_e('Button Text Color',IBLTEAM_TEXTDOMAIN ); ?></td>
                        <td width="330">
                            <input type="text" class="color-field-picker" name="button_text_color" autocomplete="off" value="<?php
                                echo (!empty($ibl_button_text_color) ? esc_html($ibl_button_text_color) : ""); ?>">
                        </td>
                    </tr>
                </table>
                <table class="iblback-margin-top"  id="ibl_wsapp_btn_width_height">
                    <tr>
                        <td><?php esc_html_e('Button width/height ',IBLTEAM_TEXTDOMAIN ); ?>
                          
                            <p class="iblback_widhig_caption"> (In px) </p>
                        </td>
                        <td width="60" class="iblback_btn_colors">
                            <div class="ibl-wapp-inputs-wrap" data-validate="Name is required">
                                <input class="ibl-inputbox" type="number" min="40"  max="100" id="button_widhight" name="button_widhight" value="<?php
                                    echo (!empty($ibl_button_widheight) ? esc_html($ibl_button_widheight) : ""); ?>">
                                <span class="ibl-focus-inputbox"></span>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class='iblback_btnpart_section ibl-part2'>
            <?php
                require_once (IBLTEAM_PLUGIN_DIR_PATH . 'admin/design/ibl-wapp-chat-btn-pattern-preview.php');
                
                ?>
        </div>
    </div>
    <div class="ibl-margin-top-before-border">
        <div>
            <div class="iblback_box_title iblback_show_profile_choice"><?php esc_html_e('Show Profile border color ',IBLTEAM_TEXTDOMAIN ); ?>  </div>
            <div class="iblback_profile_chk">
                <label class="iblradioswitch">
                <input type="checkbox" name="profile_border_color" id="profile_border_color"  <?php
                    if (!empty($iblteam_whatsapp_contacts['ibl_profile_border_color'])) {
                        if ($iblteam_whatsapp_contacts['ibl_profile_border_color'] == 'on') {
                            echo "checked";
                        }
                    } ?> >
                <span class="wsppslider wsppround"></span>
                </label>
            </div>
            <table id="subprofile_border_color" class="ibl-margin-top">
                <tr>
                    <td class="wsapp_border_color"><?php esc_html_e('Border Color',IBLTEAM_TEXTDOMAIN ); ?></td>
                    <td class="wsapp_subinput_border_color">
                        <input type="text" class="color-field-picker" name="button_border_color" autocomplete="off"  value="<?php
                            echo (!empty($ibl_button_border_color) ? esc_html($ibl_button_border_color) : ""); ?>">
                    </td>
                </tr>
            </table>
        </div>
    </div>
     <div class="iblback_availability_section">
     <div class="iblback_box_title iblback_show_profile_choice"><?php esc_html_e('Availability By Particular Day/Time',IBLTEAM_TEXTDOMAIN ); ?></div>
        <div class="iblback_profile_chk">
            <label class="iblradioswitch">
            <input type="checkbox" class="Availability_time" name="wapp_time_availability" disabled="">
            <span class="wsppslider wsppround"></span>
            </label>
        </div>
        <div class="iblback_small_text premium">Online/Offline Available In Premium Feature </div>
    </div>

</div>
</div>