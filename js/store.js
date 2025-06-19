$(document).ready(function(){
    $(".tab_menu ul li").click(function() {
    var tabMenu = $(this).text().replace(',', '').replace(' ', '').toLowerCase();
    
    $("#product article").hide(); // 모든 article 숨김

    if (tabMenu === '포토카드'){
        $("#photocard").fadeIn(300); // 0.3초 동안 부드럽게 나타남
    } else if (tabMenu === '관람권'){
        $("#ticket").fadeIn(300);
    } else if (tabMenu === '음료스낵'){
        $("#snack").fadeIn(300);
    }  else if (tabMenu === '전체보기'){
        $("#photocard, #ticket, #snack").fadeIn(300);
    } 

    $(".tab_menu ul li").removeClass("active");
    $(this).addClass("active");
});
});