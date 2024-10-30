<form method="post" action="options.php">
    <?php  settings_fields( 'ibl_woocommerce_widget_setting' ); 
        do_settings_sections( 'ibl_woocommerce_widget_setting' ); ?>
    <div class="ibl-widget-sections" style="width: 70%;display: inline-block;">
    <?php 
        $ibl_btn_position_woocomerce = get_option('ibl_btn_position_woocomerce');
        $ibl_select_contact_names = get_option('ibl_woocommerce_multiple_contact_names');
        $ibl_contact_btn_view = get_option('ibl_contact_btn_view');
    ?>
    <table class="ibl-widget-table">
        <tr>
            <td>
                <div class="widget_setting_title"><?php esc_html_e('Woocommerce Widget Settings',IBLTEAM_TEXTDOMAIN ); ?> </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="iblback_box_title"><?php esc_html_e('Button Position on Product Page',IBLTEAM_TEXTDOMAIN ); ?> </div>
                 <div class="iblback_small_text premium">On Sidebar For Woocommerce Available In Premium Feature </div>
            </td>
            <td>
                <select name="ibl_btn_position_woocomerce" class="ibl_select_widget_styles" style="width:">
                    <option value="before_add_to_cart"   <?php if($ibl_btn_position_woocomerce == 'before_add_to_cart' ) { echo "selected"; } ?>>Before Add to Cart</option>
                    <option value="after_add_to_cart"  <?php if($ibl_btn_position_woocomerce == 'after_add_to_cart' ) { echo "selected"; } ?> >After Add to Cart</option>
                    <option value="share_on_sidebar"  disabled="" >On Sidebar</option>
                </select>
            </td>

        </tr>
        <tr>
            <td>
                <div class="iblback_box_title ibl-margin-top-up-floating">Select Contact Button View</div>
            </td>
            <td>
                <div class="ibl-margin-top-up-floating">
                <select name="ibl_woocommerce_multiple_contact_names[]" id="iblselect_contact_names" multiple="">
                    <?php 
                        $args = array(
                        'post_type' => 'whatsapp-chat',
                        );
                        $loop = new WP_Query($args);
                        
                        while($loop->have_posts()): $loop->the_post();
                        $selectednames="";
                      
                        $Id = get_page_by_title(get_the_title(),'OBJECT','whatsapp-chat');
                        
                        if(in_array($Id->ID, $ibl_select_contact_names)){
                              $selectednames = "selected";
                        }                        
                        
                        ?>
                    <option value="<?php the_ID(); ?>" <?php echo esc_html($selectednames); ?>><?php the_title(); ?></option>
                    <?php
                        endwhile; 
                        wp_reset_query();?>
                </select>
                <div>
        </tr>
    </table>
    </div>
     <div class="ibl-widget-preview-sections" style="width: 30%;float: right;margin-top: 25px;">
        <div class="title_for_premium_view" style="text-align:left"> Premium View For OnSidebar</div>
        <img  src="<?php echo esc_url(plugins_url('assets/images/onsidebar.png', IBLTEAM_PLUGIN_BASENAME)); ?>">
         
    </div>
    <?php submit_button(); ?>
</form>