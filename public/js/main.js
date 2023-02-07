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


    // Date and time picker
    $('.date').datetimepicker({
        format: 'L'
    });
    $('.time').datetimepicker({
        format: 'LT'
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        margin: 30,
        dots: true,
        loop: true,
        center: true,
        responsive: {
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:3
            }
        }
    });
    
})(jQuery);

document.querySelector('#aboutic').addEventListener('click', function(event) {
    event.preventDefault();
    document.querySelector('#about_us').scrollIntoView({
        behavior: 'smooth'
    });
    });

document.addEventListener('DOMContentLoaded', function() {
    
    const startDate = document.querySelector('.start_date');
    const endDate = document.querySelector('.end_date');

    startDate.addEventListener('change', function() {
        if (new Date(startDate.value) >= new Date(endDate.value)) {
            endDate.value = '';
        }
        endDate.min = startDate.value;
    });
});

document.addEventListener("DOMContentLoaded", function() {
    var select = document.getElementById("accommodation-selector");
    var firstAccommodation = select.options[select.selectedIndex].value;
    document.getElementById("accommodation-" + firstAccommodation).style.display = "block";
    document.getElementById("accommodation-selector").addEventListener("change", function() {
        var selectedId = this.value;
        var detailsContainer = document.getElementById("accommodation-details");
        var allItems = detailsContainer.getElementsByClassName("accommodation-item");
        for (var i = 0; i < allItems.length; i++) {
            allItems[i].style.display = "none";
        }
        document.getElementById("accommodation-" + selectedId).style.display = "block";
    });
 });

 const text = document.getElementById("text");
 const toggleButton = document.getElementById("toggleButton");
 var full_text = text.innerHTML;
 var sliced_text = text.innerHTML.slice(0,420);
 text.innerHTML = sliced_text;
 toggleButton.addEventListener("click", function() {
   if (toggleButton.innerHTML == "Expand") {
     text.innerHTML = full_text;
     toggleButton.innerHTML = "Collapse";
   } else {
     text.innerHTML = sliced_text;
     toggleButton.innerHTML = "Expand";
   }
 });

  

                        


  // Get the input element
  const input = document.getElementById("image");
  const add_pic_but = document.getElementById("pic_submit");

  // Listen for a change event on the input element
  input.addEventListener("change", function() {


    // Get the file
    const file = input.files[0];

    // Create a new FileReader
    const reader = new FileReader();

    // Listen for the load event on the FileReader
    reader.addEventListener("load", function() {
      // Get the preview element
      
      const preview = document.getElementById("preview");
      add_pic_but.disabled = false;
      // Set the src of the preview element to the result of the FileReader
      preview.src = reader.result;

      // Show the preview element
      preview.style.display = "block";
    });

    // Read the file as a data URL
    reader.readAsDataURL(file);
  });

  


