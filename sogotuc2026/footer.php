<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */
?>

<footer id="footer">
    <section class="footer__content">
        <div class="footer__inner">
            <div class="footer__brand">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/ui/brand-color.png" alt="">
            </div>
            <div class="light-separator"></div>
            <ul class="footer__info">
                <li><i class="fa-solid fa-location-dot"></i> <b>F. Ameghino 77 - San Miguel de Tucumán, Tucumán, Argentina</b></li>
                <li><i class="fa-solid fa-phone"></i> <b>3815390846</b></li>
                <li><i class="fa-solid fa-envelope"></i> <b><a class="text-light" href="mailto:apdt.tucuman@gmail.com">apdt.tucuman@gmail.com</a></b></li>
            </ul>
        </div>
        <div class="footer__inner">
            <div id="contacto" class="contact">
                <h3 class="primary-text mt-0">¡Contactanos!</h3>
                <?php echo do_shortcode('[contact-form-7 id="3381f4c" title="Contacto (Home)"]'); ?>
            </div>
        </div>
    </section>
</footer>
<div class="footer__ide">
    <a href="https://ideconsultora.com.ar" target="_blank">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/ui/ide-imagotipo.svg" alt="">
        <small>IDE Comunicación Digital<br>Profesionales de la Comunicación</small>
    </a>
</div>

<?php wp_footer(); ?>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/utils.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/animations.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
