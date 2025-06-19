<?php 
  // event_input.php
  // event_mg.php의 양식에서 입력받은 값을 DB에 등록하기 위한 파일

  include('../../../db/dbconn.php'); //DB연결

  // 폼 양식으로 입력받은 값
  $ev_name = trim($_POST['ev_name']); //이벤트명
  $ev_cate = $_POST['ev_cate']; //이벤트 카테고리
  $ev_img = $_FILES['ev_img']['name']; //이벤트 이미지
  $ev_start = trim($_POST['ev_start']); //이벤트 시작일
  $ev_limit = trim($_POST['ev_limit']); //이벤트 종료일

  // echo $ev_name . "<br>" . $ev_cate . "<br>" . $ev_img . "<br>" . $ev_start . "<br>" . $ev_limit;

  // 이미지 업로드 폴더
  if($_POST['action'] == 'Upload') {
    $uploaded_file_name_tmp = $_FILES['ev_img']['tmp_name']; // 임시 파일명
    $uploaded_file_name = $_FILES['ev_img']['name']; //파일명
    $upload_folder = '../../../images/event/eventlist/';
  }

  // 해당 폴더에 이미지 업로드
  move_uploaded_file($uploaded_file_name_tmp, $upload_folder . $uploaded_file_name);
  
  $img = $_FILES['ev_img']['name'];
  echo $img . "<br>";
  echo "<img src='../../../images/event/eventlist/" . htmlspecialchars($img) . "'>";

  date_default_timezone_set('Asia/Seoul'); //서울 시간 기준으로 설정

  // SQL쿼리
  $sql = "INSERT INTO ltc_event (ev_name, ev_cate, ev_img, ev_start, ev_limit) VALUES ('$ev_name', '$ev_cate', '$ev_img', '$ev_start', '$ev_limit');";

  $result = mysqli_query($conn, $sql); //실행

  // 성공 여부
  if($result) {
    echo "<script>alert('등록 완료되었습니다. 입력 페이지로 돌아갑니다.')</script>";
    echo "<script>location.replace('./event_mg.php');</script>";
    exit;
  } else {
    echo "등록 실패" . mysqli_error($conn);
  }

  // DB 접속종료
  mysqli_close($conn);
  exit;
?>