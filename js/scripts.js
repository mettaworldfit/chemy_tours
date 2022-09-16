// Mandar a la direccion del id

function reserva_ahora() {
  const element = document.getElementById("reservation");
  element.scrollIntoView();
}

function servicios() {
  const element = document.getElementById("service");
  element.scrollIntoView();
}


function ver_preguntas() {
  const element = document.getElementById("question");
  element.scrollIntoView();
}

function ver_informacion() {
const element = document.getElementById("information");
element.scrollIntoView();
}

function ver_comentarios() {
  const element = document.getElementById("comment");
  element.scrollIntoView();
  }

(function (root, $, undefined) {
  "use strict";
  $(function () {
    console.log("DOM ready");

    AOS.init(); // Inicializar animate on scroll

    $(".owl-carousel").owlCarousel({
      loop: true,
      margin: 0,
      nav: false,
      autoplay: true,
      autoplayTimeout: 10000,
      autoplayHoverPause: true,
      animateOut: "fadeOut",
      responsive: {
        0: {
          items: 1,
        },
        200: {
          items: 1,
        },
        100: {
          items: 1,
        },
      },
    });

    $(".gallery-icon a").removeAttr("href");

    // Cambiar aspecto del menu al hacer scroll
    $(window).scroll(function () {
      var header = $(".container-header");
      header.toggleClass("header-down", window.scrollY > 0);
    });




    // Calcular precio
    var price = $('#price').val()
    const format = new Intl.NumberFormat('en-US');
    $('#total').val(format.format(price))


    $("#cant").keyup(function() {

     
      var price = $('#price').val()
      var quantity = $(this).val()

      var total = quantity * price;

      $('#total').val(format.format(total))
    });


    //  Menu móvil 


    $('.menu-btn').on('click', (e) => {
      e.preventDefault(e);

      $('.nav').toggleClass('active');
      

    })

    $('li.menu-item-has-children').on('click', (e) => {
      e.preventDefault(e);

      $('ul.sub-menu').toggleClass('active-child');
      

    })



  });
})(this, jQuery);



