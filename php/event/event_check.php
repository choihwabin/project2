<?php 
  // event_check.php
  
  include('../../db/dbconn.php'); // DB 연결

  // 시간대 조정
  date_default_timezone_set('Asia/Seoul');

  // POST로 응답 받기 전 (오늘 날짜일때 출력하도록)
  $input_date = $_POST['ev_date'] ?? date('Y-m-d');

  // 날짜 출력 (POST로 전달받은 경우만 출력)
  // if (isset($_POST['ev_date'])) {
    // $input_date = $_POST['ev_date']; //yyyy-mm-dd형식

    $sql = "SELECT * FROM ltc_event";
    $result = mysqli_query($conn, $sql);

    $html = ''; //event_view.php에 html 코드로 이벤트 리스트 출력을 위함

    // 반복문을 통한 DB와의 연결을 통한 출력
    while($row = mysqli_fetch_assoc($result)) {
      // 날짜 비교 - 시작일,종료일 DateTime 객체 //20250418 형식
      $startdate = DateTime::createFromFormat('Ymd', $row['ev_start']); //시작일
      $enddate = DateTime::createFromFormat('Ymd', $row['ev_limit']); //종료일
      // DateTime::createFromFormat - 지정된 형식에 따라 시간 문자열 구문 분석
      $select_date = new DateTime($input_date); // 지정한 날짜 (클릭으로 변하는 날짜)
      $today = new DateTime(); //오늘 날짜

      // 날짜 비교를 통해 해당되는 구간만 출력
      if(($select_date)->format('Y-m-d') >= ($startdate)->format('Y-m-d') && ($select_date)->format('Y-m-d') <= ($enddate)->format('Y-m-d')) {
        // 시작일이 오늘보다 이전이고, 종료일이 오늘보다 이후일 때만 출력
        // ->format('Y-m-d'): DateTime 객체에서 날짜만 추출하여 비교(시간 무시) //입력을 해야 시작,종료일이 같은 것도 출력

        $ev_mark = ''; //이벤트 진행여부 마커 표시

        // 이벤트 종료일을 기준으로 오늘 날짜와 비교하여 분류, 해당 스타일 지정
        if($today < $startdate) {
          // 시작일 > 오늘 일때 (진행 예정일 경우)
          $ev_mark = "<span class='ev_plan'>진행예정</span>";
        } else if ($today > $enddate) {
          // 오늘 > 종료일 일때 (일자가 지난 경우)
          $ev_mark = "<span class='ev_end'>종료</span>";
        } else {
          // 시작일 >= 오늘 <= 종료일 일때 (지금 진행 중)
          $ev_mark = "<span class='ev_ing'>진행중</span>";
        }

        // 출력할 내용들 변수선언
        $ev_name = htmlspecialchars($row['ev_name']); //이벤트명
        $ev_img = htmlspecialchars($row['ev_img']); //이미지 파일(eventlist00.jpg)
        $ev_cate = htmlspecialchars($row['ev_cate']); //이벤트 분류
        $ev_start = implode(".", [substr($row['ev_start'], 0, 4), substr($row['ev_start'], 4, 2), substr($row['ev_start'], 6, 2)]); //이벤트 시작일(2025.04.18)
        $ev_limit = implode(".", [substr($row['ev_limit'], 0, 4), substr($row['ev_limit'], 4, 2), substr($row['ev_limit'], 6, 2)]); //이벤트 만료일(2025.04.18)
        // implode()를 통해 배열 연결하며 문자 삽입, substr()을 통해 문자열 배열로 분배(4-2-2)

        // 나머지 내용 출력
        $html .= "
          <article class='card'>
            <h3 class='none'>{$ev_name}</h3>
            <div class='img_wrap'>
              {$ev_mark}
              <a href='https://www.lottecinema.co.kr/NLCHS/Event#none' title='{$ev_name}'>
                <img src='../../images/event/eventlist/{$ev_img}' alt='{$ev_name}'>
              </a>
            </div>
            <div class='ev_txt'>
              <p class='ev_tag'>{$ev_cate}</p>
              <p class='ev_limit'>
                <span class='ev_startdate'>{$ev_start}</span> 
                &#126;
                <span class='ev_enddate'>{$ev_limit}</span>
              </p>
            </div>
          </article>
        ";
      }
    }
    // .= 연산자 : 접합한 값을 왼쪽 변수에 할당
    
    echo $html ?: "<p>선택한 날짜에 해당하는 이벤트가 없습니다.</p>";
    /*
      ?: 연산자 : null 병합 또는 삼항 연산자의 축약 버전

      $html이 비어 있지 않으면 (null, false, 0, "", "0", [] 등이 아니면) → $html을 출력
      그렇지 않으면 → "<p>선택한 날짜에 해당하는 이벤트가 없습니다.</p>"를 출력
    */
  // }

  error_log("event_check.php 정상 실행됨");

?>