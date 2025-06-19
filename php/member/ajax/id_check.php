<?php 
  include('../../../db/dbconn.php'); //DB연결

  // 공백이 아닌 입력한 ID값
  $log_id = trim($_POST['log_id']);

  // 저장된 DB의 ID값
  $sql = "SELECT * FROM ltc_member WHERE mb_id = '$log_id';";
  $result = mysqli_query($conn, $sql);

  // 값 비교
  if(mysqli_num_rows($result) > 0) { //총 레코드 수(일치하는 데이터)가 1개라도 있을 경우
    echo "false"; //사용불가 (중복 데이터 존재)
  } else {
    echo "ok"; //사용가능
  }

  mysqli_close($conn); //연결종료
?>