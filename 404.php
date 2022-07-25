<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
 get_header(); ?>

<div class="fullcol content-block fourohfour-row bg-bluedk clearfix">
	<div class="midcol clearfix">
		<h1 class="larger go-turquoise"><?php the_field('fourohfour_page_heading', 'option'); ?></h1>
		<div class="fullcol clearfix">
			<div class="halfcol left clearfix">
				<h2 class="error"><?php the_field('fourohfour_page_subheading', 'option'); ?></h2>
			</div>
			<div class="halfcol right clearfix">
				<h3><?php the_field('fourohfour_alternatives_heading', 'option'); ?></h3>
				<?php $panelbuttons = get_field('panel_buttons', 'option');
				if($panelbuttons){
					echo "<div class='button-wrapper stacked'>";
					foreach($panelbuttons as $panelbutton){
						$buttonlink = $panelbutton['button_link'];
						$buttonstyle = $panelbutton['button_style'];
						$buttoncolour = $panelbutton['button_colour'];
						echo "<a class='button-link ".$buttonstyle." ".$buttoncolour."' href='".$buttonlink['url']."'>".$buttonlink['title']."</a><br />";
					}
					echo "</div>";
				} ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>