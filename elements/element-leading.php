<?php 
$leadtyp = get_field('leading_type');
$leadimg = get_field('leading_image');
$leadimgpos = get_field('leading_imgpos');
$leadbg = get_field('leading_background');
$leadbgcolour = $leadbg['panel_background'];
$leadstitle = get_field('leading_section_title');
$althead = get_field('leading_alt_heading');
$leadhead = get_field('leading_heading');
$leadheadmax = get_field('leading_heading_maxwidth');
$leadsubhead = get_field('leading_subheading');
$leadsubheadsize = get_field('leading_subheading_size');
$leadcopy = get_field('leading_copy');
$leadbuttons = get_field('panel_buttons');
if($leadtyp == "leading-full"){ ?>
	<div class="fullcol leading-panel leading-full <?php echo $leadbgcolour; ?> gorel clearfix" style="background-image: url(<?php echo $leadimg['url']; ?>);">
		<div class="midcol ontop clearfix">
			<div class="leftcol clearfix">
			<?php if($leadhead){
					echo "<h1 class='larger'>".$leadhead."</h1>";
				} ?>
				<?php if($leadsubhead){
					echo "<h2>".$leadsubhead."</h2>";
				} ?>
				<?php if($leadcopy){
					echo "<div class='leading-copy'>".$leadcopy."</div>";
				} ?>
				<?php if($leadbuttons){
					echo "<div class='button-wrapper'>";
					foreach($leadbuttons as $leadbutton){
						$buttonlink = $leadbutton['button_link'];
						$buttonstyle = $leadbutton['button_style'];
						$buttoncolour = $leadbutton['button_colour'];
						echo "<a class='button-link ".$buttonstyle." ".$buttoncolour."' href='".$buttonlink['url']."'>".$buttonlink['title']."</a>";
					}
					echo "</div>";
				} ?>
			</div>
		</div>
		<div class="overlay"></div>
	</div>
<?php }elseif($leadtyp == "leading-offset-image"){ ?>
	<div class="fullcol leading-panel leading-offsetimg <?php echo $leadbgcolour." "; echo $leadimgpos." "; if($althead){echo "alt-heading";} ?> gorel clearfix">
		<div class="midcol ontop clearfix">
			<?php if($leadstitle){
				echo "<span class='section-title'>".$leadstitle."</span>";
			} ?>
			<div class="leftcol clearfix">
				<?php if($leadhead){
					if($leadheadmax){
						echo "<h1 style='max-width: ".$leadheadmax."px'>".$leadhead."</h1>";
					}else{
						echo "<h1>".$leadhead."</h1>";
					}
				} ?>
				<?php if($leadbuttons){
					echo "<div class='button-wrapper'>";
					foreach($leadbuttons as $leadbutton){
						$buttonlink = $leadbutton['button_link'];
						$buttonstyle = $leadbutton['button_style'];
						$buttoncolour = $leadbutton['button_colour'];
						echo "<a class='button-link ".$buttonstyle." ".$buttoncolour."' href='".$buttonlink['url']."'>".$buttonlink['title']."</a>";
					}
					echo "</div>";
				} ?>
			</div>
			<div class="rightcol clearfix">
				<?php if($leadsubhead){
					echo "<h2 class='smaller'>".$leadsubhead."</h2>";
				} ?>
				<?php if($leadcopy){
					echo "<div class='leading-copy'>".$leadcopy."</div>";
				} ?>
			</div>
		</div>
		<div class="fullcol ontop clearfix">
			<img src="<?php echo $leadimg['url']; ?>" alt="<?php echo $leadimg['alt']; ?>" title="<?php echo $leadimg['title']; ?>" />
		</div>
	</div>
<?php }elseif($leadtyp == "leading-splitbg"){ ?>
	<div class="fullcol leading-panel leading-splitbg <?php echo $leadbgcolour." "; echo $leadimgpos." "; if($althead){echo "alt";}; ?> gorel noflow clearfix" style="background-image: url(<?php echo $leadimg['url']; ?>);">
		<div class="midcol nomobpad clearfix">
			<div class="halfcol bottom-cut extended <?php echo $leadbgcolour; if($leadimgpos == "img-left"){echo " right";} ?> gorel">
				<div class="inner translow">
					<?php if($leadstitle){
						echo "<span class='section-title'>".$leadstitle."</span>";
					}
					if($leadhead){
						echo "<h1 class='smaller'>".$leadhead."</h1>";
					} 
					if($leadsubhead){
						echo "<h2>".$leadsubhead."</h2>";
					}
					if($leadcopy){
						echo "<div class='copy-wrapper copycol'>";
						echo $leadcopy;
						echo "</div>";
					} ?>
					<?php if($leadbuttons){
						echo "<div class='button-wrapper'>";
						foreach($leadbuttons as $leadbutton){
							$buttonlink = $leadbutton['button_link'];
							$buttonstyle = $leadbutton['button_style'];
							$buttoncolour = $leadbutton['button_colour'];
							echo "<a class='button-link ".$buttonstyle." ".$buttoncolour."' href='".$buttonlink['url']."'><span>".$buttonlink['title']."</span></a>";
						}
						echo "</div>";
					} ?>
				</div>
			</div>
			<img class="splitimg-mob" src="<?php echo $leadimg['url']; ?>" alt="<?php echo $leadimg['alt']; ?>" title="<?php echo $leadimg['title']; ?>" />
		</div>
		<!--<div class="fullcol example-panel clearfix">
			<div class="midcol nomobpad clearfix">
				<div class="halfcol bottom-cut bg-turquoiselt">
 
				</div>
			</div>
		</div>-->
	</div>
<?php }elseif($leadtyp == "leading-simple"){ ?>
	<div class="fullcol leading-panel leading-simple <?php echo $leadbgcolour." "; echo $leadimgpos." "; if($althead){echo "alt-heading";} ?> gorel clearfix">
		<div class="midcol ontop clearfix">
			<?php 
			if($leadheadmax){
				echo "<div class='fullcol clearfix' style='max-width: ".$leadheadmax."px'>";
			}else{
				echo "<div class='fullcol clearfix'>";
			}
			if($leadstitle){
				echo "<span class='section-title'>".$leadstitle."</span>";
			}
			if($leadhead){
				echo "<h1>".$leadhead."</h1>";
			} 
			if($leadsubhead){
				echo "<h2>".$leadsubhead."</h2>";
			}
			echo "</div>";
			?>
		</div>
	</div>

<?php }elseif($leadtyp == "leading-withcopy"){ ?>
	<div class="fullcol leading-panel leading-withcopy <?php echo $leadbgcolour." "; echo $leadimgpos." "; if($althead){echo "alt-heading";} ?> gorel translow clearfix">
		<div class="midcol ontop clearfix">
			<?php 
			if($leadheadmax){
				echo "<div class='fullcol clearfix' style='max-width: ".$leadheadmax."px'>";
			}else{
				echo "<div class='fullcol clearfix'>";
			}
			if($leadstitle){
				echo "<span class='section-title'>".$leadstitle."</span>";
			}
			if($leadhead){
				echo "<h1 class='larger'>".$leadhead."</h1>";
			} 
			echo "</div>";
			?>
			<div class="fullcol split-copy clearfix">
				<div class="halfcol left clearfix">
				<?php if($leadsubhead){
					echo "<h2 class='".$leadsubheadsize."'>".$leadsubhead."</h2>";
				} ?>
				</div>
				<div class="halfcol right clearfix">
				<?php if($leadcopy){
					echo $leadcopy;
				} ?>
				</div>
			</div>
		</div>
	</div>	
<?php }else{ ?>

<?php } ?>