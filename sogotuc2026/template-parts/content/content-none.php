<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>

<div class="not-found">
  <section class="not-found__content">
    <div class="not-found__inner">
      <div class="not-found__box">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/ui/404-no-content.png" alt="">
      </div>
      <div class="not-found__box">
        <h1>Parece que la página o el contenido que buscas no está aquí</h1>
        <h6>Tu búsqueda fue:<br>"<?php echo get_search_query(true); ?>"</h6>
      </div>
    </div>
    <div id="search" class="search"> <!-- Buscador -->
      <div class="search__content">
        <form class="search__form" method="get" action="<?php echo esc_url(get_home_url('/')) ?>">
          <input type="search" class="search__field" value="" name="s" placeholder="¿Qué estás buscando?">
          <button class="search__submit" type="submit"><span><i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i> Buscar</span></button>
        </form>
      </div>
      <p class="ps-4"><i>Intentá usando palabras claves o descripciones más generales para mejores resultados.</i></p>
    </div>
  </section>
</div>