$(document).ready(function(){
    const $faqItem = $(".faq_item");

    const $firstItem = $faqItem.first();
    $firstItem.addClass("active");
    $firstItem.find(".answer").slideDown();

    $(".faq_item .question_wrap").off("click").on("click", function(e){
        e.preventDefault();
        e.stopPropagation();

        const $clickedItem = $(this).closest(".faq_item");
        const isActive = $clickedItem.hasClass("active");

        $faqItem.removeClass("active").find(".answer").stop(true).slideUp();

        if (!isActive) {
            $clickedItem.addClass("active");
            $clickedItem.find(".answer").stop(true).slideDown();
        }
    });

    // 탭 메뉴 유지
    $(".i_tab_menu li").first().addClass("active");
    $("#inquiry").hide();

    $(".i_tab_menu li").click(function(){
        let i_tabMenu = $(this).text().replace(',', '').replace(' ', '').toLowerCase();

        $("#faq").hide();
        $("#inquiry").hide();

        if(i_tabMenu === 'faq'){
            $("#faq").fadeIn(300);
        } else if(i_tabMenu === '1:1문의'){
            $("#inquiry").fadeIn(300);
        }
        if (window.innerWidth <= 767 && i_tabMenu === '1:1문의') {
            $("#m_inquiry").show();
        } else {
            $("#m_inquiry").hide();
        }
        
        $(".i_tab_menu li").removeClass("active");
        $(this).addClass("active");

        $(window).resize(function() {
    const activeTabText = $(".i_tab_menu li.active").text().replace(',', '').replace(' ', '').toLowerCase();

    if (activeTabText === '1:1문의') {
        if (window.innerWidth <= 767) {
            $("#m_inquiry").show();
        } else {
            $("#m_inquiry").hide();
        }
    } else {
        $("#m_inquiry").hide();
    }
});
    });

    /* 모바일 1:1 문의 탭 메뉴 */
    let tmnu1 = $('.i_choice ul li a');
    let tmnu2 = $('.i_category ul li a');

    tmnu1.click(function(e){
        e.preventDefault();

        $('.i_choice ul li a').removeClass('act');
        $(this).addClass('act');
    });

    tmnu2.click(function(e){
        e.preventDefault();

        $('.i_category ul li a').removeClass('act');
        $(this).addClass('act');
    });

    $("#privacy_toggle").click(function(e){
        
        if (!$(e.target).is('input[type="checkbox"]')) {
            e.preventDefault();
        }
    
        $(this).parent(".m_i_c_check").toggleClass("open");
        $(this).siblings(".privacy_content").slideToggle(200);
    });
});

function form_check(){
    if(document.getElementById('i_select').value === '분류 선택'){
        alert('분류를 선택해주세요.');
        document.getElementById('i_select').focus();
        return false;
    }
    if(!document.getElementById('i_name').value.trim()){
        alert('이름을 입력해주세요.');
        document.getElementById('i_name').focus();
        return false;
    }
    if(!document.getElementById('i_title').value.trim()){
        alert('제목을 입력해주세요.');
        document.getElementById('i_title').focus();
        return false;
    }
    if(!document.getElementById('detail').value.trim()){
        alert('내용을 입력해주세요.');
        document.getElementById('detail').focus();
        return false;
    }
    return true;
}
