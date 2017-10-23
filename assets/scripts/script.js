/*Home Page Slider*/
$( document ).ready(function() {
	$(document).on('click', '.toggle_hidden_action', function (e) {
	e.preventDefault();

    $(this).closest('.listItem').find('.toggle_hidden').toggleClass('expanded');


  });
/*FAQ toggle*/
	$(document).on('click', '.question', function (e) {
	e.preventDefault();

    $(this).closest('.faq').find('.answer').slideToggle(500);


  });
 var swiper = new Swiper('.home-slider .swiper-container', {
        effect: 'fade',
        autoplay:false,
      	pagination: '.swiper-pagination',
        paginationClickable: true,
    
});


});
