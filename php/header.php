<?php
include(dirname(__DIR__).'/db/dbconn.php');   // session_start 포함

/* 세션 값 → 변수 */
$userid = $_SESSION['mb_id']   ?? '';
$name   = $_SESSION['mb_name'] ?? '';

// 타이틀 변수
$title = $_GET['title'] ?? '예매상세';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Happy Memories 롯데시네마는 최상의 관람 환경과 양질의 켄텐츠로 영화를 통해 고객에게 행복한 기억을 선물합니다.">
  <meta name="keywords" content="롯데시네마, LOTTE CINEMA, 롯시, 시네마, CINEMA, 영화, 영화관, 극장, 티켓, 박스오피스, Movie, Theater, 예매, 현재상영작, 상영예정작, 개봉영화, 영화예매, 영화예매순위, 영화순위, 상영시간표">
  <link rel="shortcut icon" href="https://www.lottecinema.co.kr/NLCHS/favicon.ico?v=1" type="image/x-icon">
  <title><?= $title?></title>
  <!-- css -->
  <!-- common.css -->
  <link href='../../css/common.css' rel='stylesheet' type='text/css'>
  <!-- main.css -->
  <!-- <link href='../../css/main.css' rel='stylesheet' type='text/css'> -->
  <!-- sub.css -->
  <link href='../../css/sub.css' rel='stylesheet' type='text/css'>
  <!-- 스와이퍼 -->
  <link href='../../css/swiper.css' rel='stylesheet' type='text/css'>
  <!-- 2.special css -->
  <link href='../../css/special.css' rel='stylesheet' type='text/css'>
  <!-- 4. store.css -->
  <link href='../../css/store.css' rel='stylesheet' type='text/css'>
  <!-- 3. event.css -->
  <link href='../../css/event.css' rel='stylesheet' type='text/css'>
  <!-- 영화순위 rank.css -->
  <link href='../../css/rank.css' rel='stylesheet' type='text/css'>
  <!-- 로그인 form.css -->
  <link href='../../css/form.css' rel='stylesheet' type='text/css'>
  <!-- 멤버십 membership.css -->
  <link href='../../css/membership.css' rel='stylesheet' type='text/css'>
  <!-- 고객센터 inquiry.css -->
  <link href='../../css/inquiry.css' rel='stylesheet' type='text/css'>
  <!-- 폰트어썸cdn -->
  <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css' rel='stylesheet' type='text/css'>
  
  <!-- js -->
  <!-- 스와이퍼 -->
  <script src='../../js/swiper.js'></script>
</head>
<?php 
  if (!empty($page_class)) {
    echo '<body class="' . htmlspecialchars($page_class, ENT_QUOTES) . '">';
  } else {
    echo '<body>';
  }
?>
  <!-- 헤더영역 -->
    <!-- 모바일 토글 -->
    <input type="checkbox" id="m_toggle">
  <!-- 모바일 상단 -->
  <div class="mobile_top">
        <a href="/롯데시네마/index.php" title="뒤로가기">
          <div>
            <img src="../../images/mobile_header/m_back.png" alt="뒤로가기" class="m_top">
          </div>
        </a>

        <a href="/롯데시네마/index.php" title="홈으로가기">
          <div>
            <img src="../../images/mobile_header/m_home.png" alt="메인바로가기" class="m_top">
          </div>
        </a>

        <a href="#" title='상단으로 이동하기'>
          <div>
            <h1><?= $title?></h1>
          </div>
        </a>

        <a href="#">
          <div>
            <img src="../../images/mobile_header/m_search.png" alt="검색하기" class="m_top">
          </div>
        </a>

        <!-- 토글 버튼 -->
        <label for="m_toggle">
            <img src="../../images/mobile_header/m_toggle.png" alt="모바일토글" class='m_top'>
        </label>
  </div>

  <!-- 모바일 네비게이션 -->
  <nav class="m_nav">
    <div class="close_toggle">
        <label for="m_toggle" class="t_close_btn">
            <img src="../../images/mobile_toggle_menu/white_X 1.png" alt="닫기버튼">
        </label>
    </div>

    <div class="m_nav_user">
        <div class="m_nav_user_l">
          <!-- 아이디값이 없을 시  -->
        <?php
            if(!$userid){
            ?>  
            <a href="/롯데시네마/php/login/login.php?title=로그인" title="로그인"><img src="../../images/mobile_toggle_menu/m_login.png" alt="로그인"></a>
            <a href="/롯데시네마/php/login/login.php?title=로그인" title="로그인"><span>로그인하기</span></a>
            <?php
            }else{
              ?>
              <!-- 아이디 값이 있을 시  -->
            <a href="/롯데시네마/php/movie/reservation_check.php?title=예매확인" title="로그인"><img src="../../images/mobile_toggle_menu/m_login.png" alt="로그인"></a>
            <a href="/롯데시네마/php/movie/reservation_check.php?title=예매확인" title='내정보'>
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
            <a href="../ranking/rank.php?title=예매순위" title="순위보기"><span>예매순위</span></a>
            <a href="#" title="옵션"><img src="../../images/mobile_toggle_menu/m_option.png" alt="로그인"></a>
        </div>
    </div>
    <!-- 모바일 네비 메뉴 -->
    <div class="m_nav_con">
        <ul>
            <li class="m_nav_con_item">
                <div class="m_nav_icon"><a href="../movie/now_showing.php?title=현재상영작"><img src="../../images/mobile_toggle_menu/m_movie.png" alt="영화바로가기"></a></div>
                <ul>
                    <li><a href="../movie/now_showing.php?title=현재상영작" title="영화바로가기"><b>영화</b></a></li>
                    <li><a href="../movie/now_showing.php?title=현재상영작" title="상영작">현재 상영작</a></li>
                    <li><a href="../movie/reservation.php?title=예매하기" title="예매하기">예매하기</a></li>
                    <li><a href="../movie/reservation_check.php?title=예매확인" title="예매확인">예매확인</a></li>
                </ul>
            </li>

            <li class="m_nav_con_item">
                <div class="m_nav_icon"><a href="../theater/special.php?title=스페셜관"><img src="../../images/mobile_toggle_menu/m_special.png" alt="스폐셜관바로가기"></a></div>
                <ul>
                    <li><a href="../theater/special.php?title=스페셜관" title="영화관"><b>영화관</b></a></li>
                    <li><a href="../theater/special.php?title=스페셜관" title="스폐셜관">스폐셜관</a></li>
                    <li><a href="../theater/search_by_region.php?title=지역검색" title="지역검색">지역검색</a></li>
                </ul>
            </li>

            <li class="m_nav_con_item">
                <div class="m_nav_icon"><a href="../event/event_view.php?title=이벤트"><img src="../../images/mobile_toggle_menu/m_event.png" alt="이벤트바로가기"></a></div>
                <ul>
                    <li><a href="../event/event_view.php?title=이벤트" title="이벤트"><b>이벤트</b></a></li>
                    <li><a href="../event/event_view.php?title=이벤트 확인" title="이벤트 확인">이벤트 확인</a></li>
                    <li><a href="../event/event_view.php?title=진행중인 이벤트" title="진행중인 이벤트">진행중인 이벤트</a></li>
                </ul>
            </li>

            <li class="m_nav_con_item">
                <div class="m_nav_icon"><a href="../store/store.php?title=스토어"><img src="../../images/mobile_toggle_menu/m_store.png" alt="스토어바로가기"></a></div>
                <ul>
                    <li><a href="../store/store.php?title=스토어" title="스토어"><b>스토어</b></a></li>
                    <li><a href="../store/store.php?title=스토어" title="포토카드">포토카드</a></li>
                    <li><a href="../store/store.php?title=스토어" title="관람권">관람권</a></li>
                    <li><a href="../store/store.php?title=스토어" title="음료/스낵">음료/스낵</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- 모바일 네비 배너 -->
    <div class="m_nav_banner">
        <img src="../../images/mobile_toggle_menu/m_nav_banner.png" alt="배너">
    </div>
    <!-- 모바일 네비 sns -->
    <div class="m_nav_sns">
        <a href="https://www.instagram.com/lottecinema_official/" title="인스타"><img src="../../images/mobile_toggle_menu/m_nav_insta.png" alt="인스타"></a>
        <a href="https://www.facebook.com/LotteCinema.kr" title="페이스북"><img src="../../images/mobile_toggle_menu/m_nav_facebook.png" alt="페이스북"></a>
        <a href="https://www.youtube.com/channel/UCi4KivcV3a3yhkycFsjpalQ" title="유튜브"><img src="../../images/mobile_toggle_menu/m_nav_youtube.png" alt="유튜브"></a>
    </div>

        <!-- 멤버십, 고객센터 -->
        <div class='m_nav_member_inquiry'>
      <a href="/롯데시네마/php/member/membership.php?title=멤버십">
        <i class="fa-solid fa-id-card"></i>
      </a>
      <a href="/롯데시네마/php/support/inquiry.php?title=고객센터">
        <i class="fa-solid fa-headset"></i>
      </a>
    </div>
  </nav>

  <!-- 모바일 탑버튼 -->
  <div class='top'>
    <div>
      <i class="fa-solid fa-magnifying-glass search-icon">
        <!-- 검색박스 -->
        <div class='search_slide'>
          <input type="text" placeholder='검색어를 입력해주세요.'>
        </div>
      </i>
    </div>
    <div>
      <a href="#" title='top버튼'>
        <i class="fa-solid fa-circle-up"></i>
      </a>
    </div>
  </div>

  <header>
    <article class='h_inner'>
      <div class='h_left'>
        <a href="https://www.instagram.com/lottecinema_official/"><i class="fa-brands fa-instagram"></i></a>
        <a href="https://www.facebook.com/LotteCinema.kr/?locale=ja_KS"><i class="fa-brands fa-square-facebook"></i></a>
        <a href="https://www.youtube.com/channel/UCi4KivcV3a3yhkycFsjpalQ"><i class='fa-brands fa-youtube'></i></a>
      </div>

      <h2>
        <a href="/롯데시네마/index.php" title="롯데시네마 메인페이지">
          <img src="../../images/main/logo.png" alt="롯데시네마 메인페이지">
        </a>
      </h2>

      <div class='h_right'>
        <?php if (!$userid): ?>
          <!-- 로그인하지 않은 경우 -->
          <a href="/롯데시네마/php/login/login.php?title=로그인">로그인</a>
          <a href="/롯데시네마/php/member/membership.php?title=멤버십">멤버십</a>
          <a href="/롯데시네마/php/support/inquiry.php?title=고객문의">고객문의</a>
        <?php else: ?>
          <!-- 로그인한 경우 -->
          <span class="welcome" style="color:#333333;">
            <a href="/롯데시네마/php/movie/reservation_check.php?title=예매확인" title='내정보'>
            <?php echo htmlspecialchars($name).'('.htmlspecialchars($userid).')'; ?>님
            </a>
          </span>
          <a href="/롯데시네마/php/support/inquiry.php?title=고객문의">고객문의</a>
          <a href="/롯데시네마/php/login/logout.php">로그아웃</a>
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
              <li><a href="/롯데시네마/php/movie/now_showing.php?title=현재 상영작" title='상영작'>현재 상영작</a></li>
              <li><a href="/롯데시네마/php/movie/reservation.php?title=예매하기" title='예매하기'>예매하기</a></li>
              <li><a href="/롯데시네마/php/movie/reservation_check.php?title=예매확인" title='예매확인'>예매확인</a></li>
            </ul>
          </li>

          <li>
            <a href="javascript:void(0)" title='영화관'>영화관</a>
            <ul class='sub'>
              <li><a href="/롯데시네마/php/theater/special.php?title=스페셜관" title='스페셜관'>스페셜관</a></li>
              <li><a href="/롯데시네마/php/theater/search_by_region.php?title=스페셜관" title='지역검색'>지역검색</a></li>
            </ul>
          </li>

          <li>
            <a href="javascript:void(0)" title='이벤트'>
              이벤트
            </a>
            <ul class='sub'>
              <li><a href="/롯데시네마/php/event/event_view.php?title=진행중인 이벤트" title='진행중인 이벤트'>진행중인 이벤트</a></li>
              <li><a href="/롯데시네마/php/event/event_list.php?title=이벤트확인" title='이벤트확인'>이벤트확인</a></li>
            </ul>
          </li>

          <li>
            <a href="javascript:void(0)" title='스토어'>
              스토어
            </a>
            <ul class='sub'>
              <li><a href="/롯데시네마/php/store/store.php?title=스토어" title='포토카드'>포토카드</a></li>
              <li><a href="/롯데시네마/php/store/store.php?title=스토어" title='관람권'>관람권</a></li>
              <li><a href="/롯데시네마/php/store/store.php?title=스토어" title='스낵,음료'>스낵,음료</a></li>
            </ul>
          </li>
        </ul>
      </nav>
    </div> 
  </article>

  <!-- 영화순위 -->
  <div class='rank'>
    <img src='../../images/main/rank.png' alt='영화순위'>
      <ul>
        <li><a href="/롯데시네마/php/ranking/rank.php?title=영화순위" title='승부'>1. 승부</a></li>
        <li><a href="/롯데시네마/php/ranking/rank.php?title=영화순위" title='로비'>2. 로비</a></li>
        <li><a href="/롯데시네마/php/ranking/rank.php?title=영화순위" title='아마추어'>3. 아마추어</a></li>
        <li><a href="/롯데시네마/php/ranking/rank.php?title=영화순위" title='야당'>4. 야당</a></li>
        <li><a href="/롯데시네마/php/ranking/rank.php?title=영화순위" title='미스터 로봇'>5. 미스터 로봇</a>
        </li>
      </ul>
  </div>

  <div class='top'>
    <div>
      <i class="fa-solid fa-magnifying-glass search-icon">
        <!-- 검색박스 -->
        <div class='search_slide'>
          <input type="text" placeholder='검색어를 입력해주세요.'>
        </div>
      </i>
    </div>
    <div>
      <a href="#" title='top버튼'>
        <i class="fa-solid fa-circle-up"></i>
      </a>
    </div>
  </div>

  </header>