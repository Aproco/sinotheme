<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
 get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div class="fullcol leading-panel leading-simple leading-news bg-bluedk gorel clearfix">
		<div class="midcol ontop clearfix">
			<?php 
			echo "<div class='fullcol clearfix'>";
			echo "<span class='section-title'>".get_field('translation_news', 'option')."</span>";
			echo "<h1>".get_the_title()."</h1>";
			echo "</div>";
			?>
			<div class="fullcol meta-bar clearfix">
				<div class="halfcol late-break clearfix">
					<span class="post-date"><?php the_time('d F Y'); ?></span>
				</div>
				<div class="halfcol late-break right clearfix">
					<!-- Go to www.addthis.com/dashboard to customize your tools -->
					<div class="addthis_inline_share_toolbox"></div> 
				</div>
			</div>
		</div>
	</div>

	<?php $leadimg = get_field('leading_image');
	if($leadimg){
		$imgsized = $leadimg['sizes']['large'];
		echo "<div class='fullcol lead-image clearfix'><div class='midcol clearfix'><img src='".$imgsized."' alt='".$leadimg['alt']."' title='".$leadimg['title']."' /></div></div>";
	} ?>

	<article class="post" id="post-<?php the_ID(); ?>">
	<div class="fullcol pagerow basicpage-row clearfix">
		<div class="midcol basicpage-column nomobpad clearfix">
			<div class="midcol limited copycol post-copy page-content bluetext clearfix">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
	</article>

	<div class="fullcol panel-row featured-row clearfix">
		<div class="midcol grid-setter clearfix">
			<h4 class="larger alt"><?php the_field('translation_morenews', 'option'); ?></h4>
			<?php $i = 1;
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => 3,
				'order' => 'DESC'
			);
			$recent = new WP_Query($args); while($recent->have_posts()) : $recent->the_post();?>
			<div class="feature-block post-block <?php echo ($i%3 ? "not-third" : "third") ?> clearfix">
			<article class="post" id="post-<?php the_ID(); ?>">
				<div class="block-image">
					<a href="<?php the_permalink(); ?>">
					<?php if(has_post_thumbnail()){
						the_post_thumbnail('thumbnail');
					}else{
						echo "<img src='".get_bloginfo('stylesheet_directory')."/_/img/sino_thumbnail.jpg' alt='".get_the_title()."' title='".get_the_title()."' />";
					} ?>
					</a>
				</div>
				<div class="block-copy">
					<div class="inner block-setter">
						<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
					</div>
					<span class="post-date"><?php the_time('d F Y'); ?></span>
					<p><?php echo get_excerpt(130); ?></p>
					<a class="button-link link-arrow red" href="<?php the_permalink(); ?>"><?php the_field('translation_readmore', 'option'); ?></a>
				</div>
			</article>
			</div>
			<?php $i++;
			endwhile; wp_reset_postdata(); ?>
		</div>
	</div>

<?php endwhile; endif; ?>
<div class="fullcol pagerow search-row bg-white clearfix" style="padding-top:5%;padding-bottom:5%;">
	<div class="search-wrapper">
		<span class="search-heading"><?php the_field('translation_searcheading', 'option'); ?></span>
		<?php get_search_form(); ?>
	</div>
</div>
<div class="fullcol pagerow spacer-row bg-white clearfix" style="padding-top:83px;"></div>
<?php get_footer(); ?>