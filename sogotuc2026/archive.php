<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

get_header();
?>

<?php function default_categories() { global $post; ?>
<section id="categories" class="categories">
  <div class="categories__content">
    <div class="categories__header">
      <h1 class="categories__title text-center"><?php echo single_cat_title(); ?></h1>
      <?php if(category_description()){ ?>
        <div class="categories__description">
          <?php echo category_description(); ?>
        </div>
      <?php } ?>
    </div>
    <div class="primary-separator"></div>
    <div class="categories__body">
    <?php if(have_posts()) {?>
      <div class="categories__loop">
        <?php while(have_posts()){
          the_post();
          $post_url = get_permalink();
          ?>
          <div class="news-item card3d">
            <div class="news-item__content card3d__content">
              <div class="news-item__image">
                  <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
              </div>
              <div class="news-item__info">
                <a class="text-decoration-none" href="<?php the_permalink(); ?>">
                    <h4 class="news-item__title primary-text m-0" title="<?php the_title(); ?>"><?php the_title(); ?></h4>
                </a>
                <div class="news-item__date mb-3">
                    <p><i class="fa-regular fa-calendar me-2"></i> <?php echo get_the_date('d/m/Y'); ?></p>
                </div>
                <?php the_excerpt(); ?>
                <div class="news-item__footer">
                  <div class="button-left">
                      <a class="buttons-secondary" href="<?php the_permalink(); ?>">Más info</a>
                  </div>
                  <div class="news-item__share">
                      <a class="text-decoration-none" href="https://facebook.com/sharer/sharer.php?u=<?php echo urlencode($post_url); ?>" target="_blank" data-bs-toggle="tooltip" data-bs-title="Compartir en Facebook">
                          <div class="share-icon facebook">
                              <i class="fa-brands fa-facebook"></i>
                          </div>
                      </a>
                      <a class="text-decoration-none" href="https://api.whatsapp.com/send?text=<?php echo urlencode($post_url); ?>" target="_blank" data-bs-toggle="tooltip" data-bs-title="Compartir por WhatsApp">
                          <div class="share-icon whatsapp">
                              <i class="fa-brands fa-whatsapp"></i>
                          </div>
                      </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
      <?php wp_pagenavi(); ?>
      <?php } else {
        echo "<h4 class='text-center primary-text'>No hay contenido disponible</h4>";
     } ?>
    </div>
  </div>
</section>
<?php } ?>

<?php
// Renderizado condicional
if(false) {
  
} else {
  default_categories();
}

?>

<?php get_footer(); ?>