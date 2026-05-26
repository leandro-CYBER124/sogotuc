<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

get_header();
?>

    <section id="primary" class="content-area">
      <main id="main" class="site-main">
        <div>
          <?php
            /* Start the Loop */
            while ( have_posts() ) : the_post();
              get_template_part( 'template-parts/content/content', 'page' );
            endwhile; // End of the loop.
          ?>
        </div>
      </main><!-- #main -->
    </section><!-- #primary -->

<?php get_footer(); ?>