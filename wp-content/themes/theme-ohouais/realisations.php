<?php
/*
Template Name: Réalisations
*/
?>
 
<?php
get_header(); ?>
 
    <!-- .container -->
    <div class="container">
        <!-- .row -->
        <div class="row">
            <!-- .col-lg-12 -->
            <div class="col-lg-12">

            <nav id="navFiltre">

                <ul id="filters">
                <?php
                    $terms = get_terms("categories");
                    $count = count($terms);
                        echo '<li><a href="javascript:void(0)" title="" data-filter=".all" class="active">Tous</a></li><span></span>';
                    if ( $count > 0 ){
         
                        foreach ( $terms as $term ) {
         
                            $termname = strtolower($term->name);
                            $termname = str_replace(' ', '-', $termname);
                            echo '<li><a href="javascript:void(0)" title="" data-filter=".'.$termname.'">'.$term->name.'</a></li><span></span>';
                        }
                    }
                ?>
                </ul>
            </div>

            </nav>

            <!-- /.col-lg-12 -->
 
            <!-- /.portfolio -->
            <div id="portfolio">
 
                <?php 
                $args = array( 'post_type' => 'projet', 'posts_per_page' => -1 );
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post(); 
         
                    $terms = get_the_terms( $post->ID, 'categories' );                      
                    if ( $terms && ! is_wp_error( $terms ) ) : 
         
                        $links = array();
         
                        foreach ( $terms as $term ) {
                            $links[] = $term->name;
                        }
         
                        $tax_links = join( " ", str_replace(' ', '-', $links));          
                        $tax = strtolower($tax_links);
                    else :    
                    $tax = '';                    
                    endif; 
         
                    echo '<div class="all col-lg-4 portfolio-item '. $tax .'">';
                    echo '<div class="bloc-projet">';
                    echo '<a href="'; the_permalink();
                    echo '">';
                    echo '<img class="img-responsive" src="'; the_post_thumbnail_url();
                    echo '"/>';
                    echo '<div class="hover-project">';
                    echo '<h1>';the_title();'</h1>';
                    echo '</div>';
                    echo '</a>';
                    echo '</div>';
                    echo '</div>'; 

                endwhile; ?>
 
            </div><!-- /#portfolio -->

        </div>
        <!-- /.row -->
   </div>
   <!-- /.container -->


   <script>
   (function($){
 
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
 
} ) ( jQuery );
   </script>
 
<?php get_footer(); ?>