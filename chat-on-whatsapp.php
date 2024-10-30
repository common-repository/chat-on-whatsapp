<?php
/*
 * Plugin Name:       Chat On WhatsApp -  WhatsApp chat Plugin for WordPress
 * Plugin URI:        http://iblinfotech.com/chatonwhatsapp/
 * Description:       BUILD A PERSONAL CONNECTION WITH LIVE SUPPORT
 * Version:           1.0.0
 * Author:            IBLINFOTECH
 * Author URI:        https://iblinfotech.com/
 * Text Domain:       ibl-whatsapp-chat
*/

/********************************
    DEFINE CONTANT
*********************************/

if (!function_exists('add_action')) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

if ( ! defined( 'ABSPATH' ) ) 
     die( 'Nope, not accessing this' );

if(!defined('IBLTEAM_PLUGIN_URL'))        
    define('IBLTEAM_PLUGIN_URL', plugin_dir_url(__FILE__));

if(!defined('IBLTEAM_PLUGIN_DIR'))
    define('IBLTEAM_PLUGIN_DIR',__FILE__);

if(!defined('IBLTEAM_PLUGIN_DIR_PATH'))
    define('IBLTEAM_PLUGIN_DIR_PATH', plugin_dir_path(__FILE__));

if(!defined('IBLTEAM_PLUGIN_BASENAME'))
    define('IBLTEAM_PLUGIN_BASENAME',plugin_basename(__FILE__));    

if(!defined('IBLTEAM_TEXTDOMAIN'))
    define('IBLTEAM_TEXTDOMAIN','ibl-whatsapp-chat');    

if(!defined('CHAT_OPTIONS'))
    define('CHAT_OPTIONS', 'chat-for-whatsapp-me');
    
/********************************************
    PLUGIN ACTIVATION AND DEACTIVATEION HOOK
**********************************************/

class ibl_chat_on_whatsapp_me
{
     
    public function __construct(){
        
	    register_activation_hook( IBLTEAM_PLUGIN_DIR, array($this,'ibl_chat_plugin_activate' ));
	    add_action( 'admin_init', array($this,'ibl_chat_Wp_admin_icon' ));
	    add_action('admin_enqueue_scripts', array($this,'ibl_chat_admin_styles' ));
	    add_action('wp_enqueue_scripts', array($this,'ibl_chat_Wpbutton_styles' ));
	    add_action('wp_footer', array($this,'ibl_chat_Wpmaterialize_styles' ));
	    add_action('admin_head', array($this,'ibl_chat_admin_icon_styles'));
      register_deactivation_hook( IBLTEAM_PLUGIN_DIR, array($this,'ibl_chat_plugin_deactivate' ));
    
    }

      public function ibl_chat_plugin_activate() {
           if(is_admin()){
                      add_option("activated_whatsapp_options",CHAT_OPTIONS);
            }
      }

      public function ibl_chat_Wp_admin_icon() {
        global $menu;
        foreach( $menu as $key => $value ){
                if( 'Chat On WhatsApp' == $value[0] )
                      $menu[$key][4] .= " chat-on-whatsapp-admin-icon";
        }
      }

    public function ibl_chat_admin_styles() {
        global $post_type;

       if(is_admin() && $post_type == 'whatsapp-chat' || @$_GET['page'] == 'floating-widget-whatsapp' || @$_GET['page'] == 'woocommerce-widget-whatsapp' ){
        wp_enqueue_style( 'ibl-adminstyle', plugins_url( 'assets/styles/style.css', IBLTEAM_PLUGIN_BASENAME ),array(),'');
        wp_enqueue_style( 'ibl-input-mobile-phone',plugins_url( 'assets/styles/ibl-input-mobile-phone.css', IBLTEAM_PLUGIN_BASENAME ) , array(),'');
        wp_enqueue_style( 'wp-color-picker');
        // wp_enqueue_script( 'ibl-admin-jquery', "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js",'', null, true );
        wp_enqueue_script( 'ibl-input-mobile-phone-js', plugins_url( 'assets/scripts/ibl-input-mobile-phone.js', IBLTEAM_PLUGIN_BASENAME ),'', null, true );
        wp_enqueue_script( 'ibl-input-mobile-phone-min-js',  plugins_url( 'assets/scripts/ibl-input-mobile-phone-min.js', IBLTEAM_PLUGIN_BASENAME ),'', null, true );
        wp_enqueue_script( 'ibl-input-mobile-phone-utils-js', plugins_url( 'assets/scripts/ibl-input-mobile-phone-utils.js', IBLTEAM_PLUGIN_BASENAME ), '' , null, true );
        wp_enqueue_script( 'wp-custom-whatsapp-js', plugins_url('assets/scripts/custom-whatsapp.js', IBLTEAM_PLUGIN_BASENAME ), array( 'jquery', 'wp-color-picker' ), '', true );
       
        wp_enqueue_style( 'ibl-Wpbuttonpreviewstyle', plugins_url( 'assets/styles/btn-preview-style.css', IBLTEAM_PLUGIN_BASENAME ),array(),'');

      }
        
    }

    public function ibl_chat_Wpbutton_styles() {

        wp_enqueue_style( 'ibl-Wpbuttonstyle', plugins_url( 'assets/styles/btn-styles.css', IBLTEAM_PLUGIN_BASENAME ),array(),'');
        wp_enqueue_script( 'wp-widgetstyles', plugins_url('assets/scripts/widget-styles.js', IBLTEAM_PLUGIN_BASENAME ), array( 'jquery' ), '', true );
        wp_enqueue_style( 'ibl-custom-font-styles', plugins_url( 'assets/styles/ibl-font-awesome-style.css', IBLTEAM_PLUGIN_BASENAME ),array(),'' ,array(),'');

    }

    public function ibl_chat_Wpmaterialize_styles(){
     
        wp_enqueue_script( 'ibl-slider-caro-style2',  plugins_url('assets/scripts/carousel-slider-materialize-min.js', IBLTEAM_PLUGIN_BASENAME ) ,'', null, true );
    } 
 

    public function ibl_chat_admin_icon_styles() {
        if(is_admin()){
          echo '<style>.chat-on-whatsapp-admin-icon img {padding: 4px 0 0 !important; }</style>';
        }
    }

      public function ibl_chat_plugin_deactivate(){
            if(is_admin()){
                delete_option("activated_whatsapp_options");
            }
      }
}

require_once (IBLTEAM_PLUGIN_DIR_PATH . 'class-admin-interface.php');
new ibl_chat_on_whatsapp_me();
new ibl_admin_interface();