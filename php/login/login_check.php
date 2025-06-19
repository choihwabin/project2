<?php
// ───────────────────────────────────────
//  로그인 처리
// ───────────────────────────────────────
include('../../db/dbconn.php');   // session_start 포함

$log_id = trim($_POST['log_id']);
$log_pw = trim($_POST['log_pw']);

/* 1. 아이디 조회 */
$sql  = "SELECT * FROM ltc_member WHERE mb_id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $log_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);

if (!$row) {
  echo "<script>alert('존재하지 않는 아이디입니다.'); history.back();</script>";
  exit;
}

/* 2. 비밀번호 검증 */
if (!password_verify($log_pw, $row['mb_password'])) {
  echo "<script>alert('비밀번호가 일치하지 않습니다.'); history.back();</script>";
  exit;
}

/* 3. 세션 값 저장 (아이디 + 이름) */
$_SESSION['mb_id']   = $row['mb_id'];
$_SESSION['mb_name'] = $row['mb_name'];

/* 4. 이동 */
if ($log_id === 'admin') {
  header("Location: ../admin/admin.php");
} else {
  header("Location: ../../index.php");
}
exit;
?>
