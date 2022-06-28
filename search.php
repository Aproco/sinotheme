<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
 get_header(); ?>

<div class="fullcol leading-panel leading-simple leading-news bg-bluedk gorel clearfix">
	<div class="midcol ontop clearfix">
        <?php
		echo "<div class='fullcol clearfix'>";
        echo "<span class='section-title'>".get_field('translation_about', 'option')."</span>";
        echo "<div class='fullcol with-search clearfix'>";
        echo "<div class='halfcol clearfix'>";
		echo "<h1 class='larger'>".get_field('translation_news', 'option')."</h1>";
		echo "<h2>";
		echo "Search results for '";
		echo get_search_query();
		echo "'";
		echo "</h2>";
        echo "</div>";
        echo "<div class='halfcol right clearfix'>";
        echo "<div class='search-wrapper adjusted goright'>";
        echo "<span class='search-heading'>".get_field('translation_searcheading', 'option')."</span>";
        get_search_form();
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
		?>
	</div>
</div>

<?php if (have_posts()) : $i = 0; ?> 
<div class="fullcol panel-row archive-row panel-padding-top clearfix">
	<div class="midcol grid-setter clearfix">
		<?php while (have_posts()) : the_post(); $i++; ?>
		<div class="feature-block post-block block-setter <?php echo ($i%3 ? "not-third" : "third") ?> clearfix">
            <article class="post" id="post-<?php the_ID(); ?>">
				<div class="block-image">
					<?php if(has_post_thumbnail()){
						the_post_thumbnail('thumbnail');
					}else{
						echo "<img src='".get_bloginfo('stylesheet_directory')."/_/img/sino_thumbnail.jpg' alt='".get_the_title()."' title='".get_the_title()."' />";
					} ?>
				</div>
				<div class="block-copy">
					<div class="inner">
						<h4><?php the_title(); ?></h4>
					</div>
					<span class="post-date"><?php the_time('d F Y'); ?></span>
					<p><?php echo get_excerpt(130); ?></p>
					<a class="button-link link-arrow red" href="<?php the_permalink(); ?>"><?php the_field('translation_readmore', 'option'); ?></a>
                </div>
            </article>
			</div>
		<?php endwhile; ?>
	</div>
</div>

<div class="midcol post-navigation clearfix">
	<div class="postnav-box">
		<?php posts_nav_link( ' ', '<span class="previous-link"></span>', '<span class="next-link"></span>' ); ?>
	</div>
</div>

<?php else : ?>

	<div class="fullcol clearfix">
		<div class="midcol limited pagerow nothinghere-row panel-padding clearfix">
			<h2 class="larger"><?php the_field('translation_nothing', 'option'); ?></h2>
			<h4><?php the_field('translation_nothing_message', 'option'); ?></h4>
		</div>
	</div>

<?php endif; ?>

<div class="fullcol pagerow spacer-row bg-white clearfix" style="padding-top:83px;"></div>

<?php get_footer(); ?>
