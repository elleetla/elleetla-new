<?php
/*
Template Name: Métiers
*/

get_header();


//* Display introduction
$introduction = get_field('introduction');
echo '<div class="metiers-introduction">'.$introduction.'</div>';

echo '<div id="metiers-content">';

//* Display Déterminer une vision globale
//image member of the team
$image = get_field('membre1');
if( !empty($image) ): ?>
    <div class="metiers-membre" id="membre1">
        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>"/>
        <p class="img-caption"> <?php echo $image['caption'] ?></p>
    </div>

<?php endif;

//"Comment ?"
$how = get_field('comment_vision_globale'); ?>
    <div class="metiers-comment">
        <p class="close1"><a><img src="<?php echo esc_url( get_template_directory_uri() );?>/images/close-white.png"></a></p>
        <p class="comment-title">Comment ?</p>
        <div id="comment-vision-globale"><?php echo $how?></div>
    </div>
<?php

echo '<div class="metiers-bloc">';
//title
$title = get_field('title_vision_globale');
echo '<div class="metiers-title" id="title-vision-globale">'.$title.'</div>';

//description
$description = get_field('vision_globale');
echo '<div class="metiers-description" id="description-vision-globale">'.$description.'</div>';
echo '<a class="button-comment" href="#">Comment ?</a>';


echo '</div>'; // ./metiers-bloc


//* Display Affirmer votre identité en lui donnant du visuel
//image member of the team
$image = get_field('membre2');
if( !empty($image) ): ?>
    <div class="metiers-membre" id="membre2">
        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>"/>
        <p class="img-caption"> <?php echo $image['caption'] ?></p>
    </div>
<?php endif;

//"Comment ?"
$how = get_field('comment_affirmer_id'); ?>
<div class="metiers-comment">
    <p class="close1"><a><img src="<?php echo esc_url( get_template_directory_uri() );?>/images/close-white.png"></a></p>
    <p class="comment-title">Comment ?</p>
    <div id="comment-affirmer-id"><?php echo $how ?></div>
</div>

<?php

echo '<div class="metiers-bloc">';
//title
$title = get_field('title_affirmer_id');
echo '<div class="metiers-title" id="title-affirmer-id">'.$title.'</div>';

//description
$description = get_field('affirmer_id');
echo '<div class="metiers-description" id="description-affirmer-id">'.$description.'</div>';
echo '<button class="button-comment">Comment ?</button>';

echo '</div>'; // ./metiers-bloc

//* ./Display Affirmer votre identité en lui donnant du visuel


//* Display Développer des affinités avec vos publics et les engager
//image member of the team
$image = get_field('membre3');
if( !empty($image) ): ?>
    <div class="metiers-membre" id="membre3">
        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>"/>
        <p class="img-caption"> <?php echo $image['caption'] ?></p>
    </div>
<?php endif;

//"Comment ?"
$how = get_field('comment_developper_affinites'); ?>
<div class="metiers-comment">
    <p class="close1"><a><img src="<?php echo esc_url( get_template_directory_uri() );?>/images/close-white.png"></a></p>
    <p class="comment-title">Comment ?</p>
    <div id="comment-developper-affinites"><?php echo $how ?></div>
</div>

<?php

echo '<div class="metiers-bloc">';
//title
$title = get_field('title_developper_affinites');
echo '<div class="metiers-title" id="title-developper-affinites">'.$title.'</div>';

//description
$description = get_field('developper_affinites');
echo '<div class="metiers-description" id="description-developper-affinites">'.$description.'</div>';
echo '<button class="button-comment">Comment ?</button>';

echo '</div>'; // ./metiers-bloc

//* ./Display Développer des affinités avec vos publics et les engager

//* Display Déployer en innovant
//image member of the team
$image = get_field('membre4');
if( !empty($image) ): ?>
    <div class="metiers-membre" id="membre4">
        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>"/>
        <p class="img-caption"> <?php echo $image['caption'] ?></p>
    </div>
<?php endif;

//"Comment ?"
$how = get_field('comment_deployer_en_innovant'); ?>
<div class="metiers-comment">
    <p class="close1"><a><img src="<?php echo esc_url( get_template_directory_uri() );?>/images/close-white.png"></a></p>
    <p class="comment-title">Comment ?</p>
    <div id="comment-deployer-en-innovant"><?php echo $how ?></div>
</div>

<?php

echo '<div class="metiers-bloc">';
//title
$title = get_field('title_deployer_en_innovant');
echo '<div class="metiers-title" id="title-deployer-en-innovant">'.$title.'</div>';

//description
$description = get_field('deployer_en_innovant');
echo '<div class="metiers-description" id="description-deployer-en-innovant">'.$description.'</div>';
echo '<button class="button-comment">Comment ?</button>';

echo '</div>'; // ./metiers-bloc

//* ./Display Déployer en innovant

echo '</div>'; // ./metiers-content


//* Display conclusion
$conclusion1 = get_field('conclusion1');
$conclusion2 = get_field('conclusion2');
?>
<div class="metiers-conclusion">
    <p id="conclusion1"><?php echo $conclusion1 ?></p>
    <p id="conclusion2"><?php echo $conclusion2 ?></p>
</div>

<?php


get_footer();