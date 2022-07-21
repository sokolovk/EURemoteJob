<?php get_header(); ?>

<?php $is_press_releases = in_category('press-releases');
$class_main = $is_press_releases ? 'site-main press-releases' : 'site-main'; ?>

	<main id="main" class="<?php echo $class_main ?>" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

            <?php if($is_press_releases) {
                get_template_part( 'template-parts/content', 'nwl-press-releases');
            } else  {
                get_template_part( 'template-parts/content', 'single');
            } ?>

			<?php // If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif; ?>

		<?php endwhile; ?>

	</main>

<?php get_footer(); ?>
