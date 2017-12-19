<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Kreative
 * @since 1.0
 * @version 1.0
 */

get_header();
?>
	<!-- Intro Section
   ================================================== -->

   <section id="intro">

      <!-- Flexslider Start-->
	   <div id="intro-slider" class="flexslider">

		   <ul class="slides">

			   <!-- Slide -->
                <?php
                     $args=array(
                          'post_type'=>'slider-intro',
                          'post_status'=>'publish',
                          'post_per_page'=>"-1"
                     );

                     $the_query=new WP_Query($args);
                      if($the_query->have_posts()):
                            while ($the_query->have_posts()):$the_query->the_post();
                ?>
                   <li>
                       <div class="row">
                           <div class="col full">
                               <div class="slider-text">
                                   <?php
                                        echo get_the_content();
                                   ?>
                               </div>
                           </div>
                       </div>
                   </li>

            <!-- Slide -->
                <?php
                        endwhile;
                      endif;
                ?>

		   </ul>
	   </div>
	   <!-- Flexslider End-->

   </section> <!-- Intro Section End-->


   <!-- Services Section
   ================================================== -->
<?php
    $front_page_id=get_option('page_on_front');
?>
   <section id="services">

      <div class="row section-head">

         <div class="col one-third">
            <h2><?php
                echo get_post_meta($front_page_id,'service_label',true);
                ?>
            </h2>
            <p class="desc"><?php echo get_post_meta($front_page_id,'service_title',true); ?></p>
         </div>

         <div class="col two-thirds">
            <div class="intro">
                <p><?php
                        echo get_post_meta($front_page_id,'service_desc',true);
                    ?>
              </p>
            </div>
         </div>

      </div>

      <div class="row">

         <div class="services-wrapper">
             <?php
                    $args=array(
                        'post_type'=>'services',
                        'post_status' => 'publish',
                        'posts_per_page' => '-1',
                    );
                    // the query
                    $the_query = new WP_Query($args);

                    if ($the_query->have_posts()):
                            while ($the_query->have_posts()):$the_query->the_post();
                            $post_id=$post->ID;
                            $service_title=get_the_title();
                            $services_icon_class=get_post_meta($post_id,'services_icon',true);
                            $service_description=get_the_content();
             ?>
                                <div class="col">
                                    <h2><i class="<?php echo $services_icon_class; ?>"></i><?php echo  $service_title; ?></h2>
                                    <p><?php echo $service_description; ?></p>
                                </div>
             <?php
                            endwhile;
                    endif;
             ?>

         </div> <!-- Services-Wrapper End -->

      </div> <!--end row -->

   </section> <!-- Services Section End -->


   <!-- Portfolio Section
   ================================================== -->
   <section id="portfolio">

      <div class="row section-head">
         <div class="col full">
             <h2><?php echo get_post_meta($front_page_id,'portfolio_label',true); ?></h2>
             <p class="desc"><?php echo get_post_meta($front_page_id,'portfolio_title',true); ?></p>
             <p class="intro"><?php echo get_post_meta($front_page_id,'portfolio_desc',true); ?></p>

         </div>
      </div>

        <?php

              $story_args = array(
                'post_type'      => 'port-folio',
                'post_status'    => 'publish',
                'posts_per_page' => -1,
              );
              // the query
              $the_query = new WP_Query($story_args);

              if ($the_query->have_posts()) :
         ?>

        <div class="row">
            <!-- Portfolio Wrapper -->
		   <div id="portfolio-wrapper">
           <?php
                    $i=0;
                while ($the_query->have_posts()) : $the_query->the_post();
                   $post_id = $post->ID;
                   $url= get_post_meta(get_the_ID(), 'portfolio_url', TRUE);
                   $feat_image = wp_get_attachment_url(get_post_thumbnail_id($post_id) );
                   $portfolio_name=get_the_title($post_id);

            ?>
                    <div class="col portfolio-item">
                        <div class="item-wrap">
                            <a href="#" data-reveal-id="modal-<?php echo $i++; ?>"><img src="<?php echo $feat_image; ?>"
                                                                                        alt=""/></a>
                            <div class="portfolio-item-meta">
                                <h5><a href="#"><?php echo $portfolio_name; ?></a></h5>
                            </div>
                        </div>
                    </div>
            <?php endwhile; ?>
		   </div> <!-- Portfolio Wrapper End -->
	    </div> <!-- End Row -->

                  <?php
                  $i = 0;
                  while ($the_query->have_posts()) : $the_query->the_post();
                      $post_id = $post->ID;
                      $url = get_post_meta(get_the_ID(), 'portfolio_url', TRUE);
                      $feat_image = wp_get_attachment_url(get_post_thumbnail_id($post_id));
                      $portfolio_name = get_the_title($post_id);
                      $tag_name=(!empty(wp_get_post_tags($post_id)))?wp_get_post_tags($post_id)[0]->name:''
                      ?>
                      <div id="modal-<?php echo $i++; ?>" class="reveal-modal">

                          <img class="scale-with-grid"
                               src="<?php echo $feat_image; ?>"
                               alt=""/>

                          <div class="description-box">
                              <h4><?php echo $portfolio_name; ?></h4>
                              <?php echo get_the_content(); ?>
                              <span class="categories"><i class="icon-tag"></i><?php echo $tag_name; ?></span>
                          </div>

                          <div class="link-box">
                              <a href="<?php echo $url; ?>">Details</a>
                              <a class="close-reveal-modal">Close</a>
                          </div>

                      </div><!-- modal-01 End -->
        <?php
                endwhile;
              endif;
        ?>
   </section> <!-- Portfolio End -->

   <!-- Journal Section
   ================================================== -->
   <section id="journal">

      <div class="row section-head">
         <div class="col full">
            <h2>Journal</h2>
            <p class="desc">Our latest posts and rants.</p>
         </div>
      </div>

      <!-- Blog Entries -->
      <div class="blog-entries">

         <!-- Entry -->
          <?php
                $args=array(
                    'post_type'=>'post',
                    'post_status'=>'publish',
                    'post_per_page'=>'-1'
                );
                $the_query=new WP_Query($args);
                if($the_query->have_posts()):$the_query->have_posts();
                    while ($the_query->have_posts()):$the_query->the_post();
                        $post_title=get_the_title();
                        $post_content=get_the_content();
                        $author_name=get_the_author_meta('display_name');
                        $published_date=get_the_date();
                        $author_id=$post->post_author;
                        $user_image=(get_avatar_url($author_id)!=null)?get_avatar_url($author_id):get_template_directory_uri().'/images/user-03.png';
          ?>

            <article class="entry">

                <div class="row entry-header">

                   <div class="author-image">
                      <img src="<?php echo $user_image; ?>" alt="Sakura Haruno" />
                   </div>

                   <div class="col g-9 offset-1 entry-title">
                      <h3><a href="blog-single.html"><?php echo $post_title; ?></a></h3>
                   </div>

                   <div class="col g-2">
                      <p class="post-meta">
                         <time pubdate="" class="post-date" datetime="2013-08-19"><?php echo $published_date; ?></time>
                         <span class="dauthor">By <?php echo $author_name; ?></span>
                      </p>
                   </div>

                </div>

                <div class="row">

                   <div class="col g-9 offset-1 post-content">
                      <?php
                            echo the_excerpt('<span>'.__('Read more').'</span>');
                      ?>
                   </div>

                </div>

         </article> <!-- Entry End -->
                         <!-- End -->
          <?php
                endwhile;
                endif;
          ?>

      </div> <!-- Blog Entries End -->

   </section>  <!-- Journal Section End -->


   <!-- About Section
   ================================================== -->
   <section id="about">

      <div class="row section-head">
         <div class="col one-fourth">
            <h2><?php echo get_post_meta($front_page_id,'about_label',true); ?></h2>
            <p class="desc"><?php echo get_post_meta($front_page_id,'about_title',true); ?></p>
         </div>
         <div class="col three-fourths">
             <p class="intro"><?php echo get_post_meta($front_page_id,'about_desc',true); ?></p>
         </div>
      </div>

      <div class="row">
         <div class="col full"><h3>Our Work Process.</h3></div>
      </div>
      <div class="row process-wrap">
          <?php
                $args=array(
                     'post_type'=>'workprocess',
                     'post_status'=>'publish',
                     'post_per_page'=>'-1'
                );
                $the_query=new WP_Query($args);

                if($the_query->have_posts()):
                    while($the_query->have_posts()):$the_query->the_post();
          ?>
                     <div class="col">
                        <h4><?php echo get_the_title(); ?></h4>
                        <p><?php echo get_the_content(); ?></p>
                     </div>
                <?php
                        endwhile;
                        endif;
                ?>
      </div> <!-- Process Wrap End -->
      <div class="row">
         <div class="col full"><h3>Meet The Team.</h3></div>
      </div>
      <!-- Team Wrap End -->
      <div class="row team-wrap">
          <?php
                    $args=array(
                        'post_type'=>'teams',
                        'post_status'=>'publish',
                        'post_per_page'=>'-1',
                        'order'=>'ASC'
                    );

                    $the_query=new WP_Query($args);
                    if($the_query->have_posts()):
                        while ($the_query->have_posts()):$the_query->the_post();
                            $post_id=$post->ID;
                            $team_img=(get_the_post_thumbnail($post_id)!=null)? wp_get_attachment_url(get_post_thumbnail_id($post_id)) : get_template_directory_uri().'/images/team/team-img-03.jpg';
                            $team_name=get_the_title();
                            $team_description=get_the_content();
                            $team_role=(!empty(wp_get_post_tags($post_id)))?wp_get_post_tags($post_id)[0]->name:'';
          ?>
         <div class="col one-fourth">

            <img src="<?php echo $team_img; ?>" alt=""/>

            <div class="member-name">
               <h5><?php echo $team_name; ?></h5>
               <span><?php echo $team_role; ?></span>
            </div>
                <?php  echo $team_description?>
         </div>
            <?php
                        endwhile;
                        endif;
            ?>

      </div> <!-- Team Wrap End -->

      <!-- Testimonials -->
      <div class="row">

         <div class="col full section-head">
            <h2>Testimonials</h2>
            <p class="desc">What our clients are saying.</p>
         </div>

      </div>

      <div class="row testimonials">
            <?php
                    $args=array(
                        'post_type'=>'testimonials',
                        'post_status' => 'publish',
                        'posts_per_page' => '-1',
                    );
                    // the query
                    $the_query = new WP_Query($args);

                    if ($the_query->have_posts()):
                            while ($the_query->have_posts()):$the_query->the_post();
                            $post_id=$post->ID;
                            $testi_title=get_the_title();
                            $testi_description=get_the_content();
                            $testi_image=(get_post_thumbnail_id($post_id)!=null) ? wp_get_attachment_url(get_post_thumbnail_id($post_id)) : get_template_directory_uri().'/images/client-img.png';
             ?>
                                <div class="col half">
                                    <div class="client-author">
                                        <img src="<?php echo $testi_image; ?>" alt=""/>
                                        <div class="name">
                                            <p><?php echo $testi_title; ?><span><?php echo wp_get_post_tags($post_id)[0]->name; ?></span></p>
                                        </div>
                                    </div>
                                    <div class="client-cite">
                                        <?php echo $testi_description; ?>
                                    </div>
                                </div>

                                <?php
                                        endwhile;
                                    endif;
                                ?>

      </div> <!--  Testimonials End-->


   </section> <!-- About Section End-->
   <!-- Map Section
   ================================================== -->
   <section id="map">

      <p class="map-error">Something went wrong... Unable to load map... Please try to enable javascript</p>

   </section> <!-- Map Section End-->

    <!-- Contact Section
   ================================================== -->
   <section id="contact">

      <div class="row section-head">
         <div class="col full">
            <h2>Contact Us</h2>
            <p class="desc">Get in touch with us.</p>
         </div>
      </div>

      <div class="row">

         <div class="col g-7">
            <!-- form -->
             <?php dynamic_sidebar('contact-form'); ?>
         </div>
         <aside class="col g-5">
             <?php dynamic_sidebar('contact-form-info'); ?>
         </aside>
      </div>

   </section> <!-- Contact Section End-->
<?php
get_footer();