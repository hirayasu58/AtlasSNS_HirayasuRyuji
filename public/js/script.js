$(function () {
  $('.menu-btn').on('click', function () {
    $(this).toggleClass('active');
    $(this).next('nav').slideToggle();
  });
});
