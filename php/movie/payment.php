<?php
$page_class = "page-payment";
include '../../db/dbconn.php';   // 세션 + DB

/* ★ 로그인 아이디 확보 */
$mb_id = $_SESSION['mb_id'] ?? '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    /* ── 결제완료 버튼을 눌렀을 때 ───────────────── */
    if (isset($_POST['confirm_payment']) && $_POST['confirm_payment'] === 'yes') {

        $movie   = $_POST['movie'];
        $date    = $_POST['date'];
        $time    = $_POST['time'];
        $region  = $_POST['region'];
        $special = $_POST['special'] ?? '';

        /* ★ mb_id 컬럼까지 INSERT */
        $sql = "INSERT INTO reservations
                (mb_id, movie, date, time, region, special)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        /* ★ 바인딩도 6개 */
        mysqli_stmt_bind_param($stmt, $mb_id, $movie, $date, $time, $region, $special);

        if (mysqli_stmt_execute($stmt)) {
            $inserted_id = mysqli_insert_id($conn);
            header("Location: reservation_check.php?id=".$inserted_id);
            exit;
        } else {
            die("예약 저장 실패: ".mysqli_error($conn));
        }

    /* ── 결제화면 처음 진입(예매 정보 전달) ──────── */
    } else {
        if (empty($_POST['movie']) || empty($_POST['time']) || empty($_POST['special'])) {
            echo "<script>alert('필수 항목(영화/시간/스페셜관)을 선택해주세요.'); history.back();</script>";
            exit;
        }
        $movie   = $_POST['movie'];
        $date    = $_POST['date'];
        $time    = $_POST['time'];
        $region  = $_POST['region'];
        $special = $_POST['special'] ?? '';
    }

} else {
    header("Location: reservation.php");
    exit;
}

include('../header.php');
?>

  <title>결제하기</title>
   <!-- 공통 SCSS -->
   <link rel="stylesheet" href="../../css/movie_reser.css">
   <link rel="stylesheet" href="../../css/movie_reser_mid.css">
    <script>
    // 클라이언트 측 유효성 검사
    function validatePaymentForm() {
      // 결제수단 라디오 버튼 체크 확인
      const payMethodRadios = document.querySelectorAll('input[name="payMethod"]');
      let isPayMethodSelected = false;
      for (let radio of payMethodRadios) {
        if (radio.checked) {
          isPayMethodSelected = true;
          break;
        }
      }
      if (!isPayMethodSelected) {
        alert("결제수단을 선택해주세요.");
        return false; // 폼 제출 막기
      }
      return true; // 통과
    }

    function processPayment(){
      // 결제하기 버튼 클릭 시 JS 유효성 검사
      if (!validatePaymentForm()) {
        return; 
      }
      // 검사 통과하면 hidden input(confirm_payment) 설정 후 폼 제출
      document.getElementById('confirm_payment').value = 'yes';
      document.getElementById('paymentForm').submit();
    }
  </script>

<div class="category">
        <a href="../../index.php" title="메인바로가기">홈</a> &#47; <a href="now_showing.php">영화</a> &#47; <a href="payment.php">결제하기</a>
    </div>
  <!-- 박스 밖 제목 -->
  <h1 class="main-title">결제하기</h1>

  <form id="paymentForm" action="payment.php" method="post">
    <!-- DB 처리를 위한 hidden 필드 -->
    <input type="hidden" name="movie" value="<?php echo htmlspecialchars($movie); ?>">
    <input type="hidden" name="date" value="<?php echo htmlspecialchars($date); ?>">
    <input type="hidden" name="time" value="<?php echo htmlspecialchars($time); ?>">
    <input type="hidden" name="region" value="<?php echo htmlspecialchars($region); ?>">
    <input type="hidden" name="special" value="<?php echo htmlspecialchars($special); ?>">
    <input type="hidden" name="confirm_payment" id="confirm_payment" value="">

    <div class="payment-wrapper">

      <!-- 영화/시간/스페셜관 -->
      <div class="info-section">
        <p class="movie-label">영화</p>
        <p class="movie-value"><?php echo htmlspecialchars($movie); ?></p>
        <div class="info-row">
          <div class="info-col">
            <p class="label">시간</p>
            <p class="value"><?php echo htmlspecialchars($time); ?></p>
          </div>
          <div class="info-col">
            <p class="label">스페셜관</p>
            <p class="value"><?php echo htmlspecialchars($special); ?></p>
          </div>
        </div>
      </div>

      <!-- 쿠폰 -->
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
        <label>결제수단</label>
        <br><br>
        <input type="radio" name="payMethod" value="naver" id="naver">
        <label for="naver">네이버페이</label>
        <input type="radio" name="payMethod" value="card" id="card">
        <label for="card">카드</label>
        <input type="radio" name="payMethod" value="member" id="member">
        <label for="member">멤버십</label>
        <input type="radio" name="payMethod" value="kakao" id="kakao">
        <label for="kakao">카카오페이</label>
      </div>

      <!-- 적립 -->
      <div class="accumulate-section">
  <label class="visually-hidden">적립</label> <!-- 화면에서는 숨기되, 구조는 유지 -->
  
  <!-- 상단: 가운데 정렬 -->
  <div class="accumulate-lpoint">
    <label><input type="checkbox" name="lpoint"> L.Point</label>
  </div>
  
  <!-- 하단: 두 개 가로 배치 -->
  <div class="accumulate-others">
    <label><input type="checkbox" name="cardNum"> 카드번호 적립</label>
    <label><input type="checkbox" name="idcheck"> ID 적립</label>
  </div>
</div>

      <!-- 결제금액 & 버튼 (한 줄) -->
      <div class="amount-section">
        <!-- 왼쪽: 결제금액 텍스트 + 상품/할인/합계 -->
        <div class="amount-left">
          <div class="amount-title">결제금액</div>
          <div class="amount-detail" style="margin-left:30px;">
            <!-- 상품금액 -->
            <div class="label-group">
              <p class="top-label">상품금액</p>
              <p class="num">21,000</p>
            </div>
            <!-- 기호 '-' -->
            <span class="symbol">-</span>
            <!-- 할인금액 -->
            <div class="label-group">
              <p class="top-label">할인금액</p>
              <p class="num">8,000</p>
            </div>
            <!-- 기호 '=' -->
            <span class="symbol">=</span>
            <!-- 합계 -->
            <div class="label-group">
              <p class="top-label">합계</p>
              <p class="num">13,000</p>
            </div>
          </div>
        </div>

        <!-- 오른쪽: + 결제완료 버튼 -->
        <button type="button" class="pay-button" onclick="processPayment()">+ 결제완료</button>
      </div>

    </div> <!-- //payment-wrapper -->
  </form>
  <script>
function processPayment() {
  // 유효성 검사
  if (!validatePaymentForm()) {
    return; 
  }
  // confirm_payment hidden 필드에 'yes' 설정
  document.getElementById('confirm_payment').value = 'yes';

  // 폼 제출 (서버에서 처리 후 reservation_check.php로 이동됨)
  document.getElementById('paymentForm').submit();
}
  </script>

<?php include ('../footer.php'); ?>