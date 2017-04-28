<?php
/*
Template Name: Réalisations
*/
?>
 
<?php
get_header(); ?>
 

    <div class="container"><!-- .container -->
        <div class="row"><!-- .row -->
            <div class="col-lg-12"><!-- .col-lg-12 -->
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
                </nav>
            </div><!-- /.col-lg-12 -->
 

            <div id="portfolio"><!-- .portfolio -->
 
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
                ?>

                <div class="all col-lg-4 portfolio-item <?php echo $tax; ?>"><!-- .all col-lg-4 -->
                    <div class="bloc-projet"><!-- .bloc-projet -->
                        <a href="<?php the_permalink();?>">
                            <img class="img-responsive" src="<?php the_post_thumbnail_url(); ?>"/>

                            <div class="hover-project">
                                <h1><?php the_title(); ?></h1>
                            </div>

                        </a>
                    </div><!-- ./bloc-projet -->
                </div><!-- ./all col-lg-4 -->

                <?php endwhile; ?>
 
            </div><!-- /.portfolio -->
        </div><!-- /.row -->
   </div><!-- /.container -->

<?php get_footer(); ?>