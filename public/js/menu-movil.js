// $(".menu-movil").click(function(){
// 	$(".menu-movil").css('display', 'block');
//     $(".desplegable-movil").slideToggle('fast', function(){
//     	$(".desplegable-movil").css('float', 'left');
//     });
// });

// $('.mobile-btn').click(function(){
//   $(".menu-mobile").slideToggle('fast', function(){
//   	$('.menu-mobile').toggleClass('active')
//   	$('.mobile-btn').toggleClass('active')
//   });
// });

$('.mobile-btn').click(function(){
  $(this).toggleClass('active')
  $('.menu-mobile').toggleClass('active')
});