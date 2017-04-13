<?php 
/*
Template Name: Modèle full width
*/
?>

<?php get_header(); ?>


	<!-- section -->
	<div id="custom-bg"
	<?php if (has_post_thumbnail( $post->ID ) ): ?>
	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
	style="background-image: url('<?php echo $image[0]; ?>'); background-size: cover; background-repeat: no-repeat; background-position: center;"
	<?php endif; ?> >
		
		<!-- overlay -->
		<div class="overlay">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- col -->
					<div class="col-lg-12">	
						<h1 class="text-center title-fullwidth"><?php the_title(); ?></h1>
					</div>
					<!-- end col -->
				</div>
				<!-- end row -->
			</div>
			<!-- end container -->
		</div>
		<!-- end overlay -->

	</div>
	<!-- end section -->

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