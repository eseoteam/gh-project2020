<?php
/**
 * The Sidebar containing the main widget areas.
 */
?>
		<div id="sidebar" class="widget-area col220" role="complementary" style="margin-top:-15px;">
        
        

         
    






	



<?php 
$rightsliders = get_field('rightslider');
if($rightsliders) {  ?>
<?php
$i=1;
foreach($rightsliders as $rightslider) { 
$attachment_id = $rightslider['image'];

$alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);

if($i==1) {
	$size1 = "First-thumb";
}
else
{
	$size1 = "Others-thumb";
}
	$image1 = wp_get_attachment_image_src( $attachment_id, $size1 );	
	$size3 = "Normal";
	$image3 = wp_get_attachment_image_src( $attachment_id, $size3 );	
	$i=$i+1;
?>
<a href="<?php echo $image3[0]; ?>" rel="lightbox"><img src="<?php echo $image1[0]; ?>"  alt="<?php echo $alt; ?>"  title="<?php echo $alt; ?>" /></a>
<?php } ?>
<?php } ?>
	


<?php if(get_field('video')) { ?>	
 <?php
// get iframe HTML
$iframe = get_field('video');
// use preg_match to find iframe src
preg_match('/src="(.+?)"/', $iframe, $matches);
$src = $matches[1];

preg_match('/embed(.*?)?feature/', $src, $matches_id );
$id = $matches_id[1];
$id = str_replace( str_split( '?/' ), '', $id );

// add extra params to iframe src
$params = array(
    'controls'    => 1,
    'hd'        => 1,
	'rel'        => 0,
				'autoplay' => 0
);
$new_src = add_query_arg($params, $src);
$iframe = str_replace($src, $new_src, $iframe);
// echo $iframe
?>    
     
   <div class="hoverfun" style="display:block;"><img src="<?php bloginfo('template_directory'); ?>/images/play_button.png" class="play" /><img src="http://img.youtube.com/vi/<?php echo $id; ?>/mqdefault.jpg" /></div>
<div class="embed-container" style="display:none">
<?php echo $iframe; ?>
</div>  	
	<?php } ?>




         
<?php if(!get_field('video') && !get_field('rightslider')) { ?>
 <img src="<?php echo home_url( '/' ); ?>wp-content/uploads/home.jpg" width="255" alt="W. Hoog Malerfachbetrieb GmbH & Co. KG" /> 
<?php } ?>  
     
 
         
         
         
         
			<?php do_action( 'before_sidebar' ); ?>
			<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>


<?php if(is_page(20)) { ?>
<br clear="all" /><br clear="all" />
<p style="text-align: right;">Konzeption &amp; Gestaltung: <br /><a href="http://www.sonneborn-bfw.de" target="_blank">www.sonneborn-bfw.de</a>
Programmierung: <br /><a href="http://www.rixner.net" target="_blank">www.rixner.net</a></p>
<?php } ?>

			<?php endif; // end sidebar widget area ?>
		</div><!-- #secondary .widget-area -->
