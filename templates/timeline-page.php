<?php
/*
Template Name: Timeline page
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

<div class="fullcol pagerow spacer-row bg-bluedk clearfix" style="height:130px;"></div>

<article class="post" id="post-<?php the_ID(); ?>">
<div class="fullcol timeline-row-wrapper translow clearfix">
	<?php //Timeline content
	$i = 1;
	$timelinerows = get_field('timeline_rows');
	foreach($timelinerows as $timelinerow){
		$lineyear = $timelinerow['timeline_year'];
		$linestyle = $timelinerow['timeline_style'];
		$lineleftyp = $timelinerow['timeline_left_type'];
		$lineleft = $timelinerow['timeline_left'];
		$leftimg = $lineleft['block_image'];
		$leftcopy = $lineleft['block_copy'];
		$linerightyp = $timelinerow['timeline_right_type'];
		$lineright = $timelinerow['timeline_right'];
		$rightimg = $lineright['block_image'];
		$rightcopy = $lineright['block_copy'];
		echo "<div class='fullcol panel-row timeline-row ".$linestyle." ".$lineleftyp." ".$linerightyp." gorel clearfix'>";
		echo "<div class='inner'>";
		if($linestyle == "fifty-row"){
			echo "<div class='midcol wide nomobpad clearfix'>";
		}
		echo "<span class='date-box'>".$lineyear."</span>";
		if($i==1){
			echo "<span class='centre-line first'></span>";
		}else{
			echo "<span class='centre-line'></span>";
		}
		if(($lineleftyp == "left-img")&&($linestyle == "fifty-row")){
			echo "<div class='leftcol anim-target leftfade-fm-dn ".$lineleftyp."' style='background-image: url(".$leftimg['url'].");'>";
		}else{
			echo "<div class='leftcol anim-target leftfade-fm-dn ".$lineleftyp."'>";
		}
		if(!($lineleftyp == "left-none")){
			echo "<div class='inner gorel shadowbox'>";
			if($lineleftyp == "left-img"){
				echo "<span class='line-pointer' style='background-image: url(".$leftimg['url'].")'></span>";
				echo "<div class='image-inner'>";
				echo "<img src='".$leftimg['url']."' alt='".$leftimg['alt']."' title='".$leftimg['title']."' />";
				echo "</div>";
			}
			if($lineleftyp == "left-copy"){
				echo "<span class='line-pointer'></span>";
				echo "<div class='copy-inner'>";
				echo $leftcopy;
				echo "</div>";
			}
			if($lineleftyp == "left-copyimg"){
				echo "<span class='line-pointer'></span>";
				echo "<div class='copyimg-inner'>";
				echo "<span class='imageset' style='background-image: url(".$leftimg['url'].");'></span>";
				echo "<span class='copyset'>";
				echo $leftcopy;
				echo "</span>";
				echo "</div>";
			}
			echo "</div>";
		}		
		echo "</div>";
		if(($linerightyp == "right-img")&&($linestyle == "fifty-row")){
			echo "<div class='rightcol anim-target rightfade-fm-dn ".$linerightyp."' style='background-image: url(".$rightimg['url'].");'>";
		}else{
			echo "<div class='rightcol anim-target rightfade-fm-dn ".$linerightyp."'>";
		}
		if(!($linerightyp == "right-none")){
			echo "<div class='inner gorel shadowbox'>";
			if($linerightyp == "right-img"){
				echo "<span class='line-pointer' style='background-image: url(".$rightimg['url'].")'></span>";
				echo "<div class='image-inner'>";
				echo "<img src='".$rightimg['url']."' alt='".$rightimg['alt']."' title='".$rightimg['title']."' />";
				echo "</div>";
			}
			if($linerightyp == "right-copy"){
				echo "<span class='line-pointer'></span>";
				echo "<div class='copy-inner'>";
				echo $rightcopy;
				echo "</div>";
			}
			if($linerightyp == "right-copyimg"){
				echo "<span class='line-pointer'></span>";
				echo "<div class='copyimg-inner'>";
				echo "<span class='copyset'>";
				echo $rightcopy;
				echo "</span>";
				echo "<span class='imageset' style='background-image: url(".$rightimg['url'].");'></span>";
				echo "</div>";
			}
			echo "</div>";
		}
		if($linestyle == "fifty-row"){
			echo "</div>";
		}
		echo "</div>";
		echo "</div>";
		echo "</div>";
		$i++;
	} ?>

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

<?php get_footer(); ?>