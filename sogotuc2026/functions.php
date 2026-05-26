<?php

/** Agregar scripts de tema **/
function add_theme_scripts() {
  wp_enqueue_style( 'animate_css', get_theme_file_uri() . '/css/animate.css' );
  wp_enqueue_style( 'animations_css', get_theme_file_uri() . '/css/animations.css' );
  wp_enqueue_style( 'hover_css', get_theme_file_uri() . '/css/hover.css' );
  wp_enqueue_style( 'bootstrap_css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css', array(), '5.1.1' );
  wp_enqueue_style( 'w3_css', 'https://www.w3schools.com/w3css/4/w3.css', array(), 4.0 );

  wp_enqueue_script( 'jquery_js', 'https://code.jquery.com/jquery-3.6.0.min.js', array(), '3.6.0', false );
  wp_enqueue_script( 'bootstrap_js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js', array('jquery_js'), '5.1.1', false );
  wp_enqueue_script( 'w3_js', 'https://www.w3schools.com/lib/w3.js', array('jquery_js'), 1.04, true );
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

// Orden específico para la categoría de Disertantes
add_action('pre_get_posts', function($query) {
  if (!is_admin() && $query->is_main_query() && is_category(2)) {
    $query->set('order', 'ASC'); // Cambia a 'DESC' si quieres descendente
  }
});

/** Noticias relacionadas - Titulo */
function jetpackme_related_posts_headline( $headline ) {
$headline = sprintf(
  '<h4 class="jp-relatedposts-headline"><em>%s</em></h4>',
  esc_html( 'Relacionado:' )
  );
return $headline;
}
add_filter( 'jetpack_relatedposts_filter_headline', 'jetpackme_related_posts_headline' );

/** Noticias relacionadas - Excluir categorias */
function jetpackme_filter_exclude_categories( $filters ) {
  $filters[] = array( 'not' =>
    array( 'terms' => array( 'category.slug' => array( 'excluir1','excluir2' ) ) )
  );
  return $filters;
}
add_filter( 'jetpack_relatedposts_filter_filters', 'jetpackme_filter_exclude_categories' );

/** Noticias relacionadas - Mover */
function jetpackme_remove_rp() {
  if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
    $jprp = Jetpack_RelatedPosts::init();
    $callback = array( $jprp, 'filter_add_target_to_dom' );
    remove_filter( 'the_content', $callback, 40 );
  }
}
add_filter( 'wp', 'jetpackme_remove_rp', 20 );

/** Noticias relacionadas - Redes Sociales */
function jptweak_remove_share() {
  remove_filter( 'the_content', 'sharing_display',19 );
  remove_filter( 'the_excerpt', 'sharing_display',19 );
  if ( class_exists( 'Jetpack_Likes' ) ) {
    remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
  }
}
add_action( 'loop_start', 'jptweak_remove_share' );

/** ERROR HTTP **/
add_filter( 'wp_image_editors', 'change_graphic_lib' );
function change_graphic_lib($array) {
  return array( 'WP_Image_Editor_GD', 'WP_Image_Editor_Imagick' );
}

/* Singles: Mostrar fechas como intervalos de tiempo (timestamps) */
function relative_time() { 
  $post_date = get_post_time( 'U', true );
  $delta = time() - $post_date;
  if ( $delta < 60 ) {
    echo 'Hace menos de un minuto';
  }
  elseif ($delta > 60 && $delta < 120){
    echo 'Hace aproximadamente un minuto';
  }
  elseif ($delta > 120 && $delta < (60*60)){
    echo 'Hace ', strval(round(($delta/60),0)), ' minutos';
  }
  elseif ($delta > (60*60) && $delta < (120*60)){
    echo 'Hace aproximadamente una hora';
  }
  elseif ($delta > (120*60) && $delta < (24*60*60)){
    echo 'Hace ', strval(round(($delta/3600),0)), ' horas';
  }
  else {
    echo the_time('d/m/Y, H:i');
  }
}
//Barra de navegacion
$nav_items = [

  'Médicos' => get_home_url() . '/medicos/',

  'Institucional' => [
    'Quiénes Somos' => get_home_url() . '/quienes/',
    'Artículos Relacionados' => get_home_url() . '/articulos-relacionados/',
  ],
  'Escuela SOGOTUC' => get_home_url() . '/escuela-sogotuc/',
  'Sumate a la guia' => get_home_url() . '/Sumate-A-La-Guia-sudotuc/',

  'Actividades' => [
    'Novedades' => get_home_url() . '/novedades/'
  ],
  'Presentaciones' => get_home_url() . '/presentaciones/',
  'Contacto' => get_home_url() . '/contacto/',
];

// Generador de menú principal
function gen_main_menu() {
  global $nav_items;

  // Comprueba si la variable está definida
  if (empty($nav_items)) {
    echo '<p>Error: El array $nav_items no está definido o está vacío.</p>';
    return;
  }
  $is_home = is_home() ? ' main-menu--home' : ' main-menu--scroll';
  $menu_start = '<nav class="main-menu'. $is_home .'">';
  $menu_end = '</nav>';

  echo $menu_start;
  foreach($nav_items as $key => $value) {
    if(is_array($value)) {
      echo '<li class="main-menu__submenu">
              <button class="menu-item">' . $key . '</button>
              <ul class="main-menu__submenu-content">';
      foreach ($value as $sub_key => $sub_value) {
        echo '<li class="submenu-item"><a href="' . $sub_value . '">' . $sub_key . '</a></li>';
      }
      echo '
        </ul>
        </li>
      ';
    } else {
      echo '<li class="menu-item"><a href="' . $value . '">' . $key . '</a></li>';
    }
  }
  echo $menu_end;
}

function gen_mobile_menu() {
  global $nav_items;
  $counter = 0;

  // Comprueba si la variable está definida
  if (empty($nav_items)) {
    echo '<p>Error: El array $nav_items no está definido o está vacío.</p>';
    return;
  }
  $menu_start = '<nav class="mobile-nav">';
  $menu_end = '</nav>';

  echo '<div class="accordion accordion-flush" id="accordion-mobile-menu">' . $menu_start;
  foreach($nav_items as $key => $value) {
    $counter++;
    if(is_array($value)){
      echo '
        <li class="mobile-menu__submenu">
          <div class="accordion-item">
            <p class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-' . $counter . '" aria-expanded="false" aria-controls="collapse-' . $counter . '">
                ' . $key . '
              </button>
            </p>
            <div id="collapse-' . $counter . '" class="accordion-collapse collapse" data-bs-parent="accordion-mobile-menu">
              <div class="accordion-body">';
        foreach($value as $sub_key => $sub_value){
          echo '<a class="mobile-menu-link" href="' . $sub_value . '">' . $sub_key . '</a>';
        }
        echo '
              </div>
            </div>
          </div>';
    } else {
      echo '
        <li class="mobile-menu__item">
          <a class="mobile-menu-link" href="' . $value . '">' . $key . '</a>
        </li>';
    }
  }
  echo $menu_end;
}