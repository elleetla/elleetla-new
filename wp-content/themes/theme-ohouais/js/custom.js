$(document).ready(function() {
// Opening javascript sheet elle&la 

    // open the contact part
    $("#menu-item-3023").click(function() {
        $('.contact-list').slideToggle("slow");
    });

    // close the contact part
    $(".close-contact-listing a").click(function(){
        $(".contact-list").slideUp("slow");
    });

    // flitre realisation
    $("#btnFiltre").click(function(){
        $("#filters").show();
    }); 

    // Fancybox project
    $(".various").fancybox({
        fitToView   : false,
        padding : 0,
        overlayColor :'#D3D3D3',
        transitionIn :'elastic',
        transitionOut :'elastic',
        overlayOpacity : 0.7,
        width       : '100%',
        height      : '100%',
        autoSize    : true,
        autoDimensions : true,
        closeClick  : true,
        openEffect  : 'elastic',
        closeEffect : 'elastic',
        iframe : {
            scrolling : 'no'
        }
    });

    // owl carousel project 
    $("#owl-demo").owlCarousel({
      navigation : true, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
    });

    // effect header project
    $(window).scroll(function() {
      if ($(this).scrollTop() > 1){  
        $('#header-project').addClass("sticky");
      }else{
        $('#header-project').removeClass("sticky");
      }
    });
    
// Closure javascript sheet elle&la     
});

