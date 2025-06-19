<?php
$page_class = "page-reservation";
// DB 연결
include ('../../db/dbconn.php');

/* ★ 로그인 여부 체크 */
if (empty($_SESSION['mb_id'])) {
  echo "<script>alert('로그인 후 이용 가능합니다.'); location.replace('../login/login.php?title=로그인');</script>";
  exit;
}

include('../header.php');
?>

<title>영화 예매</title>
<!-- 폰트어썸 CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
<!-- 예약 공통 -->
<link rel="stylesheet" href="../../css/movie_reser.css" />
<link rel="stylesheet" href="../../css/movie_reser_mid.css" />


<div class="category">
        <a href="../../index.php" title="메인바로가기">홈</a> &#47; <a href="now_showing.php">영화</a> &#47; <a href="reservation.php">예매하기</a>
    </div>

  <!-- 예약 정보를 POST로 payment.php로 전달 -->
  <form id="reservationForm" action="payment.php" method="post">
    <div class="container">
      <h1 class="re_title_hidden">영화 예매</h1>

      <!-- 영화 선택 (슬라이더) -->
      <section class="movie-selection">
        <h2>영화 선택</h2>
        <div class="slider">
          <button type="button" class="prev"><i class="fa-solid fa-caret-left"></i></button>
          <div class="slider-window">
            <ul class="poster-list" id="posterList">
            <?php
  // 1) 포스터 번호에 대응되는 영화 제목 배열 (50개 모두 넣어주세요)
  $movieTitles = [
    "너의 이름은","날씨의 아이","패왕별희","위플래쉬","너의 췌장을 먹고싶어",
    "스즈메의 문단속","추락의 해부","악은 존재하지 않는다","존 오브 인터레스트",
    "퍼펙트 데이즈","러브 라이즈 블리딩","수카바티:극락축구단","장손","해야 할 일",
    "백설공주","패션 오브 크라이스트","되살아나는 목소리","아침바다갈매기는",
    "미키 17","제로썸","괜찮아?괜찮아,괜찮아!","검은 수녀들","퇴마록","미스터 로봇",
    "콘클라베","에밀리아 페레즈","브레겐츠 페스티벌 마탄의 사수","플로우","200%울프",
    "케이온","침범","초혼-다시 부르는 노래","스트리밍","승부","고독한 미식가 더 무비",
    "프랑켄슈타인 아버지","컴패니언","예언자","끝, 새로운 시작","본회퍼","베러맨",
    "로비","남으로 가는 길","헤레틱","해피엔드","부전시장","크래쉬: 디렉터스컷",
    "아마추어","목소리들","류이치사카모토:플레잉 디 오케스트라 2014"
  ];

  // 2) 배열 길이만큼만 반복
  foreach ($movieTitles as $idx => $title) {
    $num = str_pad($idx + 1, 2, '0', STR_PAD_LEFT);
    echo "<li>
            <img
              src='../../images/MoviePoster/Movie_Poster_{$num}.jpg'
              alt='{$title}'
            >
          </li>";
  }
?>
            </ul>
          </div>
          <button type="button" class="next"><i class="fa-solid fa-caret-right"></i></button>
        </div>
      </section>

      <!-- 날짜/시간 선택, 지역 선택, 스페셜관 -->
      <section class="selection-area">
        <!-- 날짜/시간 선택 -->
        <div class="selection-box">
          <h3>날짜 / 시간 선택</h3>
          <div id="calendar-container">
            <div id="calendar-year"></div>
            <div id="calendar-month">
              <button id="prevMonth" type="button"><i class="fa-solid fa-caret-left"></i></button>
              <span id="calendar-month-name"></span>
              <button id="nextMonth" type="button"><i class="fa-solid fa-caret-right"></i></button>
            </div>
            <div id="calendar-grid"></div>
          </div>
          <p id="selectedDateTime" class="selected-display">선택된 날짜 및 시간: 없음</p>
        </div>

        <!-- 지역 선택 -->
        <div class="selection-box">
          <h3>지역 선택</h3>
          <input type="text" id="regionSearch" placeholder="지역 검색">
          <div class="scroll-list" id="regionList">
            <ul>
            <li>서울 가양</li>
              <li>서울 강동</li>
              <li>서울 건대입구</li>
              <li>서울 김포공항</li>
              <li>서울 노원</li>
              <li>서울 도곡</li>
              <li>서울 독산</li>
              <li>서울 서울대입구</li>
              <li>서울 수락산</li>
              <li>서울 수유</li>
              <li>서울 신대방(구로디지털역)</li>
              <li>서울 신도림</li>
              <li>서울 신림</li>
              <li>서울 에비뉴엘(명동)</li>
              <li>서울 영등포</li>
              <li>서울 용산</li>
              <li>서울 월드타워</li>
              <li>서울 은평(롯데몰)</li>
              <li>서울 중량</li>
              <li>서울 청량리</li>
              <li>서울 합정</li>
              <li>서울 홍대입구</li>
              <li>경기/인청 광교</li>
              <li>경기/인천 광명(광명사거리)</li>
              <li>경기/인천 광명아울렛</li>
              <li>경기/인천 구리아울렛</li>
              <li>경기/인천 동탄</li>
              <li>경기/인천 라페스타</li>
              <li>경기/인천 마석</li>
              <li>경기/인천 별내</li>
              <li>경기/인천 병점</li>
              <li>경기/인천 부천(신중동역)</li>
              <li>경기/인천 부평</li>
              <li>경기/인천 부평길산</li>
              <li>경기/인천 부평역사</li>
              <li>경기/인천 북수원(천천동)</li>
              <li>경기/인천 산본피트인</li>
              <li>경기/인천 서수원</li>
              <li>경기/인천 성남중앙(신흥역)</li>
              <li>경기/인천 센트럴락</li>
              <li>경기/인천 송탄</li>
              <li>경기/인천 수원(수원역)</li>
              <li>경기/인천 수지</li>
              <li>경기/인천 시화(정왕역)</li>
              <li>경기/인천 시흥장현</li>
              <li>경기/인천 안산</li>
              <li>경기/인천 안산고잔</li>
              <li>경기/인천 안성</li>
              <li>경기/인천 안양(안양역)</li>
              <li>경기/인천 안양일번가</li>
              <li>경기/인천 용인기흥</li>
              <li>경기/인천 용인역북</li>
              <li>경기/인천 위례</li>
              <li>경기/인천 의정부민락</li>
              <li>경기/인천 인덕원</li>
              <li>경기/인천 인천아시아드</li>
              <li>경기/인천 인천터미널</li>
              <li>경기/인천 주엽</li>
              <li>경기/인천 진접</li>
              <li>경기/인천 파주롯데아울렛</li>
              <li>경기/인천 파주운정</li>
              <li>경기/인천 판교(창조경제밸리)</li>
              <li>경기/인천 평촌(범계역)</li>
              <li>경기/인천 하남미사</li>
              <li>경기/인천 향남</li>
              <li>충청/대전 당진</li>
              <li>충청/대전 대전(백화점)</li>
              <li>충청/대전 대전관저</li>
              <li>충청/대전 대전센트럴</li>
              <li>충청/대전 서산</li>
              <li>충청/대전 서청주(아울렛)</li>
              <li>충청/대전 아산터미널</li>
              <li>충청/대전 오송</li>
              <li>충청/대전 천안불당</li>
              <li>충청/대전 청주용암</li>
              <li>충청/대전 충주(모다아울렛)</li>
              <li>전라/광주 광주(백화점)</li>
              <li>전라/광주 광주광산</li>
              <li>전라/광주 광주첨단</li>
              <li>전라/광주 군산나운</li>
              <li>전라/광주 군산몰</li>
              <li>전라/광주 수완(아울렛)</li>
              <li>전라/광주 익산모현</li>
              </ul>
          </div>
          <p id="selectedRegion" class="selected-display">선택된 지역: 없음</p>
        </div>

        <!-- 스페셜관 선택 -->
        <div class="selection-box">
          <h3>스페셜관</h3>
          <input type="text" id="specialSearch" placeholder="스페셜관 검색">
          <div class="scroll-list" id="specialList">
            <ul>
            <li>스페셜관1</li>
              <li>스페셜관2</li>
              <li>스페셜관3</li>
              <li>스페셜관4</li>
              <li>스페셜관5</li>
              <li>스페셜관6</li>
              <li>스페셜관7</li>
              <li>스페셜관8</li>
              <li>스페셜관9</li>
              <li>스페셜관10</li>
              <li>스페셜관11</li>
              <li>스페셜관12</li>
              <li>스페셜관13</li>
              <li>스페셜관14</li>
              <li>스페셜관15</li>
              <li>스페셜관16</li>
              <li>스페셜관17</li>
              <li>스페셜관18</li>
              <li>스페셜관19</li>
              <li>스페셜관20</li>
              </ul>
          </div>
          <p id="selectedSpecial" class="selected-display">선택된 스페셜관: 없음</p>
        </div>
      </section>

      <div class="button-area">
        <button type="button" id="bookingBtn">예매하기</button>
        <button type="reset" id="resetBtn">초기화</button>
      </div>

      <!-- 숨긴 input들: 최종 선택값들 (payment.php 로 전달) -->
      <input type="hidden" name="movie"   id="hiddenMovie">
      <input type="hidden" name="date"    id="hiddenDate">
      <input type="hidden" name="time"    id="hiddenTime">
      <input type="hidden" name="region"  id="hiddenRegion">
      <input type="hidden" name="special" id="hiddenSpecial">
    </div>
  </form>

  <!-- 시간 선택 모달 -->
  <div class="popup-overlay" id="timePopup">
    <div class="popup">
      <h4>시간 선택</h4>
      <div class="time-modal-container">
        <div class="time-picker">
          <h5>시간 선택</h5>
          <div class="display-box" id="hourDisplay">PM 13</div>
          <div class="option-list" id="hourList"></div>
        </div>
        <div class="time-picker">
          <h5>분 선택</h5>
          <div class="display-box" id="minuteDisplay">50</div>
          <div class="option-list" id="minuteList"></div>
        </div>
      </div>
      <button type="button" id="timeConfirmBtn">확인</button>
    </div>
  </div>

  <script>
   /* ===== 전역 변수들 ===== */
   let selectedDate = "";
  let selectedMovie = "";
  let selectedHour24 = null;
  let selectedMinute = null;
  let tempHour24 = 13;
  let tempMinute = 50;
  const today = new Date();
  let currentYear = today.getFullYear();
  let currentMonth = today.getMonth();

  // == (A) 영화 선택 (슬라이더) ==
  const movieListItems = document.querySelectorAll('.poster-list li');
  movieListItems.forEach(item => {
    item.addEventListener('click', () => {
      movieListItems.forEach(i => i.classList.remove('selected'));
      item.classList.add('selected');
      selectedMovie = item.querySelector('img').alt;
    });
  });

  // == (B) 슬라이더 무한 루프 ==
const sliderWindow = document.querySelector('.slider-window');
const posterList = document.getElementById('posterList');
const originals = Array.from(posterList.children);
const originalCount = originals.length;

// 화면 너비에 따라 visibleCount, posterWidth, gap 결정
let visibleCount, posterWidth, gap;
if (window.innerWidth <= 767) {
  // 모바일
  visibleCount = 2;
  posterWidth = 160; // 모바일 포스터 가로폭 (원하는 수치로 조정)
  gap = 20;         // 모바일 포스터 간격
} else {
  // PC, 태블릿
  visibleCount = 3;
  posterWidth = 184; // PC용 기존 포스터 폭
  gap = 10;          // PC용 간격
}

// 뒤쪽 visibleCount개 복제 -> 맨앞
for (let i = originalCount - visibleCount; i < originalCount; i++) {
  const clone = originals[i].cloneNode(true);
  clone.classList.add('clone');
  posterList.insertBefore(clone, posterList.firstChild);
}
// 앞쪽 visibleCount개 복제 -> 맨뒤
for (let i = 0; i < visibleCount; i++) {
  const clone = originals[i].cloneNode(true);
  clone.classList.add('clone');
  posterList.appendChild(clone);
}

let totalItems = posterList.children.length;
let currentIndex = visibleCount;

let isDragging = false;
let startX = 0;
let currentTranslate = 0;
let prevTranslate = 0;

// 슬라이더 초기화
function updateSlider(animate = true) {
  if (!animate) {
    posterList.style.transition = "none";
  } else {
    posterList.style.transition = "transform 0.3s ease";
  }
  currentTranslate = -currentIndex * (posterWidth + gap);
  posterList.style.transform = `translateX(${currentTranslate}px)`;
  prevTranslate = currentTranslate;
}
updateSlider(false);

// 드래그(터치) 이벤트
function pointerDown(e) {
  isDragging = true;
  startX = e.clientX;
  sliderWindow.style.cursor = "grabbing";
}
function pointerMove(e) {
  if (!isDragging) return;
  const diff = e.clientX - startX;
  posterList.style.transform = `translateX(${prevTranslate + diff}px)`;
}
function pointerUp(e) {
  if (!isDragging) return;
  isDragging = false;
  sliderWindow.style.cursor = "grab";
  const diff = e.clientX - startX;
  const threshold = 50;
  if (diff < -threshold) {
    currentIndex++;
  } else if (diff > threshold) {
    currentIndex--;
  }
  updateSlider();
}

sliderWindow.addEventListener("pointerdown", pointerDown);
sliderWindow.addEventListener("pointermove", pointerMove);
sliderWindow.addEventListener("pointerup", pointerUp);
sliderWindow.addEventListener("pointerleave", pointerUp);

// 버튼(이전/다음)
const prevBtn = document.querySelector('.prev');
const nextBtn = document.querySelector('.next');
prevBtn.addEventListener('click', () => {
  currentIndex--;
  updateSlider();
});
nextBtn.addEventListener('click', () => {
  currentIndex++;
  updateSlider();
});

// 슬라이드가 끝 지점 도달 시 위치 재조정(무한 루프)
posterList.addEventListener("transitionend", () => {
  if (currentIndex >= originalCount + visibleCount) {
    currentIndex = visibleCount;
    updateSlider(false);
  } else if (currentIndex < visibleCount) {
    currentIndex = originalCount + currentIndex;
    updateSlider(false);
  }
});

  // == (C) 달력 생성 및 이동 ==
  function updateCalendarHeader() {
    document.getElementById('calendar-year').textContent = currentYear;
    document.getElementById('calendar-month-name').textContent = (currentMonth + 1) + "월";
  }

  function generateCalendar(year, month) {
    updateCalendarHeader();
    const calendarGrid = document.getElementById('calendar-grid');
    calendarGrid.innerHTML = "";

    const weekdays = ['일','월','화','수','목','금','토'];
    weekdays.forEach(day => {
      const headerCell = document.createElement('div');
      headerCell.textContent = day;
      headerCell.className = "weekday";
      calendarGrid.appendChild(headerCell);
    });

    const firstDay = new Date(year, month, 1).getDay();
    const daysInMonth = new Date(year, month + 1, 0).getDate();

    for (let i = 0; i < firstDay; i++){
      const blankCell = document.createElement('div');
      calendarGrid.appendChild(blankCell);
    }
    for (let d = 1; d <= daysInMonth; d++) {
      const dayCell = document.createElement('div');
      dayCell.textContent = d;
      dayCell.classList.add('day');

      // 자정(오늘 00:00) 기준
      const chosenDate = new Date(year, month, d);
      const todayMidnight = new Date();
      todayMidnight.setHours(0,0,0,0);

      if (chosenDate < todayMidnight) {
        // 과거 날짜
        dayCell.classList.add('disabled');
        dayCell.style.pointerEvents = 'none';
      } else {
        // 오늘 또는 미래
        dayCell.addEventListener('click', () => {
          // 모든 날짜 선택 해제 후 현재 날짜만 표시
          document.querySelectorAll('#calendar-grid .day')
            .forEach(cell => cell.classList.remove('selected-date'));
          dayCell.classList.add('selected-date');

          // YYYY-MM-DD 형태로 저장
          const mm = String(month+1).padStart(2,'0');
          const dd = String(d).padStart(2,'0');
          selectedDate = `${year}-${mm}-${dd}`;

          // 시간 모달 열기
          openTimePopup();
        });

        // 오늘 날짜 CSS 표시
        const now = new Date();
        if (chosenDate.toDateString() === now.toDateString()) {
          dayCell.classList.add('today');
        }
      }
      calendarGrid.appendChild(dayCell);
    }
  }

  generateCalendar(currentYear, currentMonth);

  document.getElementById('prevMonth').addEventListener('click', () => {
    // 현재 연도,월이면 막기
    if (currentYear === today.getFullYear() && currentMonth === today.getMonth()) {
      return;
    }
    if (currentMonth === 0) {
      currentMonth = 11;
      currentYear--;
    } else {
      currentMonth--;
    }
    generateCalendar(currentYear, currentMonth);
  });
  document.getElementById('nextMonth').addEventListener('click', () => {
    if (currentMonth === 11) {
      currentMonth = 0;
      currentYear++;
    } else {
      currentMonth++;
    }
    generateCalendar(currentYear, currentMonth);
  });

  // == (D) 시간 선택 모달 ==
  const timePopupOverlay = document.getElementById('timePopup');
  const hourDisplay = document.getElementById('hourDisplay');
  const hourList = document.getElementById('hourList');
  const minuteDisplay = document.getElementById('minuteDisplay');
  const minuteList = document.getElementById('minuteList');
  const timeConfirmBtn = document.getElementById('timeConfirmBtn');

  // “오늘” 날짜를 골랐는지 여부
  function isTodaySelected() {
    const todayStr = new Date().toISOString().slice(0,10); // "YYYY-MM-DD"
    return (selectedDate === todayStr);
  }

  // 모달 열기
  function openTimePopup() {
    timePopupOverlay.style.display = 'flex';
    const now = new Date();
    tempHour24 = now.getHours();
    tempMinute = now.getMinutes();
    updateTimeDisplays();
    populateHourList();
    populateMinuteList();
  }
  // 모달 닫기
  function closeTimePopup() {
    timePopupOverlay.style.display = 'none';
  }

  hourDisplay.addEventListener('click', () => {
    minuteList.style.display = "none";
    hourList.style.display = (hourList.style.display === "block") ? "none" : "block";
  });
  minuteDisplay.addEventListener('click', () => {
    hourList.style.display = "none";
    minuteList.style.display = (minuteList.style.display === "block") ? "none" : "block";
  });

  // 시 목록
  function populateHourList() {
    hourList.innerHTML = "";
    const now = new Date();

    // 오늘이면 현재 시부터. 
    // (현재 시는 포함해야 하므로 startHour = now.getHours())
    let startHour = 0;
    if (isTodaySelected()) {
      startHour = now.getHours();
    }

    for (let h = startHour; h < 24; h++) {
      const ampm = (h >= 12) ? "PM" : "AM";
      const item = document.createElement('div');
      item.className = "option";
      item.textContent = `${ampm} ${h}`;
      
      // 기본 선택 표시
      if (h === tempHour24) item.classList.add('selected');

      item.addEventListener('click', () => {
        Array.from(hourList.children).forEach(opt => opt.classList.remove('selected'));
        item.classList.add('selected');
        tempHour24 = h;
        updateTimeDisplays();
        hourList.style.display = "none";

        // 시가 바뀌면 분 목록도 다시 생성(현재 분부터 vs 0부터)
        populateMinuteList();
      });
      hourList.appendChild(item);
    }
  }

  // 분 목록
  function populateMinuteList() {
    minuteList.innerHTML = "";
    const now = new Date();

    // 오늘이고, 선택한 시가 현재 시이면 현재 분부터
    let startMinute = 0;
    if (isTodaySelected() && tempHour24 === now.getHours()) {
      // 현재 분도 포함
      startMinute = now.getMinutes();
    }

    for (let m = startMinute; m < 60; m++) {
      const item = document.createElement('div');
      item.className = "option";
      item.textContent = String(m).padStart(2, '0');

      if (m === tempMinute) item.classList.add('selected');

      item.addEventListener('click', () => {
        Array.from(minuteList.children).forEach(opt => opt.classList.remove('selected'));
        item.classList.add('selected');
        tempMinute = m;
        updateTimeDisplays();
        minuteList.style.display = "none";
      });
      minuteList.appendChild(item);
    }
  }

  function updateTimeDisplays() {
    const ampm = (tempHour24 >= 12) ? "PM" : "AM";
    hourDisplay.textContent = `${ampm} ${tempHour24}`;
    minuteDisplay.textContent = String(tempMinute).padStart(2, '0');
  }

  // "확인" 클릭
  timeConfirmBtn.addEventListener('click', () => {
    selectedHour24 = tempHour24;
    selectedMinute = tempMinute;

    const hh = String(selectedHour24).padStart(2, '0');
    const mm = String(selectedMinute).padStart(2, '0');

    // 최종 보안 체크(만약 지금보다 과거 시각인지)
    const chosenDateTime = new Date(`${selectedDate} ${hh}:${mm}`);
    const now = new Date();
    if (chosenDateTime < now) {
      alert("현재 시각보다 이전 시간은 선택할 수 없습니다.");
      return;
    }

    // OK
    document.getElementById('selectedDateTime').textContent =
      `선택된 날짜 및 시간: ${selectedDate} ${hh}:${mm}`;
    closeTimePopup();
  });

  // == (E) 지역 선택 ==
  const regionSearch = document.getElementById('regionSearch');
  const regionListItems = document.getElementById('regionList').getElementsByTagName('li');
  const selectedRegionDisplay = document.getElementById('selectedRegion');

  regionSearch.addEventListener('input', () => {
    const filter = regionSearch.value.toLowerCase();
    for (let li of regionListItems) {
      li.style.display = li.textContent.toLowerCase().includes(filter) ? "" : "none";
    }
  });
  for (let li of regionListItems) {
    li.addEventListener('click', () => {
      Array.from(regionListItems).forEach(item => item.classList.remove('selected-region'));
      li.classList.add('selected-region');
      selectedRegionDisplay.textContent = "선택된 지역: " + li.textContent;
    });
  }

  // == (F) 스페셜관 선택 ==
  const specialSearch = document.getElementById('specialSearch');
  const specialListItems = document.getElementById('specialList').getElementsByTagName('li');
  const selectedSpecialDisplay = document.getElementById('selectedSpecial');

  specialSearch.addEventListener('input', () => {
    const filter = specialSearch.value.toLowerCase();
    for (let li of specialListItems) {
      li.style.display = li.textContent.toLowerCase().includes(filter) ? "" : "none";
    }
  });
  for (let li of specialListItems) {
    li.addEventListener('click', () => {
      Array.from(specialListItems).forEach(item => item.classList.remove('selected-special'));
      li.classList.add('selected-special');
      selectedSpecialDisplay.textContent = "선택된 스페셜관: " + li.textContent;
    });
  }

  // == (G) 예매하기 버튼 ==
  document.getElementById('bookingBtn').addEventListener('click', () => {
    if (!selectedMovie) { alert("영화를 선택해주세요."); return; }
    if (!selectedDate || selectedHour24 === null || selectedMinute === null) {
      alert("날짜 및 시간을 선택해주세요."); return;
    }
    if (document.getElementById('selectedRegion').textContent.includes("없음")) {
      alert("지역을 선택해주세요."); return;
    }

    // hidden 값 설정
    document.getElementById("hiddenMovie").value  = selectedMovie;
    document.getElementById("hiddenDate").value   = selectedDate;
    document.getElementById("hiddenTime").value   =
      String(selectedHour24).padStart(2,'0') + ":" + String(selectedMinute).padStart(2,'0');
    document.getElementById("hiddenRegion").value =
      document.getElementById("selectedRegion").textContent.replace("선택된 지역: ","");
    document.getElementById("hiddenSpecial").value =
      document.getElementById("selectedSpecial").textContent.replace("선택된 스페셜관: ","");

    // 폼 제출
    document.getElementById("reservationForm").submit();
  });

  // == (H) 초기화 버튼 ==
  document.getElementById('resetBtn').addEventListener('click', () => {
    selectedDate = selectedMovie = "";
    selectedHour24 = selectedMinute = null;
    movieListItems.forEach(i => i.classList.remove('selected'));
    document.querySelectorAll('.selected-region').forEach(el => el.classList.remove('selected-region'));
    document.querySelectorAll('.selected-special').forEach(el => el.classList.remove('selected-special'));
    document.getElementById('selectedDateTime').textContent = "선택된 날짜 및 시간: 없음";
    document.getElementById('selectedRegion').textContent   = "선택된 지역: 없음";
    document.getElementById('selectedSpecial').textContent  = "선택된 스페셜관: 없음";
  });
  </script>


  <!-- 선택된 날짜 하이라이트 스타일 -->
  <style>
    #calendar-grid .selected-date {
      background:red;color:#fff;border-radius:50%;
    }
  </style>

<?php include ('../footer.php'); ?>


