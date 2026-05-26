<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
  </header><!-- .entry-header -->

  <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p id="breadcrumbs">','</p>'); } ?>

  <?php twentytwenty_post_thumbnail(); ?>

  <div class="entry-content">
    <?php
      the_content(
        sprintf(
          wp_kses(
            /* translators: %s: Name of current post. Only visible to screen readers */
            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentytwenty' ),
            array(
              'span' => array(
                'class' => array(),
              ),
            )
          ),
          get_the_title()
        )
      );

      wp_link_pages(
        array(
          'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwenty' ),
          'after'  => '</div>',
        )
      );
    ?>

    <div class="tags"><?php the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?></div>

    <?php if ( class_exists( 'Jetpack_RelatedPosts' ) ) { echo do_shortcode( '[jetpack-related-posts]' ); } ?>
  </div><!-- .entry-content -->

  <div id="compartir">
    <?php if ( function_exists( 'sharing_display' ) ) { sharing_display( '', true ); } ?>
  </div>

  <footer class="entry-footer">
    <?php twentytwenty_entry_footer(); ?>
  </footer><!-- .entry-footer -->
</article><!-- #post-${ID} -->
