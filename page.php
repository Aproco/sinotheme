<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
 get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<?php if(!get_field('page_hide_trail')){
		if(function_exists('bcn_display')) {
			echo "<div class='fullcol breadcrumb-wrapper bggrey trans clearfix'>";
			echo "<div class='midcol breadcrumbs clearfix' typeof='BreadcrumbList' vocab='https://schema.org/'>";
			bcn_display();
			echo "</div>";
			echo "</div>";
		}
		}?>

		<?php get_template_part( 'elements/element', 'leading' ); ?>

		<article class="post" id="post-<?php the_ID(); ?>">
			<?php $hascontent = get_the_content();
			if($hascontent){
				echo "<div class='fullcol pagerow basicpage-row clearfix'>";
				echo "<div class='midcol basicpage-column nomobpad clearfix'>";
				echo "<div class='midcol limited copycol page-content bluetext clearfix'>";
				the_content();
				echo "</div>";
				echo "</div>";
				echo "</div>";
			}
			get_template_part( 'elements/element', 'pagerows' ); ?>
		</article>


	<?php endwhile; endif; ?>

<?php get_footer(); ?>