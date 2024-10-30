  var $ = jQuery;
  "use strict"; 
  $(document).ready(function () {

        $('#ibl-whats-openPopup').on('click',function () {

    
            $(".ibl-widget__chatbox").css({ visibility: 'visible', opacity: '1' }).fadeIn("slow");
         $(".ibl-widget__chatbox").animate({ "-webkit-animation": 'fadeIn 3s', "animation": ' animation: showNav 250ms ease-in-out both;' ,
     		"-webkit-transition": "height 0s, opacity 300ms ease-in-out;" ,
     		"-moz-transition": "height 0s, opacity 300ms ease-in-out;" ,
     		"-ms-transition": "height 0s, opacity 300ms ease-in-out;" ,
     		"-o-transition": "height 0s, opacity 300ms ease-in-out;" ,
     		"transition": "height 0s, opacity 300ms ease-in-out;" });
        });
          $(".close-thik").on('click', function () {

        
            $(".ibl-widget__chatbox").css({ visibility: 'hidden', opacity: '0' }).fadeOut("slow");
   $(".ibl-widget__chatbox").animate({ "-webkit-animation": 'fadeOut 3s', "animation": ' animation: showNav 250ms ease-in-out both;' ,
     		"-webkit-transition": "height 0s, opacity 300ms ease-in-out;" ,
     		"-moz-transition": "height 0s, opacity 300ms ease-in-out;" ,
     		"-ms-transition": "height 0s, opacity 300ms ease-in-out;" ,
     		"-o-transition": "height 0s, opacity 300ms ease-in-out;" ,
     		"transition": "height 0s, opacity 300ms ease-in-out;" });
        });

       
});

 
 

 


 document.addEventListener('DOMContentLoaded', function() {
   var options = {}
    var elems = document.querySelectorAll('.carousel');
    var instances = M.Carousel.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('.carousel').carousel();
  });
      


