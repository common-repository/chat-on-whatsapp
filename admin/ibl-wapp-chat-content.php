<?php
/**
 *
 */
class ibl_whatsapp_all_content

{
    protected $iblteam_whatsapp_contacts;
    public function __construct()
    {
        add_action('add_meta_boxes', array(&$this,'ibl_wppchat_add_meta_boxes'));
        add_action('save_post', array($this,'ibl_chat_content_save') , 10, 2);
        add_action('admin_head', array($this,'ibl_wppchat_content_box_css') , 10, 2);
        add_action('wp_head', array($this,'ibl_wppchat_content_stylesbox_css') , 10, 2);
    }

    public function ibl_wppchat_add_meta_boxes()

    {
        add_meta_box('ibl-wapp-contact-details', 'Contact Details', array( $this,'ibl_whatsapp_member_details') , 'whatsapp-chat', 'normal');
        add_meta_box('ibl-wapp-contact-premium-details', 'Get Premium Plugin', array( $this,'ibl_whatsapp_member_premium_details') , 'whatsapp-chat', 'side','low');
    }

    public function ibl_whatsapp_member_details($post)

    {
        wp_nonce_field('chat_on_whatsapp_nonce', 'chat_on_whatsapp_nonce');
        $iblteam_whatsapp_contacts = get_post_meta($post->ID, 'iblteam_whatsapp_contacts', true);
        require (IBLTEAM_PLUGIN_DIR_PATH . 'admin/design/ibl-wapp-chat-btn-pattern.php');

    }

    public function ibl_chat_content_save($post_id, $post)

    {
        require (IBLTEAM_PLUGIN_DIR_PATH . 'admin/ibl-wapp-chat-store.php');

    }

    public function ibl_wppchat_content_box_css()
         
    {
        require (IBLTEAM_PLUGIN_DIR_PATH . 'admin/design/ibl-append-dynamic-css.php');

    }

    public function ibl_wppchat_content_stylesbox_css()
         
    {
        require (IBLTEAM_PLUGIN_DIR_PATH . 'admin/design/ibl-append-frontend-dynamic-css.php');

    }

    public function ibl_whatsapp_member_premium_details()
         
    {
          echo "<div class='premium_main_class'>
                <div> Get Premium Feature</div>
                <div class='premium_main_sub_class'>
                    <ul>
                        <li>Set Availability By Particular Day/Time by 2 ways<br>
                            –&nbsp; Set Availability For Weekly all days<br>
                            –&nbsp; Set Availability For Weekly particular days
                        </li>
                        <li>Advanced Styles For Display WooCommerce Widget<br>
                            –&nbsp;On sidebar
                        </li>
                         <li>Easy Customize Floating Widget Styles</li>
                        
                    </ul> 
                </div>
                <div> <a href='https://codecanyon.net/item/chat-on-whatsapp-whatsapp-chat-plugin-for-wordpress/23638062?s_rank=1' class='ibl_cc_premium_button' target='_blank'>Get Premium</a></div>
                </div>";

    }

    

    
}
new ibl_whatsapp_all_content();