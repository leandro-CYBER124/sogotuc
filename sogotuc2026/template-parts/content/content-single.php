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

<?php #Estilo por defecto para las entradas. Nota: la visualización por defecto será para entradas de categorías como Novedades, Contenido dinámico, etc. ?>
<?php function default_entry() { global $post; ?>
<article class="entry" id="post-<?php echo the_ID(); ?>">
  <div class="entry__content">
    <div class="entry__box">
      <div class="entry__header">
        <?php if(has_post_thumbnail()) { $src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), [5600, 1000], false, ''); ?>
            <div class="entry__att-image">
              <img src="<?php echo $src[0]; ?>" alt="">
            </div>
        <?php } ?>
        <div class="entry__metadata">
          <?php echo the_title('<h1 class="entry__title">', '</h1>'); ?>
          <?php if(function_exists('yoast_breadcrumb')) { yoast_breadcrumb('<p class="breadcrumbs">', '</p>'); }?>
          <p class="entry__date" title="<?php the_time( 'd/m/Y, H:i' ); ?>">
            <i class="fa-regular fa-calendar"></i>
            <span><?php echo relative_time(); ?></span>
          </p>
          <?php if(has_excerpt()){ ?>
          <div class="entry__excerpt">
            <?php echo the_excerpt(); ?>
          </div>
          <?php } ?>
        </div>
        <div class="entry__body">
          <?php echo the_content(); ?>
        </div>
        <?php if(has_tag()) { ?>
          <hr>
          <div class="entry-tags">
            <h3 class="entry-tags__title"><i class="fa-solid fa-tags"></i></h3>
            <?php the_tags('<ul><li>', '</li><li>', '</li></ul>'); ?>
          </div>
        <?php } ?>
      </div>
    </div>
    <div class="entry__box">
      <div class="entry-box__content">
        <div class="entry-search">
          <div class="entry-search__content">
            <form class="entry-search__form" method="get" action="<?php echo esc_url(get_home_url('/')) ?>">
              <input type="search" class="entry-search__field" value="" name="s" placeholder="¿Qué estás buscando?">
              <button class="entry-search__submit" type="submit"><i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i></button>
            </form>
          </div>
        </div>
        <hr>
        <?php
          $categories = wp_get_post_categories(get_the_ID());
          $primary_category = get_post_meta(get_the_ID(), '_yoast_wpseo_primary_category', true);

          if($primary_category) {
            $categories_to_query = [$primary_category];
          } else {
            $categories_to_query = $categories;
          }

          if($categories_to_query) {
            $args = [
              'category__in' => $categories,
              'post__not_in' => [get_the_ID()],
              'posts_per_page' => 5,
              'ignore_sticky_posts' => 1,
              'orderby' => 'rand'
            ];

            $related_post = new WP_Query($args);
            if($related_post->have_posts()) {
            ?>
            <div class="entry-related">
              <h3 class="entry-related__title">Notas relacionadas</h3>
              <ol class="entry-related__body">
              <?php while($related_post->have_posts()) { $related_post->the_post(); ?>
                <li class="entry-related__item">
                  <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <?php the_title(); ?>
                  </a>
                </li>
              <?php } ?>
              </ol>
              <?php
              if($primary_category){
                $primary_category_link = get_category_link($primary_category);
                if(!is_wp_error($primary_category_link)){ ?>
                  <div class="buttons-left">
                    <a class="buttons-primary" href="<?php echo $primary_category_link; ?>">Más notas similares</a>
                  </div>
                <?php }} ?>
            <?php wp_reset_postdata(); ?>
            </div>
          <?php }} ?>
          <hr>
          
          <div class="entry-follow">
            <div class="entry-follow__content">
              <h3 class="entry-follow__title">Seguinos en nuestras redes</h3>
              <ul class="entry-follow__list">
                <li class="entry-follow__item">
                  <a href="https://www.facebook.com/share/1ZbXjqAbMr/" target="_blank" title="Estamos en Facebook">
                    <i class="fa-brands fa-facebook"></i>
                  </a>
                </li>
                <li class="entry-follow__item">
                  <a href="https://www.instagram.com/apdtucuman/" target="_blank" title="Estamos en Instagram">
                    <i class="fa-brands fa-instagram"></i>
                  </a>
                </li>
                <li class="entry-follow__item">
                  <a href="https://wa.me/5493815390846/?text=<?php echo urlencode('Hola, cómo estás? Vengo desde la web apdt.com.ar y tengo interés por el evento VII Congreso de Técnicos Protesistas Dentales de Tucumán'); ?>" target="_blank" title="Contactanos por WhatsApp">
                    <i class="fa-brands fa-whatsapp"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</article>
<?php } ?>

<?php function services_entry() { ?>
<?php } ?>

<?php
if(false) {

} else {
  default_entry();
}
?>