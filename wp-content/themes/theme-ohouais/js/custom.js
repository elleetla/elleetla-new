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

    /* in réalisations, filter projets when click on categoies navbar */
    var $container = $('#portfolio');

    // create a clone that will be used for measuring container width
    $containerProxy = $container.clone().empty().css({ visibility: 'hidden' });

    $container.after( $containerProxy );

    // get the first item to use for measuring columnWidth
    var $item = $container.find('.portfolio-item').eq(0);

    $container.imagesLoaded(function(){
        $(window).smartresize( function() {

            // calculate columnWidth
            var colWidth = Math.floor( $containerProxy.width() / 3 ); // Change this number to your desired amount of columns

            // set width of container based on columnWidth
            $container.css({
                width: colWidth * 3 // Change this number to your desired amount of columns
            })
                .isotope({

                    // disable automatic resizing when window is resized
                    resizable: false,

                    // set columnWidth option for masonry
                    masonry: {
                        columnWidth: colWidth
                    }
                });

            // trigger smartresize for first time
        }).smartresize();
    });

    // filter items when filter link is clicked
    $('#filters a').click(function(){

        var selector = $(this).attr('data-filter');
        $container.isotope({ filter: selector, animationEngine : "css" });
        $(this).addClass('active');
        $('#filters a.active').removeClass('active');
        return false;

    });
    /* in réalisations, filter projets when click on categories navbar */

// Closure javascript sheet elle&la     
});

$(window).on('load', function(){
    $('#status').delay(500).fadeOut();
    $('#preloader').delay(500).fadeOut('slow');
    $('body').delay(350).css({'overflow':'visible'});
});