<?php
/*
* Template Name: Home
*/

get_header(); ?>


<div id="wrapper">
    <div class="owl-carousel owl-theme" id="slider-area">

        <!-- ACF Imagenes -->
        <?php

        $imagen1 = get_field('imagen_1');
        $imagen2 = get_field('imagen_2');
        $imagen3 = get_field('imagen_3');

        ?>

        <div class="item">
            <img src="<?php echo esc_url($imagen1['url']); ?>">
            <div class="slider-text">

                <h2>chemy <span>tours</span></h2>
                <p></p>
                <a class="button" href="https://goo.gl/maps/ngsEVqhne6wSFexG6">Cómo llegar ?</a>
            </div>
        </div>
        <div class="item">
            <img src="<?php echo esc_url($imagen2['url']); ?>">
            <div class="slider-text">

                <h2>excursiones <span></span></h2>
                <p>Viajes a cayo arena, viajes en catamaran, alquiler de four wheels y más.</p>
                <a class="button" href="javascript:void(0)" onclick="servicios();">Servicios</a>
            </div>
        </div>
        <div class="item">
            <img src="<?php echo esc_url($imagen3['url']); ?>">
            <div class="slider-text">

                <h2>Creative <span>Agency</span></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, beatae.</p>
                <a class="button" href="javascript:void(0)" >Contactanos</a>
            </div>
        </div>
    </div>
</div>

<!-- Sobre nosotros -->

<section class="about-container">
    <div class="container">

        <div class="about" data-aos="zoom-in" data-aos-duration="1000">
            <div class="row">
                <div class="col-sm-4 about-one">
                    <span data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">Sobre nosotros</span>
                </div>
                <div class="col-sm-4 about-two">
                    <p data-aos="fade-left" data-aos-offset="300" data-aos-easing="ease-in-sine"><?= bloginfo('description')?></p>
                    <br>
                    <a href="javascript:void(0)" class="btn-about" data-aos="fade-left" data-aos-offset="300" data-aos-easing="ease-in-sine" onclick="reserva_ahora()">Contactanos</a>
                </div>
                <div class="col-sm-4 about-three">

                    <img style="width: 100%" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/about.gif" alt="">
                </div>
            </div>
        </div>

    </div>
</section>



<!-- Servicios -->

<div class="section-title" id="service">
    <h3 class="text-center primary" data-aos="fade-down" data-aos-duration="1000"><span>nuestros</span> Servicios</h3>
    <p class="text-center" data-aos="fade-down" data-aos-duration="1100">Adquiere los mejores servicios de alquiler para disfrutar de un día en familia o con tus amigos.</p>
</div>
<br>

<div class="parallax">
    <div class="parallax-opacity">
        <div class="content-hero" id="service">



            <!-- Loop -->

            <?php

            $query = new WP_Query(array(
                'post_type' => 'servicios',
                'posts_per_page' => 5,
                'orderby' => 'DESC'
            ));

            if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>

                    <div class="service">

                        <div class="circle-service" data-aos="fade-up" data-aos-duration="2800">
                            <?php if (has_post_thumbnail()) : // Check if Thumbnail exists. 
                            ?>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" data-aos="fade-up" data-aos-duration="800">
                                    <?php the_post_thumbnail('full'); ?>
                                </a>
                            <?php endif; ?>
                        </div>

                        <div class="backg-service">

                            <h3 data-aos="fade-up" data-aos-duration="3200"><?php the_title(); ?></h3>
                            <p data-aos="fade-up" data-aos-duration="3300"><?php the_excerpt(); ?></p>
                            <a href="<?php the_permalink(); ?>" class="btn-service" data-aos="fade-up" data-aos-duration="3500">Reserva ahora</a>

                        </div>
                    </div>


                <?php endwhile;
                wp_reset_postdata(); ?>



            <?php else : ?>
                <h1><?php esc_html_e('Sorry, nothing to display.', 'html5blank'); ?></h1>

            <?php endif; ?>

            <!-- Loop -->




        </div>
    </div>
</div>




<!-- Galeria -->

<section class="gallery-container">
    <div class="container">
        <div class="row section-title">
            <h3 class="text-center" data-aos="fade-up" data-aos-duration="1000">Galería</h3>
        </div>
        <br>

        <div class="row">
            <div class="gallery-content">
                <?php while (have_posts()) : the_post(); ?>

                    <?php
                    // Obtener las galerias de la página actual
                    $galeria = get_post_gallery(get_the_ID(), false);
                    $imagenID = explode(',', $galeria['ids']);
                    ?>

                    <ul class="gallery-img">
                        <?php
                        $i = 1;
                        foreach ($imagenID as $id) :

                            $imagenAnimate = ($i == 3 || $i == 4 || $i == 6) ? 'fade-up' : 'fade-left';

                            $imagenThumb = wp_get_attachment_image_src($id, 'square')[0];
                            $imagen = wp_get_attachment_image_src($id, 'blog')[0];
                        ?>

                            <li data-aos="<?= $imagenAnimate ?>">
                                <a href="<?php echo $imagen; ?>" data-lightbox="galeria-1">
                                    <img src="<?php echo $imagenThumb; ?>" alt="imagen">
                                </a>

                            </li>


                        <?php $i++;
                        endforeach; ?>
                    </ul>

                <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>



<div class="divider">
    <div class="parallax-divider-opacity">
        <div class="content-hero">

        </div>
    </div>
</div>



<section class="reserv-container">
    <div class="container">
        <div class="row section-title" id="reserv">
            <h3 class="text-center primary" data-aos="fade-down" data-aos-duration="1000"><span>Envíanos un</span> mensaje</h3>
        </div>

        <br>

        <div class="row">
            <div class="col-md-6 gif-center">
                <img style="width: 70%" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/contact-center.gif" alt="">
            </div>

            <div class="col-md-6">

                <!-- Formulario de reservación de Forminator -->
                <?php echo get_field('reservacion'); ?>
            </div>
        </div>
    </div>
</section>





<?php get_footer(); ?>