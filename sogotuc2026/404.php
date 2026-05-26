<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

get_header();
?>
  
  <section id="buscador">
    <div class="container">
      <img class="error" src="<?php echo get_theme_file_uri(); ?>/imagenes/error_404.svg" alt="Error 404">
      <h1>¡Parece que algo salió mal!</h1>
      <p>La página que estabas buscando no está aquí. ¿Tal vez quieres realizar una búsqueda?</p>
      <div class="formulario">
        <form role="search" method="get" class="search-form" action="<?php echo get_home_url(); ?>">
          <label>
            <span class="screen-reader-text">Buscar</span>
            <input type="search" class="search-field" placeholder="Buscar..." value="" name="s">
          </label>
          <button type="submit" class="search-submit">
            <i class="fas fa-search"></i>
          </button>
        </form>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
