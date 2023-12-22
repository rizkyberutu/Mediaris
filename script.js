$('.owl-carousel').owlCarousel({
  loop:true,
  margin:10,
  nav:true,
  dots:false,
  responsive:{
      0:{
          items:1
      },
      600:{
          items:2
      },
      1000:{
          items:3
      }
  }
})

// Navbar
const nav = document.querySelector("nav");
const sectionHome = document.querySelector(".home");

const sectionHomeOptions = {
  rootMargin: "-200px 0px 0px 0px"
};

const sectionHomeObserver = new IntersectionObserver(function(
  entries,
  sectionHomeObserver
) {
  entries.forEach(entry => {
    if (!entry.isIntersecting) {
      nav.classList.add("nav-scrolled");
    } else {
      nav.classList.remove("nav-scrolled");
    }
  });
},
sectionHomeOptions);

sectionHomeObserver.observe(sectionHome);
