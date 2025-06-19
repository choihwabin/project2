<?php 
  // 관리자 _ 콘텐츠 관리 - 이벤트 관리 (등록 및 수정)
  // 이벤트 등록 페이지
  
  include('../../../db/dbconn.php'); //DB연결

  // 이벤트 관련 DB 생성 SQL(테이블 설계)
  /* // 필요한 내용 : ID(생성순), 이벤트명, 이벤트 이미지, 시작일, 종료일, 카테고리(분류)
    CREATE TABLE ltc_event (
    no int(10) not null auto_increment primary key,
    ev_name varchar(50) not null, 
    ev_cate varchar(50) not null, 
    ev_img varchar(100) not null, 
    ev_start int(10) not null, 
    ev_limit int(10) not null,
    ev_datetime datetime default current_timestamp()
    );
  */
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>이벤트 관리_등록</title>
</head>
<body>
  <form action="./event_input.php" method="post" name="event management" onsubmit="return form_check();" enctype="multipart/form-data">
    <fieldset>
      <legend>이벤트 등록</legend>
      <p>전부 필수 입력사항</p>
      <div>
        <label for="ev_name">이벤트명</label>
        <input type="text" id="ev_name" name="ev_name" maxlength="50">
      </div>
      <div>
        <label for="ev_cate">이벤트 카테고리</label>
        <select name="ev_cate" id="ev_cate">
          <option value="">카테고리 선택</option>
          <option value="영화">영화(시사회/무대인사/상영회)</option>
          <option value="혜택">혜택(할인 등)</option>
          <option value="증정">증정(개봉기념 등)</option>
          <option value="기획전/프로젝트/라인업">기획전/프로젝트/라인업</option>
          <option value="스토어">스토어</option>
        </select>
      </div>
      <div>
        <label for="ev_img">이벤트 이미지</label>
        <input type="file" name="ev_img" id="ev_img">
        <?php 
          if(!isset($_POST['ev_img'])) {
            echo "";
          } else {
            echo "<img src='../../../images/event/" . htmlspecialchars($ev_img) . "'>";
          }
        ?>
      </div>
      <div>
        <label for="ev_start">이벤트 시작일</label>
        <input type="datetime" name="ev_start" id="ev_start" placeholder="20250415" maxlength="8">
      </div>
      <div>
        <label for="ev_limit">이벤트 종료일</label>
        <input type="datetime" name="ev_limit" id="ev_limit" placeholder="20250415" maxlength="8"> <!--일부 이벤트 종료일이 없는 경우(2099년 등으로 표시됨)도...-->
      </div>
      <div>
        <input type="submit" value="Upload" name="action">
        <input type="reset" value="Cancel">
      </div>
    </fieldset>
  </form>

  <!-- 스크립트 -->
  <script>
    // 유효성 검사
    function form_check() {
      if(!document.getElementById('ev_name').value) {
        alert('이벤트 명칭을 기입해주세요');
        ev_name.focus();
        return false;
      }
      if(!document.getElementById('ev_cate').value) {
        alert('카테고리를 분류해주세요');
        ev_cate.focus();
        return false;
      }
      if(!document.getElementById('ev_img').value) {
        alert('이벤트에 표시될 이미지를 등록해주세요');
        return false;
      }
      if(!document.getElementById('ev_start').value) {
        alert('이벤트가 시작될 날을 선택해주세요');
        ev_start.focus();
        return false;
      }
      if(!document.getElementById('ev_limit').value) {
        alert('이벤트가 종료될 날을 입력해주세요');
        ev_limit.focus();
        return false;
      }
      return true;
    }
  </script>
</body>
</html>