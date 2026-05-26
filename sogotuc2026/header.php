<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Google Fonts: Montserrat -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

  <!-- Font Awesome 6 -->
  <script src="https://kit.fontawesome.com/f31e376348.js" crossorigin="anonymous"></script>

  <!-- Bootstrap 5.3.3 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- Header -->
<header id="header" <?php echo is_home() ? 'class="header-home"' : 'class="position-sticky top-0 header--scroll"' ?>>
  <div class="header__content">
    <!-- Identidad -->
    <div class="header__brand">
      <a href="<?php echo home_url(); ?>">
        <img id="brand-light" class="header__logo<?php echo is_home() ? ' header__logoLight--home' : ' d-none' ?>" src="<?php echo get_stylesheet_directory_uri(); ?>/img/ui/logo.svg" alt="">
        <img id="brand-color" class="header__logo<?php echo is_home() ? ' header__logoColor--home d-none' : null ?>" src="<?php echo get_stylesheet_directory_uri(); ?>/img/ui/logo.svg" alt="">
      </a>
    </div>
    <!-- Menú principal -->
    <div class="header__menu">
      <?php gen_main_menu(); ?>
    </div>
    <div class="header__highlight-button desk">
      <a href="<?php echo get_home_url(); ?>/certificados/">Certificados</a>
    </div>
    <div class="header__mobile-button">
      <button type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-controls="offcanvasExample">
        <i class="fa-solid fa-bars"></i>
      </button>
    </div>
  </div>
  <!-- Menu móvil -->
  <div class="mobile-menu offcanvas offcanvas-start" tabindex="-1" id="mobileMenu" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
      <div class="mobile-menu__brand">
        <a class="mobile-menu-link" href="<?php echo home_url(); ?>">
          <img class="mobile-menu__logo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/ui/logo.png" alt="SOGOTUC">
        </a>
      </div>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div class="header__highlight-button">
        <a class="text-center" href="<?php echo get_home_url(); ?>/certificados/">Certificados</a>
      </div>
      <?php gen_mobile_menu(); ?>
    </div>
  </div>
</header>


<!-- Redes sociales -->
<section class="c-social-media">
  <div class="c-social-media__content">
    <span>Seguinos en</span>
    <?php /* <a class="c-social-media__item" href="#" target="_blank"><i class="fa-brands fa-youtube"></i></a> */ ?>
    <a class="c-social-media__item" href="https://wa.me/5493815390846/?text=<?php echo urlencode('Hola, cómo estás? Vengo desde la web apdt.com.ar y tengo interés por el evento VII Congreso de Técnicos Protesistas Dentales de Tucumán'); ?>" target="_blank"><<i class="fa-brands fa-whatsapp"></i><i class="fa-brands fa-whatsapp"></i>i class="fa-brands fa-whatsapp"></i></a>
    <a class="c-social-media__item" href="https://www.instagram.com/apdtucuman/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
    <a class="c-social-media__item" href="https://www.facebook.com/share/1ZbXjqAbMr/" target="_blank"><i class="fa-brands fa-facebook"></i></a>
    <?php /* <a class="c-social-media__item" href="#" target="_blank"><i class="fa-brands fa-facebook"></i></a> */ ?>
  </div>
</section>
