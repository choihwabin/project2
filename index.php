<?php
include('./db/dbconn.php');   // session_start 포함

/* 세션 값 → 변수 */
$userid = $_SESSION['mb_id']   ?? '';
$name   = $_SESSION['mb_name'] ?? '';
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Happy Memories 롯데시네마는 최상의 관람 환경과 양질의 켄텐츠로 영화를 통해 고객에게 행복한 기억을 선물합니다.">
  <meta name="keywords" content="롯데시네마, LOTTE CINEMA, 롯시, 시네마, CINEMA, 영화, 영화관, 극장, 티켓, 박스오피스, Movie, Theater, 예매, 현재상영작, 상영예정작, 개봉영화, 영화예매, 영화예매순위, 영화순위, 상영시간표">
  <link rel="shortcut icon" href="https://www.lottecinema.co.kr/NLCHS/favicon.ico?v=1" type="image/x-icon">
  <title>롯데시네마</title>
  <!-- css -->
  <!-- common.css -->
  <link href='./css/common.css' rel='stylesheet' type='text/css'>
  <!-- main.css -->
  <link href='./css/main.css' rel='stylesheet' type='text/css'>
  <!-- 스와이퍼 -->
  <link href='./css/swiper.css' rel='stylesheet' type='text/css'>
  <!-- m_showing.css -->
  <link href='./css/m_showing.css' rel='stylesheet' type='text/css'>
  <!-- 폰트어썸cdn -->
  <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css' rel='stylesheet' type='text/css'>
</head>
<body>
    <!-- 모바일 토글 -->
    <input type="checkbox" id="m_toggle">
    <!-- 모바일 상단 -->
    <div class="mobile_top">
        <a href="./php/event/event_view.php?title=이벤트" title="이벤트">
          <div>
            <img src="./images/mobile_header/m_event.png" alt="이벤트바로가기" class="m_top">
          </div>
        이벤트
        </a>
        

        <a href="./php/movie/now_showing.php?title=현재상영작" title="현재상영작">
          <div>
            <img src="./images/mobile_header/m_showing.png" alt="현재상영작바로가기" class="m_top">
          </div>
        현재상영작
        </a>

        <a href="./php/movie/reservation.php?title=예매하기" title='예매하기' class='reservation'>
          <div>
            <img src="./images/mobile_header/m_reservation.png" alt="예매하기" class='m_top'></div>
        예매하기
        </a>
        <!-- 로그인 안할 시  -->
        <?php
        if(!$userid){
        ?>
        <a href="./php/login/login.php?title=로그인">
          <div>
            <img src="./images/mobile_header/m_user.png" alt="내정보" class="m_top">
          </div>
        로그인
        </a>
        <?php
        }else{ 
        ?>
        <!-- 로그인 시 -->
        <a href="./php/movie/reservation_check.php?title=예매확인">
          <div>
            <img src="./images/mobile_header/m_user.png" alt="내정보" class="m_top">
          </div>
          <span class="welcome" style="color:#333;">
            <?php echo htmlspecialchars($name).'('.htmlspecialchars($userid).')'; ?>님
          </span>
        </a>
        <?php
        }
        ?>
        
        <label for="m_toggle">
            <img src="./images/mobile_header/m_toggle.png" alt="모바일토글">
        </label>
      </div>
      
  <!-- 모바일 네비게이션 -->
  <nav class="m_nav">
    <div class="close_toggle">
        <label for="m_toggle" class="t_close_btn">
            <img src="./images/mobile_toggle_menu/white_X 1.png" alt="닫기버튼">
        </label>
    </div>

    <div class="m_nav_user">
        <div class="m_nav_user_l">
            <?php
            if(!$userid){
            ?>
            <a href="./php/login/login.php?title=로그인" title="로그인"><img src="./images/mobile_toggle_menu/m_login.png" alt="로그인"></a>
            <a href="./php/login/login.php?title=로그인" title="로그인"><span>로그인하기</span></a>
            <?php
            }else{
              ?>
            <a href="./php/movie/reservation_check.php?title=예매확인" title="로그인"><img src="./images/mobile_toggle_menu/m_login.png" alt="로그인"></a>
            <a href="./php/movie/reservation_check.php?title=예매확인" title='내정보'>
              <span class="welcome" style="color:#fff;">
              <?php echo htmlspecialchars($name).'('.htmlspecialchars($userid).')'; ?>님
              </span>
            </a>
            <!-- 모바일 로그아웃 -->
            <a href="/롯데시네마/php/login/logout.php" title='로그아웃하기' class='m_logout'>
              로그아웃
            </a>
            <?php
            }
            ?>
        </div>
        <div class="m_nav_user_r">
            <a href="./php/ranking/rank.php?title=예매순위" title="순위보기"><span>예매순위</span></a>
            <a href="#" title="옵션"><img src="./images/mobile_toggle_menu/m_option.png" alt="로그인"></a>
        </div>
    </div>


    <!-- 모바일 네비 메뉴 -->
    <div class="m_nav_con">
        <ul>
            <li class="m_nav_con_item">
                <div class="m_nav_icon"><a href="../movie/now_showing.php?title=현재상영작"><img src="./images/mobile_toggle_menu/m_movie.png" alt="영화바로가기"></a></div>
                <ul>
                    <li><a href="./php/movie/now_showing.php?title=현재상영작" title="영화바로가기"><b>영화</b></a></li>
                    <li><a href="./php/movie/now_showing.php?title=현재상영작" title="현재 상영작">현재 상영작</a></li>
                    <li><a href="./php/movie/reservation.php?title=예매하기" title="예매하기">예매하기</a></li>
                    <li><a href="./php/movie/reservation_check.php?title=예매확인" title="예매확인">예매확인</a></li>
                </ul>
            </li>

            <li class="m_nav_con_item">
                <div class="m_nav_icon"><a href="./php/theater/special.php?title=스페셜관"><img src="./images/mobile_toggle_menu/m_special.png" alt="스폐셜관바로가기"></a></div>
                <ul>
                    <li><a href="./php/theater/special.php?title=스페셜관" title="영화관"><b>영화관</b></a></li>
                    <li><a href="./php/theater/special.php?title=스페셜관" title="스폐셜관">스폐셜관</a></li>
                    <li><a href="./php/theater/search_by_region.php?title=지역검색" title="지역검색">지역검색</a></li>
                </ul>
            </li>

            <li class="m_nav_con_item">
                <div class="m_nav_icon"><a href="./php/event/event_view.php?title=이벤트"><img src="./images/mobile_toggle_menu/m_event.png" alt="이벤트바로가기"></a></div>
                <ul>
                    <li><a href="./php/event/event_view.php?title=이벤트" title="이벤트"><b>이벤트</b></a></li>
                    <li><a href="./php/event/event_view.php?title=이벤트" title="이벤트 확인">이벤트 확인</a></li>
                    <li><a href="./php/event/event_view.php?title=이벤트" title="진행중인 이벤트">진행중인 이벤트</a></li>
                </ul>
            </li>

            <li class="m_nav_con_item">
                <div class="m_nav_icon"><a href="./php/store/store.php?title=스토어"><img src="./images/mobile_toggle_menu/m_store.png" alt="스토어바로가기"></a></div>
                <ul>
                    <li><a href="./php/store/store.php?title=스토어" title="스토어"><b> 스토어</b></a></li>
                    <li><a href="./php/store/store.php?title=스토어" title="포토카드">포토카드</a></li>
                    <li><a href="./php/store/store.php?title=스토어" title="관람권">관람권</a></li>
                    <li><a href="./php/store/store.php?title=스토어" title="음료/스낵">음료/스낵</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- 모바일 네비 배너 -->
    <div class="m_nav_banner">
        <img src="./images/mobile_toggle_menu/m_nav_banner.png" alt="배너">
    </div>
    <!-- 모바일 네비 sns -->
    <div class="m_nav_sns">
        <a href="https://www.instagram.com/lottecinema_official/" title="인스타"><img src="./images/mobile_toggle_menu/m_nav_insta.png" alt="인스타"></a>
        <a href="https://www.facebook.com/LotteCinema.kr" title="페이스북"><img src="./images/mobile_toggle_menu/m_nav_facebook.png" alt="페이스북"></a>
        <a href="https://www.youtube.com/channel/UCi4KivcV3a3yhkycFsjpalQ" title="유튜브"><img src="./images/mobile_toggle_menu/m_nav_youtube.png" alt="유튜브"></a>
    </div>

    <!-- 멤버십, 고객센터 -->
    <div class='m_nav_member_inquiry'>
      <a href="./php/member/membership.php?title=멤버십">
        <i class="fa-solid fa-id-card"></i>
      </a>
      <a href="./php/support/inquiry.php?title=고객센터">
        <i class="fa-solid fa-headset"></i>
      </a>
    </div>
  </nav>

    <!-- 모바일 탑버튼 -->
    <div class='top'>
      <div>
        <i class="fa-solid fa-magnifying-glass search-icon"></i>
          <!-- 검색박스 -->
          <div class='search_slide'>
            <input type="text" placeholder='검색어를 입력해주세요.'>
          </div>
      </div>
      <div>
        <a href="#" title='top버튼'>
          <i class="fa-solid fa-circle-up"></i>
        </a>
      </div>
    </div>

  <!-- 헤더영역 -->
  <header>
    <article class='h_inner'>
      <div class='h_left'>
        <a href="https://www.instagram.com/lottecinema_official/"><i class="fa-brands fa-instagram"></i></a>
        <a href="https://www.facebook.com/LotteCinema.kr/?locale=ja_KS"><i class="fa-brands fa-square-facebook"></i></a>
        <a href="https://www.youtube.com/channel/UCi4KivcV3a3yhkycFsjpalQ"><i class='fa-brands fa-youtube'></i></a>
      </div>

      <h2>
        <a href="index.php" title="롯데시네마 메인페이지">
          <img src="./images/main/logo.png" alt="롯데시네마 메인페이지">
        </a>
      </h2>

      <div class='h_right'>
        <?php if (!$userid): ?>
          <!-- 로그인하지 않은 경우 -->
          <a href="./php/login/login.php?title=로그인">로그인</a>
          <a href="./php/member/membership.php?title=멤버십">멤버십</a>
          <a href="./php/support/inquiry.php?title=고객문의">고객문의</a>
        <?php else: ?>
          <!-- 로그인한 경우 -->
          <span class="welcome" style="color:#ffffff;">
            <a href="./php/movie/reservation_check.php?title=예매확인">
            <?php echo htmlspecialchars($name).'('.htmlspecialchars($userid).')'; ?>님
            </a>
          </span>
            
          <a href="./php/support/inquiry.php?title=고객문의">고객문의</a>
          <a href="./php/login/logout.php">로그아웃</a>
        <?php endif; ?>
      </div>

    </article>

    <article class='h_inner2'>
      <h3>내비게이션</h3>
      <div class="nav_wrap">
        <nav>
            <ul class='gnb'>
            <li>
              <a href="javascript:void(0)" title='영화'>
                영화
              </a>
              <ul class='sub'>
                <li><a href="./php/movie/now_showing.php?title=현재상영작" title='상영작'>상영작</a></li>
                <li><a href="./php/movie/reservation.php?title=예매하기" title='예매하기'>예매하기</a></li>
                <li><a href="./php/movie/reservation_check.php?title=예매확인" title='예매확인'>예매확인</a></li>
              </ul>
            </li>

            <li>
              <a href="javascript:void(0)" title='영화관'>영화관</a>
              <ul class='sub'>
                <li><a href="./php/theater/special.php?title=스페셜관" title='스페셜관'>스페셜관</a></li>
                <li><a href="./php/theater/search_by_region.php?title=지역검색" title='지역검색'>지역검색</a></li>
              </ul>
            </li>

            <li>
              <a href="javascript:void(0)" title='이벤트'>
                이벤트
              </a>
              <ul class='sub'>
                <li><a href="./php/event/event_view.php?title=진행중인 이벤트" title='진행중인 이벤트'>진행중인 이벤트</a></li>
                <li><a href="./php/event/event_list.php?title=이벤트확인" title='이벤트확인'>이벤트확인</a></li>
              </ul>
            </li>

            <li>
              <a href="javascript:void(0)" title='스토어'>
                스토어
              </a>
              <ul class='sub'>
                <li><a href="./php/store/store.php?title=스토어" title='포토카드'>포토카드</a></li>
                <li><a href="./php/store/store.php?title=스토어" title='관람권'>관람권</a></li>
                <li><a href="./php/store/store.php?title=스토어" title='스낵,음료'>스낵,음료</a></li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </article>

        <!-- 영화순위 -->
        <div class='rank'>
          <img src='./images/main/rank.png' alt='영화순위'>
          <ul>
            <li><a href="/롯데시네마/php/ranking/rank.php?title=영화순위" title='승부'>1. 승부</a></li>
            <li><a href="/롯데시네마/php/ranking/rank.php?title=영화순위" title='로비'>2. 로비</a></li>
            <li><a href="/롯데시네마/php/ranking/rank.php?title=영화순위" title='아마추어'>3. 아마추어</a></li>
            <li><a href="/롯데시네마/php/ranking/rank.php?title=영화순위" title='야당'>4. 야당</a></li>
            <li><a href="/롯데시네마/php/ranking/rank.php?title=영화순위" title='미스터 로봇'>5. 미스터 로봇</a></li>
          </ul>
        </div>

  <div class='top'>
    <div>
      <i class="fa-solid fa-magnifying-glass search-icon"></i>
        <!-- 검색박스 -->
        <div class='search_slide'>
          <input type="text" placeholder='검색어를 입력해주세요.'>
        </div>
    </div>
    <div>
      <a href="#" title='top버튼'>
        <i class="fa-solid fa-circle-up"></i>
      </a>
    </div>
  </div>
  </header>


  <!-- 메인영역 -->
  <main>
  <section class='videoslide'>
    <div class='swiper myVideoSwiper'>
      <div class='swiper-wrapper'>

        <div class='swiper-slide'>
          <video muted playsinline>
            <source src='./images/video/video1.mp4' type='video/mp4'>
          </video>
        </div>

        <div class='swiper-slide'>
          <video muted playsinline>
            <source src='./images/video/video2.mp4' type='video/mp4'>
          </video>
        </div>

        <div class='swiper-slide'>
          <video muted playsinline>
            <source src='./images/video/video4.mp4' type='video/mp4'>
          </video>
        </div>

        </div>
        <div class='swiper-button-prev'></div>
        <div class='swiper-button-next'></div>
      </div>
      <div class='video-controls'>
        <a id='btnStart'><i class="fa-solid fa-circle-play"></i></a>
        <a id='btnStop'><i class="fa-solid fa-circle-stop"></i></a>
      </div>
    </div>
  </section>
    <!-- showing_start -->
  <section id="showing">
      <h2>Now Showing</h2>
      <!-- 슬라이드 컨테이너 -->
      <div class="showing-track">
        <!-- 슬라이드 각각: class="slide" -->
        <div class="slide">
          <a href="./php/movie/now_showing.php" title="">
            <img src="./images/MoviePoster/Movie_Poster_01.jpg" alt="포스터1">
          </a>
        </div>
        <div class="slide">
          <a href="./php/movie/now_showing.php" title="">
            <img src="./images/MoviePoster/Movie_Poster_02.jpg" alt="포스터2">
          </a>
        </div>
        <div class="slide">
          <a href="./php/movie/now_showing.php" title="">
            <img src="./images/MoviePoster/Movie_Poster_03.jpg" alt="포스터3">
          </a>
        </div>
        <div class="slide">
          <a href="./php/movie/now_showing.php" title="">
            <img src="./images/MoviePoster/Movie_Poster_04.jpg" alt="포스터4">
          </a>
        </div>
        <div class="slide">
          <a href="./php/movie/now_showing.php" title="">
            <img src="./images/MoviePoster/Movie_Poster_05.jpg" alt="포스터5">
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

  <!-- 2. 스페셜관 -->
  <section id='special'>
    <article class='theater'>
      <h2>Special Theater</h2>
      <div class='specialmovie'>
        <div class='specialbox box1'>
          <a href="./php/theater/special.php">
            <p class='special_title'>수퍼플렉스</p>
            <p>압도적 경험을 만나다.</p>
          </a>
        </div>

        <div class='specialbox box2'>
          <a href="./php/theater/special.php">
            <p class='special_title'>수퍼MX4D</p>
            <p>압도적 4D를 만나다.</p>
          </a>
        </div>

        <div class='specialbox box3'>
          <a href="./php/theater/special.php">
            <p class='special_title'>수퍼LED</p>
            <p>압도적 컬러를 만나다.</p>
          </a>
        </div>

        <div class='specialbox box4'>
          <a href="./php/theater/special.php">
            <p class='special_title'>광음시네마</p>
            <p>폭발적 사운드를 만나다.</p>
          </a>
        </div>
      </div>
    </article>
  </section>

  <!-- 3. 이벤트 -->
  <section id='event'>
    <h2>Event</h2>
    <!-- 영화 이벤트 -->
    <div class="event_list">
      <div class="movie_ev">
        <ul class="m_ev_slide">
          <li>
          <a href="/롯데시네마/php/event/event_view.php" title="영화 이벤트">
              <img src="./images/event/eventbanner/m_banner1.png" alt="승부 스티커 세트 개봉 3주차 현장 증정 이벤트" class="slide_img">
            </a>
          </li>
          <li>
            <a href="/롯데시네마/php/event/event_view.php" title="영화 이벤트">
              <img src="./images/event/eventbanner/m_banner2.png" alt="롯시네 보석발굴 프로젝트 4월 이야기" class="slide_img">
            </a>
          </li>
          <li>
            <a href="/롯데시네마/php/event/event_view.php" title="영화 이벤트">
              <img src="./images/event/eventbanner/m_banner3.png" alt="헤레틱 2주차 주말 증정 이벤트" class="slide_img">
            </a>
          </li>
        </ul>
        <i class="fas fa-angle-left m_l_btn"></i>
        <i class="fas fa-angle-right m_r_btn"></i>
      </div>

      <!-- 혜택 이벤트 -->
      <div class="bonus_ev">
        <ul class="b_ev_slide">
          <li>
            <a href="/롯데시네마/php/event/event_view.php" title="혜택 이벤트">
              <img src="./images/event/eventbanner/b_banner1.png" alt="롯데멤버스 카드 이벤트" class="slide_img">
            </a>
          </li>
          <li>
            <a href="/롯데시네마/php/event/event_view.php" title="혜택 이벤트">
              <img src="./images/event/eventbanner/b_banner2.png" alt="제휴카드 문화누리카드 혜택" data-desktop="" class="slide_img">
            </a>
          </li>
          <li>
            <a href="/롯데시네마/php/event/event_view.php" title="혜택 이벤트">
              <img src="./images/event/eventbanner/b_banner3.png" alt="통신사 혜택" class="slide_img">
            </a>
          </li>
        </ul>
        <i class="fas fa-angle-left b_l_btn"></i>
        <i class="fas fa-angle-right b_r_btn"></i>
      </div>
    </div>
  </section>
  <!-- 4. 스토어 -->
  <!-- 스토어 -->
  <section id="store">
      <div class="store_wrap">
        <h2>Store</h2>
        <div class="store_items">
          <a href="./php/store/store.php" class="st_item" title="산리오 포토카드">
            <img src="./images/store/main_store1.jpg" alt="산리오 포토카드">
            <div class="info">
              <span>산리오 포토카드</span>
              <p>3,000원</p>
            </div>
          </a>
          <a href="./php/store/store.php" class="st_item" title="일반 관람권">
            <img src="./images/store/main_store2.jpg" alt="일반 관람권">
            <div class="info">
              <span>일반 관람권</span>
              <p>13,000원</p>
            </div>
          </a>
          <a href="./php/store/store.php" class="st_item" title="BEST COMBO 교환권">
            <img src="./images/store/main_store3.png" alt="BEST COMBO 교환권">
            <div class="info">
              <span>BEST COMBO 교환권</span>
              <p>12,500원</p>
            </div>
          </a>
        </div>
      </div>
    </section>
  <!-- 스토어 끝 -->
  </main>

  <!-- 푸터영역 -->
  <footer>
    <div class='ran_banner'>
      <a href="#" title='메인랜덤배너'>
        <img src="./images/main/random_banner1.jpg" alt="메인랜덤배너">
      </a>
    </div>

    <ul class='f_gnb'>

      <li class='f_logo'>
          <a href="#" title='하단로고'>
            <img src="./images/main/logo_wht.png" alt="하단로고">
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
    <script src="./js/jquery.js"></script>
    <!-- 1. 현재상영작 -->
    <script src="./js/showing.js"></script> 
    <!-- 3. 이벤트 -->
    <script src='./js/main_event.js'></script>
    <!-- 4.스토어 -->
    <script src='./js/main_store.js'></script>
    <!-- 스와이퍼 -->
    <script src='./js/swiper.js'></script>
    <!-- custom js cdn -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

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


  // pc버전 
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
    
    if($(this).scrollTop() > 100){
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
// 푸터 랜덤배너 
  let ran_n = Math.floor(Math.random()*2)+1;

  const r_img = document.querySelector('.ran_banner img');
  r_img.src='./images/main/random_banner' + ran_n + '.jpg';


  
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


    window.addEventListener("DOMContentLoaded", playCurrentVideo);

    // 시작버튼
    document.getElementById('btnStart').addEventListener("click", () => {
      const currentVideo = videos[swiper.activeIndex];
      currentVideo.play();
    });
    //  정지버튼
    document.getElementById('btnStop').addEventListener("click", () => {
      const currentVideo = videos[swiper.activeIndex];
      currentVideo.pause();
    });

    // 채널 봇
  (function(){var w=window;if(w.ChannelIO){return w.console.error("ChannelIO script included twice.");}var ch=function(){ch.c(arguments);};ch.q=[];ch.c=function(args){ch.q.push(args);};w.ChannelIO=ch;function l(){if(w.ChannelIOInitialized){return;}w.ChannelIOInitialized=true;var s=document.createElement("script");s.type="text/javascript";s.async=true;s.src="https://cdn.channel.io/plugin/ch-plugin-web.js";var x=document.getElementsByTagName("script")[0];if(x.parentNode){x.parentNode.insertBefore(s,x);}}if(document.readyState==="complete"){l();}else{w.addEventListener("DOMContentLoaded",l);w.addEventListener("load",l);}})();

  ChannelIO('boot', {
    "pluginKey": "a3811638-761b-4268-802c-04c89e89ea6b"
  });
  </script>
</body>
</html>