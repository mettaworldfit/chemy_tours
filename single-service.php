<?php

get_header(); ?>


<br><br><br><br>


<section class="cpt-container">
    <div class="container">

        <div class="bar-cpt">
            <ul>
                <a href="javascript:void(0)" onclick="ver_informacion();">
                    <li>Información </li>
                </a>
                <a href="javascript:void(0)" onclick="ver_preguntas();">
                    <li>Pregúntas</li>
                </a>
                <a href="javascript:void(0)" onclick="ver_comentarios();">
                    <li>Comentarios</li>
                </a>
            </ul>
        </div>

        <!-- Titúlo -->
        <div class="title-cpt">
            <h2 data-aos="fade-up" data-aos-duration="1000"><?php the_title(); ?></h2>

            <?php if (get_field('ubicacion') != "") : ?>
                <p data-aos="fade-up" data-aos-duration="1000">
                    <i class="fa-solid fa-location-dot"></i> <?php echo get_field('ubicacion'); ?>
                    <a href="<?= get_field('link_de_la_ubicacion') ?>" data-aos="fade-up" data-aos-duration="1000">Ver mapa</a>
                </p>
            <?php endif; ?>
        </div>
        <!-- Titúlo -->


        <div class="cpt-info-container">

            <!-- Article -->

            <article class="cpt-info" id="post-<?php the_ID(); ?>" data-aos="fade-up" data-aos-duration="900">


                <!-- Galeria -->
                <div class="gallery-cpt-content">

                    <div class="img-cpt" data-aos="fade-left" data-aos-duration="1300">
                        <!-- post thumbnail -->
                        <?php if (has_post_thumbnail()) : // Check if Thumbnail exists. 
                        ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <?php the_post_thumbnail('blog'); ?>
                            </a>
                        <?php endif; ?>
                        <!-- /post thumbnail -->

                    </div>

                    <div class="gallery-grid" data-aos="fade-right" data-aos-duration="1300">
                        <?php echo get_field("galeria"); ?>
                    </div>
                </div>
                <!-- Galeria -->


                <!-- post content -->
                <div class="description-cpt-container">

                    <div class="description-cpt">

                        <div class="divider-info">
                            <h3 id="question" data-aos="fade-up" data-aos-duration="1000">Información</h3>
                        </div>
                        <p id="information" data-aos="fade-down" data-aos-duration="1100"> <?php the_content(); ?></p>


                        <!-- Comentarios -->
                        <?php get_template_part("template_part/comment") ?>
                        <!-- Comentarios -->


                        <!-- Políticas -->
                        <div class="divider-info">
                            <h3 id="question" data-aos="fade-up" data-aos-duration="1000">Pregúntas</h3>

                            <div class="readme" data-aos="fade-up" data-aos-duration="1000">
                                <?php echo get_field("politicas") ?>
                            </div>
                        </div>
                        <!-- Políticas -->




                        <!-- Form comentarios -->
                        <?php get_template_part("template_part/comment_form") ?>

                    </div>






                    <!-- Precio -->
                    <div class="cpt-price">
                        <div class="row">

                            <div class="col-sm-12">
                                <b>$<?php echo get_field('precio'); ?></b>
                                <span> <?= get_field('cantidad'); ?> <?= get_field('etiqueta_de_precio'); ?> </span>
                            </div>
                        </div>

                        <a href="" class="btn-price">Solicitar reserva</a>
                        <p>Sin compromiso</p>
                        <a class="term" href="javascript:void(0)" onclick="ver_preguntas();">Pregúntas sobre el servicio</a>

                        <div class="total-price">
                            <span>Total (USD)</span>
                            <input class="total" type="text" name="" value="<?= get_field('precio'); ?>" disabled>
                        </div>
                    </div>
                    <!-- Precio -->

                </div>
                <!-- post content -->

            </article>
            <!-- Article -->




        </div>
    </div>
    <section>

        <br>


        <?php get_footer(); ?>