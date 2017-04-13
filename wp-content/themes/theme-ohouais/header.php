<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header>

		<!-- /.slide home -->
		<?php if ( is_active_sidebar( 'slidehome' ) ) : ?>
				
			<div id="slide-home">
					<?php if ( is_active_sidebar( 'slidehome' ) ) : ?>
						<?php dynamic_sidebar( 'slidehome' ); ?>
					<?php endif; ?>
			</div>

		<?php endif; ?>
		<!-- /.top slide home -->

		<nav class="navbar navbar-default">

		<?php if ( is_active_sidebar( 'contactinfos' ) ) : ?>
		<div class="contact-list">
			<div class="container">
				<div class="row">

					<?php if ( is_active_sidebar( 'contactinfos' ) ) : ?>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
						<?php dynamic_sidebar( 'contactinfos' ); ?>
					</div>
					<?php endif; ?>

					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 close-contact-listing">
						<p class="close1"><a><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/close.png"></a></p>
						<p class="close2"><a><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/close-white.png"></a></p>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>

		  	<div class="container">
		  		<div class="row">

		    	<!-- Brand and toggle get grouped for better mobile display -->
		    	<div class="navbar-header">
				      	
				    <!-- logo principal -->
					<div id="logo" class="clearfix">
					<?php if ( get_header_image() ) : ?>
						<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
							<img class="logo1" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo.png">
							<img class="logo2" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo-white.png">
						</a>
					<?php else : ?>
			    		<h1 itemprop="headline">
					    	<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php bloginfo( 'name' ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a>
					    </h1>
						<p itemprop="description"><?php bloginfo( 'description' ); ?></p>
					<?php endif; ?>
					</div>
					<!-- /.logo principal -->

					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
		      		</button>

				</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				    	<?php
							/**
							* Displays a navigation menu
							* @param array $args Arguments
							*/
							$args = array(
								'theme_location' => 'primaire',
								'menu_class' => 'nav navbar-nav navbar-right',
								'echo' => true,
								'walker' => new wp_bootstrap_navwalker()
							);

							wp_nav_menu( $args );

							?>	
					</div><!-- /.navbar-collapse -->
				</div><!-- row -->
			</div><!-- /.container -->
		</nav>
	</header>
