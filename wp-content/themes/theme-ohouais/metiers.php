<?php
/*
Template Name: Métiers
*/

get_header();

// Declaration of variables
$theContent = get_the_content();
$close = get_template_directory_uri().'/images/close-or.png';

while( have_posts() ) : the_post();
?>

    <div class="container">
        <div id="section-profils">
            <div id="intro-metier"><?php echo $theContent;
                echo the_content();
                endwhile;
                ?>
            </div>
        </div>

        <div class="row">
            <div class="const-1"><!-- Déterminer une vision stratégique globale -->
                <div class="bloc-text" id="first-bloc-infos">

                    <h4 id="title1"><span><?php echo get_field('title_vision_globale'); ?></span></h4>
                    <p><?php echo get_field('vision_globale'); ?></p>

                    <div class="plus-infos">
                        <a class="close-infos-comment"><img src="<?php echo $close; ?>" alt="close"></a>
                        <p class="comment">Comment ?</p>
                        <p id="comment1"><?php echo get_field('comment_vision_globale'); ?></p>
                    </div><!-- ./plus-infos -->

                    <a class="btn-infos-comment">Comment ?</a>
                </div><!-- ./bloc-text -->

                <div class="col-md-offset-6 col-lg-6 no-padding">
                    <figure>
                        <?php $image = get_field('membre1'); ?>
                        <img class="img-responsive" src="<?php echo $image['url'];?>" alt="<?php echo $image['title']; ?>">
                        <figcaption class="figcaption caption-right"><?php echo $image['caption'] ?></figcaption>
                    </figure>
                </div><!-- ./col-md-offset-6 col-lg-6 -->

                <div class="clearfix"></div>
            </div><!-- ./const-1 Déterminer une vision stratégique globale -->

            <div class="const-1"><!-- Affirmer votre identité en lui donnant du visuel -->
                <div class="bloc-text-right">
                    <h4 id="title2"><span><?php echo get_field('title_affirmer_id'); ?></span></h4>
                    <p><?php echo get_field('affirmer_id'); ?></p>

                    <div class="plus-infos">
                        <a class="close-infos-comment"><img src="<?php echo $close; ?>" alt="close"></a>
                        <p class="comment">Comment ?</p>
                        <p id="comment1"><?php echo get_field('comment_affirmer_id'); ?></p>
                    </div><!-- ./plus-infos -->

                    <a class="btn-infos-comment">Comment ?</a>
                </div><!-- ./bloc-text-right -->

                <div class="col-lg-6">
                    <figure>
                        <?php $image = get_field('membre2'); ?>
                        <img class="img-responsive" src="<?php echo $image['url'];?>" alt="<?php echo $image['title']; ?>">
                        <figcaption class="figcaption cpation-left"><?php echo $image['caption'] ?></figcaption>
                    </figure>
                </div><!-- ./col-lg-6-->

                <div class="clearfix"></div>
            </div><!-- ./const-1 Affirmer votre identité en lui donnant du visuel -->

            <div class="const-1"><!-- Développer des affinités avec vos publics et les engager -->
                <div class="bloc-text">
                    <h4 id="title3"><span><?php echo get_field('title_developper_affinites'); ?></span></h4>
                    <p><?php echo get_field('developper_affinites'); ?></p>

                    <div class="plus-infos">
                        <a class="close-infos-comment"><img src="<?php echo $close; ?>" alt="close"></a>
                        <p class="comment">Comment ?</p>
                        <p id="comment1"><?php echo get_field('comment_developper_affinites'); ?></p>
                    </div><!-- ./plus-infos -->

                    <a class="btn-infos-comment">Comment ?</a>
                </div><!-- ./bloc-text -->

                <div class="col-md-offset-6 col-lg-6">
                    <figure>
                        <?php $image = get_field('membre3'); ?>
                        <img class="img-responsive" src="<?php echo $image['url'];?>" alt="<?php echo $image['title']; ?>">
                        <figcaption class="figcaption caption-right"><?php echo $image['caption'] ?></figcaption>
                    </figure>
                </div><!-- ./col-md-offset-6 col-lg-6 -->

                <div class="clearfix"></div>
            </div><!-- ./const-1 Développer des affinités avec vos publics et les engager -->

            <div class="const-1"><!-- Déployer en innovant -->
                <div class="bloc-text-right"  id="last-bloc-infos">
                    <h4 id="title4"><span><?php echo get_field('title_deployer_en_innovant'); ?></span></h4>
                    <p><?php echo get_field('deployer_en_innovant'); ?></p>

                    <div class="plus-infos">
                        <a class="close-infos-comment"><img src="<?php echo $close; ?>" alt="close"></a>
                        <p class="comment">Comment ?</p>
                        <p id="comment1"><?php echo get_field('comment_deployer_en_innovant'); ?></p>

                    </div><!-- ./plus-infos -->

                    <a class="btn-infos-comment">Comment ?</a>
                </div><!-- ./bloc-text-right -->

                <div class="col-lg-6">
                    <figure>
                        <?php $image = get_field('membre4'); ?>
                        <img class="img-responsive" src="<?php echo $image['url'];?>" alt="<?php echo $image['title']; ?>">
                        <figcaption class="figcaption caption-left"><?php echo $image['caption'] ?></figcaption>
                    </figure>
                </div><!-- ./col-lg-6-->

                <div class="clearfix"></div>
            </div><!-- ./const-1 Déployer en innovant -->

        </div><!-- ./row -->
    </div><!-- ./container -->

<?php

get_footer();