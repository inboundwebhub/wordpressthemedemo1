<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * `@subpackage Kreative
 * @since 1.0
 * @version 1.2
 */

?>
<footer>
      <div class="row">
         <div class="col g-7">
            <?php dynamic_sidebar('sidebar-2'); ?>
         </div>

         <div class="col g-5 pull-right">
            <?php dynamic_sidebar('sidebar-3'); ?>
         </div>

      </div>
   </footer>
<?php wp_footer(); ?>
</body>
</html>
