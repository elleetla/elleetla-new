<?php get_header( 'projet' ); ?>

<main>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">

					<?php 
						if(have_posts()): 
							while (have_posts() ): the_post();
						?>
							
						<?php get_template_part('contenu','article');?>

						<?php endwhile; ?>
					<?php endif; ?>

				</div>
			</div>
		</div>
	</section>

	<section>
		
	</section>

	<section id="last-projects">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<p id="titleProject">Suggestion projets</p>
				</div>
				<?php 
                $args = array( 'post_type' => 'projet', 'posts_per_page' => 4 );
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
                    echo '<div class="all col-lg-3 col-md-3 col-sm-6 col-xs-12 portfolio-item '. $tax .'">';
                    echo '<div class="bloc-projet">';
                    echo '<a href="'; the_permalink();
                    echo '">';
                    echo '<img class="img-responsive" src="'.get_field('image_suggestion_projets')["url"].'" />';
                    echo '<div class="hover-project">';
                    echo '<h1>';the_title();'</h1>';
                    echo '</div>';
                    echo '</a>';
                    echo '</div>';
                    echo '</div>';  

                endwhile; ?>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>
