<?php
  $page_class = "page-now-showing";  // body 클래스용 변수

// DB 연결
include '../../db/dbconn.php';
// 공통 헤더 출력
include '../header.php';
?>
  
  
  <!-- 폰트어썸 CDN -->
  <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
  <!-- 예약 공통 -->
  <link rel="stylesheet" href="../../css/movie_reser.css" />
  <link rel="stylesheet" href="../../css/movie_reser_mid.css" />
  <script src="../../js/jquery.js"></script>

    
<main>
<div class="category">
        <a href="../../index.php" title="메인바로가기">홈</a> &#47; <a href="now_showing.php">영화</a> &#47; <a href="now_showing.php">현재상영작</a>
    </div>
   <!-- 새 상단 배너 슬라이드 영역 -->
   <section id="top-banner">
    <article class="mslide-banner">
      <ul>
        <li>
          <a href="#" title="슬라이드 1">
            <img src="../../images/res/ns_slide01.jpg" alt="슬라이드 1">
          </a>
        </li>
        <li>
          <a href="#" title="슬라이드 2">
            <img src="../../images/res/ns_slide02.jpg" alt="슬라이드 2">
          </a>
        </li>
        <li>
          <a href="#" title="슬라이드 3">
            <img src="../../images/res/ns_slide03.jpg" alt="슬라이드 3">
          </a>
        </li>
      </ul>
      <!-- 좌우 화살표 -->
      <i class="fa-solid fa-angle-left"></i>
      <i class="fa-solid fa-angle-right"></i>
    </article>
  </section>

  <!-- showing_start (기존 상단 슬라이드) -->
  <section id="showing">
    <h2>Now Showing</h2>
    
    <!-- 슬라이드 컨테이너 -->
    <div class="showing-track">
      <div class="slide">
        <a href="now_showing.php" title="">
          <img src="../../images/MoviePoster/Movie_Poster_01.jpg" alt="포스터1">
        </a>
      </div>
      <div class="slide">
        <a href="now_showing.php" title="">
          <img src="../../images/MoviePoster/Movie_Poster_02.jpg" alt="포스터2">
        </a>
      </div>
      <div class="slide">
        <a href="now_showing.php" title="">
          <img src="../../images/MoviePoster/Movie_Poster_03.jpg" alt="포스터3">
        </a>
      </div>
      <div class="slide">
        <a href="now_showing.php" title="">
          <img src="../../images/MoviePoster/Movie_Poster_04.jpg" alt="포스터4">
        </a>
      </div>
      <div class="slide">
        <a href="now_showing.php" title="">
          <img src="../../images/MoviePoster/Movie_Poster_05.jpg" alt="포스터5">
        </a>
      </div>
    </div>
    
    <!-- 하단 컨트롤 바 -->
    <div class="slide-control">
      <span class="bar"></span>
      <span class="bar"></span>
      <span class="bar"></span>
      <span class="bar"></span>
      <span class="bar"></span>
    </div>
  </section>
  <!-- showing_end -->


  <!-- ====================================== -->
  <!--             롯시픽 무비                -->
  <!-- ====================================== -->
  <section class="movie-section" id="poster-grid">
    <h2>롯시픽 무비</h2>
    <!-- 스크롤 박스를 만들기 위해 감싸는 div -->
    <div class="poster-grid">
      <!-- 총 20개: 01 ~ 20 -->
      <!-- 실제로는 반복문이나 배열로 찍을 수 있지만, 예시는 일일이 작성 -->
      <a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_01.jpg" alt="롯시픽 영화1"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_02.jpg" alt="롯시픽 영화2"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_03.jpg" alt="롯시픽 영화3"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_04.jpg" alt="롯시픽 영화4"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_05.jpg" alt="롯시픽 영화5"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_06.jpg" alt="롯시픽 영화6"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_07.jpg" alt="롯시픽 영화7"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_08.jpg" alt="롯시픽 영화8"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_09.jpg" alt="롯시픽 영화9"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_10.jpg" alt="롯시픽 영화10"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_11.jpg" alt="롯시픽 영화11"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_12.jpg" alt="롯시픽 영화12"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_13.jpg" alt="롯시픽 영화13"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_14.jpg" alt="롯시픽 영화14"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_15.jpg" alt="롯시픽 영화15"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_16.jpg" alt="롯시픽 영화16"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_17.jpg" alt="롯시픽 영화17"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_18.jpg" alt="롯시픽 영화18"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_19.jpg" alt="롯시픽 영화19"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_20.jpg" alt="롯시픽 영화20"></a>

    </div>
  </section>

  <!-- ====================================== -->
  <!--             아르떼 무비                -->
  <!-- ====================================== -->
  <section class="movie-section" id="arteMovie">
    <h2>아르떼 무비</h2>
    <!-- 스크롤 박스를 만들기 위해 감싸는 div -->
    <div class="poster-grid">
      <!-- 총 30장 예시 (21~50) 중 10장은 첫 화면에 보이고, 나머지는 스크롤로 -->
      <!-- 실제로는 30장이면 21~50. 여기서는 21~50 중 일부분만 예시로... -->
      <a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_21.jpg" alt="아르떼 영화21"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_22.jpg" alt="아르떼 영화22"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_23.jpg" alt="아르떼 영화23"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_24.jpg" alt="아르떼 영화24"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_25.jpg" alt="아르떼 영화25"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_26.jpg" alt="아르떼 영화26"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_27.jpg" alt="아르떼 영화27"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_28.jpg" alt="아르떼 영화28"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_29.jpg" alt="아르떼 영화29"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_30.jpg" alt="아르떼 영화30"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_31.jpg" alt="아르떼 영화31"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_32.jpg" alt="아르떼 영화32"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_33.jpg" alt="아르떼 영화33"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_34.jpg" alt="아르떼 영화34"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_35.jpg" alt="아르떼 영화35"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_36.jpg" alt="아르떼 영화36"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_37.jpg" alt="아르떼 영화37"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_38.jpg" alt="아르떼 영화38"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_39.jpg" alt="아르떼 영화39"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_40.jpg" alt="아르떼 영화40"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_41.jpg" alt="아르떼 영화41"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_42.jpg" alt="아르떼 영화42"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_43.jpg" alt="아르떼 영화43"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_44.jpg" alt="아르떼 영화44"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_45.jpg" alt="아르떼 영화45"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_46.jpg" alt="아르떼 영화46"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_47.jpg" alt="아르떼 영화47"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_48.jpg" alt="아르떼 영화48"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_49.jpg" alt="아르떼 영화49"></a>
<a href="#" title=""><img src="../../images/MoviePoster/Movie_Poster_50.jpg" alt="아르떼 영화50"></a>

    </div>
  </section>

  </main>






  <!-- 스크립트 -->
<!-- 새로운 상단 배너 슬라이드 제이쿼리 스크립트 -->
<script>
$(document).ready(function(){
  var bannerSlider = $('.mslide-banner ul');
  var leftArrow = $('.mslide-banner i.fa-angle-left');
  var rightArrow = $('.mslide-banner i.fa-angle-right');

  // ① 슬라이드 안의 <a> 클릭 시 스크롤 방지
  $('.mslide-banner ul li a').on('click', function(e){
    e.preventDefault();
  });
  
  // containerWidth 가져오기
  var containerWidth = $('#top-banner').width();
  console.log("containerWidth:", containerWidth);  // 디버깅 로그
  
  // 강제 하드코딩 테스트 (만약 containerWidth가 0이면)
  if (!containerWidth || containerWidth === 0) {
    containerWidth = 1920;
    console.log("containerWidth 하드코딩:", containerWidth);
  }
  
  // 초기 margin-left 설정
  bannerSlider.css('margin-left', -containerWidth + 'px');
  
  function moveBannerLeft() {
    bannerSlider.stop().animate({'margin-left': -2 * containerWidth + 'px'}, 300, function(){
      $('.mslide-banner ul li:first-child').insertAfter('.mslide-banner ul li:last-child');
      bannerSlider.css('margin-left', -containerWidth + 'px');
    });
  }
  
  function moveBannerRight() {
    bannerSlider.stop().animate({'margin-left': '0px'}, 300, function(){
      $('.mslide-banner ul li:last-child').insertBefore('.mslide-banner ul li:first-child');
      bannerSlider.css('margin-left', -containerWidth + 'px');
    });
  }
  
  var bannerTimer = setInterval(moveBannerLeft, 3000);
  
  // ② 화살표 클릭 시에도 혹시 모를 기본 이벤트 차단
  leftArrow.on('click', function(e){
    e.preventDefault();
    moveBannerLeft();
  });
  rightArrow.on('click', function(e){
    e.preventDefault();
    moveBannerRight();
  });
  
  $('.mslide-banner i.fa-solid').hover(
    function(){
      clearInterval(bannerTimer);
    },
    function(){
      bannerTimer = setInterval(moveBannerLeft, 3000);
    }
  );
  
  
  $(window).resize(function(){
    containerWidth = $('#top-banner').width();
    bannerSlider.css('margin-left', -containerWidth + 'px');
  });
});
</script>

<script>
  // **** showing_start **** //
  document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('#showing .slide');
    const bars   = document.querySelectorAll('#showing .slide-control .bar');
    let currentIndex = 0;
    const total = slides.length;
    let autoTimer = null;

    function updateSlides(index) {
      // 모든 slide & bar 초기화
      slides.forEach(s => s.className = 'slide');
      bars.forEach(b => b.classList.remove('active'));

      // 현재(가운데)
      slides[index].classList.add('center');
      bars[index].classList.add('active');

      // 왼쪽 2장
      const left1 = (index - 1 + total) % total;
      slides[left1].classList.add('left1');
      const left2 = (index - 2 + total) % total;
      slides[left2].classList.add('left2');

      // 오른쪽 2장
      const right1 = (index + 1) % total;
      slides[right1].classList.add('right1');
      const right2 = (index + 2) % total;
      slides[right2].classList.add('right2');
    }

    function nextSlide() {
      currentIndex = (currentIndex + 1) % total;
      updateSlides(currentIndex);
    }

    // 새로 추가: 이전 슬라이드 함수
    function prevSlide() {
      currentIndex = (currentIndex - 1 + total) % total;
      updateSlides(currentIndex);
    }

    // 초기화
    updateSlides(currentIndex);

    // 자동 슬라이드 5초마다
    autoTimer = setInterval(nextSlide, 5000);

    // 하단 바 클릭
    bars.forEach((bar, i) => {
      bar.addEventListener('click', () => {
        currentIndex = i;
        updateSlides(currentIndex);
        clearInterval(autoTimer);
        autoTimer = setInterval(nextSlide, 5000);
      });
    });

    /*[터치 드래그로 슬라이드 넘기기] 추가 부분*/
    const showingTrack = document.querySelector('#showing .showing-track');
    let startX = 0;
    let currentX = 0;
    let isDragging = false;

    showingTrack.addEventListener('touchstart', (e) => {
      startX = e.touches[0].clientX;
      isDragging = true;
      // 자동슬라이드 멈춤
      clearInterval(autoTimer);
    });

    showingTrack.addEventListener('touchmove', (e) => {
      if (!isDragging) return;
      currentX = e.touches[0].clientX;
    });

    showingTrack.addEventListener('touchend', (e) => {
      isDragging = false;
      const diff = currentX - startX;

      if (diff > 50) {
        // 오른쪽으로 드래그(손가락이 오른쪽으로 이동) => 이전 슬라이드
        prevSlide();
      } else if (diff < -50) {
        // 왼쪽으로 드래그 => 다음 슬라이드
        nextSlide();
      }

      // 손 뗀 후에 다시 자동 슬라이드 시작
      clearInterval(autoTimer);
      autoTimer = setInterval(nextSlide, 5000);
    });
  });
  // **** showing_end**** //
</script>

<?php include ('../footer.php'); ?>