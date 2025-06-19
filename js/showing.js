// **** showing_start **** //
document.addEventListener('DOMContentLoaded', function() {
  const slides = document.querySelectorAll('#showing .slide');
  const bars   = document.querySelectorAll('#showing .slide-control .bar');
  let currentIndex = 0;
  const total = slides.length;

  function updateSlides(index) {
    // 모든 slide & bar 초기화
    slides.forEach(s => s.className = 'slide');
    bars.forEach(b => b.classList.remove('active'));

    // 현재(가운데)
    slides[index].classList.add('center');
    bars[index].classList.add('active');

    // 왼쪽 2장
    const left1 = (index - 1 + total) % total;
    slides[left1].classList.add('left1');
    const left2 = (index - 2 + total) % total;
    slides[left2].classList.add('left2');

    // 오른쪽 2장
    const right1 = (index + 1) % total;
    slides[right1].classList.add('right1');
    const right2 = (index + 2) % total;
    slides[right2].classList.add('right2');
  }

  // 최초 1회
  updateSlides(currentIndex);

  // 자동 슬라이드 5초마다
  let autoTimer = setInterval(nextSlide, 5000);
  function nextSlide() {
    currentIndex = (currentIndex + 1) % total;
    updateSlides(currentIndex);
  }

  // 하단 바 클릭
  bars.forEach((bar, i) => {
    bar.addEventListener('click', () => {
      currentIndex = i;
      updateSlides(currentIndex);
      // 자동 슬라이드 타이머 리셋
      clearInterval(autoTimer);
      autoTimer = setInterval(nextSlide, 5000);
    });
  });
});
  // **** showing_end**** //