<?php

if (!function_exists('add_action')) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

/********************************************
PLUGIN SHORTCODE
**********************************************/
/**
 *
 */
class ibl_whatsappbtn_shortcode {
    public function __construct() {
        add_shortcode('ibl_whatsapp', array(
            $this,
            'ibl_whatsapp_button_shortcode'
        ));
    }
    
    public function ibl_whatsapp_button_shortcode($atts, $content = "") {
        if (!is_admin()) {
            $id                 = $atts['id'];
            $wp_contacts_status = get_post_status($id);
            if ($wp_contacts_status == false || $wp_contacts_status != 'publish') {
                return '';
            }
            
            $whatsapp_contact_name = get_the_title($id);
            $contactdata           = get_post_meta($id, 'iblteam_whatsapp_contacts', true);
            $WhatsApp_profile      = get_the_post_thumbnail_url($id);
            if (!empty($WhatsApp_profile)) {
                $WhatsApp_profile = $WhatsApp_profile;
            } else {
                $WhatsApp_profile = plugins_url('assets/images/avatar.jpg', IBLTEAM_PLUGIN_BASENAME);
            }
            
            // Check redirect on mobile or desktop
            
            $linkapp    = 'web';
            $targetpage = 'target="_blank"';
            if (wp_is_mobile()) {
                $linkapp    = 'api';
                $targetpage = '';
            }
            
            $createchat            = $contactdata['ibl_create_chat'];
            $countrycode           = $contactdata['ibl_country_code'];
            $phone_num             = $contactdata['ibl_phone_number'];
            $btnbgcolor            = $contactdata['ibl_button_bg_color'];
            $showprofileicon       = $contactdata['ibl_show_profile_icon'];
            $prefilledmsg          = $contactdata['ibl_pre_fill_text'];
            $groupchaturl          = $contactdata['ibl_group_chat_url'];
            $btnbordercolor        = $contactdata['ibl_button_border_color'];
            $btnwidthheight        = $contactdata['ibl_button_widheight'];
            $btntlabel             = $contactdata['ibl_button_title'];
            $btntextcolor          = $contactdata['ibl_button_text_color'];
            $profilebordercolor    = $contactdata['ibl_profile_border_color'];

            $prefilledmsg          = str_replace(' ', '%20', $prefilledmsg);
            if (!empty($createchat) && $createchat == 'chatnumber') {
                if (!empty($countrycode) && isset($phone_num)) {
                    $mobilenum = $countrycode . $phone_num;
                }
            }
            
            $url = '';
            if (!empty($mobilenum)) {
                $number = preg_replace('/[^0-9]/', '', $mobilenum);
                $url    = 'https://' . $linkapp . '.whatsapp.com/send?phone=' . $number . '&text=' . $prefilledmsg;
            } else {
                $url = $groupchaturl;
            }
            
            
                    $btnbordercolor     = $contactdata['ibl_button_border_color'];
                    $profilebordercolor = $contactdata['ibl_profile_border_color'];
                    $withborder         = "";
                    if ($profilebordercolor == "on") {
                        $withborder = 'withprofileborder';
                    }
                    
                    switch ($showprofileicon) {
                        case '':
                            $content = '<div id="ibl-whatsapp-btn-' . esc_html($id) . '">';
                            $content .= '<a  target="_blank" href=' . esc_url($url) . ' class="ibl-wp-profile-main float-shadow">
                                    <div  class="wp-profile-dp">
                                    <div class="ibl-wp-profile-wrap ' . esc_html($withborder) . '"></div>
                                    <div class="ibl-wpbtn-info">
                                    <div class="ibl-whatsapp-contact-name">' . esc_html($whatsapp_contact_name) . '</div>
                                    <div class="ibl-wpbtn-title">' . esc_html($btntlabel) . '</div>
                                    </div>
                                    </div>
                                    </a>
                                    </div>';
                            echo '<style> #ibl-whatsapp-btn-' . esc_html($id) . ' .ibl-wp-profile-main { background:' . esc_html($btnbgcolor) . ';  color:' . esc_html($btntextcolor) . '; } 
                          #ibl-whatsapp-btn-' . esc_html($id) . ' .ibl-wp-profile-wrap { background: url(' . esc_html($WhatsApp_profile) . ') center center no-repeat; background-size: cover;border: 4px solid white;    background-color: white; }</style>';
                            if ($profilebordercolor == "on") {
                                echo "<style>.ibl-wp-profile-wrap." . esc_html($withborder) . ":before { border: 4px solid " . esc_html($btnbordercolor) . "; }  </style>";
                            }
                            
                            break;
                        
                        case 'on':
                            $content = '<div id="ibl-whatsapp-icon-btn-' . esc_html($id) . '"><a  target="_blank" href=' . esc_url($url) . '><div  class="wp-profile-dp ibl-iconpo">
                                  <div class="ibl-wp-profile-icon-only wsapp-online-' . esc_html($id) . ' ibl-wp-profile-heightwidth-' . esc_html($id) . ' ' . esc_html($withborder) . '"></div></div></a></div>';
                            if ($profilebordercolor == "on") {
                                echo "<style>#ibl-whatsapp-icon-btn-" . esc_html($id) ." .ibl-wp-profile-icon-only." . esc_html($withborder) . " { border: 4px solid " . esc_html($btnbordercolor) . "; }</style>";
                            }
                            
                            if (!empty($btnwidthheight)) {
                                $btnwidthheight = $btnwidthheight . "px";
                            } else {
                                $btnwidthheight = "65px";
                            }
                            
                            echo "<style>.ibl-wp-profile-icon-only.wsapp-online-" . esc_html($id) . " { background: url('" . esc_html($WhatsApp_profile) . "') center center no-repeat; background-size: cover;    position: relative; } .ibl-wp-profile-heightwidth-" . esc_html($id) . " { width: " . esc_html($btnwidthheight) . ";height:" . esc_html($btnwidthheight) . ";    }</style>";
                            if ($btnwidthheight < '60px') {
                                echo "<style>.ibl-wp-profile-icon-only:after { width: 13px; height: 13px; bottom: 6px; }</style>";
                            }
                            
                            break;
                        
                        default:
                            break;
                    }
          }
        
        return $content;
    }
}

new ibl_whatsappbtn_shortcode();