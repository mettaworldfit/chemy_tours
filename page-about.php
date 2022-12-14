<?php

/*
* Template Name: About us
*/

get_header(); ?>

<div class="parallax-about-page">
    <div class="parallax-about-opacity">
        <div class="hero">
            <h1><?php the_title(); ?></h1>
        </div>
    </div>
</div>

<div class="contact-title">
    <div class="container">
        <div class="row text-center">
        <span data-aos="fade-up" data-aos-offset="300">¿Qué hacemos?</span>
            <h1 data-aos="fade-up" data-aos-offset="300">Servicios</h1>
            <p data-aos="fade-up" data-aos-offset="300">Somos una empresa dedicada a brindar servicios turísticos de aventura, ecológico, alojamiento, entre otros. Con nosotros puedes descubrir la amplia variedad de servicios que existen en la provincia de Puerto Plata y el país.</p>
        </div>
    </div>
</div>

<div class="about-wrap">
    <div class="container">
        <div class="col-content-about">

            <div class="col-about">
                <h3><?php echo esc_html(get_bloginfo('name')) ?></h3>
               <?php the_content(); ?>
            </div>

            <div class="col-about">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/logo-full.png" alt="Logo" class="logo-img-about">
            </div>

        </div>
    </div>
</div>



<?php get_footer(); ?>