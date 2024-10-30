<form method="post" action="options.php">
    <?php  settings_fields( 'ibl_whatsappwidget_setting' ); 
        do_settings_sections( 'ibl_whatsappwidget_setting' ); ?>
    <div class="ibl-widget-sections" style="width: 70%;display: inline-block;">
        <?php 
            $ibl_show_widget_box= get_option('ibl_show_widget_box');
            $ibl_widget_title= get_option('ibl_widget_title');
            $ibl_widget_description= get_option('ibl_widget_description');
            $ibl_widget_contact_title= get_option('ibl_widget_contact_title');
            $ibl_widget_bg_color= get_option('ibl_widget_bg_color');
            $ibl_widget_text_color= get_option('ibl_widget_text_color');
            $ibl_widget_styles= get_option('ibl_widget_styles');
            $ibl_widget_position= get_option('ibl_widget_position');
            $ibl_select_contact_names= get_option('ibl_select_contact_names');
            $ibl_hide_post_type= get_option('ibl_hide_post_type');
            $ibl_hide_based_on_id= get_option('ibl_hide_based_on_id');
        ?>
        <table class="ibl-widget-table">
            <tr>
                <td>
                    <div class="widget_setting_title"><?php esc_html_e('WhatsApp Widget Settings',IBLTEAM_TEXTDOMAIN ); ?> </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="iblback_box_title iblback_show_profile_choice"><?php esc_html_e('Show widget ',IBLTEAM_TEXTDOMAIN ); ?></div>
                </td>
                <td>
                    <div class="">
                        <label class="iblradioswitch" for="show_widget_box">
                        <input type="checkbox" name="ibl_show_widget_box" id="show_widget_box" <?php  if($ibl_show_widget_box == 'on') {echo 'checked'; }?> >
                        <span class="wsppslider wsppround"></span>
                        </label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="iblback_box_title"><?php esc_html_e('Widget Title',IBLTEAM_TEXTDOMAIN ); ?></div>
                </td>
                <td>
                    <div class="ibl-wapp-inputs-wrap">
                        <input class="ibl-inputbox" type="text" name="ibl_widget_title" value="<?php echo (!empty($ibl_widget_title) ? esc_html($ibl_widget_title) : "") ?>">
                        <span class="ibl-focus-inputbox"></span>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="iblback_box_title ibl-margin-top-up-floating"><?php esc_html_e('Widget description',IBLTEAM_TEXTDOMAIN ); ?></div>
                </td>
                <td>
                    <div class="ibl-wapp-inputs-wrap ibl-margin-top-up-floating">
                        <input class="ibl-inputbox" type="text" name="ibl_widget_description" value="<?php echo (!empty($ibl_widget_description) ? esc_html($ibl_widget_description) : "") ?>">
                        <span class="ibl-focus-inputbox"></span>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="iblback_box_title ibl-box-display-block"><?php esc_html_e('Widget Background Color',IBLTEAM_TEXTDOMAIN ); ?></td>
                <td>
                    <input type="text" class="color-field-picker" name="ibl_widget_bg_color" autocomplete="off" value="<?php echo (!empty($ibl_widget_bg_color) ? esc_html($ibl_widget_bg_color) : "") ?>">
                </td>
            </tr>
            <tr>
                <td class="iblback_box_title ibl-box-display-block">
                    <div class="ibl-widget-text-margin"><?php esc_html_e('Widget Text Color',IBLTEAM_TEXTDOMAIN ); ?></div>
                </td>
                <td>
                    <div>
                        <input type="text" class="color-field-picker" name="ibl_widget_text_color" autocomplete="off" value="<?php echo (!empty($ibl_widget_text_color) ? esc_html($ibl_widget_text_color) : "") ?>">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="iblback_box_title ibl-margin-top-up-floating"><?php esc_html_e('Widget styles',IBLTEAM_TEXTDOMAIN ); ?></div>
                </td>
                <td>
                    <div>
                        <select name="ibl_widget_styles" class="ibl_select_widget_styles">
                            <option value="style1"  <?php  if($ibl_widget_styles == 'style1') {echo 'selected'; }?> ><?php esc_html_e('style1',IBLTEAM_TEXTDOMAIN ); ?></option>
                            <option value="style2" disabled=""><?php esc_html_e('style2',IBLTEAM_TEXTDOMAIN ); ?></option>
                        </select>
                    </div>
                    <div class="iblback_small_text premium">Style2 In Premium Feature </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="iblback_box_title ibl-margin-top-up-floating"><?php esc_html_e('Select Contact Names',IBLTEAM_TEXTDOMAIN ); ?></div>
                </td>
                <td>
                    <div>
                        <select name="ibl_select_contact_names[]" id="iblselect_contact_names" multiple>
                            <?php 
                                $args = array(
                                'post_type' => 'whatsapp-chat',
                                'post_status' => 'publish',
                                );
                                $loop = new WP_Query($args);
                                
                                while($loop->have_posts()): $loop->the_post();
                                $selectednames="";
                                
                                
                                if(in_array(get_the_title(),$ibl_select_contact_names))
                                {
                                $selectednames = "selected";
                                }
                                
                                ?>
                            <option value="<?php the_title(); ?>" <?php echo esc_html($selectednames); ?>><?php the_title(); ?></option>
                            <?php
                                endwhile; 
                                wp_reset_query();?>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="iblback_box_title">
                   <?php esc_html_e(' Widget Position',IBLTEAM_TEXTDOMAIN ); ?>
                </td>
                <td>
                    <group class="inline-radio ">
                        <div><input type="radio" name="ibl_widget_position" value="widget_left" <?php  if($ibl_widget_position == 'widget_left') {echo 'checked'; }?>><label>   <?php esc_html_e('Left',IBLTEAM_TEXTDOMAIN ); ?></label></div>
                        <div><input type="radio" name="ibl_widget_position" value="widget_right"  <?php  if($ibl_widget_position == 'widget_right') {echo 'checked'; }?> ><label>   <?php esc_html_e('Right',IBLTEAM_TEXTDOMAIN ); ?></label></div>
                    </group>
                </td>
            </tr>
            <tr>
                <td class="iblback_box_title">
                     <?php esc_html_e('Hide On Custom Post type',IBLTEAM_TEXTDOMAIN ); ?>
                 
                </td>
                <td>
                    <div>
                        <select name="ibl_hide_post_type[]" id="iblselect_contact_names" multiple="">
                            <option value="post" <?php  if(!empty($ibl_hide_post_type)) {if(in_array( 'post' ,$ibl_hide_post_type))
                                {
                                  echo  "selected";
                                }
                                }
                                
                                 ?>>post</option>
                            <option value="page" <?php if(!empty($ibl_hide_post_type)) { if(in_array( 'page' ,$ibl_hide_post_type))
                                {
                                  echo "selected";
                                }
                                }
                                 ?>
                                >page</option>
                            <?php 
                                $selectednames = "";
                                $args = array(
                                   'public'   => true,
                                   '_builtin' => false
                                );
                                
                                foreach ( get_post_types( $args ) as $post_type ) {
                                   
                                if(in_array( $post_type ,$ibl_hide_post_type))
                                {
                                  $selectednames = "selected";
                                }
                                
                                           ?>
                            <option value="<?php echo esc_html($post_type); ?>" <?php echo esc_html($selectednames); ?>><?php echo $post_type; ?></option>
                            <?php 
                                }
                                   ?>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="iblback_box_title"><?php esc_html_e('Hide Based on Post/Page ID',IBLTEAM_TEXTDOMAIN ); ?></div>
                </td>
                <td>
                    <div class="ibl-wapp-inputs-wrap">
                        <input class="ibl-inputbox" type="text" name="ibl_hide_based_on_id" value="<?php echo esc_html($ibl_hide_based_on_id); ?>">
                        <span class="ibl-focus-inputbox"></span>
                    </div>
                    <div class="iblback_small_text"><?php esc_html_e('Make sure You have unselect Post/page in above Drop down',IBLTEAM_TEXTDOMAIN ); ?> </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="ibl-widget-preview-sections" style="width: 30%;float: right;margin-top: 25px;">
        <div class="title_for_premium_view"> Premium View For Style1 </div>
        <img class="style1_premium_view_img" src="<?php echo esc_url(plugins_url('assets/images/chatstyle1.png', IBLTEAM_PLUGIN_BASENAME)); ?>">
         <div class="title_for_premium_view style2"> Premium View For Style2 </div>
          <img class="style1_premium_view_img" src="<?php echo esc_url(plugins_url('assets/images/chatstyle2.png', IBLTEAM_PLUGIN_BASENAME)); ?>">
    </div>
    <?php submit_button(); ?>
</form>