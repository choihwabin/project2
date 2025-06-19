<?php
// ───────────────────────────────────────
//  로그아웃
// ───────────────────────────────────────
include '../../db/dbconn.php';   // session_start 포함

session_unset();     // 세션 변수 모두 해제
session_destroy();   // 세션 파기

header("Location: ../../index.php");
exit;
?>
