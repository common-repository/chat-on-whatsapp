<?php

$ibl_widget_bg_color = "";
if (!empty(get_option('ibl_widget_bg_color'))) {
    $ibl_widget_bg_color = get_option('ibl_widget_bg_color');
}

$ibl_widget_text_color = "";
if (!empty(get_option('ibl_widget_text_color'))) {
    $ibl_widget_text_color = get_option('ibl_widget_text_color');
}

$ibl_hide_post_type = "";
if (!empty(get_option('ibl_hide_post_type'))) {
    $ibl_hide_post_type = get_option('ibl_hide_post_type');
}

$ibl_hide_based_on_id = "";
if (!empty(get_option('ibl_hide_based_on_id'))) {
    $ibl_hide_based_on_id = get_option('ibl_hide_based_on_id');
}

$ibl_widget_position = "";
if (!empty(get_option('ibl_widget_position'))) {
    $ibl_widget_position = get_option('ibl_widget_position');
}


switch ($ibl_widget_position) {
    case 'widget_left':
        $positionproperty = "left";
        break;
    
    case 'widget_right':
        $positionproperty = "right";
        break;
    
    default:
        $positionproperty = "right";
        break;
}



echo '<style>
    .ibl-widget__chatbox_header{
     background-color: ' . esc_html($ibl_widget_bg_color) . ';
     color : ' . esc_html($ibl_widget_text_color) . ';
    }
    .ibl_wsapp_chat_header{
     background-color: ' . esc_html($ibl_widget_bg_color) . ';
     color : ' . esc_html($ibl_widget_text_color) . ';
    }
     .main-footer-widget-chatbox{
      ' . esc_html($positionproperty) . ':20px;
    }
    #iblchatbox{
     ' . esc_html($positionproperty) . ':25px;
    }
    .ibl_wsapp_fabs{
     ' . esc_html($positionproperty) . ':0;
    }
    .chat{
      ' . esc_html($positionproperty) . ':85px;    
    }
    @media only screen and (max-width: 400px){ 
      .chat{ bottom: 85px !important;
         ' . esc_html($positionproperty) . ': 25px !important;
        }
    }
    </style>';

if (!empty($ibl_hide_post_type)) {
    if (in_array(get_post_type(), $ibl_hide_post_type)) {
?>
   <style type="text/css">.main-footer-widget-chatbox , .ibl_wsapp_fabs { display : none; }</style>
    <?php
    }
}
$hidebyid   = array();
$hidebyid[] = $ibl_hide_based_on_id;

if (!empty($hidebyid)) {
    if (in_array(get_the_ID(), $hidebyid)) {
?>
   <style type="text/css">.main-footer-widget-chatbox , .ibl_wsapp_fabs{ display : none; }</style>
    <?php
    }
}