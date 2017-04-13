<?php
/*
Template Name: Modèle visual composer
*/
?>

<?php get_header(); ?>

<main>
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
</main>

<?php get_footer(); ?>