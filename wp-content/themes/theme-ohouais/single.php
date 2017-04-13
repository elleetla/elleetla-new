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

	<div class="padding-page">
		<div class="container">
			<div class="row">
			<?php 
				if(have_posts()): 
					while (have_posts() ): the_post();
			?>

				<main class="col-lg-9 col-md-8">

					<!-- article "post-perso" -->
					<article <?php post_class( 'post-perso' ); ?>>
						<header>	
							<figure>
								<?php the_post_thumbnail(); ?>
							</figure>
						</header>

						<div class="content-post">
							<!-- le contenu de nos pages et articles -->
							<time><i class="fa fa-calendar-o" aria-hidden="true"></i><?php the_time('l, d F, Y') ?></time>
							<div class="author-post"><i class="fa fa-user" aria-hidden="true"></i><?php the_author(); ?></div>
							<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
							<?php the_content(); ?>
						</div>

						<footer>
						</footer>
					</article>
					<!-- /.article -->

					<section class="post-perso">
						<div class="content-post-bio">
							<div class="col-lg-3 col-md-3 col-sm-12 text-center">
								<figure>
									<?php echo get_avatar(get_the_author_meta('user_email'), '120' ,'',get_the_author_meta('nickname') );?>
								</figure>
							</div>
						
							<div class="col-lg-9 col-md-9 col-sm-12">
								<h4><?php the_author(); ?></h4>
								<p><?php the_author_meta( 'description' );?></p>
							</div>
							<div class="clr"></div>
						</div>
					</section>

					<section class="post-perso">
						<div class="content-post-comments">
							<div class="comments-post"><?php comments_template(); ?></div>
						</div>
					</section>
				</main>
			
			<?php endwhile; ?>
			<?php endif; ?>
			
				<aside class="col-lg-3 col-md-4">
					<?php get_sidebar(); ?>
				</aside>
			</div>
		</div>
	</div>

	<?php get_footer(); ?>
