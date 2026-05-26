<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>

<?php function default_page(){ global $post ?>
  <section id="page" class="page">
    <div class="page__content">
      <?php if(has_post_thumbnail()){ $post_thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');}?>
      <div class="page-header" <?php echo has_post_thumbnail() ? 'style="background-image: url(' . $post_thumbnail_url . '); min-height: 450px; margin-bottom: 5rem;"' : null ?>>
        <?php echo has_post_thumbnail() ? '<div class="page-header__overlay"></div>' : null ?>
        <div class="page-header__content">
          <h1 class="page__title" <?php echo has_post_thumbnail() ? 'style="color: var(--light-color);"' : null ?>><?php the_title(); ?></h1>
          <?php if(function_exists('yoast_breadcrumb')) {has_post_thumbnail() ? yoast_breadcrumb('<p id="breadcrumbs">', '</p>') : yoast_breadcrumb('<p id="breadcrumbs" class="primary-color-last">', '</p>'); } ?>
        </div>
      </div>
      <div class="page__body">
        <div class="page__content">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </section>
<?php } ?>

<?php function page_vii_congreso_nacional_de_protesistas_dentales(){ global $post ?>
  <div id="page" class="page post-<?php the_ID(); ?>">
    <!-- Hero -->
    <section id="hero">
        <div class="hero__overlay">
            <div class="hero__smartslider">
                <?php echo do_shortcode('[smartslider3 slider="12"]'); ?>
            </div>
        </div>
    </section>

    <!-- Sede del evento -->
    <section id="sede-del-evento" class="sede">
        <div class="sede__content">
            <h1 class="text-center">13, 14 y 15 de Noviembre<br>Hotel Catalinas &mdash; <i class="fa-solid fa-location-dot"></i> Av. Soldati 380. San Miguel de Tucumán</h1>
        </div>
    </section>

    <!-- Contador del evento -->
    <section id="countdown" class=" ">
        <div class="countdown__content">
            <?php // echo do_shortcode('[hurrytimer id="11"]'); ?>
            <h4 class="text-center secondary-text home-title">Concluimos con gran éxito el VII Congreso Nacional de Técnicos Protesistas Dentales<br>Agradecemos a todos los que participaron</h4>
            <h5 class="text-center primary-text">¡Ya están disponibles los certificados</h5>
            <div class="buttons-center">
                <a class="buttons buttons-secondary" href="https://idehub.idehost.com.ar/event/form/?id=18#nav-certs" target="_blank">Certificados</a>
            </div>
        </div>
    </section>

    <!-- Sponsors -->
    <section id="supports">
        <div class="supports__content">
            <div class="supports__cat">
                <div class="supports__title supports__secondary-bg-color">
                    <h4 class="supports__title-text text-light">Organizan</h4>
                </div>
                <div class="supports__slider">
                    <?php echo do_shortcode('[smartslider3 slider="4"]'); ?>
                </div>
            </div>
            <div class="supports__cat">
                <div class="supports__title supports__primary-bg-color">
                    <h4 class="supports__title-text text-light">Nos acompañan</h4>
                </div>
                <div class="supports__slider">
                    <?php echo do_shortcode('[smartslider3 slider="5"]'); ?>
                </div>
            </div>
            <div class="supports__cat">
                <div class="supports__title supports__terciary-bg-color">
                    <h4 class="supports__title-text text-light">Sponsors</h4>
                </div>
                <div class="supports__slider">
                    <?php echo do_shortcode('[smartslider3 slider="6"]'); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Congreso -->
    <section id="congreso">
        <nav class="congreso__nav">
            <div class="nav nav-tabs congreso__content" id="nav-tab" role="tablist">
                <button class="nav-link congreso__button active" id="nav-buttonOne-tab" data-bs-toggle="tab" data-bs-target="#nav-buttonOne" type="button" role="tab" aria-controls="nav-buttonOne" aria-selected="true"><h5>Disertantes</h5></button> <!-- Botón de activación de Agronomía -->
                <button class="nav-link congreso__button" id="nav-buttonTwo-tab" data-bs-toggle="tab" data-bs-target="#nav-buttonTwo" type="button" role="tab" aria-controls="nav-buttonTwo" aria-selected="false"><h5>Comité Organizador</h5></button> <!-- Botón de activación de Zootecnia -->
                <button class="nav-link congreso__button" id="nav-buttonThree-tab" data-bs-toggle="tab" data-bs-target="#nav-buttonThree" type="button" role="tab" aria-controls="nav-buttonThree" aria-selected="false"><h5>Programa del Evento</h5></button> <!-- Botón de activación de Zootecnia -->
            </div>
        </nav>
        <div class="tab-content congreso__tabs" id="nav-tabContent">
            <div class="tab-pane fade congreso__pane show active" id="nav-buttonOne" role="tabpanel" aria-labelledby="nav-buttonOne-tab" tabindex="0" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/photos/tabOne-bg.jpg);">
                <div class="congreso__overlay">
                    <h2 class="congreso__h2"><a href="<?php echo get_home_url(); ?>/disertantes/">Conocé a los Disertantes del Evento</a></h2>
                    <div class="congreso__info">
                        <div class="congreso__desc">
                            <?php echo category_description(2); ?>
                        </div>
                        <div class="disertantes">
                            <div class="disertantes__content">
                                <?php
                                $query_post_first_tab = new WP_Query([
                                    'cat' => 2,
                                    'order' => 'DESC',
                                    'posts_per_page' => -1
                                ]);

                                if($query_post_first_tab->have_posts()) {
                                    while($query_post_first_tab->have_posts()){
                                        $query_post_first_tab->the_post();
                                        ?>
                                        <div class="disertantes-item card3d">
                                            <div class="disertantes-item__thumbnail">
                                                <?php if(has_post_thumbnail()) { ?>
                                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                                                <?php } else { ?>
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/ui/user.png" alt="">
                                                <?php } ?>
                                            </div>
                                            <div class="disertantes-item__info">
                                                <div class="disertantes-item__inner">
                                                    <h4 class="disertantes-item__title"><?php the_title(); ?></h4>
                                                    <?php the_excerpt(); ?>
                                                    <div class="buttons-center">
                                                        <a class="buttons-secondary" href="<?php echo the_permalink(); ?>">Más info</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } wp_reset_postdata(); ?>
                                    <div class="buttons-center">
                                        <a class="buttons__a buttons-secondary" href="<?php echo get_home_url(); ?>/disertantes/">Ver todos</a>
                                    </div>
                                <?php } else { ?>
                                    <h4 class="text-center text-light py-4">No hay contenido disponible aún</h4>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Ventana de V Congreso de Tec. Radiólogos y Lic. Bioimágenes -->
            <div class="tab-pane fade congreso__pane" id="nav-buttonTwo" role="tabpanel" aria-labelledby="nav-buttonTwo-tab" tabindex="0" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/photos/tabTwo-bg.jpg)">
                <div class="congreso__overlay">
                    <h2 class="congreso__h2"><a href="<?php echo get_home_url(); ?>/disertantes-invitados/">Comité Organizador del Evento</a></h2>
                    <div class="congreso__info">
                        <div class="congreso__desc">
                            <?php echo category_description(15); ?>
                        </div>
                        <div class="disertantes">
                            <div class="disertantes__content">
                                <?php
                                $query_post_second_tab = new WP_Query([
                                    'cat' => 15,
                                    'order' => 'DESC',
                                    'posts_per_page' => -1
                                ]);

                                if($query_post_second_tab->have_posts()) {
                                    while($query_post_second_tab->have_posts()){
                                        $query_post_second_tab->the_post();
                                        ?>
                                        <div class="disertantes-item">
                                            <div class="disertantes-item__thumbnail">
                                                <?php if(has_post_thumbnail()) { ?>
                                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                                                <?php } else { ?>
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/ui/user.png" alt="">
                                                <?php } ?>
                                            </div>
                                            <div class="disertantes-item__info">
                                                <div class="disertantes-item__inner">
                                                    <h4 class="disertantes-item__title"><?php the_title(); ?></h4>
                                                    <?php the_excerpt(); ?>
                                                    <div class="buttons-center">
                                                        <a class="buttons-secondary" href="<?php echo the_permalink(); ?>">Más info</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } wp_reset_postdata();
                                } else { ?>
                                    <h4 class="text-center text-light py-4">No hay contenido disponible aún</h4>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Ventana de #3 -->
            <div class="tab-pane fade congreso__pane" id="nav-buttonThree" role="tabpanel" aria-labelledby="nav-buttonThree-tab" tabindex="0" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/photos/tabThree-bg.jpg); background-position: top;">
                <div class="congreso__overlay">
                    <h2 class="congreso__h2"><a href="<?php echo get_home_url(); ?>/programa/">Conocé el Programa Oficial del Evento</a></h2>
                    <div class="congreso__info">
                        <div class="congreso__desc">En esta sección encontrarás el programa completo del VII Congreso Nacional de Técnicos Protesistas Dentales. Conocé la agenda detallada de actividades, horarios y temáticas de cada jornada. Charlas, talleres y espacios de intercambio diseñados para potenciar tu formación y conectar con las últimas tendencias del sector. Planificá tu participación y aprovechá al máximo esta experiencia profesional única.</div>
                        <div class="buttons-center">
                            <a class="buttons__a buttons-primary" href="<?php echo get_home_url(); ?>/programa/">Más información</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </div>
<?php } ?>

<?php
// Obtenemos el id de la página actual
$id = get_the_ID();

// Definimos una estructura switch para mostrar diferentes contenidos según el id de la página
switch ($id){
  case 375: // ID de la página "VII Congreso Nacional de Protesistas Dentales"
    page_vii_congreso_nacional_de_protesistas_dentales();
    break;
  default:
    default_page();
}
?>