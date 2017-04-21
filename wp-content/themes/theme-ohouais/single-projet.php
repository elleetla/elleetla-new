<?php get_header( 'projet' ); ?>

<main>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">

					<?php 
						if(have_posts()): 
							while (have_posts() ): the_post();
						        get_template_part('contenu','article');
                            endwhile;
                        endif; ?>

				</div>
			</div>
		</div>
	</section>

	<section id="last-projects">
		<div class="container">
			<div class="row">

				<div class="col-lg-12">
					<p id="titleProject">Suggestion projets</p>
				</div>



                <?php
                //get the terms for the particular item "categories"
                $terms = get_the_terms( $post->ID , 'categories' );
                // loop over each item since it's an array
                if ( $terms != null ){
                    foreach( $terms as $term ) {
                        $cat[] = $term->slug ;

                        //for each term, define taxonomy parameters
                        if($cat[0] == "design"){
                            $tax = array(
                                array(
                                    'taxonomy' => 'categories',
                                    'field'    => 'slug',
                                    'terms'    => array( 'design' ),
                                )
                            );
                        }
                        elseif ($cat[0] == "digital"){
                            $tax = array(
                                array(
                                    'taxonomy' => 'categories',
                                    'field'    => 'slug',
                                    'terms'    => array( 'digital' ),
                                )
                            );
                        }

                        elseif ($cat[0] == "innovation"){
                            $tax = array(
                                array(
                                    'taxonomy' => 'categories',
                                    'field'    => 'slug',
                                    'terms'    => array( 'innovation' ),
                                )
                            );
                        }
                    }
                }

                $args = array(
                    'post_type'         =>  'projet',
                    'posts_per_page'    =>  4,
                    'tax_query'         => $tax,
                    'orderby'           => 'rand',
                    'post__not_in'      => array(get_the_ID())
                    );
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();

                    ?>

                <div class="all col-lg-3 col-md-3 col-sm-6 col-xs-12 portfolio-item <?php echo $tax ?>">
                    <div class="bloc-projet">
                        <a href=" <?php the_permalink(); ?>">
                            <img class="img-responsive" src="<?php echo get_field('image_suggestion_projets')["url"];  ?>" />

                            <div class="hover-project">
                                <h1><?php the_title();?></h1>
                            </div>
                        </a>
                    </div>
                </div>

                <?php endwhile; ?>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>
