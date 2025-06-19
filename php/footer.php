<!-- 푸터영역 -->
<div id='pc_footer'>
<footer>
    <div class='ran_banner'>
      <a href="#" title='메인랜덤배너'>
        <img src="../../images/main/random_banner1.jpg" alt="메인랜덤배너">
      </a>
    </div>

    <ul class='f_gnb'>

      <li class='f_logo'>
          <a href="/롯데시네마/index.php" title='하단로고'>
            <img src="../../images/main/logo_wht.png" alt="하단로고">
          </a>
      </li>

      <li>
        <a href="https://www.lottecinema.co.kr/NLCHS/Etc/MemberClause" title='이용약관'>이용약관</a>
      </li>

      <li>
        <a href="https://www.lottecinema.co.kr/NLCHS/Etc/IndividualInfomationHandlingPolicy" title='개인정보처리방침'>개인정보처리방침</a>
      </li>

      <li>
        <a href="https://www.lottecinema.co.kr/NLCHS/Etc/EmailCollectionRefusal" title='이메일무단수집거부'>이메일무단수집거부</a>
      </li>

      <li>
        <a href="https://www.lottecinema.co.kr/NLCHS/Etc/ElectronicManagementPolicy" title='고정형 영상정보처리기기 운영 및 관리방침'>고정형 영상정보처리기기 운영 및 관리방침</a>
      </li>

      <li>
        <a href="https://www.lottecinema.co.kr/NLCHS/Etc/ElectronicManagementPolicy" title='광고/임대문의'>광고/임대문의</a>
      </li>
    </ul>

    <address>
      <p>서울특별시 송파구 올림픽로 295 삼성생명 잠실빌딩 18F</p>
      <p>대표 이메일 lottecultureworks@lotte.net 고객센터 1544-8855 (유료)사업자등록번호 313-87-00979 통신판매업신고번호 제1184호</p>
      <p>대표이사 최병환 개인정보 보호 책임자 김병문 호스팅 제공자 롯데이노베이</p>
      <p>Copyright&copy; LOTTE Cultureworks All Right Reserved.</p>
    </address>
  </footer>
</div>

    <!--  모바일 푸터 영역 -->
    <div class='footer_toggle'>
      <div>
        <input type='checkbox' id='mo_footer_toggle'>
        <label for="mo_footer_toggle" class='footer_label'>LotteCinema<i class="fa-solid fa-angle-down"></i></label>

        <div class='footer_address'>
          <p>서울특별시 송파구 올림픽로 295 삼성생명 잠실빌딩 18F</p>
          <p>대표 이메일 lottecultureworks@lotte.net 고객센터 1544-8855</p>
          <p>(유료)사업자등록번호 313-87-00979 통신판매업신고번호 제1184호</p>
          <p>대표이사 최병환 개인정보 보호 책임자 김병문 호스팅 제공자 롯데이노베이</p>
        </div>
      </div>
      <ul class='f_gnb'>
        <li><a href="#" title='이용약관'>이용약관</a></li>

        <li><a href="#" title='개인정보처리방침'>개인정보처리방침</a></li>

        <li><a href="#" title='이메일무단수집거부'>이메일무단수집거부</a></li>

        <li><a href="#" title='고정형 영상정보처리기기 운영 및 관리방침'>고정형 상정보처리기기 운영 및 관리방침</a></li>

        <li><a href="#" title='광고/임대문의'>광고/임대문의</a></li>
      </ul>
      <p class='copyright'>Copyright&copy; LOTTE Cultureworks All Right Reserved.</p>
    </div>

    <!-- 제이쿼리-->
    <script src="../../js/jquery.js"></script>
    <!-- 스페셜 js -->
    <script src='../../js/special.js'></script>
    <!-- 이벤트 js -->
    <script src='../../js/event.js'></script>
    <!-- 스토어 js-->
    <script src='../../js/store.js'></script>
    <!-- 고객센터 js -->
    <script src='../../js/inquiry.js'></script>
    <!-- 멤버십 js -->
    <script src='../../js/membership.js'></script>
    
    <script>
  $(document).ready(function(){
    // 순위 
    setInterval(function(){

    let rank_list = $('.rank ul');
    let listRow = $('.rank ul li:first');

    let print= ()=>{
      listRow.appendTo(rank_list).show(300);
    }
    listRow.siblings().hide(300, print);

    },3000);

    $('.rank ul li').hide();
    $('.rank ul li:first').show();


  //내비게이션
  const gnb = $('.h_inner2 nav');
  const h_inner2 = $('.h_inner2');
  const gnb_a = $('.gnb > li > a');


  gnb.mouseenter(function(e){
    e.preventDefault();
    h_inner2.stop().animate({'height':'200px'},500);
  });

  gnb.mouseleave(function(e){
    e.preventDefault();
    h_inner2.stop().animate({'height':'35px'},500);
  });

  let navTop = h_inner2.offset().top;

  $(window).scroll(function(){

    let scrollTop = $(window).scrollTop();

    if(scrollTop > navTop){
      h_inner2.addClass('fixed');
      gnb_a.addClass('change');
      //sub배경색 없애기
      $('.sub').css('background','none');

    }else{
      h_inner2.removeClass('fixed');
      gnb_a.removeClass('change');
      //sub배경색 넣기
      $('.sub').css('background','rgba(255,255,255,.8)');
    }
  });

  // 탑버튼, 검색창
  $(window).scroll(function(){
    
    if($(this).scrollTop() > 10){
    $('.top').fadeIn();
    }else{
      $('.top').fadeOut();
    }
  });

  $('i.fa-circle-up').click(function(){
    $('body, html').animate({scrollTop:0},500);
    return false;
  });

  // 검색창
  $('.search-icon').click(function(e){
    e.stopPropagation();
    $('.search_slide').toggleClass('searched');
    $('.search_slide input').focus();
  });

  $('.search_slide').click(function(e){
    e.stopPropagation();
  });

  $(document).click(function(){
    $('.search_slide').removeClass('searched');
  });
});
</script>


<script>
  (function(){var w=window;if(w.ChannelIO){return w.console.error("ChannelIO script included twice.");}var ch=function(){ch.c(arguments);};ch.q=[];ch.c=function(args){ch.q.push(args);};w.ChannelIO=ch;function l(){if(w.ChannelIOInitialized){return;}w.ChannelIOInitialized=true;var s=document.createElement("script");s.type="text/javascript";s.async=true;s.src="https://cdn.channel.io/plugin/ch-plugin-web.js";var x=document.getElementsByTagName("script")[0];if(x.parentNode){x.parentNode.insertBefore(s,x);}}if(document.readyState==="complete"){l();}else{w.addEventListener("DOMContentLoaded",l);w.addEventListener("load",l);}})();

  ChannelIO('boot', {
    "pluginKey": "a3811638-761b-4268-802c-04c89e89ea6b"
  });

  // 푸터 랜덤배너 
  let ran_n = Math.floor(Math.random()*2)+1;

  const r_img = document.querySelector('.ran_banner img');
  r_img.src='../../images/main/random_banner' + ran_n + '.jpg';


  
   // 메인영상슬라이드
  const swiper = new Swiper('.myVideoSwiper',{
      slidesPerView: 1,
      spaceBetween: 20,
      effect: 'fade',
      navigation:{
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
      },
      on: {
        slideChange: function(){
          playCurrentVideo();
        }
      }
    });
    const videos = document.querySelectorAll("video");

    function playCurrentVideo(){
      videos.forEach((v,i) =>{
        if(i== swiper.activeIndex){
          v.play();
        }else{
          v.pause();
          v.currentTime = 0;
        }
      });
    }

    videos.forEach((video, index) =>{video.addEventListener("ended", () =>{
      if(swiper.activeIndex === index){if(swiper.activeIndex < swiper.slides.length -1){
        swiper.slideNext();
        }else{
          swiper.slideTo(0);
        }
      }
    });
  });

</script>


</body>
</html>