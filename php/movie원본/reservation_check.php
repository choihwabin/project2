<?php
$page_class = "page-reservation-list";
/* ───────────────────────────────────────
   예매 확인 (상세 + 목록)
   ─────────────────────────────────────── */
include '../../db/dbconn.php';
include('../header.php');
echo "<link href='../../css/reservation_list.css' rel='stylesheet' type='text/css'>";

/* 1) 로그인 체크 */
if (empty($_SESSION['mb_id'])) {
  echo "<script>alert('로그인이 필요합니다.'); history.back();</script>";
  exit;
}
$mb_id = $_SESSION['mb_id'];

/* 2) 상세(or 목록)용 쿼리 준비 */
if (isset($_GET['id'])) {
  /* ── 단건 상세 ── */
  $id  = intval($_GET['id']);
  $sql = "SELECT * FROM reservations WHERE id = ? AND mb_id = ?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "is", $id, $mb_id);
} else {
  /* ── 내 예매 목록 ── */
  $sql  = "SELECT * FROM reservations WHERE mb_id = ? ORDER BY date ASC, time ASC";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "s", $mb_id);
}
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

echo "<main class='my-res'>";

/* ───────────────────────────────────────
   [A] 단건 상세 페이지
   ─────────────────────────────────────── */
if (isset($_GET['id'])) {
  $row = mysqli_fetch_assoc($result);
  if (!$row) die("예약이 없거나 권한이 없습니다.");

  /* (1) 포스터 파일 매핑 */
  $posterMap = [
"너의 이름은"                       => "Movie_Poster_01.jpg",
  "날씨의 아이"                       => "Movie_Poster_02.jpg",
  "패왕별희"                          => "Movie_Poster_03.jpg",
  "위플래쉬"                          => "Movie_Poster_04.jpg",
  "너의 췌장을 먹고싶어"              => "Movie_Poster_05.jpg",
  "스즈메의 문단속"                  => "Movie_Poster_06.jpg",
  "추락의 해부"                      => "Movie_Poster_07.jpg",
  "악은 존재하지 않는다"             => "Movie_Poster_08.jpg",
  "존 오브 인터레스트"              => "Movie_Poster_09.jpg",
  "퍼펙트 데이즈"                    => "Movie_Poster_10.jpg",
  "러브 라이즈 블리딩"               => "Movie_Poster_11.jpg",
  "수카바티:극락축구단"              => "Movie_Poster_12.jpg",
  "장손"                             => "Movie_Poster_13.jpg",
  "해야 할 일"                       => "Movie_Poster_14.jpg",
  "백설공주"                          => "Movie_Poster_15.jpg",
  "패션 오브 크라이스트"             => "Movie_Poster_16.jpg",
  "되살아나는 목소리"                => "Movie_Poster_17.jpg",
  "아침바다갈매기는"                 => "Movie_Poster_18.jpg",
  "미키 17"                          => "Movie_Poster_19.jpg",
  "제로썸"                           => "Movie_Poster_20.jpg",
  "괜찮아?괜찮아,괜찮아!"            => "Movie_Poster_21.jpg",
  "검은 수녀들"                      => "Movie_Poster_22.jpg",
  "퇴마록"                           => "Movie_Poster_23.jpg",
  "미스터 로봇"                      => "Movie_Poster_24.jpg",
  "콘클라베"                         => "Movie_Poster_25.jpg",
  "에밀리아 페레즈"                  => "Movie_Poster_26.jpg",
  "브레겐츠 페스티벌 마탄의 사수"    => "Movie_Poster_27.jpg",
  "플로우"                           => "Movie_Poster_28.jpg",
  "200%울프"                         => "Movie_Poster_29.jpg",
  "케이온"                           => "Movie_Poster_30.jpg",
  "침범"                             => "Movie_Poster_31.jpg",
  "초혼-다시 부르는 노래"           => "Movie_Poster_32.jpg",
  "스트리밍"                          => "Movie_Poster_33.jpg",
  "승부"                             => "Movie_Poster_34.jpg",
  "고독한 미식가 더 무비"            => "Movie_Poster_35.jpg",
  "프랑켄슈타인 아버지"              => "Movie_Poster_36.jpg",
  "컴패니언"                          => "Movie_Poster_37.jpg",
  "예언자"                           => "Movie_Poster_38.jpg",
  "끝, 새로운 시작"                  => "Movie_Poster_39.jpg",
  "본회퍼"                           => "Movie_Poster_40.jpg",
  "베러맨"                           => "Movie_Poster_41.jpg",
  "로비"                             => "Movie_Poster_42.jpg",
  "남으로 가는 길"                   => "Movie_Poster_43.jpg",
  "헤레틱"                           => "Movie_Poster_44.jpg",
  "해피엔드"                         => "Movie_Poster_45.jpg",
  "부전시장"                         => "Movie_Poster_46.jpg",
  "크래쉬: 디렉터스컷"               => "Movie_Poster_47.jpg",
  "아마추어"                         => "Movie_Poster_48.jpg",
  "목소리들"                         => "Movie_Poster_49.jpg",
  "류이치사카모토:플레잉 디 오케스트라 2014" => "Movie_Poster_50.jpg",
  // 필요시 추가...
  ];
  $defaultPoster = "Movie_Poster_01.jpg";
  $posterFile = $posterMap[$row['movie']] ?? $defaultPoster;
  $posterPath = "../../images/MoviePoster/" . $posterFile;

  /* (2) 티켓번호 */
  $ticketCode = str_pad($row['id'], 9, "0", STR_PAD_LEFT);

  /* (3) 상세 레이아웃 (기존 디자인 유지) */
  ?>

  <!-- 예약 공통 CSS (res_c1와 동일) -->
<link rel="stylesheet" href="../../css/movie_reser.css" />
<link rel="stylesheet" href="../../css/movie_reser_mid.css" />

<div class="category">
        <a href="../../index.php" title="메인바로가기">홈</a> &#47; <a href="now_showing.php">영화</a> &#47; <a href="reservation_check.php">예매확인</a>
    </div>

  <h1 class="main-title">예매 확인</h1>

  <div class="ticket-container">
    <div class="ticket-title">Movie Ticket</div>
    <div class="ticket-id">#<?php echo $ticketCode; ?></div>

    <div class="poster-info-row">
      <div class="poster-wrap">
        <img src="<?php echo $posterPath; ?>" alt="<?php echo htmlspecialchars($row['movie']); ?>">
      </div>
      <div class="info-list">
        <div class="info-row"><span class="label">영화 :</span><span class="value"><?php echo htmlspecialchars($row['movie']); ?></span></div>
        <div class="info-row"><span class="label">날짜 :</span><span class="value"><?php echo htmlspecialchars($row['date']); ?></span></div>
        <div class="info-row"><span class="label">시간 :</span><span class="value"><?php echo htmlspecialchars($row['time']); ?></span></div>
        <div class="info-row"><span class="label">지역 :</span><span class="value"><?php echo htmlspecialchars($row['region']); ?></span></div>
        <div class="info-row"><span class="label">스페셜관 :</span><span class="value"><?php echo htmlspecialchars($row['special']); ?></span></div>
      </div>
    </div>

    <div class="mobile-section">
      <div class="mobile-left">
        <div class="mobile-label">모바일로 확인하기</div>
        <div class="qr-wrap">
          <img src="https://api.qrserver.com/v1/create-qr-code/?size=106x106&data=<?php echo urlencode('Reservation ID: '.$row['id']); ?>" alt="QR Code">
        </div>
      </div>
      <div class="notice-box">
        <div class="notice-title">안내사항</div>
        <p style="margin-top:5px;">
          - 영화 상영시작 15분 전까지 취소 가능<br>
          - 상영시작 후 입장 불가
        </p>
      </div>
    </div>

    <div class="button-area">
      <button class="btn btn-gray">예매정보출력</button>
      <button class="btn btn-change" onclick="location.href='reservation.php'">예매변경</button>
      <button class="btn btn-gray" onclick="location.href='../../index.php'">예매취소</button>
    </div>
  </div>
  <p style="text-align:center;margin-top:25px;">
    <a href="reservation_check.php" class="btn-back">예매 확인하기</a>
  </p>
  <?php

/* ───────────────────────────────────────
   [B] 내 예매 목록 reservation-list
   ─────────────────────────────────────── */
} else {
  // 목록 보기
  ?>
    <div class="category">
    <a href="../../index.php">홈</a> &#47; <a href="now_showing.php">영화</a> &#47; <a href="reservation_check.php">예매확인</a>
  </div>
  <div class="reservation-list">
    <h1 class="list-title">나의 예매 내역</h1>
    <table class="res-list">
      <thead>
        <tr>
          <th>영화</th>
          <th>날짜</th>
          <th>시간</th>
          <th>극장</th>
          <th>상세</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
          <tr>
            <td><?= htmlspecialchars($row['movie'])  ?></td>
            <td><?= htmlspecialchars($row['date'])   ?></td>
            <td><?= htmlspecialchars($row['time'])   ?></td>
            <td><?= htmlspecialchars($row['region']) ?></td>
            <td>
              <a href="reservation_check.php?id=<?= $row['id'] ?>" class="btn-detail">
                보기
              </a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
    <p class="back-wrap">
      <a href="now_showing.php" class="btn-back">상영작보러가기</a>
    </p>
  </div>
  <?php
}
echo "</main>";

include('../footer.php');
?>
