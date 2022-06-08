// Wow Animation JS Start
new WOW().init();
// Wow Animation JS Start
// Testimonial Slider JS Start

var slideIndex1 = 0;
showSlides1();

function showSlides1() {
  var j;
  var slides1 = document.getElementsByClassName("mySlides1");
  for (j = 0; j < slides1.length; j++) {
    slides1[j].style.display = "none";
  }
  slideIndex1++;
  if (slideIndex1 > slides1.length) {slideIndex1 = 1}
  slides1[slideIndex1-1].style.display = "block";
  setTimeout(showSlides1, 5000); // Change image every 2 seconds
}

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
      e.preventDefault();

      document.querySelector(this.getAttribute('href')).scrollIntoView({
          behavior: 'smooth'
      });
  });
})

$(document).ready(function(){
    $('.carousel2').carousel2({
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
              breakpoint: 426,
              settings: {
                  slidesToShow: 1,
              }
          }
        ]
        });
  });

  $(document).ready(function(){
    $('.carousel1').carousel2({

        slidesToShow: 3,
        slidesToScroll: 1,
        indicators:true,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
              breakpoint: 426,
              settings: {
                  slidesToShow: 1,
              }
          }
        ]
        });
  });
  // Testimonial Slider JS End
//carousel start

$('.servece-slider').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    prevArrow: '<button class="slick-arrow prev-arrow"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
    nextArrow: '<button class="slick-arrow next-arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',
    dots: true,
    arrows: false,
    autoplay: false,
    autoplaySpeed: 2000,

    responsive: [
      {
          breakpoint: 992,
          settings: {
              slidesToShow: 2,
          }
      },
      {
          breakpoint: 768,
          settings: {
              slidesToShow: 2,
          }
      },
      {
        breakpoint: 426,
        settings: {
            slidesToShow: 1,
        }
    }
  ]
  });

  $('.servece-slider1').slick({
    infinite: true,
    slidesToShow: 7,
    slidesToScroll: 1,
    dots: false,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 2000,

    responsive: [
      {
          breakpoint: 992,
          settings: {
              slidesToShow: 5,
          }
      },
      {
          breakpoint: 768,
          settings: {
              slidesToShow: 3,
          }
      },
      {
        breakpoint: 552,
        settings: {
            slidesToShow: 1,
        }
    }
  ]
  });


//carousel end
  //scroll js start
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
  });
    //scroll js end

    //pup_up scroll js start
let span = document.querySelector(".up");

window.onscroll = function () {
  // console.log(this.scrollY);
  // if (this.scrollY >= 1000) {
  //   span.classList.add("show");
  // } else {
  //   span.classList.remove("show");
  // }
  this.scrollY >= 500 ? span.classList.add("show") : span.classList.remove("show");
};

span.onclick = function () {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
};




//pagination start

var items = $(".list-wrapper .list-item");
    var numItems = items.length;
    var perPage = 9;

    items.slice(perPage).hide();

    $('#pagination-container').pagination({
        items: numItems,
        itemsOnPage: perPage,
        prevText: "&laquo;",
        nextText: "&raquo;",
        onPageClick: function (pageNumber) {
            var showFrom = perPage * (pageNumber - 1);
            var showTo = showFrom + perPage;
            items.hide().slice(showFrom, showTo).show();
        }
    });

//pagination end


//navbar start

const targetDiv = document.getElementById("nav_mob");
const btn = document.getElementById("icon_bar");
const btn_close = document.getElementById("icon_close");



btn.onclick = function () {

    targetDiv.style.display = "grid";
    btn.style.display = "none";
};
btn_close.onclick = function () {
    targetDiv.style.display = "none";
    btn.style.display = "block";
};

function showMOb() {
    if (window.innerWidth < 991) { // If media query matches

        btn.style.display="block";

    }
  }
function myFunction() {
    if (window.innerWidth > 991) { // If media query matches

        targetDiv.style.display = "none";
    }
  }


  window.addEventListener('resize', myFunction);
  window.addEventListener('resize', showMOb);
//navbar end




