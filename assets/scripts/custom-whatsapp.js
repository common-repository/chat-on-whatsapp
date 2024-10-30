var $ = jQuery;

( function ( $ ) {
    'use strict';
 $( '.color-field-picker' ).wpColorPicker();
$(document).ready(function(){


var post_title = $('input[name="post_title"]').val();
$('.ibl-whatsapp-contact-name').text(post_title);

var radioValue = $("input[name='ibl_create_chat']:checked"). val();
if(radioValue){

   $("."+radioValue+".iblback_waap-box").css("display", "block"); 



}


  });
} ( jQuery ) );



     $('input[type="radio"]').on('click',function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".iblback_waap-box").not(targetBox).hide();
        $(targetBox).show();
    });
    


$(function () {
   "use strict"; 
    var  profile_iconval = $("input[name='show_profile_icon']:checked").val();
   if(profile_iconval == 'on'){

 $(".wp-profile-dp.iblbtnpreview").css("display", "block"); 

   $("#ibl_wsapp_btn_width_height").css("display", "block"); 
$("#ibl-whatsapp-full-btn").css("display", "none"); 
 $("#ibl_wsapp_btn_title").css("display", "none"); 

}
else{
  $("#ibl-whatsapp-full-btn").css("display", "block"); 
 $(".wp-profile-dp.iblbtnpreview").css("display", "none"); 

}




  var  profile_borderval = $("input[name='profile_border_color']:checked").val();
   if(profile_borderval){

   $("#subprofile_border_color").css("display", "block"); 


}
else{
   $("#subprofile_border_color").css("display", "none"); 
}



var contact_btn_view = $("input[name='ibl_contact_btn_view']:checked"). val();
if(contact_btn_view){

   $("."+contact_btn_view+".iblback_waap-box").css("display", "table-row"); 



}




   });
( function ( $ ) {
    'use strict';

        $("#chkPassport").on('click',function () {
            if ($(this).is(":checked")) {
                $("#ibl_wsapp_btn_width_height").show();
                $("#ibl_wsapp_btn_title").hide();
            } else {
                $("#ibl_wsapp_btn_width_height").hide();
                $("#ibl_wsapp_btn_title").show();
            }
  
  });

} ( jQuery ) );


( function ( $ ) {
    'use strict';
        $("#profile_border_color").on('click',function () {
            if ($(this).is(":checked")) {
                $("#subprofile_border_color").show();
               
            } else {
                $("#subprofile_border_color").hide();
               
            }
        });

  } ( jQuery ) );

( function ( $ ) {
    'use strict';
    
// JavaScript for label effects only
    $('.ibl-inputbox').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })    
    })

  } ( jQuery ) );

var telInput = $("#phone"),
  errorMsg = $("#error-msg"),
  validMsg = $("#valid-msg");

var pluginpath = $('#pluginpath').val();
  
// initialise plugin
telInput.intlTelInput({

  allowExtensions: true,
  formatOnDisplay: true,
  autoFormat: true,
  autoHideDialCode: true,
  autoPlaceholder: true,
  defaultCountry: "auto",
  ipinfoToken: "yolo",

  nationalMode: false,
  numberType: "MOBILE",
  //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
  preferredCountries: ['sa', 'ae', 'qa','om','bh','kw','ma'],
  preventInvalidNumbers: true,
  separateDialCode: true,
  initialCountry: "auto",
  geoIpLookup: function(callback) {
  $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
    var countryCode = (resp && resp.country) ? resp.country : "";
    callback(countryCode);
  });
},
   utilsScript: pluginpath + "assets/scripts/ibl-input-mobile-phone-utils.js"
});

var reset = function() {
  telInput.removeClass("error");
  errorMsg.addClass("hide");
  validMsg.addClass("hide");
};

// on blur: validate
telInput.blur(function() {
  reset();
  if ($.trim(telInput.val())) {
    if (telInput.intlTelInput("isValidNumber")) {
      validMsg.removeClass("hide");
    } else {
      telInput.addClass("error");
      errorMsg.removeClass("hide");
    }
  }
});

// on keyup / change flag: reset
telInput.on("keyup change", reset);


( function ( $ ) {
    'use strict';

$(".intl-tel-input.allow-dropdown").on('click', function () {
 var Country_name =  telInput.intlTelInput("getSelectedCountryData").name;
  var country_Code = telInput.intlTelInput('getSelectedCountryData').dialCode;
  var flag_code = telInput.intlTelInput('getSelectedCountryData').iso2;

  $("#countrycode").val("+"+country_Code);
   $("#countryname").val(Country_name);
   $("#flagcode").val(flag_code);
 
 
});

  } ( jQuery ) );

$(function () {
  "use strict"; 
var ccode= $("#countrycode").val();
  var cname =  $("#countryname").val();
 var fcode=  $("#flagcode").val();

 $(".selected-dial-code").text(ccode);
var k = $(".selected-dial-code").text();
if( $.trim( $( '.selected-dial-code' ).text() ) == "" ) {
  
} else {
    $(".intl-tel-input.allow-dropdown").addClass("iti-sdc-3 iti-sdc-4");
    $(".flag-container .selected-flag").attr("title", cname+":"+ccode);

      $(".selected-flag .iti-flag").addClass(fcode);
   
}




  });


( function ( $ ) {
    'use strict';

$('#schedule_time_sunday_start').on('change', function (e) {
   var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
  var index = $(this).find('option:selected').index();

 $('#schedule_time_sunday_end').not(this).find('option:lt(' + index + ')').prop('disabled', true);
          });

  } ( jQuery ) );

( function ( $ ) {
    'use strict';

  $('#schedule_time_sunday_end').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
  
    var index = $(this).find('option:selected').index();
   
    $('#schedule_time_sunday_start').not(this).find('option:gt(' + index + ')').prop('disabled', true);  
  });

  } ( jQuery ) );

( function ( $ ) {
    'use strict';

$('#schedule_time_monday_start').on('change', function (e) {
   var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
  var index = $(this).find('option:selected').index();

 $('#schedule_time_monday_end').not(this).find('option:lt(' + index + ')').prop('disabled', true);
          });

  } ( jQuery ) );

( function ( $ ) {
    'use strict';

  $('#schedule_time_monday_end').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
  
    var index = $(this).find('option:selected').index();
   
    $('#schedule_time_monday_start').not(this).find('option:gt(' + index + ')').prop('disabled', true);  
  });
  } ( jQuery ) );

( function ( $ ) {
    'use strict';

$('#schedule_time_tuesday_start').on('change', function (e) {
   var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
  var index = $(this).find('option:selected').index();

 $('#schedule_time_tuesday_end').not(this).find('option:lt(' + index + ')').prop('disabled', true);
          });

  } ( jQuery ) );

( function ( $ ) {
    'use strict';


  $('#schedule_time_tuesday_end').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
  
    var index = $(this).find('option:selected').index();
   
    $('#schedule_time_tuesday_start').not(this).find('option:gt(' + index + ')').prop('disabled', true);  
  });

  } ( jQuery ) );


( function ( $ ) {
    'use strict';

$('#schedule_time_wednesday_start').on('change', function (e) {
   var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
  var index = $(this).find('option:selected').index();

 $('#schedule_time_wednesday_end').not(this).find('option:lt(' + index + ')').prop('disabled', true);
          });

  } ( jQuery ) );

( function ( $ ) {
    'use strict';

  $('#schedule_time_wednesday_end').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
  
    var index = $(this).find('option:selected').index();
   
    $('#schedule_time_wednesday_start').not(this).find('option:gt(' + index + ')').prop('disabled', true);  
  });

  } ( jQuery ) );

( function ( $ ) {
    'use strict';

$('#schedule_time_thursday_start').on('change', function (e) {
   var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
  var index = $(this).find('option:selected').index();

 $('#schedule_time_thursday_end').not(this).find('option:lt(' + index + ')').prop('disabled', true);
          });
  } ( jQuery ) );

( function ( $ ) {
    'use strict';


  $('#schedule_time_thursday_end').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
  
    var index = $(this).find('option:selected').index();
   
    $('#schedule_time_thursday_start').not(this).find('option:gt(' + index + ')').prop('disabled', true);  
  });
  } ( jQuery ) );

( function ( $ ) {
    'use strict';


$('#schedule_time_friday_start').on('change', function (e) {
   var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
  var index = $(this).find('option:selected').index();

 $('#schedule_time_friday_end').not(this).find('option:lt(' + index + ')').prop('disabled', true);
          });

  } ( jQuery ) );

( function ( $ ) {
    'use strict';

  $('#schedule_time_friday_end').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
  
    var index = $(this).find('option:selected').index();
   
    $('#schedule_time_friday_start').not(this).find('option:gt(' + index + ')').prop('disabled', true);  
  });

  } ( jQuery ) );

( function ( $ ) {
    'use strict';

$('#schedule_time_saturday_start').on('change', function (e) {
   var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
  var index = $(this).find('option:selected').index();

 $('#schedule_time_saturday_end').not(this).find('option:lt(' + index + ')').prop('disabled', true);
          });
  } ( jQuery ) );

( function ( $ ) {
    'use strict';


  $('#schedule_time_saturday_end').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
  
    var index = $(this).find('option:selected').index();
   
    $('#schedule_time_saturday_start').not(this).find('option:gt(' + index + ')').prop('disabled', true);  
  });
  } ( jQuery ) );

 
( function ( $ ) {
    'use strict';

$('input[name="button_title"]').on('keyup', function() {
  
    $('.ibl-wpbtn-title').text(this.value);
  
});
  } ( jQuery ) );

( function ( $ ) {
    'use strict';

$('input[name="button_bg_color"]').on('change', function(){
//  alert();
    var bodyColor = $(this).val();
    console.log(bodyColor);
  
});

  } ( jQuery ) );

 $( "input[name='button_bg_color']" ).wpColorPicker(
{
     change: function(event, ui){
    var theColor = ui.color.toString();
    
        $('.ibl-wp-profile-main').css("background",theColor);
   // alert(theColor);
  } 
   });

  $( "input[name='button_text_color']" ).wpColorPicker(
{
     change: function(event, ui){
    var textColor = ui.color.toString();
    
        $('.ibl-wp-profile-main').css("color",textColor);
   // alert(theColor);
  } 
   });

( function ( $ ) {
    'use strict';

$("#button_widhight").on('change',function(){
    var btn_widthheight = $(this).val();

 
    $('.ibl-wp-profile-icon-only').css({'width':btn_widthheight+'px',"height":btn_widthheight+"px"})

    if(btn_widthheight >= 40 && btn_widthheight <=50 )
    {
     
      $('.ibl-wp-profile-icon-only').addClass('icon_resizeable');
    }
    else{
        $('.ibl-wp-profile-icon-only').removeClass('icon_resizeable');
    }


  });



$("#chkPassport").on('change',function(){
    var  pro_iconval = $("input[name='show_profile_icon']:checked").val();

  
  if(pro_iconval == 'on')
  {
$("#button_widhight").on('change',function(){
    var btn_widthheight = $(this).val();

 
    $('.ibl-wp-profile-icon-only').css({'width':btn_widthheight+'px',"height":btn_widthheight+"px"})

    if(btn_widthheight >= 40 && btn_widthheight <=50 )
    {
     
      $('.ibl-wp-profile-icon-only').addClass('icon_resizeable');
    }
    else{
        $('.ibl-wp-profile-icon-only').removeClass('icon_resizeable');
    }


  });



 $(".wp-profile-dp.iblbtnpreview").css("display", "block"); 
     $("#ibl-whatsapp-full-btn").css("display", "none"); 
  
  }
  else{
     $("#ibl-whatsapp-full-btn").css("display", "block"); 
      $(".wp-profile-dp.iblbtnpreview").css("display", "none"); 
  }
});

  } ( jQuery ) );

( function ( $ ) {
    'use strict';


 $( "input[name='button_border_color']" ).wpColorPicker(
{
     change: function(event, ui){
    var theborderColor = ui.color.toString();
    
        $('.ibl-wp-profile-icon-only').css("border","4px solid"+theborderColor);
    
      
      $('.ibl-wp-profile-wrap').css('border','6px solid'+theborderColor);
  
  } 
   });

 

$("#profile_border_color").on('change',function(){
   "use strict"; 


     var  profi_borderval = $("input[name='profile_border_color']:checked").val();

  //  alert(pro_iconval);

  if(profi_borderval == 'on')
  {


   var button_border_color =  $("input[name='button_border_color']").val();
 
 if(button_border_color) {
        $('.ibl-wp-profile-icon-only').css("border","4px solid"+button_border_color);
          $('.ibl-wp-profile-wrap').css('border','6px solid'+button_border_color);
      }
      else{
         $('.ibl-wp-profile-icon-only').css("border","4px solid white");
          $('.ibl-wp-profile-wrap').css('border','6px solid white');
      }
    
 $( "input[name='button_border_color']" ).wpColorPicker(
{
     change: function(event, ui){
    var theborderColor = ui.color.toString();
    
        $('.ibl-wp-profile-icon-only').css("border","4px solid"+theborderColor);
    
      
      $('.ibl-wp-profile-wrap').css('border','6px solid'+theborderColor);
  
  } 
   });


 
// $('.ibl-wp-profile-wrap').addClass('without-after-element');
  }
  else{

     $('.ibl-wp-profile-wrap').css('border','6px solid white');
       $('.ibl-wp-profile-icon-only').css('border','4px solid white');

  
      

 
  }

});

  } ( jQuery ) );

( function ( $ ) {
    'use strict';

$("body").on('mouseover',function(){
 "use strict"; 
var imagepath = $('#postimagediv img').attr("src");
//console.log(imagepath);
var imagefullpathdefault = $('#full_image_real_path').val();

if(imagepath)
{
  $('.ibl-wp-profile-icon-only').css({"background":"url(" + imagepath + ")","background-size": "cover"});
   $('.ibl-wp-profile-wrap').css({"background":"url(" + imagepath + ")","background-size": "cover"});

  
}
else{
 // console.log("dasdsa");
 $('.ibl-wp-profile-icon-only').css({"background":"url(" + imagefullpathdefault + ")","background-size": "cover"});
   $('.ibl-wp-profile-wrap').css({"background":"url(" + imagefullpathdefault + ")","background-size": "cover"});

}


});

  } ( jQuery ) );

( function ( $ ) {
    'use strict';
    
$('input[name="post_title"]').on('change',function(){
 "use strict"; 
var post_title = $('input[name="post_title"]').val();
$('.ibl-whatsapp-contact-name').text(post_title);
});

  } ( jQuery ) );