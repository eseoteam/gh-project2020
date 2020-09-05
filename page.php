<?php /*
Template Name: Pages
*/
?>


<?php get_header(); ?>

<?php if( have_rows('page_content') ):
                // loop through the rows of data
        while ( have_rows('page_content') ) : the_row(); ?>

		<?php get_template_part('templates/widget_facts'); ?>
		<?php get_template_part('templates/widget_usp'); ?>
		<?php get_template_part('templates/widget_textfull'); ?>
		<?php get_template_part('templates/widget_textimage'); ?>
                <?php get_template_part('templates/widget_video'); ?>
                <?php get_template_part('templates/widget_image_gallery'); ?>
                <?php get_template_part('templates/widget_highlights'); ?>
                <?php get_template_part('templates/widget_logos'); ?>
                <?php get_template_part('templates/widget_ansprechpartner'); ?>
                <?php get_template_part('templates/widget_testemonials'); ?>

        <?php endwhile; else :
endif; ?>

</div>


<!---->
<?php get_footer(); ?>