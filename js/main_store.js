$(document).ready(function() {
    function checkStoreItemsVisibility() {
        var windowBottom = $(window).scrollTop() + $(window).height();
    
        $('.st_item').each(function() {
            var itemTop = $(this).offset().top;
            var itemHeight = $(this).outerHeight();
            var scrollPercentage = 0;
    
            if (itemTop < windowBottom && itemTop + itemHeight > $(window).scrollTop()) {
            var visibleHeight = Math.min(windowBottom - itemTop, itemHeight);
            scrollPercentage = Math.max(0, Math.min(1, visibleHeight / itemHeight));
            $(this).css('opacity', 0.1 + (1 - 0.1) * scrollPercentage); // 초기 Opacity에서 1까지
            $(this).addClass('visible'); // 화면에 완전히 보이면 visible 클래스 추가
            } else if (itemTop > windowBottom) {
            $(this).css('opacity', 0.1); // 화면 아래로 벗어나면 초기 Opacity
            $(this).removeClass('visible');
            } else if (itemTop + itemHeight < $(window).scrollTop()) {
            $(this).css('opacity', 0.1); // 화면 위로 벗어나면 초기 Opacity
            $(this).removeClass('visible');
            }
        });
        }
    
        $(window).on('scroll', checkStoreItemsVisibility);
        checkStoreItemsVisibility(); // 초기 로드 시에도 한번 체크
});