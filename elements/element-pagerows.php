<!-- Flexible content panel output for ACF page content rows -->
<?php
$rowid = 1;
$baseurl = get_bloginfo('stylesheet_directory');

if( have_rows('add_page_row', $setpage) ): while ( have_rows('add_page_row', $setpage) ) : $rowid++ ; the_row();

// Section heading panel output
if( get_row_layout() == 'panel_section_heading' ):
$panelhead = get_sub_field('panel_heading');
$panelsubhead = get_sub_field('panel_subheading');
$paneldesc = get_sub_field('panel_description');
$panelalign = get_sub_field('panel_text_alignment');
?>
<div class="midcol panel-row section-heading-row <?php echo $panelalign; ?> noflow clearfix">
	<?php if($panelhead){
		echo "<h3 class='key-heading'>".$panelhead."</h3>";
	}
	if($panelsubhead){
		echo "<h4>".$panelsubhead."</h4>";
	}
	if($paneldesc){
		echo "<span class='copycol'>".$paneldesc."</span>";
	} ?>
</div>

<?php 
// Standard copy panel output
elseif( get_row_layout() == 'panel_standard_copy' ): 
$panelcopy = get_sub_field('panel_copy');
$panelbuttons = get_sub_field('panel_buttons');
$panellimit = get_sub_field('panel_limiter');
$panelparalt = get_sub_field('panel_paralt');
$panelalign = get_sub_field('panel_text_alignment');
if($panellimit){
	$haslimit = "limited";
}else{
	$haslimit = "nolimit";
}
if($panelparalt){
	$hasparalt = "paralt";
}else{
	$hasparalt = "noparalt";
}
$panelstyles = get_sub_field('panel_styles');
$padtop = $panelstyles['panel_padding_top'];
$padbottom = $panelstyles['panel_padding_bottom'];
?>
<div class="fullcol pagerow stdcopy-row <?php echo $panelstyles['panel_background']." ".$haslimit." ".$panelalign; ?> gorel clearfix">
	<div class="midcol clearfix" style="<?php if($padtop){echo "padding-top: ".$padtop."; ";}if($padbottom){echo "padding-bottom: ".$padbottom."; ";} ?>">
		<div class="content-block copycol <?php echo $hasparalt; ?> clearfix">
			<?php
			if($panelcopy){
				echo $panelcopy;
			}
			if($panelbuttons){
				echo "<div class='button-wrapper'>";
				foreach($panelbuttons as $panelbutton){
					$buttonlink = $panelbutton['button_link'];
					$buttonstyle = $panelbutton['button_style'];
					$buttoncolour = $panelbutton['button_colour'];
					echo "<a class='button-link ".$buttonstyle." ".$buttoncolour."' href='".$buttonlink['url']."'>".$buttonlink['title']."</a>";
				}
				echo "</div>";
			}
			?>
		</div>
	</div>
</div>

<?php 
// Split copy panel output
elseif( get_row_layout() == 'panel_split_copy' ): 
$leftpanelcopy = get_sub_field('left_panel_copy');
$rightpanelcopy = get_sub_field('right_panel_copy');
$panelsplit = get_sub_field('panel_proportions');
$panelstyles = get_sub_field('panel_styles');
$padtop = $panelstyles['panel_padding_top'];
$padbottom = $panelstyles['panel_padding_bottom'];
?>
<div class="fullcol pagerow splitcopy-row <?php echo $panelstyles['panel_background']." ".$panelsplit; ?> gorel clearfix">
	<div class="midcol clearfix" style="<?php if($padtop){echo "padding-top: ".$padtop."; ";}if($padbottom){echo "padding-bottom: ".$padbottom."; ";} ?>">
		<div class="leftcol copycol trans clearfix">
			<?php if($leftpanelcopy){
				echo $leftpanelcopy;
			} ?>
		</div>
		<div class="rightcol copycol trans clearfix">
			<?php if($rightpanelcopy){
				echo $rightpanelcopy;
			} ?>
		</div>		
	</div>
</div>

<?php 
// Copy with image panel output
elseif( get_row_layout() == 'panel_copy_image' ): 
$panelhead = get_sub_field('panel_heading');
$panelcopy = get_sub_field('panel_copy');
$panelbuttons = get_sub_field('panel_buttons');
$panelimg = get_sub_field('panel_image');
$panelimgopt = get_sub_field('panel_image_options');
$imgtyp = $panelimgopt['panel_image_type'];
$imgloc = $panelimgopt['panel_image_location'];
$imgalign = $panelimgopt['panel_image_alignment'];
$imgtriangle = $panelimgopt['panel_image_triangle'];
$panelstyles = get_sub_field('panel_styles');
$padtop = $panelstyles['panel_padding_top'];
$padbottom = $panelstyles['panel_padding_bottom'];
?>
<?php if(($imgtyp == "img-fullbackground")||($imgtyp == "img-fullbackground narrow")){ ?>
	<div class="fullcol pagerow fullcopyimg-row <?php echo $imgtyp." ".$imgloc; ?> noflow gorel clearfix" style="<?php if($padtop){echo "padding-top: ".$padtop."; ";}if($padbottom){echo "padding-bottom: ".$padbottom."; ";} ?>">
		<div class="fullcol pagerow fullcopyimg-row <?php echo $panelstyles['panel_background']." ".$imgtyp." ".$imgloc; ?> gorel clearfix" style="<?php echo "background-image: url(".$panelimg['url']."); "; ?>">
			<div class="midcol clearfix">
				<div class="content-block extended copy-block <?php echo $panelstyles['panel_background']; ?> gorel withopac translow">
					<div class="inner">
					<?php
					if($panelhead){
						echo "<h4 class='larger'>".$panelhead."</h3>";
					}
					if($panelcopy){
						echo "<span class='copycol block-copy'>".$panelcopy."</span>";
					}
					if($panelbuttons){
						echo "<div class='button-wrapper'>";
						foreach($panelbuttons as $panelbutton){
							$buttonlink = $panelbutton['button_link'];
							$buttonstyle = $panelbutton['button_style'];
							$buttoncolour = $panelbutton['button_colour'];
							echo "<a class='button-link ".$buttonstyle." ".$buttoncolour."' href='".$buttonlink['url']."'>".$buttonlink['title']."</a>";
						}
						echo "</div>";
					}
					?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php }else{ ?>
<div class="fullcol pagerow copyimg-row <?php echo $panelstyles['panel_background']." ".$imgtyp." ".$imgloc." ".$imgalign; ?> gorel clearfix" style="">
	<div class="midcol clearfix" style="<?php if($padtop){echo "padding-top: ".$padtop."; ";}if($padbottom){echo "padding-bottom: ".$padbottom."; ";} ?>">
		<div class="content-block copy-block <?php echo $panelstyles['panel_background']; ?> translow">
			<?php
			if($panelhead){
				echo "<h3 class='key-heading'>".$panelhead."</h3>";
			}
			if($panelcopy){
				echo "<span class='copycol listalt block-copy'>".$panelcopy."</span>";
			}
			if($panelbuttons){
				echo "<div class='button-wrapper'>";
				foreach($panelbuttons as $panelbutton){
					$buttonlink = $panelbutton['button_link'];
					$buttonstyle = $panelbutton['button_style'];
					$buttoncolour = $panelbutton['button_colour'];
					echo "<a class='button-link ".$buttonstyle." ".$buttoncolour."' href='".$buttonlink['url']."'>".$buttonlink['title']."</a>";
				}
				echo "</div>";
			}
			?>
		</div>
		<div class="content-block image-block <?php echo $imgtriangle; ?> gorel translow" style="<?php if($imgtyp == "img-background"){echo "background-image: url(".$panelimg['url'].");";}?>">
			<img src="<?php echo $panelimg['url']; ?>" alt="<?php echo $panelimg['alt']; ?>" title="<?php echo $panelimg['title']; ?>" />
		</div>
	</div>
</div>
<?php } ?>

<?php 
// Image panel output
elseif( get_row_layout() == 'panel_image' ): 
$panelwidth = get_sub_field('panel_width');
$imglayout = get_sub_field('panel_layout');	
?>
<div class="fullcol pagerow images-row clearfix">
	<div class="<?php echo $panelwidth." "; echo $imglayout; ?> grid-setter nomobpad clearfix">
		<?php $theimages = get_sub_field('panel_images');
		$i = 1;
		foreach($theimages as $theimage){
			$imgfile = $theimage['image_file'];
			$imgoffset = $theimage['image_offset'];
			if($imgoffset){
				echo "<div class='image-block block-setter ".($i%2 ? "odd" : "even")." ".($i%3 ? "not-third" : "third")." gorel translow clearfix' style='padding-top: ".$imgoffset.";'>" ;
			}else{
				echo "<div class='image-block block-setter ".($i%2 ? "odd" : "even")." ".($i%3 ? "not-third" : "third")." gorel translow clearfix'>" ;
			}
			echo "<img src='".$imgfile['url']."' alt='".$imgfile['alt']."' title='".$imgfile['title']."' />";
			echo "</div>";
			$i++;
		} ?>
	</div>
</div>

<?php 
// Image blocks panel output
elseif( get_row_layout() == 'panel_image_blocks' ): 
$blockstyle = get_sub_field('panel_block_style');
if($blockstyle == "text-below"){	
?>
	<div class="fullcol pagerow imgblocks-row text-below clearfix">
		<div class="midcol grid-setter clearfix">
			<?php $theblocks = get_sub_field('panel_blocks');
			$i = 1;
			foreach($theblocks as $theblock){
				$blockimg = $theblock['block_image'];
				$blocklink = $theblock['block_link'];
				$imgsized = $blockimg['sizes']['services-image'];
				echo "<div class='image-block ".$theblock['block_text_shade']." ".($i%2 ? "odd" : "even")." gorel shadowbox translow clearfix'>";
				if($blocklink){
					echo "<a href='".$blocklink['url']."'>";
				}
				echo "<div class='image-wrapper'>";
				echo "<img class='translow' src='".$imgsized."' alt='".$blockimg['alt']."' title='".$blockimg['alt']."' />";
				echo "</div>";
				echo "<div class='title-wrapper block-setter'>";
				echo "<h3 class='ontop'>".$theblock['block_title']."</h3>";
				echo "</div>";
				if($blocklink){
					echo "<div class='link-wrapper'>";
					echo "<a class='button-link link-arrow red' href='".$blocklink['url']."'>".$blocklink['title']."</a>";
					echo "</div>";
					echo "</a>";
				}
				echo "</div>";
				$i++;
			} ?>
		</div>
	</div>
<?php }else{ ?>
	<div class="fullcol pagerow imgblocks-row clearfix">
		<div class="midcol grid-setter clearfix">
			<?php $theblocks = get_sub_field('panel_blocks');
			$i = 1;
			foreach($theblocks as $theblock){
				$blockimg = $theblock['block_image'];
				$blocklink = $theblock['block_link'];
				$imgsized = $blockimg['sizes']['services-image'];
				echo "<div class='image-block block-setter ".$theblock['block_text_shade']." ".($i%2 ? "odd" : "even")." gorel translow clearfix'>";
				if($blocklink){
					echo "<a href='".$blocklink."'>";
				}
				echo "<h3 class='ontop'>".$theblock['block_title']."</h3>";
				echo "<span class='overlay translow'></span>";
				echo "<span class='img-bg overlay translow' style='background-image: url(".$imgsized.");'></span>";
				if($blocklink){
					echo "</a>";
				}
				echo "</div>";
				$i++;
			} ?>
		</div>
	</div>
<?php } ?>

<?php 
// Featured content panel output
elseif( get_row_layout() == 'featured_content_panel' ): 
$todisplay = get_sub_field('featured_todisplay');
if($todisplay == "pages-selected"){
	$thepages = get_sub_field('featured_pages');
	$pagearray = array($thepages[0]['select_page'], $thepages[1]['select_page'], $thepages[2]['select_page']);
	$args = array(
		'post_type' => 'page',
		'post__in' => $pagearray,
		'posts_per_page' => 3,
		'order' => 'ASC'
	);
}elseif($todisplay == "services-random"){
	$args = array(
		'post_type' => 'page',
		'post_parent' => 25,
		'posts_per_page' => 3,
		'orderby' => 'rand'
	);
}
?>
<div class="fullcol panel-row featured-row clearfix">
	<div class="midcol grid-setter clearfix">
		<?php 
		$i = 1;
		$recent = new WP_Query($args); while($recent->have_posts()) : $recent->the_post();?>
			<div class="feature-block <?php echo ($i%3 ? "not-third" : "third") ?> shadowbox clearfix">
			<a href="<?php the_permalink(); ?>" class="linkwrap">
				<div class="block-image">
					<?php if(has_post_thumbnail()){
						the_post_thumbnail('thumbnail');
					}else{
						echo "<img src='".get_bloginfo('stylesheet_directory')."/_/img/sino_thumbnail.jpg' alt='".get_the_title()."' title='".get_the_title()."' />";
					} ?>
				</div>
				<div class="block-copy">
					<div class="inner block-setter">
						<h4 class="camelcase"><?php the_title(); ?></h4>
					</div>
					<span class="button-link outline red"><?php the_sub_field('featured_link_text'); ?></span>
				</div>
			</a>
			</div>
		<?php $i++;
		endwhile; wp_reset_postdata(); ?>
	</div>
</div>

<?php 
// Services panel output
elseif( get_row_layout() == 'services_panel' ): ?>
<div class="fullcol panel-row services-row <?php the_sub_field('panel_background'); ?> <?php the_sub_field('panel_column_count'); ?> centred clearfix">
	<div class="midcol aligncentre clearfix">
		<h4 class="larger alt"><?php the_sub_field('panel_heading'); ?></h4>
		<div class="fullcol clearfix">
			<?php $theservices = get_sub_field('panel_services');
			foreach($theservices as $theservice){
				$theicon = $theservice['service_icon'];
				echo "<div class='service-block'>";
				if($theicon){
					echo "<img src='".$theicon['url']."' alt='".$theicon['alt']."' title='".$theicon['title']."' />";
				}
				echo $theservice['service_description'];
				echo "</div>";
			} ?>
		</div>
	</div>
</div>

<?php 
// Testimonial panel output
elseif( get_row_layout() == 'testimonial_panel' ): ?>
<div class="fullcol panel-row testimonial-row bg-bluemd offset-arrow-left clearfix">
	<div class="midcol withquotes wide aligncentre gorel clearfix">
		<?php $recent = new WP_Query("post_type=testimonial&orderby=rand&posts_per_page=1"); while($recent->have_posts()) : $recent->the_post();?>
			<div class="inner">
				<blockquote><?php the_field('testimonial_copy'); ?></blockquote>
				<cite><?php the_title(); ?></cite>
			</div>
		<?php endwhile; wp_reset_postdata(); ?>
	</div>
</div>

<?php 
// Fivestar panel output
elseif( get_row_layout() == 'fivestar_panel' ): ?>
<div class="fullcol panel-row fivestar-row <?php the_sub_field('panel_background'); ?> clearfix">
	<div class="midcol narrow aligncentre clearfix">
		<blockquote><?php the_sub_field('panel_copy'); ?></blockquote>
	</div>
</div>

<?php 
// Logos panel output
elseif( get_row_layout() == 'logos_panel' ): ?>
<div class="fullcol panel-row logos-row bg-white centred clearfix">
	<div class="midcol logo-intro clearfix">
		<div class="halfcol left clearfix">
			<h3 class="key-heading"><?php the_sub_field('panel_heading'); ?></h3>
		</div>
		<div class="halfcol right copycol clearfix">
			<span class="section-title"><?php the_sub_field('panel_description_title'); ?></span>
			<?php the_sub_field('panel_description'); ?>
		</div>
	</div>
	<div class="midcol logo-grid aligncentre clearfix">
		<?php $thelogos = get_sub_field('panel_logos');
		foreach($thelogos as $thelogo){
			$logod = $thelogo['logo_image'];
			//$logoa = $thelogo['active_logo'];
			$logolink = $thelogo['logo_link'];
			echo "<div class='logo-item gorel'>";
			if($logolink){
				echo "<a href='".$logolink."' class='logo-link' target='_blank' rel='noopener noreferrer'>";
			}
			//echo "<img class='logo-active translow' src='".$logoa['url']."' alt='".$logoa['alt']."' title='".$logoa['title']."' />";
			echo "<img class='logo-default' src='".$logod['url']."' alt='".$logod['alt']."' title='".$logod['title']."' />";
			if($logolink){
				echo "</a>";
			}
			echo "</div>";
		} ?>
	</div>
</div>

<?php 
// Workflow panel output
elseif( get_row_layout() == 'panel_workflow' ): 
$panelhead = get_sub_field('panel_heading');
$panelsubhead = get_sub_field('panel_subheading');
$panelcopy = get_sub_field('panel_copy');
$workflows = get_sub_field('workflow_items');	
?>
<div class="fullcol pagerow workflow-row bg-cream gorel clearfix">
	<div class="midcol clearfix" style="<?php if($padtop){echo "padding-top: ".$padtop."; ";}if($padbottom){echo "padding-bottom: 66px; ";} ?>">
		<div class="fullcol workflow-heading copycol clearfix">
			<?php 
			if($panelhead){
				echo "<h3 class='larger'>".$panelhead."</h3>";
			} ?>	
		</div>
		<div class="fullcol workflow-feature copycol gorel clearfix">
			<div class="halfcol left flow-left copycol clearfix">
				<div class="midset">
					<div class="inner">
						<?php 
						/*if($panelhead){
							echo "<h3 class='larger'>".$panelhead."</h3>";
						}*/
						if($panelsubhead){
							echo "<h4 class='larger'>".$panelsubhead."</h4>";
						}
						if($panelcopy){
							echo $panelcopy;
						}
						?>
					</div>
				</div>
			</div>
			<div class="halfcol right trans clearfix">
				<div class="inner">
					<?php if($workflows){
						$wi = 1;
						$wcount = count($workflows);
						foreach($workflows as $workflow){
							if($wi == $wcount){
								$lastclass = "last";
							}else{
								$lastclass = "notlast";
							}
							$stepicon = $workflow['step_icon'];
							echo "<div class='flow-row ".$lastclass."'>";
							//echo "<span class='flow-no'>".$wi.".</span>";
							echo "<div class='fullcol flow-main clearfix'>";
							echo "<span class='flow-logo'><img src='".$stepicon['url']."' alt='".$stepicon['alt']."' title='".$stepicon['title']."' /></span>";
							echo "<span class='flow-title'>".$workflow['step_title']."</span>";
							echo "</div>";
							echo "<div class='fullcol flow-sub gorel clearfix'>";
							$subitems = $workflow['step_subitems'];
							if($subitems){
								foreach($subitems as $subitem){
									$subicon = $subitem['substep_icon'];
									echo "<div class='substep-row clearfix'>";
									echo "<span class='flow-subicon ".$subitem['substep_marker']."'><span class='the-icon'></span></span>";
									echo "<span class='flow-sublogo'><img src='".$subicon['url']."' alt='".$subicon['alt']."' title='".$subicon['title']."' /></span>";
									echo "<span class='flow-subtitle'>".$subitem['substep_title']."</span>";
									echo "</div>";
								}
							}
							echo "</div>";
							echo "</div>";
							$wi++;
						}
					} ?>
				</div>
			</div>
		</div>		
	</div>
</div>


<?php 
// Spacer panel output
elseif( get_row_layout() == 'panel_spacer' ): 
$hastriangle = get_sub_field('panel_triangle');
if($hastriangle){
	$thetriangle = get_sub_field('panel_trianglepos');
}else{
	$thetriangle = "no-triangle";
}
?>
<div class="fullcol pagerow spacer-row <?php the_sub_field('panel_background'); ?> <?php echo $thetriangle; ?> clearfix" style="padding-top:<?php the_sub_field('panel_height'); ?>;"></div>

<?php 
// Page anchor output
elseif(get_row_layout() == 'page_anchor' ): ?>
<a id="<?php the_sub_field('anchor_name'); ?>" class="page-anchor"></a>


<!-- New stuff above! -->


<?php endif; endwhile; else: endif; ?>