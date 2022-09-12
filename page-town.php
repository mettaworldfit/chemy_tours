<?php
/*
* Template Name: Town
*/

get_header(); ?>

<div class="parallax-about">
    <div class="parallax-about-opacity">
        <div class="content-hero">
            <h1><?php the_title(); ?></h1>
        </div>
    </div>
</div>


<div class="section-title">
    <h3 class="text-center primary" data-aos="fade-down" data-aos-duration="1000">Villas</h3>
</div>
<br>

<?php get_template_part('template_part/searchform'); ?>


<section class="town-container">
    <div class="container">

        <div class="post-town-container">
            <?php

            $query = new WP_Query(array(
                'post_type' => 'villas',
                'posts_per_page' => 6,
                'orderby' => 'rand',
                'paged' => $paged
            ));

            if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>

                    <!-- Article -->

                    <article class="post-town" id="post-<?php the_ID(); ?>" data-aos="fade-up" data-aos-duration="900">


                        <!-- post thumbnail -->
                        <?php if (has_post_thumbnail()) : // Check if Thumbnail exists. 
                        ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" data-aos="fade-down" data-aos-duration="800">
                                <?php the_post_thumbnail('square'); ?>
                            </a>
                        <?php endif; ?>
                        <!-- /post thumbnail -->

                        <!-- post title -->
                        <h6>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" data-aos="fade-right" data-aos-duration="1600"><?php the_title(); ?></a>
                        </h6>
                        <!-- /post title -->



                        <!-- post content -->
                        <?php the_category(); ?>

                        <p data-aos="fade-down" data-aos-duration="1400"> <?php the_excerpt(); ?></p>
                        <!-- /post content -->

                        <a href="" class="btn-town" data-aos="fade-up" data-aos-duration="1500">Reservar ahora</a>

                    </article>

                    <!-- Article -->


                <?php endwhile; ?>


                <!-- Páginación -->

                <div class="container">
                    <div class="pagination">
                        <?php $big = 999999999; // need an unlikely integer
                        echo paginate_links(array(
                            'base' => str_replace($big, '%#%', get_pagenum_link($big)),
                            'format' => '?paged=%#%',
                            'current' => max(1, get_query_var('paged')),
                            'total' => $query->max_num_pages,
                            'prev_text'    => __('<i class="fa-solid fa-angle-left"></i> prev'),
                            'next_text'    => __('next <i class="fa-solid fa-angle-right"></i>'),
                        )); ?>
                    </div>
                </div>


                <?php wp_reset_postdata(); ?>



            <?php else : ?>

                <!-- article -->
                <article>

                    <h1><?php esc_html_e('Sorry, nothing to display.', 'html5blank'); ?></h1>

                </article>
                <!-- /article -->

            <?php endif; ?>


        </div>
</section>


<br><br><br><br>


<?php get_footer(); ?>