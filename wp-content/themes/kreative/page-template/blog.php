<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
/**
* Template Name: Blog Template
*
* @package WordPress
* @subpackage Kreative
* @since Kreative 1.0
*/
get_header();
?>

      <!-- Blog Entries
      ================================================== -->
      <div id="blog-entries">

         <!-- Post -->
         <article class="post">

            <div class="row">

               <div class="col entry-header cf">

                 <h1><a href="blog-single.html" title="">Proin gravida nibh vel velit auctor aliquet Aenean sollicitudin auctor.</a></h1>

                 <div class="post-meta">

                    <time class="date" datetime="2013-08-14T11:24">Aug 14, 2013</time>

                    <p class="categories">
                       <span class="sep">/</span><a href="#">Design</a>
                       <span class="sep">/</span><a href="#">User Inferface</a>
                       <span class="sep">/</span><a href="#">Web Design</a>
                    </p>

                 </div>

               </div>

               <div class="col post-image">
                  <img src="<?php bloginfo('template_url') ?>/images/post-image/post-image-c-972x360.jpg" alt="post-image" title="post-image">
               </div>

               <div class="col post-content offset-2">

                  <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor,
                  nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate
                  cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a
                  ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. </p>

                 <p><a href="blog-single.html" class="more-link">Read More<i class="icon-angle-right"></i></a></p>

               </div>

            </div>

         </article> <!-- Post End -->

         <!-- Post -->
         <article class="post">

            <div class="row">

               <div class="col entry-header cf">

                  <h1><a href="blog-single.html" title="">Quis autem vel esse eum iure reprehenderit qui in ea voluptate velit esse.</a></h1>

                  <div class="post-meta">

                     <time class="date" datetime="2013-08-12T10:24">Aug 12, 2013</time>

                     <p class="categories">
                        <span class="sep">/</span><a href="#">Design</a>
                        <span class="sep">/</span><a href="#">Photography</a>
                        <span class="sep">/</span><a href="#">Branding</a>
                     </p>

                  </div>

               </div>

               <div class="col post-image">
                  <img src="<?php bloginfo('template_url') ?>/images/post-image/post-image-b-972x360.jpg" alt="post-image" title="post-image">
               </div>

               <div class="col post-content offset-2">

                  <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor,
                  nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate
                  cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a
                  ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. </p>

                  <p><a href="blog-single.html" class="more-link">Read More<i class="icon-angle-right"></i></a></p>

               </div>

            </div>

         </article> <!-- Post End -->

         <!-- Post -->
         <article class="post">

            <div class="row">

               <div class="col entry-header cf">

                  <h1><a href="blog-single.html" title="">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit sed.</a></h1>

                  <div class="post-meta">

                     <time class="date" datetime="2013-08-10T10:24">Aug 10, 2013</time>

                     <p class="categories">
                       <span class="sep">/</span><a href="#">Photography</a>
                       <span class="sep">/</span><a href="#">Branding</a>
                       <span class="sep">/</span><a href="#">Develpment</a>
                     </p>

                  </div>

               </div>

               <div class="col post-image">
                  <img src="<?php bloginfo('template_url') ?>/images/post-image/post-image-a-972x360.jpg" alt="post-image" title="post-image">
               </div>

               <div class="col post-content offset-2">

                  <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor,
                  nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate
                  cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a
                  ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. </p>

                  <p><a href="blog-single.html" class="more-link">Read More<i class="icon-angle-right"></i></a></p>

               </div>

            </div>

         </article> <!-- Post End -->

         <div class="row">

            <!-- Pagination -->
            <nav class="col full pagination">
   			   <ul>
                  <li><span class="page-numbers prev inactive">Prev</span></li>
   				   <li><span class="page-numbers current">1</span></li>
   				   <li><a href="#" class="page-numbers">2</a></li>
                  <li><a href="#" class="page-numbers">3</a></li>
                  <li><a href="#" class="page-numbers">4</a></li>
                  <li><a href="#" class="page-numbers">5</a></li>
                  <li><a href="#" class="page-numbers">6</a></li>
                  <li><a href="#" class="page-numbers">7</a></li>
                  <li><a href="#" class="page-numbers">8</a></li>
                  <li><a href="#" class="page-numbers">9</a></li>
   				   <li><a href="#" class="page-numbers next">Next</a></li>
   			   </ul>
   		   </nav>

        </div>

      </div> <!-- Blog Entries End -->


      <!-- Bottom Block
      ================================================== -->
      <div id="bottom-block">

         <div class="row">

            <div class="col three-fourths">

               <ul class="blog-categories">

   				   <li class="current"><a href="/blog">All</a></li>
   					<li><a title="View all posts filed under Community" href="#">Community</a></li>
                 	<li><a title="View all posts filed under Design" href="#">Design</a></li>
                 	<li><a title="View all posts filed under Development" href="#">Development</a></li>
                 	<li><a title="View all posts filed under User Interface" href="#">User Interface</a></li>
                 	<li><a title="View all posts filed under News" href="#">News</a></li>
                 	<li><a title="View all posts filed under Photography" href="#">Photography</a></li>
                 	<li><a title="View all posts filed under Projects" href="#">Projects</a></li>

   				</ul>

            </div>

            <div class="col one-fourth back-to-top">
                <p><a href="#top">Back to Top<i class="icon-level-up"></i></a></p>
            </div>

         </div>

      </div> <!-- Bottom Block End -->


<?php
get_footer();
?>