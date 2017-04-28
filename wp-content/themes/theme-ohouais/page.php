<!-- display page content but in the time being, there is no page -->
<?php /*get_header(); ?>

<main class="padding-page">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-8">
				<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<div class="col-left bg-white">

				<?php 
					if(have_posts()): 
						while (have_posts() ): the_post();
					?>
						
					<?php get_template_part('contenu','article');?>

					<?php endwhile; ?>
				<?php endif; ?>
				</div>

			</div>
			<div class="col-lg-3 col-md-4">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>