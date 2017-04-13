	<?php get_header(); ?>

	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-8">

				<h2>Ceci est une page pour auteur</h2>

				<?php 
				if(have_posts()): 
					while (have_posts() ): the_post();
				?>
				
				<?php get_template_part('contenu','article');?>

				<?php endwhile; ?>
			<?php endif; ?>

			</div>
			<div class="col-lg-4 col-md-4">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>

	<?php get_footer(); ?>