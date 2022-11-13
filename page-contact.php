<?php

/*
* Template Name: Contact
*/

get_header(); ?>

<br><br><br>


<div class="contact-title">
    <div class="container">
        <div class="row text-center">
            <h1 data-aos="fade-up" data-aos-offset="300"><?php the_title(); ?></h1>
            <p data-aos="fade-up" data-aos-offset="300"><?php the_content(); ?></p>
        </div>
    </div>
</div>


<div class="contact-container">
    <div class="container">
        <div class="col-content">

            <div class="col-info">
                <span><i class="fa-solid fa-location-dot"></i></span>
                <h6>dirección</h6>
                <p>Carretera, Punta Rucia 57000 ,al lado de Red House On The Beach </p>
            </div>

            <div class="col-info">
                <span> <i class="fa-solid fa-phone"></i></span>
                <h6>télefono</h6>
                <p>+1 829-963-5529</p>
                <p>+1 849-394-1516</p>
            </div>

            <div class="col-info">
                <span><i class="fa-solid fa-paper-plane"></i></span>
                <h6>Correo</h6>
                <p>-</p>
                <p>-</p>
            </div>

            <div class="col-info">
                <span><i class="fa-solid fa-clock-rotate-left"></i></span>
                <h6>Horarío</h6>
                <p>Lun-vie: 8 am - 6 pm</p>
                <p>Sab-dom: 8 am - 6 pm</p>
            </div>

        </div>
    </div>
</div>



<div class="contact-form">
    <div class="container">
        <div class="row">

            <div class="col-sm-6">
                <span>Contactanos</span>
                <h2>Envíanos un mensaje</h2>
                <!-- Formularío de forminator -->
                <?php echo get_field("contacto"); ?>
            </div>

            <div class="col-sm-6">
                <div class="small-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15010.34034408213!2d-71.207891!3d19.8575014!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8c55406d03d5fa17!2sChemytours!5e0!3m2!1ses-419!2sdo!4v1663341849873!5m2!1ses-419!2sdo" width="600" height="550" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

            </div>

        </div>
    </div>
</div>

<?php get_footer(); ?>