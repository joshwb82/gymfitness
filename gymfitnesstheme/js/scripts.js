jQuery(document).ready(function($){
  
    // make the main menu responsive
    $('#menu-main-nav').slicknav({
      // appendTo: '.site-header'
    });


    //Run the BXslider on testimonials
    if ($('body.home').length) {
      $('.testimonial-list').bxSlider({
        controls: false,
        mode: 'fade'
      });
    };

    // when the page is ready add the fixed menu if position is greater then 300px
    const headerScroll = document.querySelector('.navigation-bar');
    const rec = headerScroll.getBoundingClientRect();
    const topDistance = Math.abs(rec.top);
    fixedMenu(topDistance);


});



window.onscroll = () => {
  const scroll = window.scrollY;
  
  fixedMenu(scroll);
}

// Create a fixed navigation
function fixedMenu(scroll){
  const headerScroll = document.querySelector('.navigation-bar');

  // In the case that the scroll is greater than 300 add some classes
  if(scroll > 300){
    headerScroll.classList.add('fixed-top');
  } else{
    headerScroll.classList.remove('fixed-top');
  }

}
