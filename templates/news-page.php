<?php
/*
Template Name: News page
*/
?>

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

    <div class="fullcol leading-panel leading-simple leading-news bg-bluedk gorel clearfix">
		<div class="midcol ontop clearfix">
            <?php
			echo "<div class='fullcol clearfix'>";
            echo "<span class='section-title'>".get_field('leading_section_title')."</span>";
            echo "<div class='fullcol with-search clearfix'>";
            echo "<div class='halfcol clearfix'>";
			echo "<h1 class='larger'>".get_field('leading_heading')."</h1>";
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
			<div class="fullcol meta-bar clearfix">
				<div class="halfcol late-break right clearfix">
					<!-- Go to www.addthis.com/dashboard to customize your tools -->
					<div class="addthis_inline_share_toolbox"></div> 
				</div>
			</div>
		</div>
	</div>

	<div class="fullcol panel-row leadposts-row trans clearfix">
		<div class="midcol clearfix">
			<?php $args = array(
                'post_type' => 'post',
				'posts_per_page' => 2,
				'order' => 'DESC'
			);
			$recent = new WP_Query($args); while($recent->have_posts()) : $recent->the_post();?>
            <div class="post-block wide clearfix">
                <div class="rightcol clearfix">
				    <div class="block-image">
					    <?php if(has_post_thumbnail()){
						    the_post_thumbnail('block-image');
					    }else{
						    echo "<img src='".get_bloginfo('stylesheet_directory')."/_/img/sino_thumbnail.jpg' alt='".get_the_title()."' title='".get_the_title()."' />";
					    } ?>
				    </div>
                </div>
                <div class="leftcol clearfix">
				    <div class="block-copy">
                    <article class="post" id="post-<?php the_ID(); ?>">
						<h4><?php the_title(); ?></h4>
					    <span class="post-date"><?php the_time('d F Y'); ?></span>
					    <p><?php echo get_excerpt(130); ?></p>
					    <a class="button-link link-arrow red" href="<?php the_permalink(); ?>"><?php the_field('translation_readmore', 'option'); ?></a>
                    </article>
                    </div>
                </div>
			</div>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>

    <div class="fullcol panel-row archive-row panel-padding clearfix">
		<div class="midcol grid-setter clearfix">
			<?php $i = 1;
			$args = array(
                'post_type' => 'post',
                'offset' => -2,
				'posts_per_page' => 6,
				'order' => 'DESC'
			);
			$recent = new WP_Query($args); while($recent->have_posts()) : $recent->the_post();?>
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
			<?php $i++;
			endwhile; wp_reset_postdata(); ?>
		</div>
	</div>

<?php endwhile; endif; ?>

<div class="fullcol pagerow spacer-row bg-white clearfix" style="padding-top:83px;"></div>

<?php get_footer(); ?>