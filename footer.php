<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
?>

  <?php 
  if((is_404()) || (is_home()) || (is_search()) || (is_archive()) || (is_singular('post'))){
    $footcta = get_field('footer_cta', 'option');
  }else{
    $footcta = get_field('footer_cta');
  }
  $ctatext = $footcta['cta_text'];
  $ctabuttons = $footcta['cta_buttons'];
  $thebuttons = $ctabuttons['panel_buttons'];
  if(($ctatext)){
  ?>
  <div class="fullcol footer-cta bg-red offset-arrow-right clearfix">
    <div class="midcol clearfix">
      <div class="halfcol left clearfix">
        <h4 class="cta-heading"><?php echo $ctatext; ?></h4>  
        <!--<h4 class="cta-heading">Making things better - in every sense</h4>-->
      </div>
      <div class="halfcol right alignright clearfix">
        <?php foreach($thebuttons as $thebutton) {
          $buttonlink = $thebutton['button_link'];
          echo "<a href='".$buttonlink['url']."' class='button-link ".$thebutton['button_style']." ".$thebutton['button_colour']."'>".$buttonlink['title']."</a>";
        } ?>
      </div>
    </div>
  </div>
  <?php } ?>
  
  <footer id="footer" class="source-org vcard copyright" role="contentinfo">
    <div class="fullcol footer-main bg-bluedk offset-arrow-left clearfix">
      <div class="midcol clearfix">
        <!-- Footer upper -->
        <div class="fullcol footer-upper clearfix">
          <div class="leftcol clearfix">
            <div class="footer-logo">
              <img class="translow" src="<?php bloginfo('stylesheet_directory'); ?>/_/img/sino_logo.svg" alt="Sino manufacturing" title="Sino manufacturing" />
              <span class="tagline"><?php the_field('global_logo_tagline', 'option'); ?></span>
            </div>
            <!--<div class="footer-logo alt-logo">
              <img class="translow" src="<//?php bloginfo('stylesheet_directory'); ?>/_/img/mach_logo.svg" alt="Mach logo" title="Mach logo" />
            </div>-->
          </div>
          <div class="rightcol clearfix">
            <nav id="nav" role="navigation">
							<?php wp_nav_menu(array(
								'theme_location' => 'primary',
								'menu_class' => 'footer-menu',
								'menu_id' => 'footer_menu'
							)); ?>
						</nav>
          </div>
        </div>
        <!-- Footer lower -->
        <div class="fullcol footer-lower clearfix">
          <div class="leftcol clearfix">
              <div class="halfcol left clearfix">
                <span class="foot-heading"><?php the_field('global_address_title_uk', 'option'); ?></span>
                <?php the_field('global_address_uk', 'option'); ?>
              </div>
              <div class="halfcol right clearfix">
                <span class="foot-heading"><?php the_field('global_address_title_china', 'option'); ?></span>
                <?php the_field('global_address_china', 'option'); ?>
              </div>
          </div>
          <div class="rightcol clearfix">
              <div class="subscribe-block">
                <span class="foot-heading"><?php the_field('global_subscribe_title', 'option'); ?></span>
                <?php gravity_form(2, false, false, false, '', true, 12); ?>
              </div>
              <div class="social-block">
                <span class="foot-heading"><?php the_field('global_follow_title', 'option'); ?></span>
                <ul class="foot-social">
                  <!-- Hide Twitter! -->
                  <?php 
                  $hastwitter = get_field('global_twitter_url', 'option'); 
                  $haslinkedin = get_field('global_linkedin_url', 'option');
                  if($hastwitter) {
                    echo "<li><a href='".$hastwitter."'><img src='".get_bloginfo('stylesheet_directory')."/_/img/icon_twitter.svg' alt='Twitter' title='Twitter' /></a></li>";
                  }
                  if($haslinkedin) {
                    echo "<li><a href='".$haslinkedin."'><img src='".get_bloginfo('stylesheet_directory')."/_/img/icon_linkedin.svg' alt='LinkedIn' title='LinkedIn' /></a></li>";
                  }
                  ?>
                </ul>
              </div>
          </div>
        </div>
        <!-- Footer notices -->
        <div class="fullcol footer-notices clearfix">
          <div class="leftcol clearfix">
            <small><?php the_field('global_copyright_notice', 'option'); ?></small>
          </div>
          <div class="rightcol clearfix">
              <ul class="terms-list">
                <?php $termslinks = get_field('global_terms_links', 'option');
                foreach($termslinks as $termslink){
                  $thelink = $termslink['terms_link'];
                  echo "<li><a href='".$thelink['url']."'>".$thelink['title']."</a></li>";
                } ?>
              </ul>
          </div>
        </div>        
      </div>
    </div>
	</footer>

	</div>

	<?php wp_footer(); ?>


<!-- jQuery is called via the WordPress-friendly way via functions.php -->

<!-- this is where we put our custom functions -->
<script src="<?php bloginfo('template_directory'); ?>/_/js/functions-min.js"></script>

<!-- Asynchronous google analytics; this is the official snippet.
         Replace UA-XXXXXX-XX with your site's ID and domainname.com with your domain, then uncomment to enable.

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-XXXXXX-XX', 'domainname.com');
  ga('send', 'pageview');

</script>
-->

<?php if(is_single()){ ?>
  <!-- Go to www.addthis.com/dashboard to customize your tools -->
  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-600fdb06c35d9693"></script> 
<?php } ?>

</body>

</html>
