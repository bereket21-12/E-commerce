(function ($) {
    "use strict";
    
    // Dropdown on mouse hover
    $(document).ready(function () {
        function toggleNavbarMethod() {
            if ($(window).width() > 992) {
                $('.navbar .dropdown').on('mouseover', function () {
                    $('.dropdown-toggle', this).trigger('click');
                }).on('mouseout', function () {
                    $('.dropdown-toggle', this).trigger('click').blur();
                });
            } else {
                $('.navbar .dropdown').off('mouseover').off('mouseout');
            }
        }
        toggleNavbarMethod();
        $(window).resize(toggleNavbarMethod);
    });
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Vendor carousel
    $('.vendor-carousel').owlCarousel({
        loop: true,
        margin: 29,
        nav: false,
        autoplay: true,
        smartSpeed: 1000,
        responsive: {
            0:{
                items:2
            },
            576:{
                items:3
            },
            768:{
                items:4
            },
            992:{
                items:5
            },
            1200:{
                items:6
            }
        }
    });


    // Related carousel
    $('.related-carousel').owlCarousel({
        loop: true,
        margin: 29,
        nav: false,
        autoplay: true,
        smartSpeed: 1000,
        responsive: {
            0:{
                items:1
            },
            576:{
                items:2
            },
            768:{
                items:3
            },
            992:{
                items:4
            }
        }
    });


    // Product Quantity
    $('.quantity button').on('click', function () {
        var button = $(this);
        var oldValue = button.parent().parent().find('input').val();
        if (button.hasClass('btn-plus')) {
            var newVal = parseFloat(oldValue) + 1;
            console.log("the value is" +newVal);
        } else {
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        button.parent().parent().find('input').val(newVal);
        var formData  = FormData(this);
        formData.append("quantity");
        $.ajax({
            url: "quantity.php",
            type: "POST",
            processData: false,
            contentType: false,
            Data:formData,
            success: function(data) {
                console.log("Quantity updated successfully");
            },
            error: function() {
                console.log("Error updating quantity");
            }
        });
        
    });

    $('#quantity button').on('click', function() {
  var button = $(this);
  var oldValue = button.parent().find('input').val();
  if (button.hasClass('btn-plus')) {
    var newVal = parseFloat(oldValue) + 1;
    sendQuantity(quantity);
    console.log("the value is " + newVal);
  } else {
    if (oldValue > 1) {
      var newVal = parseFloat(oldValue) - 1;
      sendQuantity(quantity);
    } else {
      newVal = 1;
    }
  }
  button.parent().find('input').val(newVal);
  var formData = new FormData(button.parent()[0]);

  function sendQuantity(quantity) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'quantity.php');
    // const formData = new FormData();
    formData.append('quantity', quantity);
    xhr.send(formData);
  }
});





      
    
})(jQuery);

