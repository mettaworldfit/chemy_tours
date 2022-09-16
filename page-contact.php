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
                <p>C/ Duarte #41, próximo a la playa la ensenada.</p>
            </div>

            <div class="col-info">
                <span> <i class="fa-solid fa-phone"></i></span>
                <h6>télefono</h6>
                <p>+1 829-963-5529</p>
                <p>+1 809-000-0000</p>
            </div>

            <div class="col-info">
                <span><i class="fa-solid fa-paper-plane"></i></span>
                <h6>Correo</h6>
                <p>info@sitename.com</p>
                <p>info@sitename.com</p>
            </div>

            <div class="col-info">
                <span><i class="fa-solid fa-clock-rotate-left"></i></span>
                <h6>Horarío</h6>
                <p>Lun-vie: 8 am - 6 pm</p>
                <p>Sab-dom: 8 am - 5 pm</p>
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
                <?php echo get_field("mapa"); ?>
                </div>

            </div>

        </div>
    </div>
</div>

<?php get_footer(); ?>