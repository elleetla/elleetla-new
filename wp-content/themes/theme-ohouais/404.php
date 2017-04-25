<?php get_header(); ?>

<div class="container">
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-lg-12 col-md-12">
            <div id="content" role="main">
                <div id="content_404">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/404.gif">
                    <p>Oops, Cette page n'a pas pu être trouvée !</p>
                    <p><a href="#">retour</a></p>
                </div>
            </div><!-- /#content -->
        </div>

    </div><!-- /.row -->
</div><!-- /.container -->


<?php get_footer(); ?>
