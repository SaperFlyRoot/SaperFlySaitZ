$(document).ready(function() {

  $('#newsticker').jCarouselLite({
    vertical: true,
    hoverPause: true,
    btnNext: '#news-next',
    btnPrev: '#news-prev',
    auto: true,
    timeout: 5000,
    visible: 3,
    speed: 800
  });

  $("#style-grid").click(function(){
    $("#block-tovar-grid").show();
    $("#block-tovar-list").hide();
  });
  $("#style-list").click(function(){
  $("#block-tovar-grid").hide();
  $("#block-tovar-list").show();
  });


});
