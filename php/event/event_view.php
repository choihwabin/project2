<?php 
  // 이벤트 사진, 내용, 기한이 입력되고,
  // 입력된 기한을 기준으로 달력에서 표시되도록.
  
  include('../../db/dbconn.php'); //DB연결

  //헤더영역 php 연결
  include('../header.php');
?>

  <!-- 메인 영역 -->
  <main>
    <div id="event_view">
      <span id="breadcrumb">홈/이벤트</span>
      
      <section class="date_cal">
        <a href="#" title="이전" id="prev_date"><i class="fas fa-chevron-left"></i></a>
        <h2 id="ev_date_day"></h2> <!--2025년 04월 07일-->
        <a href="#" title="다음" id="next_date"><i class="fas fa-chevron-right"></i></a>
      </section>
      <div id="event">
        <section class="event_top">
          <h2>이벤트</h2>
          <a href="https://www.lottecinema.co.kr/NLCHS/Event/WinnerList" title="당첨자발표">당첨자발표</a> <!-- 당첨자 발표 페이지로 이동 -->
          <a href="https://www.lottecinema.co.kr/NLCHS/Event" title="전체보기">전체보기</a> <!-- 전체 이벤트 페이지로 이동 -->
        </section>
        <section class="event_list" id="event-result">
          <h3 class="none">이벤트 리스트</h3>
          <!-- 이벤트 (AJAX 응답으로 출력) -->
        </section>
      </div>
    </div>
  </main>
  
  <?php 
  //푸터영역 php 연결
  include('../footer.php');
  ?>

<!-- 스크립트 / event.js : footer.php에 포함 -->