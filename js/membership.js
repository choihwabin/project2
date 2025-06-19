const ms_info = document.querySelectorAll('.ms_info_title');

// 클릭시 각각 열기 (아코디언 효과)
ms_info.forEach(item => {
  item.addEventListener('click', function(e) {
    e.preventDefault();
    // console.log(i); //번호 확인

    const ms_content = item.nextElementSibling; //다음 요소 선택('ms_info_content')
    const ms_arrow = item.querySelector('.fa-angle-down'); //화살표 선택

    // 상시 펼치기
    // if(ms_content && ms_content.classList.contains('ms_info_content')) {
    //   e.preventDefault();
    //   ms_content.classList.toggle('active');
    
    //   if(ms_arrow) {
    //     ms_arrow.classList.toggle('rotate');
    //   }
    // }

    // 모든 항목 닫기
    ms_info.forEach(otherInfo => {
      if (otherInfo !== item) {
        const otherCont = otherInfo.nextElementSibling; //다음 요소 선택('ms_info_content')
        const otherArrow = otherInfo.querySelector('.fa-angle-down');

        otherCont.classList.remove('active');
        otherCont.style.maxHeight = null; //값 초기화
        otherCont.classList.remove('active_info_content');
        otherArrow.classList.remove('rotate');
      }
    });

    // 현재 항목 toggle
    if (item.classList.contains('active')) { //클래스명이 있다면
      // active 및 rotate 서식 제거
      item.classList.remove('active');
      ms_content.style.maxHeight = null;
      ms_content.classList.remove('active_info_content');
      ms_arrow.classList.remove('rotate');
    } else {
      // active 및 rotate 서식 적용
      item.classList.add('active');
      ms_content.style.maxHeight = ms_content.scrollHeight+ 16 + 'px';
      ms_content.classList.add('active_info_content');
      ms_arrow.classList.add('rotate');
    }
  });
});

// https://jmjmjm.tistory.com/174