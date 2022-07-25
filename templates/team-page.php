<?php
/*
Template Name: Team page
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

<?php get_template_part( 'elements/element', 'leading' ); ?>

<div class="fullcol pagerow spacer-row bg-bluedk clearfix" style="height:180px;"></div>

<article class="post" id="post-<?php the_ID(); ?>">
<div class="fullcol teampanel-row translow offset-top clearfix">
	
	<div class="midcol team-row team-leadership clearfix">
		<h3><?php the_field('leadership_team_heading'); ?></h3>
		<div class="fullcol iso-grid clearfix">
			<?php $leadteams = get_field('leadership_team');
			foreach($leadteams as $leadteam){
				$teamimg = $leadteam['team_image'];
				$size = 'team-image';
				$teamimgs = $teamimg['sizes'][$size];
				echo "<div class='team-item iso-item translow' style='padding-top: ".$leadteam['team_padding_top']."'>";
				echo "<div class='inner shadowbox'>";
				echo "<span class='team-image'><img class='team-img' src='".esc_url($teamimgs)."' alt='".$teamimg['alt']."' title='".$teamimg['title']."' /></span>";
				echo "<span class='copy-wrap'>";
				echo "<h4 class='name'>".$leadteam['team_name']."</h4>";
				echo "<span class='position'>".$leadteam['team_role']."</span>";
				echo "<span class='number'>".$leadteam['team_order']."</span>";
				echo "</span>";
				echo "</div>";
				echo "</div>";
			} ?>
		</div>
    </div>		

	<div class="midcol team-row team-executive clearfix">
		<h3><?php the_field('executive_team_heading'); ?></h3>
		<div class="fullcol iso-grid clearfix">
			<?php $leadteams = get_field('executive_team');
			foreach($leadteams as $leadteam){
				$teamimg = $leadteam['team_image'];
				$size = 'team-image-alt';
				$teamimgs = $teamimg['sizes'][$size];
				echo "<div class='team-item iso-item translow' style='padding-top: ".$leadteam['team_padding_top']."'>";
				echo "<div class='inner shadowbox'>";
				echo "<span class='team-image'><img class='team-img' src='".esc_url($teamimgs)."' alt='".$teamimg['alt']."' title='".$teamimg['title']."' /></span>";
				echo "<span class='copy-wrap'>";
				echo "<h4 class='name'>".$leadteam['team_name']."</h4>";
				echo "<span class='position'>".$leadteam['team_role']."</span>";
				echo "<span class='number'>".$leadteam['team_order']."</span>";
				echo "</span>";
				echo "</div>";
				echo "</div>";
			} ?>
		</div>
	</div>

	<?php $hascontent = get_the_content();
	if($hascontent){
		echo "<div class='fullcol pagerow basicpage-row clearfix'>";
		echo "<div class='midcol basicpage-column nomobpad clearfix'>";
		echo "<div class='midcol limited copycol page-content bluetext clearfix'>";
		the_content();
		echo "</div>";
		echo "</div>";
		echo "</div>";
	} ?>
</div>	
</article>

<?php endwhile; endif; ?>

<?php $hastrailing = get_field('team_image_trailing');
if($hastrailing){
	echo "<div class='fullcol image-row fullimage-row aligncentre clearfix'>";
	echo "<img src='".$hastrailing['url']."' alt='".$hastrailing['url']."' title='".$hastrailing['url']."' />";
	echo "</div>";
} ?>

<?php get_footer(); ?>