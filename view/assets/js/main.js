/**
* Template Name: FlexStart
* Updated: Sep 18 2023 with Bootstrap v5.3.2
* Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/
(function() {
  "use strict";

  /**
   * Easy selector helper function
   */
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }

  /**
   * Easy event listener function
   */
  const on = (type, el, listener, all = false) => {
    if (all) {
      select(el, all).forEach(e => e.addEventListener(type, listener))
    } else {
      select(el, all).addEventListener(type, listener)
    }
  }

  /**
   * Easy on scroll event listener 
   */
  const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener)
  }

  /**
   * Navbar links active state on scroll
   */
  let navbarlinks = select('#navbar .scrollto', true)
  const navbarlinksActive = () => {
    let position = window.scrollY + 200
    navbarlinks.forEach(navbarlink => {
      if (!navbarlink.hash) return
      let section = select(navbarlink.hash)
      if (!section) return
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        navbarlink.classList.add('active')
      } else {
        navbarlink.classList.remove('active')
      }
    })
  }
  window.addEventListener('load', navbarlinksActive)
  onscroll(document, navbarlinksActive)

  /**
   * Scrolls to an element with header offset
   */
  const scrollto = (el) => {
    let header = select('#header')
    let offset = header.offsetHeight

    if (!header.classList.contains('header-scrolled')) {
      offset -= 10
    }

    let elementPos = select(el).offsetTop
    window.scrollTo({
      top: elementPos - offset,
      behavior: 'smooth'
    })
  }

  /**
   * Toggle .header-scrolled class to #header when page is scrolled
   */
  let selectHeader = select('#header')
  if (selectHeader) {
    const headerScrolled = () => {
      if (window.scrollY > 100) {
        selectHeader.classList.add('header-scrolled')
      } else {
        selectHeader.classList.remove('header-scrolled')
      }
    }
    window.addEventListener('load', headerScrolled)
    onscroll(document, headerScrolled)
  }

  /**
   * Back to top button
   */
  let backtotop = select('.back-to-top')
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) {
        backtotop.classList.add('active')
      } else {
        backtotop.classList.remove('active')
      }
    }
    window.addEventListener('load', toggleBacktotop)
    onscroll(document, toggleBacktotop)
  }

  /**
   * Mobile nav toggle
   */
  on('click', '.mobile-nav-toggle', function(e) {
    select('#navbar').classList.toggle('navbar-mobile')
    this.classList.toggle('bi-list')
    this.classList.toggle('bi-x')
  })

  /**
   * Mobile nav dropdowns activate
   */
  on('click', '.navbar .dropdown > a', function(e) {
    if (select('#navbar').classList.contains('navbar-mobile')) {
      e.preventDefault()
      this.nextElementSibling.classList.toggle('dropdown-active')
    }
  }, true)

  /**
   * Scrool with ofset on links with a class name .scrollto
   */
  on('click', '.scrollto', function(e) {
    if (select(this.hash)) {
      e.preventDefault()

      let navbar = select('#navbar')
      if (navbar.classList.contains('navbar-mobile')) {
        navbar.classList.remove('navbar-mobile')
        let navbarToggle = select('.mobile-nav-toggle')
        navbarToggle.classList.toggle('bi-list')
        navbarToggle.classList.toggle('bi-x')
      }
      scrollto(this.hash)
    }
  }, true)

  /**
   * Scroll with ofset on page load with hash links in the url
   */
  window.addEventListener('load', () => {
    if (window.location.hash) {
      if (select(window.location.hash)) {
        scrollto(window.location.hash)
      }
    }
  });

  /**
   * Clients Slider
   */
  new Swiper('.clients-slider', {
    speed: 400,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    },
    breakpoints: {
      320: {
        slidesPerView: 2,
        spaceBetween: 40
      },
      480: {
        slidesPerView: 3,
        spaceBetween: 60
      },
      640: {
        slidesPerView: 4,
        spaceBetween: 80
      },
      992: {
        slidesPerView: 6,
        spaceBetween: 120
      }
    }
  });

  /**
   * Porfolio isotope and filter
   */
  window.addEventListener('load', () => {
    let portfolioContainer = select('.portfolio-container');
    if (portfolioContainer) {
      let portfolioIsotope = new Isotope(portfolioContainer, {
        itemSelector: '.portfolio-item',
        layoutMode: 'fitRows'
      });

      let portfolioFilters = select('#portfolio-flters li', true);

      on('click', '#portfolio-flters li', function(e) {
        e.preventDefault();
        portfolioFilters.forEach(function(el) {
          el.classList.remove('filter-active');
        });
        this.classList.add('filter-active');

        portfolioIsotope.arrange({
          filter: this.getAttribute('data-filter')
        });
        aos_init();
      }, true);
    }

  });

  /**
   * Initiate portfolio lightbox 
   */
  const portfolioLightbox = GLightbox({
    selector: '.portfokio-lightbox'
  });

  /**
   * Portfolio details slider
   */
  new Swiper('.portfolio-details-slider', {
    speed: 400,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    }
  });

  /**
   * Testimonials slider
   */
  new Swiper('.testimonials-slider', {
    speed: 600,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 40
      },

      1200: {
        slidesPerView: 3,
      }
    }
  });

  /**
   * Animation on scroll
   */
  function aos_init() {
    AOS.init({
      duration: 1000,
      easing: "ease-in-out",
      once: true,
      mirror: false
    });
  }
  window.addEventListener('load', () => {
    aos_init();
  });

  /**
   * Initiate Pure Counter 
   */
  new PureCounter();

})();
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
function openImg(imgName) {
  var i, x;
  x = document.getElementsByClassName("picture");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  document.getElementById(imgName).style.display = "block";
}
function myFunction1() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("mySearch");
  filter = input.value.toUpperCase();
  ul = document.getElementById("myMenu");
  li = ul.getElementsByTagName("li");
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
      }
    }
    
}

function verif(){
  const element = document.getElementById("myBtn");
element.addEventListener("submit", function(e){e.preventDefault()
    var ch=document.getElementById("noun").value;
    var i=0;
    var test=true
    if(ch.length<1)
    {
        test==false
    }
    do{
        if (("a">ch.slice(i) || ch.slice(i)>"z")&&("A">ch.slice(i) || ch.slice(i)>"Z")){
            test=false
            
        }
        else {
            i++;
        }

    }while((test==true)&&(i<ch.length))
    if(test==false)
    {
        document.getElementById("msg1").innerHTML ="veuller entrer un nom valide (lettre uniquement)"
        document.getElementById("msg1").style.color="red"

    }
    else{
        document.getElementById("msg1").innerHTML ="correct"
        document.getElementById("msg1").style.color="green"
    }
    i=0;
    test=true
    ch=document.getElementById("cmnt").value;
    if(ch.length<1)
    {
        test==false
        document.getElementById("msg2").innerHTML ="veuller entrer commentaire"
        document.getElementById("msg2").style.color="red"

    }
    else{
        document.getElementById("msg2").innerHTML ="correct"
        document.getElementById("msg2").style.color="green"
    }
    
});
}
function valide()
{
    var ch=document.getElementById("dc").value
    var ch1=document.getElementById("dm").value
    if ((ch.slice(0,4)!="2023")||(ch.slice(5,7)>"12")||(ch.slice(5,7)<"1")||(ch.slice(8,10)>"31")||(ch.slice(8,10)<"01")){
        alert('la date est non valide');
    }
    if ((ch1.slice(0,4)!="2023")||(ch1.slice(5,7)>"12")||(ch1.slice(5,7)<"1")||(ch1.slice(8,10)>"31")||(ch1.slice(8,10)<"01")){
      alert('la date est non valide');
    }
    const element1 = document.getElementById("artBtn");
element1.addEventListener("submit", function two(e){e.preventDefault()
    var ch=document.getElementById("cat").value;
    var i=0;
    var test=true
    
    if((ch!="tableau")&& (ch!="vetement")&& (ch!="monument")&& (ch!="livre")&&(ch!="ville")){
      test=false;
    }
    if(test==false)
    {
        document.getElementById("msg3").innerHTML ="veuller entrer une categorie existante"
        document.getElementById("msg3").style.color="red"

    }
    else{
        document.getElementById("msg3").innerHTML ="correct"
        document.getElementById("msg3").style.color="green"
    }
    
    i=0;
    test=true
    ch=document.getElementById("title").value;
    if((ch.length<1)||(ch.length>30))
    {
        test==false
        document.getElementById("msg4").innerHTML ="veuller un titre valide moin de 30 chiffre"
        document.getElementById("msg4").style.color="red"

    }
    else{
        document.getElementById("msg4").innerHTML ="correct"
        document.getElementById("msg4").style.color="green"
    }
    var ch=document.getElementById("nom").value;
    var i=0;
    var test=true
    if((ch.length<1)||(ch.length>20))
    {
        test=false
    }
    do{
        if (("a">ch.slice(i) || ch.slice(i)>"z")&&("A">ch.slice(i) || ch.slice(i)>"Z")){
            test=false
            
        }
        else {
            i++;
        }

    }while((test==true)&&(i<ch.length))
    if(test==false)
    {
        document.getElementById("msg7").innerHTML ="veuller entrer un nom valide (lettre uniquement//pas long)"
        document.getElementById("msg7").style.color="red"

    }
    else{
        document.getElementById("msg7").innerHTML ="correct"
        document.getElementById("msg7").style.color="green"
    }
    i=0;
    test=true
    ch=document.getElementById("art").value;
    if (ch.length<1)
    {
        test==false
        document.getElementById("msg8").innerHTML ="veuller ajouter un article"
        document.getElementById("msg8").style.color="red"

    }
    else{
        document.getElementById("msg8").innerHTML ="correct"
        document.getElementById("msg8").style.color="green"
    }
    });
}
function categories() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDIV");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}
document.getElementsByClassName("tablink")[0].click();
      
function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].classList.remove("w3-light-grey");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.classList.add("w3-light-grey");
}
//---------------------------------------------------------------------------------------------
