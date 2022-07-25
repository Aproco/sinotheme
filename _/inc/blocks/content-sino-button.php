<?php
$leadbuttons = get_field('panel_buttons');
if($leadbuttons){
	echo "<div class='button-wrapper'>";
	foreach($leadbuttons as $leadbutton){
		$buttonlink = $leadbutton['button_link'];
		$buttonstyle = $leadbutton['button_style'];
		$buttoncolour = $leadbutton['button_colour'];
		echo "<a class='button-link ".$buttonstyle." ".$buttoncolour."' href='".$buttonlink['url']."'>".$buttonlink['title']."</a>";
	}
	echo "</div>";
}
?>