// 이벤트 슬라이드 좌우
// 공통 슬라이드 함수 (GPT를 통한 간결화)

$(document).ready(function() {
  function setupSlider(ev_select) {
    const event_banner = document.querySelector(`${ev_select} > ul`); //이벤트 영역
    const leftBtn = document.querySelector(`${ev_select} i.fa-angle-left`); //좌측 아이콘
    const rightBtn = document.querySelector(`${ev_select} i.fa-angle-right`); //우측 아이콘

    // 왼쪽 클릭
    leftBtn.addEventListener("click", () => {
      event_banner.insertBefore(event_banner.lastElementChild, event_banner.firstElementChild);
    });

    // 오른쪽 클릭
    rightBtn.addEventListener("click", () => {
      event_banner.appendChild(event_banner.firstElementChild);
    });
  }
  // 각 이벤트를 배너를 매개변수로 삽입
  setupSlider('.movie_ev');
  setupSlider('.bonus_ev');

  // 모바일 화면일 경우 이미지 변경
  function updateImages($slide, name, mobile, desktop) {
    const isMobile = $(window).width() <= 768; // 모바일 기준 768px 이하

    $slide.find('img').each(function(index) {
      const fileIndex = index + 1; // 이미지 경로 (0부터 시작하므로)

      // 화면 크기에 따른 이미지 경로
      const suffix = isMobile ? mobile : desktop;
      const newSrc = `./images/event/eventbanner/${name}${fileIndex}${suffix}.png`;

      $(this).attr('src', newSrc); //src 속성 변경
    });
  }

  $(window).on('resize', function () {
    updateImages($('.m_ev_slide'), 'm_banner', '_mobile', '');
    updateImages($('.b_ev_slide'), 'b_banner', '_mobile', '');
  }).trigger('resize');
});