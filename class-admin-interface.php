<?php 
/**
 * 
 */
class ibl_admin_interface
{
    
   function __construct()
     
       {
        require_once (IBLTEAM_PLUGIN_DIR_PATH . 'admin/ibl-wapp-chat-add-new.php');
        require_once (IBLTEAM_PLUGIN_DIR_PATH . 'admin/ibl-wapp-chat-content.php');
        require_once (IBLTEAM_PLUGIN_DIR_PATH . 'admin/ibl-wapp-chat-shortcode.php');
        require_once (IBLTEAM_PLUGIN_DIR_PATH . 'admin/ibl-wapp-footer-widget-view.php');
        require_once (IBLTEAM_PLUGIN_DIR_PATH . 'admin/ibl-wapp-woocommerce-widget-view.php');
       }
       
}