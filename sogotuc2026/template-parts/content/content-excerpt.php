<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>

<div class="tarjeta-categoria">
  <a href="<?php the_permalink(); ?>">
    <div class="tarjeta-categoria__imagen">
      <?php the_post_thumbnail("full"); ?>
    </div>
    <div class="tarjeta-categoria__info">
      <h6 class="tarjeta-categoria__h6"><?php the_title(); ?></h6>
      <?php the_excerpt(); ?>
    </div>
    <a class="tarjeta-categoria__a" href="<?php the_permalink(); ?>">Leé más</a>
  </a>
</div>