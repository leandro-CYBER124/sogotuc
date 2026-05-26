<?php
/**
 * Template principal - SOGOTUC Design
 * @package SOGOTUC_Theme
 */

get_header();
?>

<main id="main">

    <!-- Hero con Smart Slider -->
    <section id="hero">
        <div class="hero__overlay">
            <div class="hero__smartslider">
                <?php echo do_shortcode('[smartslider3 slider="1"]'); ?>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="sogotuc-stats">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <span class="stat-number">1952</span>
                    <span class="stat-label">Año de fundación</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">+70 años</span>
                    <span class="stat-label">de trayectoria</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">Formación</span>
                    <span class="stat-label">continua</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">Referencia</span>
                    <span class="stat-label">científica en Tucumán</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Tarjetas destacadas -->
    <section class="sogotuc-featured">
        <div class="container">
            <div class="featured-grid">
                <div class="card featured-event">
                    <div class="badge-destacado">DESTACADO</div>
                    <h3>28° Congreso Argentino de Medicina Fetal</h3>
                    <div class="event-details">
                        <p><i class="fas fa-map-marker-alt"></i> Tucumán, Argentina</p>
                        <p><i class="fas fa-calendar-alt"></i> 5, 6 y 7 de Agosto de 2026</p>
                    </div>
                    <a href="#" class="btn-outline">Ver congreso <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="card action-card">
                    <i class="fas fa-graduation-cap action-icon"></i>
                    <h3>Curso y campus</h3>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/imagen1.jpg" alt="Curso y Campus" class="action-image">
                    <p>Accede a nuestra plataforma de formación continua, módulos y certificaciones.</p>
                    <a href="#" class="btn-link">Explorar cursos →</a>
                </div>
                <div class="card action-card">
                    <i class="fas fa-user-plus action-icon"></i>
                    <h3>Hacete socio</h3>
                    <p>Beneficios exclusivos para socios, guía médica, redes y comisiones de trabajo.</p>
                    <a href="#" class="btn-link">Sumate ahora →</a>
                </div>
            </div>
        </div>

    </section>

    <!-- Nuestras Áreas -->
    <section class="sogotuc-areas">
        <div class="container">
            <h2 class="section-title">Nuestras áreas</h2>
            <div class="areas-grid">
                <div class="area-card">
                    <i class="fas fa-chalkboard-user area-icon"></i>
                    <h3>Formación Continua</h3>
                    <p>Cursos, módulos, webinars y certificaciones para tu desarrollo profesional.</p>
                    <a href="#" class="btn-link">→</a>
                </div>
                <div class="area-card">
                    <i class="fas fa-calendar-check area-icon"></i>
                    <h3>Eventos Científicos</h3>
                    <p>Congresos, jornadas, talleres y actividades presenciales y virtuales.</p>
                    <a href="#" class="btn-link">→</a>
                </div>
                <div class="area-card">
                    <i class="fas fa-hand-holding-heart area-icon"></i>
                    <h3>Comunidad Médica</h3>
                    <p>Beneficios exclusivos para socios, guía médica, redes y comisiones de trabajo.</p>
                    <a href="#" class="btn-link">→</a>
                </div>
                <div class="area-card">
                    <i class="fas fa-book-open area-icon"></i>
                    <h3>Biblioteca / Recursos</h3>
                    <p>Acceso a material científico, videos, webinars y documentos de interés.</p>
                    <a href="#" class="btn-link">→</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Actividades -->
    <section id="actividades" class="activities">
        <div class="activities__content">
            <h2 class="primary-text text-center">Actividades</h2>
            <div class="activities__list">
                <?php
                $now = current_time('Y-m-d H:i:s');
                $args = [
                    'cat' => 182,
                    'posts_per_page' => 1,
                    'orderby' => 'meta_value',
                    'meta_key' => 'start_datetime',
                    'order' => 'ASC',
                    'meta_query' => [
                        'relation' => 'OR',
                        [
                            'key' => 'start_datetime',
                            'value' => $now,
                            'compare' => '>=',
                            'type' => 'DATETIME',
                        ],
                        [
                            'relation' => 'AND',
                            [
                                'key' => 'start_datetime',
                                'value' => $now,
                                'compare' => '<=',
                                'type' => 'DATETIME'
                            ],
                            [
                                'key' => 'end_datetime',
                                'value' => $now,
                                'compare' => '>=',
                                'type' => 'DATETIME'
                            ]
                        ]
                    ]
                ];
                $activities_loop = new WP_Query($args);
                if($activities_loop->have_posts()){
                    while($activities_loop->have_posts()){
                        $activities_loop->the_post();
                        $start_datetime = get_field('start_datetime', false, false);
                        $end_datetime = get_field('end_datetime', false, false);
                        $sede = get_field('sede');
                        $post_url = get_permalink();

                        $start_date_formatted = '';
                        $end_date_formatted = '';
                        if($start_datetime){
                            $start_obj = DateTime::createFromFormat('Y-m-d H:i:s', $start_datetime);
                            if($start_obj) $start_date_formatted = $start_obj->format('d/m/Y - H:i') . 'hs';
                        }
                        if($end_datetime){
                            $end_obj = DateTime::createFromFormat('Y-m-d H:i:s', $end_datetime);
                            if($end_obj) $end_date_formatted = $end_obj->format('d/m/Y - H:i') . 'hs';
                        }
                        ?>
                        <article class="activity-item">
                            <div class="activity-item__image">
                                <?php if(has_post_thumbnail()){ ?>
                                    <img src="<?php echo get_the_post_thumbnail_url(null, 'large'); ?>" alt="<?php the_title_attribute(); ?>">
                                <?php } else { ?>
                                    <div class="activity-item__no-image">
                                        <i class="fa-solid fa-calendar-check"></i>
                                    </div>
                                <?php } ?>
                                <div class="activity-item__badge">
                                    <i class="fa-solid fa-bolt"></i> Próxima actividad
                                </div>
                            </div>
                            <div class="activity-item__info">
                                <a class="text-decoration-none" href="<?php the_permalink(); ?>">
                                    <h3 class="activity-item__title"><?php the_title(); ?></h3>
                                </a>
                                <div class="activity-item__dates">
                                    <p class="activity-item__date">
                                        <i class="fa-regular fa-calendar me-2"></i>
                                        <?php
                                            if($start_date_formatted){
                                                echo $start_date_formatted;
                                                if($end_date_formatted) echo ' — ' . $end_date_formatted;
                                            } else {
                                                echo get_the_date('d/m/Y');
                                            }
                                        ?>
                                    </p>
                                </div>
                                <?php if($sede){ ?>
                                <div class="activity-item__sede">
                                    <p class="activity-item__date">
                                        <i class="fa-solid fa-location-dot me-2"></i><?php echo esc_html($sede); ?>
                                    </p>
                                </div>
                                <?php } ?>
                                <div class="activity-item__excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                                <div class="activity-item__actions">
                                    <a class="buttons-primary" href="<?php the_permalink(); ?>">
                                        <i class="fa-solid fa-circle-info me-1"></i> Ver actividad
                                    </a>
                                    <div class="activity-item__share">
                                        <a href="https://facebook.com/sharer/sharer.php?u=<?php echo urlencode($post_url); ?>" target="_blank" data-bs-toggle="tooltip" data-bs-title="Compartir en Facebook">
                                            <div class="share-icon facebook">
                                                <i class="fa-brands fa-facebook"></i>
                                            </div>
                                        </a>
                                        <a href="https://api.whatsapp.com/send?text=<?php echo urlencode($post_url); ?>" target="_blank" data-bs-toggle="tooltip" data-bs-title="Compartir por WhatsApp">
                                            <div class="share-icon whatsapp">
                                                <i class="fa-brands fa-whatsapp"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <?php
                    }
                    wp_reset_postdata();
                } else { ?>
                    <div class="activity-item__empty">
                        <i class="fa-regular fa-calendar-xmark"></i>
                        <p>No hay actividades próximas programadas.</p>
                    </div>
                <?php } ?>
            </div>
            <div class="buttons-center mt-4">
                <a class="buttons-light" href="<?php echo get_category_link(182); ?>">Ver todas las actividades</a>
            </div>
        </div>
    </section>

    <!-- Novedades / Prensa y Difusión -->
    <section id="novedades" class="news">
        <div class="news__content">
            <a class="text-decoration-none" href="<?php echo get_home_url(); ?>/prensa-difusion/">
                <h2 class="text-center home-title mb-4">Prensa y Difusión</h2>
            </a>
            <div class="news__loop">
                <?php
                $news_loop = new WP_Query(array(
                    'cat' => 1,
                    'order' => 'DESC',
                    'posts_per_page' => 6
                ));
                if($news_loop->have_posts()){
                    while($news_loop->have_posts()){
                        $news_loop->the_post();
                        $post_url = get_permalink();
                        ?>
                        <div class="news-item card3d">
                            <div class="news-item__content card3d__content">
                                <div class="news-item__image">
                                    <?php if(has_post_thumbnail()){ ?>
                                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute(); ?>">
                                    <?php } else { ?>
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/default-news.jpg" alt="Noticia">
                                    <?php } ?>
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
                                            <a href="https://facebook.com/sharer/sharer.php?u=<?php echo urlencode($post_url); ?>" target="_blank" data-bs-toggle="tooltip" data-bs-title="Compartir en Facebook">
                                                <div class="share-icon facebook">
                                                    <i class="fa-brands fa-facebook"></i>
                                                </div>
                                            </a>
                                            <a href="https://api.whatsapp.com/send?text=<?php echo urlencode($post_url); ?>" target="_blank" data-bs-toggle="tooltip" data-bs-title="Compartir por WhatsApp">
                                                <div class="share-icon whatsapp">
                                                    <i class="fa-brands fa-whatsapp"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } 
                } else {
                    echo "<h4 class='text-center primary-text'>No hay contenido disponible</h4>";
                }
                wp_reset_postdata();
                ?>
            </div>
            <div class="buttons-center mt-5">
                <a class="buttons-primary" href="<?php echo get_category_link(1); ?>">Ver más contenidos</a>
            </div>
        </div>
    </section>

    <!-- Banner 70 aniversario -->
    <section class="banner-evento-70-aniversario container">
        <div class="banner-evento-70-aniversario__fondo">
            <img class="banner-evento-70-aniversario__img" src="banner-70-aniversario.png" alt="70 Aniversario SOGOTUC">
        </div>
        <div class="banner-evento-70-aniversario__button">
            <a class="banner-evento-70-aniversario__a" href="/jornada-de-promocion-de-miembros-adherentes-a-miembros-titulares/">Conocer más</a>
        </div>
    </section>

    <!-- Sección Instagram -->
    <section class="sogotuc-instagram">
        <div class="container">
            <div class="insta-header">
                <h2 class="section-title">Seguinos en Instagram</h2>
                <a href="https://www.instagram.com/sogotuc/" target="_blank" class="btn-link">Ver todas <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="insta-grid">
                <a href="https://www.instagram.com/sogotuc/" target="_blank" class="insta-item">
                    <i class="fab fa-instagram"></i>
                    <span>@sogotuc</span>
                </a>
                <a href="https://www.instagram.com/sogotuc/" target="_blank" class="insta-item">
                    <i class="fab fa-instagram"></i>
                    <span>Congreso 2026</span>
                </a>
                <a href="https://www.instagram.com/sogotuc/" target="_blank" class="insta-item">
                    <i class="fab fa-instagram"></i>
                    <span>Formación</span>
                </a>
                <a href="https://www.instagram.com/sogotuc/" target="_blank" class="insta-item">
                    <i class="fab fa-instagram"></i>
                    <span>Comunidad</span>
                </a>
            </div>
        </div>
    </section>

    <!-- CTA Final -->
    <section class="sogotuc-final-cta">
        <div class="container">
            <div class="cta-box">
                <div class="cta-content">
                    <h2>Hacete socio</h2>
                    <p>Conocé los beneficios exclusivos para miembros de nuestra sociedad científica.</p>
                    <a href="#" class="btn-cta-primary">Sumate ahora <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="cta-quote">
                    <p>Sumate a la comunidad científica que impulsa el crecimiento profesional.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Donde encontrarnos -->
    <section id="donde-estamos" class="where">
        <div class="where__content">
            <h2 class="text-center home-title mb-4">¿Donde Estamos?</h2>
            <h5 class="text-center primary-text"><b>F. Ameghino 77 - San Miguel de Tucumán, Tucumán, Argentina.</b></h5>
            <div class="where__map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9339.344202673969!2d-65.20101093695135!3d-26.840192409551076!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94225d4112f6b371%3A0x8ffd150d7b74f590!2sAsociacion%20de%20protesistas%20de%20tucuman!5e0!3m2!1ses!2sar!4v1764086327511!5m2!1ses!2sar" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="ornament__location-pin">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/ui/logo.png" alt="SOGOTUC">
                </div>
            </div>
            <a class="primary-text" href="https://maps.app.goo.gl/vJtCqoWesV2DPC7M6" target="_blank">
                <h5 class="text-center">Ver ubicación en Google Maps <i class="fa-solid fa-up-right-from-square"></i></h5>
            </a>
        </div>
    </section>

</main>

<?php get_footer(); ?>