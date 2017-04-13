	<?php get_header(); ?>

	<div class="fil-ariane">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<?php if ( function_exists('yoast_breadcrumb') ) 
					{yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
				</div>
			</div>
		</div>
	</div>

	<!-- padding page -->
	<div class="padding-page">
		<div class="container">
			<div class="row ms-row">
			<?php 
				if(have_posts()): 
					while (have_posts() ): the_post();
			?>
				<!-- article -->
				<article <?php post_class( 'col-lg-4 col-md-4 col-sm-12 ms-bloc' ); ?>>
					<div class="post-perso">
						<header>
							<figure>
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
							</figure>
						</header>

						<div class="content-post">
							<!-- le contenu de nos pages et articles -->
							<time><i class="fa fa-calendar-o" aria-hidden="true"></i><?php the_time('l, d F, Y') ?></time>
							<div class="author-post"><i class="fa fa-user" aria-hidden="true"></i><a href="<?php the_author_meta('url'); ?>"><?php the_author(); ?></a></div>
							<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
							<?php the_content(); ?>
						</div>

						<footer>
							<a class="btn-post" href="<?php the_permalink(); ?>">En savoir +</a>
							<?php //echo do_shortcode('[juiz_sps buttons="facebook, twitter, google, linkedin"]'); ?>
						</footer>
					</div>
				</article>
				<!-- /.article -->

			<?php endwhile; ?>
			<?php endif; ?>
			
			</div>
		</div>
	</div>
	<!-- /.padding page -->

	<?php get_footer(); ?>