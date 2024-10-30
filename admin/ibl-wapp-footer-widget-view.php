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
class ibl_whatsapp_footer_widget {

    public function __construct() {
        add_action('wp_footer', array($this,'ibl__wpp_footer_widget_chatbox'));
        add_action('admin_menu', array($this,'ibl_chat_on_whatsapp_menu') , 10, 2);
        add_action('admin_init', array($this,'ibl_chat_register_mysettings'));

    }

    public function ibl__wpp_footer_widget_chatbox($post) {

        $ibl_widget_styles = get_option('ibl_widget_styles');

      switch (  $ibl_widget_styles ) {
          case 'style1':
              require_once (IBLTEAM_PLUGIN_DIR_PATH . 'admin/design/ibl-wapp-widget-style1.php');
          break;
          case 'style2':
              require_once (IBLTEAM_PLUGIN_DIR_PATH . 'admin/design/ibl-wapp-widget-style2.php');
          break;
          default:
            require_once (IBLTEAM_PLUGIN_DIR_PATH . 'admin/design/ibl-wapp-widget-style1.php');
          break;
     }

    }

    public function ibl_chat_on_whatsapp_menu() {

        $edit_account_link = 'post-new.php?post_type=whatsapp-chat';

        add_menu_page('Chat On WhatsApp', 'Chat On WhatsApp', 'manage_options', 'ibl_chat_whatsapp', [$this, 'floatingfooterpattern'], plugins_url('assets/images/wordpress-Appicon_menu.png', IBLTEAM_PLUGIN_BASENAME));
        add_submenu_page('ibl_chat_whatsapp', 'Add New Contact', 'Add New Contact', 'edit_posts', $edit_account_link);
        add_submenu_page('ibl_chat_whatsapp', 'Floating Widget', 'Floating Widget', 'edit_posts', 'floating-widget-whatsapp', [$this, 'ibl_chat_floating_footerpattern']);

        add_submenu_page('ibl_chat_whatsapp', 'Woocommerce Widget', 'Woocommerce Widget', 'edit_posts', 'woocommerce-widget-whatsapp', [$this, 'ibl_chat_woocommerce_settings']);

    }

    public function ibl_chat_floating_footerpattern() {
        require_once (IBLTEAM_PLUGIN_DIR_PATH . 'admin/design/ibl-wapp-footer-widget-pattern.php');

    }

    public function ibl_chat_register_mysettings() {
        require_once (IBLTEAM_PLUGIN_DIR_PATH . 'admin/ibl-wapp-save-widget-settings.php');

    }

    public function ibl_chat_woocommerce_settings() {
        require (IBLTEAM_PLUGIN_DIR_PATH . 'admin/design/ibl-wapp-woocommerce-btn-pattern.php');
    }

}

new ibl_whatsapp_footer_widget();

