$(document).ready(function(){
  let currentIndex = 0;
  const articles = $('.special_screen article');
  let scrolling = false;


  function focusArticle(index){
    if(index < 0 || index >= articles.length) return;

    scrolling = true;

    // 스크롤 이동 시
    $('html, body').animate({
      scrollTop: articles.eq(index).offset().top
    }, 600, function(){
      scrolling = false;
    });

    $('.scr').removeClass('special_act');
    articles.eq(index).find('.scr').addClass('special_act');
  }


    $(window).on('wheel', function(e){
      if (scrolling) return;
      let delta = e.originalEvent.deltaY;

      if(delta > 0){
        if(currentIndex < articles.length -1){
        currentIndex++;
        focusArticle(currentIndex);}
      }else{
        if(currentIndex > 0){
          currentIndex --;
          focusArticle(currentIndex);
        }
      }
    });

    focusArticle(0);

});