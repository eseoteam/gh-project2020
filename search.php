<?php 
?>


<?php get_header('clean'); ?>
<!---->


<section class="widget_textfull container-fluid goup">
<div class="container"> 

      <?php
      $s=get_search_query();
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
      $args = array(
      's' =>$s,
      'paged'=>$paged,
      'post_type' =>array('aktuell','page')
      );
      // The Query
      $the_query = new WP_Query( $args );

      if ( $the_query->have_posts() ) { 
      
      function num_of_word($text,$numb) {
       $wordsArray = explode(" ", $text);
       $parts = array_chunk($wordsArray, $numb);

       $final = implode(" ", $parts[0]);

       if(isset($parts[1]))
           $final = $final." ...";
       return $final;
       return;
       }
       ?>

      <h2>Suchen: <i style="color:#D20A11"><?php  _e(get_query_var('s')); ?></i></h2>
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

          <div style="border-bottom:1px solid #c7c9c9; padding-bottom: 30px; margin-bottom: 20px;"> 
          <h3 style="font-size: 30px;"><?php the_title(); ?></h3>

          <?php if( have_rows('page_content') ):
           while ( have_rows('page_content') ) : the_row(); ?>

          <?php
          $text = strip_tags(get_sub_field('text'));
          echo num_of_word($text,25);
          ?>
          <?php endwhile; else :
          endif; ?>

          <a href="<?php the_permalink(); ?>"> mehr »</a>
          </div>


      <?php endwhile; ?>
      <!-- end of the loop -->
      <?php wp_reset_postdata(); ?>
      <?php } else { ?>

      <p>Keine Ergebnisse gefunden.</p>

      <?php }  ?>
    

      <?php wp_paginate(); ?>


</div>
</section>







<!---->
<?php get_footer(); ?>