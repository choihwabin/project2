// GPT 리팩토링
// 달력
const ev_date_day = document.getElementById('ev_date_day'); //표시될 날짜
const ev_date_pr = document.getElementById('prev_date'); //좌측 화살표
const ev_date_nx = document.getElementById('next_date'); //우측 화살표

// 사용자 시스템 날짜
const calendar = new Date();
let currentYear = calendar.getFullYear(); //연도
let currentMonth = calendar.getMonth() + 1; //월(1~12)
let currentDay = calendar.getDate(); //일(1~최대31)

/* 버튼 클릭시 
  - 일이 증감 (좌측:-1씩, 우측: +1씩)
    단, 1일 or 각 월의 마지막일(28,30,31)일 경우 월 증감 & 1일=>마지막일, 마지막일=>1일로.
    단, 월이 1 or 12일 경우 연도 증감 & 월: 12월=>1월, 1월=>12월 & 일: 1월되면 1일로, 12월되면 마지막일(31)

  - 4년마다 윤년(2020,2024,...) => 2월: 29일까지.
*/

// 각 월의 마지막 일
function month_lastday(year, month) {
  const lastDay = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
  if(month === 2 && is_leap_year(year)) {return 29;} //윤년의 2월일 경우
  return lastDay[month - 1];
}

// 윤년(4년 주기, 100년 주기 제외(=평년), 400년 주기) 확인
function is_leap_year(year) {
  return (year % 4 === 0 && year % 100 !== 0 || year % 400 === 0);
}

// 날짜형식 변경 (예.2025-04-18)
function date_format(year, month ,day) {
  const df_month = String(month).padStart(2, '0'); //04
  const df_day = String(day).padStart(2, '0'); //04
  return `${year}-${df_month}-${df_day}`;
}

// 날짜 표시
function update_date_dp() {
  ev_date_day.innerText = currentYear + '년 ' + currentMonth + '월 ' + currentDay + '일';
}


// 아이콘 클릭시 (날짜 이동)
function update_date(increment) {
  const lastday_in_month =  month_lastday(currentYear, currentMonth);

  if(currentDay === 1 && increment === -1) {
    //1일인 경우
    if(currentMonth === 1) {
      // 1월 1일인 경우 (전년도 12월 31일로 설정)
      currentYear -= 1;
      currentMonth = 12;
      currentDay = 31;
    } else {
      // 1월이 아닌 달의 경우
      currentMonth -= 1;
      currentDay = month_lastday(currentYear, currentMonth); //마지막 날을 구한다
    }
  } else if(currentDay === lastday_in_month && increment === 1) {
    if(currentMonth === 12) {
      // 12월 31일일 경우 (다음해 1월 1일로 설정)
      currentYear += 1;
      currentMonth = 1;
      currentDay = 1;
    } else {
      // 12월이 아닌 달의 경우
      currentMonth += 1;
      currentDay = 1;
    }
  } else {
    //해당 달에서 1일이 아닌 경우 또는 마지막 일이 아닌 경우
    currentDay += increment;
  }

  update_date_dp(); //날짜 표시
  sendDate(); //클릭시 변경되는 날짜 전송
}

// 버튼 이벤트 (좌,우 클릭시)
ev_date_pr.addEventListener('click', (e) => {
  update_date(-1); //-1 계산 (감소)
  e.preventDefault(); //새로고침 방지
});
ev_date_nx.addEventListener('click', (e) => {
  update_date(1); //1 계산 (증가)
  e.preventDefault(); //새로고침 방지));
});

// AJAX로 보내기 위한 방법
// AJAX 요청 보내기
function sendDate() {
  const dateStr = date_format(currentYear, currentMonth, currentDay);

  fetch('event_check.php', {
    method: 'POST',
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: `ev_date=${encodeURIComponent(dateStr)}`
  })
  .then(res => res.text())
  .then(data => {
    document.getElementById('event-result').innerHTML = data; // 서버 응답 출력
  });
};

// 날짜 초기 요청 자동 보내기
document.addEventListener('DOMContentLoaded', () => {
  update_date_dp(); //날짜 출력
  sendDate(); //페이지 로드시 바로 실행
});