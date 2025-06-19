<?php 
  // register_update.php //회원가입 삽입,삭제
  include('../../db/dbconn.php'); //DB연결

  // 입력한 값
  $log_name = $_POST['log_name']; //회원명
  $log_id = $_POST['log_id']; //아이디
  $log_pw = $_POST['log_pw']; //비밀번호
  $log_region = $_POST['log_region']; //지역
  $log_email = $_POST['log_email']; //이메일
  $log_phone = $_POST['log_phone']; //전화번호

  // 비밀번호 암호화
  $log_pw_sec = password_hash($log_pw, PASSWORD_DEFAULT);

  // 가입시간 서울 지역시 기준으로 조정
  date_default_timezone_set('Asia/Seoul');
  $date_timezone = date('Y-m-d H:i:s', time());

  // SQL쿼리문(삽입)
  $sql = "INSERT INTO ltc_member(mb_name, mb_id, mb_password, mb_region, mb_email, mb_phone, mb_datetime) VALUES('$log_name', '$log_id', '$log_pw_sec', '$log_region', '$log_email', '$log_phone', '$date_timezone');";

  $result = mysqli_query($conn, $sql);

  mysqli_close($conn); //연결종료

  // 연결 종료 후, 회원가입 정상 완료시
  if($result) {
    echo "<script>alert('등록 완료했습니다. 로그인 페이지로 이동합니다.');</script>";
    echo "<script>location.replace('../login/login.php');</script>";
  }

  mysqli_close($conn);
?>