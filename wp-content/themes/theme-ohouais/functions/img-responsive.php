 <?php 
//----------------------------------------------------------/
//  responsive images [ 1) add img-responsive class 2) remove dimensions ]
//----------------------------------------------------------/
function bootstrap_responsive_images( $html ){
  $classes = 'img-responsive'; // separated by spaces, e.g. 'img image-link'
  // check if there are already classes assigned to the anchor
  if ( preg_match('/<img.*? class="/', $html) ) {
    $html = preg_replace('/(<img.*? class=".*?)(".*?\/>)/', '$1 ' . $classes . ' $2', $html);
  } else {
    $html = preg_replace('/(<img.*?)(\/>)/', '$1 class="' . $classes . '" $2', $html);
  }
  // remove dimensions from images,, does not need it!
  $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
  return $html;
}
add_filter( 'the_content','bootstrap_responsive_images',10 );
add_filter( 'post_thumbnail_html', 'bootstrap_responsive_images', 10 );

?>