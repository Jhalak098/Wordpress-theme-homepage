

<?php get_header(); ?>

	<!-- Header -->
	<?php if(get_theme_mod('show_slider', true)): ?>
<header id="head">
    <div class="container">
            <!-- <?php //do_shortcode('')
                    ?> -->

            <div class="heading-text">
                <h1 class="animated flipInY delay1"><?php echo get_theme_mod('slider_text_setting', 'Start Online Education'); ?></h1> <br />
                <p><?php echo get_theme_mod('slider_subtext_setting', 'Free Online education template for elearning a
          nd online education institute.'); ?></p>
            </div>
            
  		<div class="fluid_container">
                <div class="camera_wrap camera_emboss pattern_1" id="camera_wrap_4">
                    
                    <div data-thumb="<?php echo get_template_directory_uri(); ?>/images/slides/thumbs/img1.jpg"
                         data-src="<?php echo get_theme_mod('slider_1_image', get_template_directory_uri().'/images/slides/img1.jpg'); ?>">
                    </div>

                    <div data-thumb="<?php echo get_template_directory_uri(); ?>/images/slides/thumbs/img2.jpg"
                        data-src="<?php echo get_theme_mod('slider_2_image', get_template_directory_uri().'/images/slides/img2.jpg'); ?>">
                    </div>

                    <div data-thumb="<?php echo get_template_directory_uri(); ?>/images/slides/thumbs/img3.jpg"
                         data-src="<?php echo get_theme_mod('slider_3_image', get_template_directory_uri().'/images/slides/img3.jpg'); ?>">
                    </div>
                </div><!-- #camera_wrap_3 -->
            </div><!-- .fluid_container -->
        </div>
</header>
    <?php endif; ?>
	<!-- /Header -->

  <div class="container">
    <div class="row">        
        <?php query_posts('posts_per_page=4&cat=3'); ?>
        <?php
        $n = 1;
        if (have_posts()) {
            while (have_posts()) {
                the_post();
        ?>
                <div class="col-md-3">
                    <div class="grey-box-icon <?php echo 'b' . $n; ?>">
                        <h4><?php the_title(); ?></h4>
                        <p><?php the_excerpt(); ?></p>
                        <p><a href="<?php the_permalink(); ?>"><em>Read More</em></a></p>
                    </div><!--grey box -->
                </div><!--/span3-->
        <?php
                $n++;
            } // end while
        } // end if
        ?>
    </div>
</div>
      <section class="news-box top-margin">
        <div class="container">
            <h2><span>New Courses</span></h2>
        <div class="row">
            <?php query_posts('posts_per_page=3&cat=4'); ?>
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
            ?>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="newsBox">
                            <div class="thumbnail">
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium'); ?>
                                    </a>
                                <?php endif; ?>
                                <div class="caption maxheight2">
                                    <div class="box_inner">
                                        <div class="box">
                                            <p class="title">
                                            <h5><?php the_title(); ?></h5>
                                            </p>
                                            <p><?php the_excerpt(); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                } // end while
            } // end if
            ?>
        </div>
    </div>
</section>

	
      <section class="container">
      <div class="row">
      	<div class="col-md-8">
            <?php query_posts('posts_per_page=1'); ?>
            <?php
            if (have_posts()) :
                the_post();
            ?>
                <div class="title-box clearfix ">
                    <h2 class="title-box_primary"><?php the_title(); ?></h2>
                </div>
                <p><?php the_excerpt(); ?></p>
                <a href="<?php the_permalink(); ?>" title="read more" class="btn-inline " target="_self">read more</a>
            <?php
            endif;
            ?>
        </div>

        <div class="col-md-4">
            <div class="title-box clearfix ">
                <h2 class="title-box_primary">Up Coming Courses</h2>
            </div>
            <div class="list styled custom-list">
                <ul>
                    <?php query_posts('tag=upcoming-course'); ?>
                    <?php
                    if (have_posts()) {
                        while (have_posts()) {
                            the_post();
                    ?>
                            <li><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php
                        } // end while
                    } // end if
                    ?>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>