<?php
/*
Template Name: Contact page
*/
?>

<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
 get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); 
$theregions = get_field('contact_region');
?>
<div class="fullcol pagerow contact-row bg-bluevlt gorel clearfix">
	<div class="fullcol contact-top clearfix">
		<div class="fullcol wide gorel nomobpad clearfix">
			<div class="midcol form-block ontop clearfix">
				<div class="halfcol left clearfix">
					<h1><?php the_title(); ?></h1>
				</div>
				<div class="halfcol right clearfix">
					<div class="form-wrapper bg-white">
						<?php gravity_form(1, true, true, false, '', true, 10); ?>
					</div>
				</div>
			</div>
			<?php 
			$i = 1;
			foreach($theregions as $theregion){
				$mapimg = $theregion['region_map_image'];
				if($i == 1){
					echo "<div id='active-target-".$i."' class='active-target map-wrap trans active' style='background-image: url(".$mapimg['url'].");'></div>";
				}else{
					echo "<div id='active-target-".$i."' class='active-target map-wrap trans' style='background-image: url(".$mapimg['url'].");'></div>";
				}
				$i++;
			} ?>
		</div>
		<div class="fullcol contact-block ontop translow clearfix">
		<div class="midcol nomobpad clearfix">
			<div class="fullcol inner bg-white clearfix">
				<?php
				$i = 1;
				if($theregions){
					echo "<ul class='region-list aligncentre'>";
					foreach($theregions as $theregion){
						$regname = $theregion['region_name'];
						if($i == 1){
							echo "<li id='active-trigger-".$i."' class='active-trigger trans active'>".$regname."</li>";
						}else{
							echo "<li id='active-trigger-".$i."' class='active-trigger trans'>".$regname."</li>";
						}
						$i++;
					}
					echo "</ul>";
					echo "<span class='menu-line'></span>";
				} ?>
								<?php
				$i = 1;
				if($theregions){
					foreach($theregions as $theregion){
						$regname = $theregion['region_name'];
						if($i == 1){
							echo "<div id='active-target-two-".$i."' class='fullcol active-target contact-details clearfix trans active'>";
						}else{
							echo "<div id='active-target-two-".$i."' class='fullcol active-target contact-details clearfix trans'>";
						}
						echo "<h4>".$theregion['region_contact_heading']."</h4>";
						echo "<div class='fullcol inner clearfix'>";
						echo "<div class='thirdcol address clearfix'>";
						echo "<h5>".get_field('contact_address_heading')."</h5>";
						echo $theregion['region_address'];
						echo "</div>";
						echo "<div class='thirdcol email clearfix'>";
						echo "<h5>".get_field('contact_email_heading')."</h5>";
						echo "<p><a href='mailto:".$theregion['region_email']."'>".$theregion['region_email']."</a></p>";
						echo "</div>";
						echo "<div class='thirdcol phone clearfix'>";
						echo "<h5>".get_field('contact_telephone_heading')."</h5>";
						echo "<p><a href='tel:".$theregion['region_phone']."'>".$theregion['region_phone']."</a></p>";
						echo "</div>";
						echo "</div>";
						echo "</div>";
						$i++;
					}
				} ?>
			</div>				
		</div>
		</div>
	</div>
</div>
<?php endwhile; endif; ?>

<?php get_footer('simple'); ?>