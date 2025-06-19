<?php 
  //헤더영역 php 연결
  include('../header.php');
?>

  <!-- 로그인 및 회원가입 CSS : header.php에 입력 -->

  <main>
  <span id="breadcrumb">홈/로그인</span>

    <!-- 로그인 -->
    <form action="./login_check.php" method="post" name="loginForm" class="log_form">
      <fieldset>
        <legend>LOGIN</legend>
        <div class="ltc_id">
          <label for="log_id"></label>
          <input type="text" name="log_id" id="log_id" maxlength="20" placeholder="ID">
        </div>
        <div class="ltc_pw">
          <label for="log_pw"></label>
          <input type="password" name="log_pw" id="log_pw" maxlength="20" placeholder="Password">
        </div>
        <div class="ltc_id_save">
          <input type="checkbox" name="id_save" id="id_save">
          <label for="id_save">아이디 저장</label>
        </div>

        <input type="submit" value="로그인">
  
        <div class="search_join">
          <a href="../login/id_find.php" title="아이디 찾기">아이디 찾기</a>
          <a href="../login/pw_find.php" title="비밀번호 찾기">비밀번호 찾기</a>
          <a href="../member/register.php?title=회원가입" title="회원가입">회원가입</a>
        </div>
  
        <div class="sns_login">
          <p>SNS 로그인</p>
          <a href="#" title="네이버 로그인"><img src="../../images/login_sns/naver_green_default.png" alt="네이버 로그인"></a>
          <a href="#" title="카카오톡 로그인"><img src="../../images/login_sns/kakaotalk_Color.png" alt="카카오톡 로그인"></a>
          <a href="#" title="구글 로그인"><img src="../../images/login_sns/google_Color.png" alt="구글 로그인"></a>
          <a href="#" title="페이스북 로그인"><img src="../../images/login_sns/facebook_Color.png" alt="페이스북 로그인"></a>
        </div>
      </fieldset>
    </form>
  </main>

<?php 
  //푸터영역 php 연결
  include('../footer.php');
?>

<!-- 제이쿼리 쿠키 파일 연결 -->
<script src="../../js/jquery.cookie.js"></script>
<script>
  // 아이디 저장(쿠키 js 활용)
  $(function() {
    let useridname = $.cookie('id_save'); //쿠키 저장 이름 설정

    if(useridname) {
      $('#log_id').val(useridname); //참일 경우 ID 입력창에 삽입
      $('#id_save').prop('checked', 'true'); //체크박스 체크 상태 전환
    }

    let login_btn = $('input[type=submit]'); //로그인 버튼
    login_btn.click(function() {
      getCookie(); //함수 실행
    });

    let chbtn = $('#id_save'); //체크박스

    function getCookie() {
      if(chbtn.is(':checked')) {
        let userid = $('#log_id').val(); //ID값 가져옴
        $.cookie('id_save', userid, {expires: 7, path: '/'}); //쿠키 생성 7일간 유지
      } else {
        $.removeCookie('id_save', {path: '/'}); //쿠키정보 삭제
      }
    }
  });
</scrip>