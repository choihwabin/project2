<?php
session_start();
$page_class = "page-payment";   // body 클래스용 변수

// DB 연결 (세션 포함)
include '../../db/dbconn.php';

// POST 요청 처리
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // 결제완료 버튼을 눌렀을 때
    if (isset($_POST['confirm_payment']) && $_POST['confirm_payment'] === 'yes') {

        $mb_id   = $_SESSION['mb_id'] ?? '';
        $movie   = $_POST['movie'];
        $date    = $_POST['date'];
        $time    = $_POST['time'];
        $region  = $_POST['region'];
        $special = $_POST['special'] ?? '';

        // INSERT 쿼리 준비
        $sql = "INSERT INTO reservations
                (mb_id, movie, `date`, `time`, region, special)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        if (! $stmt) {
            die("MySQL prepare error: " . mysqli_error($conn));
        }

        mysqli_stmt_bind_param(
            $stmt,
            "ssssss",
            $mb_id,
            $movie,
            $date,
            $time,
            $region,
            $special
        );

        if (mysqli_stmt_execute($stmt)) {
            // 저장 성공하면 확인 페이지로 리디렉션
            $inserted_id = mysqli_insert_id($conn);
            header("Location: reservation_check.php?id=" . $inserted_id);
            exit;
        } else {
            die("예약 저장 실패: " . mysqli_error($conn));
        }

    }  // ← confirm_payment if 닫기

}  // ← POST if 닫기

// 여기서부터 출력
include '../header.php';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>결제하기</title>
  <link rel="stylesheet" href="../../css/movie_reser.css">
  <link rel="stylesheet" href="../../css/movie_reser_mid.css">
  <script src="../../js/jquery.js"></script>
</head>
<body>

<div class="category">
  <a href="../../index.php" title="메인바로가기">홈</a> &#47;
  <a href="now_showing.php">영화</a> &#47;
  <a href="payment.php">결제하기</a>
</div>

<h1 class="main-title">결제하기</h1>

<form id="paymentForm" action="payment.php" method="post">
  <!-- DB 처리를 위한 hidden 필드 -->
  <input type="hidden" name="movie"   value="<?php echo htmlspecialchars($movie ?? ''); ?>">
  <input type="hidden" name="date"    value="<?php echo htmlspecialchars($date  ?? ''); ?>">
  <input type="hidden" name="time"    value="<?php echo htmlspecialchars($time  ?? ''); ?>">
  <input type="hidden" name="region"  value="<?php echo htmlspecialchars($region  ?? ''); ?>">
  <input type="hidden" name="special" value="<?php echo htmlspecialchars($special ?? ''); ?>">
  <input type="hidden" name="confirm_payment" id="confirm_payment" value="">

  <div class="payment-wrapper">

    <!-- 영화 / 시간 / 스페셜관 -->
    <div class="info-section">
      <p class="movie-label">영화</p>
      <p class="movie-value"><?php echo htmlspecialchars($movie ?? ''); ?></p>
      <div class="info-row">
        <div class="info-col">
          <p class="label">시간</p>
          <p class="value"><?php echo htmlspecialchars($time ?? ''); ?></p>
        </div>
        <div class="info-col">
          <p class="label">스페셜관</p>
          <p class="value"><?php echo htmlspecialchars($special ?? ''); ?></p>
        </div>
      </div>
    </div>

    <!-- 쿠폰 선택 -->
    <div class="coupon-section">
      <label for="couponSelect" class="coupon-lb">쿠폰</label>
      <select name="coupon" id="couponSelect">
        <option value="none">-- 쿠폰 선택 --</option>
        <option value="할인쿠폰1">할인쿠폰1</option>
        <option value="할인쿠폰2">할인쿠폰2</option>
      </select>
    </div>

    <!-- 결제수단 -->
    <div class="paymethod-section">
      <p>결제수단</p>
      <input type="radio" name="payMethod" value="naver"  id="naver">
      <label for="naver">네이버페이</label>
      <input type="radio" name="payMethod" value="card"   id="card">
      <label for="card">카드</label>
      <input type="radio" name="payMethod" value="member" id="member">
      <label for="member">멤버십</label>
      <input type="radio" name="payMethod" value="kakao"  id="kakao">
      <label for="kakao">카카오페이</label>
    </div>

    <!-- 적립 -->
    <div class="accumulate-section">
      <div class="accumulate-lpoint">
        <label><input type="checkbox" name="lpoint"> L.Point</label>
      </div>
      <div class="accumulate-others">
        <label><input type="checkbox" name="cardNum"> 카드번호 적립</label>
        <label><input type="checkbox" name="idcheck"> ID 적립</label>
      </div>
    </div>

    <!-- 결제금액 & 버튼 -->
    <div class="amount-section">
      <div class="amount-left">
        <div class="amount-title">결제금액</div>
        <div class="amount-detail">
          <div class="label-group">
            <p class="top-label">상품금액</p>
            <p class="num">21,000</p>
          </div>
          <span class="symbol">-</span>
          <div class="label-group">
            <p class="top-label">할인금액</p>
            <p class="num">8,000</p>
          </div>
          <span class="symbol">=</span>
          <div class="label-group">
            <p class="top-label">합계</p>
            <p class="num">13,000</p>
          </div>
        </div>
      </div>

      <button type="button" class="pay-button" onclick="processPayment()">+ 결제완료</button>
    </div>

  </div>
</form>

<script>
  function validatePaymentForm() {
    const radios = document.querySelectorAll('input[name="payMethod"]');
    if (![...radios].some(r=>r.checked)) {
      alert("결제수단을 선택해주세요.");
      return false;
    }
    return true;
  }

  function processPayment() {
    if (!validatePaymentForm()) return;
    document.getElementById('confirm_payment').value = 'yes';
    document.getElementById('paymentForm').submit();
  }
</script>

<?php include '../footer.php'; ?>
</body>
</html>
