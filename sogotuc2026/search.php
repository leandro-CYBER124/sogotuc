<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

get_header();
?>

    <section id="primary" class="content-area">
      <main id="main" class="site-main">
        <div id="novedades">
          <?php if ( have_posts() ) : ?>

          <header class="page-header container titulo">
            <h1 class="entry-title">
              <?php _e( 'Resultados de búsqueda para:', 'twentytwenty' ); ?>
            </h1>
            <p class="consulta"><?php echo get_search_query(); ?></p>
          </header><!-- .page-header -->

          <div class="container">
            <div class="loop">
              <?php
              // Start the Loop.
              while ( have_posts() ) : the_post();

                /*
                 * Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
                get_template_part( 'template-parts/content/content', 'excerpt' );

                // End the loop.
              endwhile;

              // Previous/next page navigation.
              wp_pagenavi();

              // If no content, include the "No posts found" template.
            else :
              get_template_part( 'template-parts/content/content', 'none' );
            endif;
            ?>
            </div>
          </div>
        </div>
      </main><!-- #main -->
    </section><!-- #primary -->

<?php get_footer(); ?>