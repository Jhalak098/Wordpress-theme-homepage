		<!-- <div class="footer">
    		<div class="copyright">Copyright@admecmultimediajoomlagroupindiadelhi</div>
    	</div> -->
    	<!-- footer ends here -->
	</div>
		<!--
        <div id="footer">
			&copy;<?php //echo date("Y"); echo " "; bloginfo('name'); ?>
		</div>

	</div>
	-->
	<?php wp_footer(); ?>
	
	<!-- Don't forget analytics -->


	    <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="footerbottom">
          <div class="col-md-3 col-sm-6">
            <div class="footerwidget">
              <h4>
                Course Categories
              </h4>
              <div class="menu-course">
                <ul class="menu">
                  <?php
										$categories = get_categories(array(
											'orderby' => 'name',
											'order'   => 'ASC',
											'hide_empty' => 0,
											'child_of' => get_theme_mod('footer_2_cat', 6)
										));
										?>
										<?php
										foreach ($categories as $category) {
											echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
										}
										?>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="footerwidget">
              <h4>
                Products Categories
              </h4>
              <div class="menu-course">
                <ul class="menu">
                  <?php
										$categories = get_categories(array(
											'orderby' => 'name',
											'order'   => 'ASC',
											'hide_empty' => 0,
											'child_of' => get_theme_mod('footer_1_cat', 6),
										));
										?>
										<?php
										foreach ($categories as $category) {
											echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
										}
										?>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="footerwidget">
              <h4>
                Browse by Categories
              </h4>
              <div class="menu-course">
                <ul class="menu">
                  <?php
										$categories = get_categories(array(
											'orderby' => 'name',
											'order'   => 'ASC',
											'hide_empty' => 0,			
                      'parent' => get_theme_mod('footer_3_cat', 0),
											'exclude' => '1,3,6,11'
										));
										?>
										<?php
										foreach ($categories as $category) {
											echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
										}
										?>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6"> 
            <div class="footerwidget"> 
              <?php
								if (is_active_sidebar('contact-footer-wa')) {
									dynamic_sidebar('contact-footer-wa');
								}
								?>
            </div><!-- end widget --> 
          </div>
        </div>
      </div>
      <div class="social text-center">
        <a href="#"><i class="fa-brands fa-twitter"></i></a>
        <a href="#"><i class="fa-brands fa-facebook"></i></a>
        <a href="#"><i class="fa-brands fa-dribbble"></i></a>
        <a href="#"><i class="fa-brands fa-flickr"></i></a>
        <a href="#"><i class="fa-brands fa-github"></i></a>
      </div>

      <div class="clear"></div>
      <!--CLEAR FLOATS-->
    </div>
    <div class="footer2">
      <div class="container">
        <div class="row">
          <div class="col-md-6 panel">
            <div class="panel-body">
              <p class="simplenav">
                <a href="index.html">Home</a> | 
                <a href="about.html">About</a> |
                <a href="courses.html">Courses</a> |
                <a href="price.html">Price</a> |
                <a href="videos.html">Videos</a> |
                <a href="contact.html">Contact</a>
              </p>
            </div>
          </div>

          <div class="col-md-6 panel">
            <div class="panel-body">
              <p class="text-right">
                Copyright &copy; 2014. Template by <a href="https://www.admecindia.com/" rel="develop">admecindia.com</a>
              </p>
            </div>
          </div>

        </div>
        <!-- /row of panels -->
      </div>
    </div>
  </footer>




<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>

<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.easing.1.3.js"></script>

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.mobile.customized.min.js"></script>

<script src="<?php echo get_template_directory_uri(); ?>/js/camera.min.js"></script>

<script src="<?php echo get_template_directory_uri(); ?>/js/fancybox/jquery.fancybox.pack.js"></script>

<script src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>


<script>
jQuery(function(){			
    jQuery('#camera_wrap_4').camera({
        transPeriod: 500,
        time: 3000,
        height: '600',
        loader: 'false',
        pagination: true,
        thumbnails: false,
        hover: false,
        playPause: false,
        navigation: false,
        opacityOnGrid: false,
        imagePath: 'images/'
    });
});      
</script>

<?php wp_footer(); ?>
	
</body>

</html>
