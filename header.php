<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
?><!doctype html>

<!--[if lt IE 7 ]> <html class="ie ie6 ie-lt10 ie-lt9 ie-lt8 ie-lt7 no-js" lang="<?php the_field('language_hreflang', 'option'); ?>"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 ie-lt10 ie-lt9 ie-lt8 no-js" lang="<?php the_field('language_hreflang', 'option'); ?>"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 ie-lt10 ie-lt9 no-js" lang="<?php the_field('language_hreflang', 'option'); ?>"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 ie-lt10 no-js" lang="<?php the_field('language_hreflang', 'option'); ?>"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="<?php the_field('language_hreflang', 'option'); ?>"><!--<![endif]-->
<!-- the "no-js" class is for Modernizr. -->

<head id="<?php echo of_get_option('meta_headid'); ?>" data-template-set="html5-reset-wordpress-theme">

	<meta charset="<?php bloginfo('charset'); ?>">

	<!-- Always force latest IE rendering engine (even in intranet) -->
	<!--[if IE ]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<![endif]-->

	<?php
		if (is_search())
			echo '<meta name="robots" content="noindex, nofollow" />';
	?>

	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta name="title" content="<?php wp_title( '|', true, 'right' ); ?>">

	<!-- hreflang settings -->
	<?php $sitelang = get_field('site_language', 'option');
	global $wp;
	$langengb = get_field('language_url_en_gb');

	//Current site language
	echo "<link rel='alternate' href='".home_url($wp->request)."' hreflang='".get_field('language_hreflang', 'option')."' />";

	//Other site languages
	$thelangs = get_field('language_additional', 'option');
	foreach($thelangs as $thelang){
		//Set hreflang identifier
		$reflang = $thelang['lang_hreflang'];
		//Define alternative urls
		if($reflang == "en-gb"){
			$seturl =  get_field('language_url_en_gb');
		}elseif($reflang == "en-us"){
			$seturl =  get_field('language_url_en_us');
		}elseif($reflang == "de"){
			$seturl =  get_field('language_url_de');
		}
		//Output hreflang directives
		if($seturl){
			echo "<link rel='alternate' href='".$seturl."' hreflang='".$reflang."' />";
		}else{
			if(($reflang == "en") || ($reflang == "en-gb")){
				if($seturl){
					echo "<link rel='alternate' href='".$seturl."' hreflang='".$reflang."' />";
				}else{
					echo "<link rel='alternate' href='".network_site_url()."' hreflang='".$reflang."' />";
				}
			}else{
				echo "<link rel='alternate' href='".network_site_url("/".$reflang."/", '')."' hreflang='".$reflang."' />";
			}
		}
	}

	//Site default language
	if(is_main_site()){
		if($langengb){
			echo "<link rel='alternate' href='".$langengb."' hreflang='en' />";
			echo "<link rel='alternate' href='".$langengb."' hreflang='x-default' />";
		}else{
			echo "<link rel='alternate' href='".home_url($wp->request)."' hreflang='en' />";
			echo "<link rel='alternate' href='".home_url($wp->request)."' hreflang='x-default' />";
		}
	}else{
		if($langengb){
			echo "<link rel='alternate' href='".$langengb."' hreflang='en' />";
			echo "<link rel='alternate' href='".$langengb."' hreflang='x-default' />";
		}else{
			echo "<link rel='alternate' href='".network_site_url()."' hreflang='en' />";
			echo "<link rel='alternate' href='".network_site_url()."' hreflang='x-default' />";
		}		
	}
	?>

	<!--Google will often use this as its description of your page/site. Make it good.
	<meta name="description" content="<?//php bloginfo('description'); ?>" />-->

	<?php
		if (true == of_get_option('meta_author'))
			echo '<meta name="author" content="' . of_get_option("meta_author") . '" />';

		if (true == of_get_option('meta_google'))
			echo '<meta name="google-site-verification" content="' . of_get_option("meta_google") . '" />';
	?>

	<meta name="Copyright" content="Copyright &copy; <?php bloginfo('name'); ?> <?php echo date('Y'); ?>. All Rights Reserved.">

	<?php
		if (true == of_get_option('meta_viewport'))
			echo '<meta name="viewport" content="' . of_get_option("meta_viewport") . ' minimal-ui" />';

		if (true == of_get_option('head_favicon')) {
			echo '<meta name=”mobile-web-app-capable” content=”yes”>';
			echo '<link rel="shortcut icon" sizes=”1024x1024” href="' . of_get_option("head_favicon") . '" />';
		}

		if (true == of_get_option('head_apple_touch_icon'))
			echo '<link rel="apple-touch-icon" href="' . of_get_option("head_apple_touch_icon") . '">';
	?>

	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/reset.min.css" />
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" />

	<!-- Preload fonts for pagespeed -->
	<link rel="preload" href="<?php echo get_template_directory_uri(); ?>/_/fonts/maisonneue/maisonneue-bold-webfont.woff2" as="font" crossorigin="anonymous">
	<link rel="preload" href="<?php echo get_template_directory_uri(); ?>/_/fonts/klavika/klavika-regular-webfont.woff2" as="font" crossorigin="anonymous">
	<link rel="preload" href="<?php echo get_template_directory_uri(); ?>/_/fonts/maisonneue/maisonneue-book-webfont.woff2" as="font" crossorigin="anonymous">
	<link rel="preload" href="<?php echo get_template_directory_uri(); ?>/_/fonts/klavika/klavika-medium-webfont.woff2" as="font" crossorigin="anonymous">

    <script src="<?php echo get_template_directory_uri(); ?>/_/js/prefixfree.min.js"></script>

	<!-- Application-specific meta tags -->
	<?php
		// Windows 8
		if (true == of_get_option('meta_app_win_name')) {
			echo '<meta name="application-name" content="' . of_get_option("meta_app_win_name") . '" /> ';
			echo '<meta name="msapplication-TileColor" content="' . of_get_option("meta_app_win_color") . '" /> ';
			echo '<meta name="msapplication-TileImage" content="' . of_get_option("meta_app_win_image") . '" />';
		}

		// Twitter
		if (true == of_get_option('meta_app_twt_card')) {
			echo '<meta name="twitter:card" content="' . of_get_option("meta_app_twt_card") . '" />';
			echo '<meta name="twitter:site" content="' . of_get_option("meta_app_twt_site") . '" />';
			echo '<meta name="twitter:title" content="' . of_get_option("meta_app_twt_title") . '">';
			echo '<meta name="twitter:description" content="' . of_get_option("meta_app_twt_description") . '" />';
			echo '<meta name="twitter:url" content="' . of_get_option("meta_app_twt_url") . '" />';
		}

		// Facebook
		if (true == of_get_option('meta_app_fb_title')) {
			echo '<meta property="og:title" content="' . of_get_option("meta_app_fb_title") . '" />';
			echo '<meta property="og:description" content="' . of_get_option("meta_app_fb_description") . '" />';
			echo '<meta property="og:url" content="' . of_get_option("meta_app_fb_url") . '" />';
			echo '<meta property="og:image" content="' . of_get_option("meta_app_fb_image") . '" />';
		}
	?>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<meta name="theme-color" content="#65C2C4" />

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<?php $leadtyp = get_field('leading_type'); ?>

	<div id="wrapper">

		<header id="header" role="banner">
			<?php if($leadtyp == "leading-full") { ?>
			<div id="headwrap" class="fullcol header-wrapper alt translow clearfix">
			<?php }else{ ?>
			<div id="headwrap" class="fullcol header-wrapper translow clearfix">
			<?php } ?>
				<div class="fullcol header-main translow clearfix">
					<div class="header-left">
						<div class="header-logo translow">
							<a href="<?php bloginfo('url'); ?>"><img class="translow" src="<?php bloginfo('stylesheet_directory'); ?>/_/img/sino_logo.svg" alt="Sino manufacturing" title="Sino manufacturing" /></a>
						</div>
						<ul class="language-select">
							<li class="menu-item-has-children"><a class="language-current"><span class="dtl"><?php the_field('language_name_full', 'option'); ?></span><span class="mbl"><?php the_field('language_name_abbr', 'option'); ?></span></a>
								<ul class="sub-menu">
									<?php $addlangs = get_field('language_additional', 'option');
									foreach($addlangs as $addlang){
										//Set hreflang identifier
										$linklang = $addlang['lang_hreflang'];
										//Define alternative urls
										if($linklang == "en-gb"){
											$linkurl =  get_field('language_url_en_gb');
										}elseif($linklang == "en-us"){
											$linkurl =  get_field('language_url_en_us');
										}elseif($linklang == "de"){
											$linkurl =  get_field('language_url_de');
										}
										//Output links
										if($linkurl){
											echo "<li><a href='".$linkurl."'><span class='dtl'>".$addlang['lang_name']."</span><span class='mbl'>".$addlang['lang_abbr']."</span></a></li>";
										}else{
											if($linklang == "en-gb"){
												echo "<li><a href='".network_site_url()."'><span class='dtl'>".$addlang['lang_name']."</span><span class='mbl'>".$addlang['lang_abbr']."</span></a></li>";
											}else{
												echo "<li><a href='".network_site_url("/".$linklang."/", '')."'><span class='dtl'>".$addlang['lang_name']."</span><span class='mbl'>".$addlang['lang_abbr']."</span></a></li>";
											}
										}
									} ?>
								</ul>
							</li>
						</ul>
					</div>				
					<div class="header-right translow">
						<!-- Begin standard navigation menus -->
						<div class="fullcol desktop-only clearfix">
							<nav id="nav" role="navigation">
							<?php wp_nav_menu(array(
								'theme_location' => 'primary',
								'menu_class' => 'main-menu',
								'menu_id' => 'main_menu'
							)); ?>
							</nav>
						</div>
						<a class="openmenu-button mobile-only">
							<span class="menu-line top"></span>
							<span class="menu-line middle"></span>
							<span class="menu-line bottom"></span>
						</a>
					</div>
				</div>
				<!-- Begin mobile navigation menus -->
				<div class="accordion-menu-wrap mobile-only">
					<nav id="nav" role="navigation">
						<?php wp_nav_menu(array(
							'theme_location' => 'primary',
							'menu_class' => 'accordion-menu',
							'menu_id' => 'mobile_menu'
						)); ?>
					</nav>
				</div>
			</div>			
		</header>
		<?php if(!($leadtyp == "leading-full")) { ?>
			<div class="fullcol header-spacer translow clearfix"></div>
		<?php } ?>

		<!--<div class="fullcol example-panel clearfix">
			<div class="midcol nomobpad clearfix">
				<div class="halfcol bottom-cut bg-cream right">

				</div>
			</div>
		</div>
		<div class="fullcol example-panel clearfix">
			<div class="midcol nomobpad clearfix">
				<div class="halfcol bottom-cut bg-turquoiselt">

				</div>
			</div>
		</div>-->