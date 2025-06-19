<?php 
  //헤더영역 php 연결
  include('../header.php');
?>

  <!-- 로그인 및 회원가입 CSS : header.php에 입력 -->

  <main>
  <span id="breadcrumb">홈/회원가입</span>

    <!-- 회원가입 -->
    <form action="./register_update.php" method="post" name="join" onsubmit="return form_check()" id="join" class="log_form">
      <fieldset>
        <legend>회원가입</legend>
        <p class="imt">*는 필수입력</p>
        <!-- 회원명의 이름/닉네임 -->
        <div class="ltc_name">
          <label for="log_name"><span class="imt">*</span>이름 또는 닉네임</label>
          <input type="text" name="log_name" id="log_name" maxlength="20" placeholder="NAME / NICKNAME">
        </div>
        <!-- 아이디 -->
        <div class="ltc_id">
          <label for="log_id"><span class="imt">*</span>아이디</label>
          <input type="text" name="log_id" id="log_id" maxlength="20" placeholder="ID">
          <button type="button" id="id_check_btn">중복확인</button>
          <span id="id_check">중복확인은 필수입니다.</span>
        </div>
        <!-- 비밀번호 -->
        <div class="ltc_pw">
          <label for="log_pw"><span class="imt">*</span>비밀번호</label>
          <input type="password" name="log_pw" id="log_pw" maxlength="20" placeholder="Password">
        </div>
        <!-- 비밀번호 확인 -->
        <div class="ltc_pw_cfm">
          <label for="log_pw_confirm"><span class="imt">*</span>비밀번호 확인</label>
          <input type="password" name="log_pw_confirm" id="log_pw_confirm" maxlength="20" placeholder="Password_RE">
        </div>
        <!-- 거주하는/자주 가는 영화관 지역 -->
        <div class="ltc_region">
          <label for="log_region">지역</label>
          <input type="text" name="log_region" id="log_region" maxlength="50" placeholder="REGION(서울특별시 종로구 관수동)">
        </div>
        <!-- 이메일 -->
        <div class="ltc_email">
          <label for="log_email"><span class="imt">*</span>이메일</label>
          <input type="email" name="log_email" id="log_email" maxlength="50" placeholder="E-MAIL(id@domain.com)">
        </div>
        <!-- 전화번호 -->
        <div class="ltc_phone">
          <label for="log_phone"><span class="imt">*</span>전화번호</label>
          <input type="tel" name="log_phone" id="log_phone" maxlength="11" placeholder="PHONE(-없이 숫자만 입력)">
        </div>
        <!-- 이용약관 -->
        <div class="ltc_agree">
          <input type="checkbox" name="agree" id="agree">
          <label for="agree">이용약관 동의</label>
          <i class="fas fa-chevron-down"></i>
<textarea cols="20" rows="10" id="agree_txt" readonly>
    1. 목적
  본 약관은 [영화관 이름]이 운영하는 홈페이지에서 제공하는 서비스의 이용조건 및 절차, 이용자와 회사의 권리, 의무 및 책임사항을 규정함을 목적으로 합니다.

    2. 용어의 정의
  - 회원: 홈페이지에 회원가입을 한 자로, 지속적으로 서비스를 이용할 수 있는 자  
  - 아이디(ID): 회원 식별 및 서비스 이용을 위한 문자/숫자의 조합  
  - 비밀번호: 회원이 자신의 정보 보호를 위해 설정한 문자/숫자 조합  
  - 콘텐츠: 영화 정보, 예매 서비스, 이벤트 등 홈페이지에서 제공되는 모든 정보

    3. 회원가입 및 관리
  - 회원은 본인의 정확한 정보를 제공하여 가입하여야 합니다.  
  - 타인의 명의로 가입하거나 허위 정보를 제공한 경우, 서비스 이용에 제한이 있을 수 있습니다.  
  - 회원은 언제든지 탈퇴할 수 있으며, 회사는 관련 법령에 따라 일정 기간 회원정보를 보관할 수 있습니다.

    4. 서비스의 제공 및 변경
  - 회사는 영화 예매, 상영 정보, 멤버십 혜택, 이벤트 참여 등의 서비스를 제공합니다.  
  - 서비스 내용은 운영상, 기술상 필요에 따라 사전 고지 후 변경될 수 있습니다.

    5. 개인정보의 보호
  - 회사는 「개인정보 보호법」 등 관련 법령을 준수하며, 개인정보 처리 방침에 따라 회원의 정보를 보호합니다.  
  - 개인정보는 서비스 제공, 본인 인증, 고객 응대 등 정해진 목적 내에서만 사용됩니다.

    6. 회원의 의무
  - 회원은 서비스를 이용할 때 다음 행위를 하여서는 안 됩니다:
  - 타인의 정보 도용
  - 해킹, 바이러스 유포 등 시스템 장애를 유발하는 행위
  - 영화관 운영을 방해하거나 명예를 훼손하는 행위

    7. 계약 해지 및 서비스 이용 제한
  - 회원이 본 약관을 위반하거나 부정한 방법으로 서비스를 이용한 경우, 회사는 사전 통지 없이 이용을 제한하거나 회원 자격을 박탈할 수 있습니다.

    8. 책임의 제한
  - 천재지변, 시스템 장애, 통신 오류 등 불가항력적인 사유로 인한 서비스 중단에 대해 회사는 책임을 지지 않습니다.

    9. 약관의 개정
  - 본 약관은 관련 법령이나 회사 정책에 따라 변경될 수 있으며, 변경 시 사전 고지합니다.  
  - 변경된 약관에 동의하지 않을 경우, 회원은 서비스 이용을 중단하고 탈퇴할 수 있습니다.

    10. 분쟁 해결 및 관할 법원
  - 서비스 이용과 관련하여 분쟁이 발생할 경우, 회사와 회원은 성실히 협의하여 해결하며, 협의가 불가능할 경우 관할 법원은 [회사 소재지]의 관할 법원으로 합니다.
</textarea>
        </div>
        <div class="btn_wrap">
          <input type="submit" value="회원가입">
          <input type="reset" value="취소" onclick="joincancel()">
        </div>
      </fieldset>
    </form>
  </main>

<?php 
  //푸터영역 php 연결
  include('../footer.php');
?>

<!-- 폼 체크 스크립트 -->
<script>
  let id_check_done = false; //아이디 중복 확인

  $(document).ready(function() {
    // 이용약관 펼치고 접기
    $('#agree_txt').hide();
    $('.ltc_agree > i').click(function() {
      if($(this).attr('class') == 'fas fa-chevron-down') {
        $('#agree_txt').show(); //펼치기
        $('.ltc_agree > i').attr('class', 'fas fa-chevron-up');
      } else {
        $('#agree_txt').hide(); //접기
        $('.ltc_agree > i').attr('class', 'fas fa-chevron-down');
      }
    });

    // 중복여부 클릭시
    $('#id_check_btn').click(function() {
      // 아이디 중복여부 확인
      let id_value = $('#log_id').val().trim(); //여백없이 입력된 값 대입
      // 아이디 값 입력 여부 확인
      if(id_value == '') {
        alert('아이디를 입력해주세요');
        $('#log_id').focus();
        return;
      }
    
      // 입력된 아이디 형식 확인
      if(!validateIdFormat(id_value)) {
          alert('영문자와 숫자 조합으로 4-20자 이내로 입력해주세요');
          $('#log_id').focus();
          return;
        }
      
      // AJAX로 요청하여 ID 중복여부 표시
      $.ajax({
        url: './ajax/id_check.php',
        type: 'post',
        data: {log_id: id_value},
        success: function(response) {
          if(response == 'ok') {
            $('#id_check').text('사용 가능한 아이디입니다.').css('color', 'red');
          } else {
            $('#id_check').text('이미 사용 중인 아이디입니다. 다시 입력해주세요').css('color', 'pink');
          }
        }, error: function() {
          alert('실패');
        }
      });
    });
  });

  // 아이디 중복확인 버튼 클릭을 해야만 제출
  $('#id_check_btn').click(function() {
    if(document.getElementById('log_id').value) {
      id_check_done = true;
      alert('아이디 중복확인이 되었습니다.');
    }
  });
    
  // 아이디 형식 검사 함수
  function validateIdFormat(id_value) {
    let regex = /^[a-zA-Z0-9]{4,20}$/ //영문 대소문자,숫자를 4~20자로
    return regex.test(id_value); //실행
  }

  // 폼 유효성 검사
  function form_check() {
    if(!document.getElementById('log_name').value) {
      alert('회원이름으로 사용할 이름 또는 닉네임을 입력해주세요');
      log_name.focus();
      return false;
    }
    if(!document.getElementById('log_id').value) {
      alert('아이디를 입력해주세요');
      log_id.focus();
      return false;
    }
    if(!validateIdFormat(document.getElementById('log_id')).value.trim()) {
      alert('아이디를 영문자와 숫자 조합으로 4-20자 이내로 입력해주세요');
      log_id.focus();
      return false;
    } // 아이디 조합 방식 체크
    if(!document.getElementById('log_pw').value) {
      alert('비밀번호를 입력해주세요');
      log_pw.focus();
      return false;
    }
    // 비밀번호 일치여부 확인
    if(document.getElementById('log_pw').value != document.getElementById('log_pw_confirm').value) {
      alert('비밀번호가 일치하지 않습니다. 확인하고 다시 입력해주세요');
      log_pw.focus();
      return false;
    }
    if(!document.getElementById('log_email').value) {
      alert('이메일을 입력해주세요');
      log_email.focus();
      return false;
    }
    if(!document.getElementById('log_phone').value) {
      alert('전화번호를 입력해주세요');
      log_phone.focus();
      return false;
    }
    // 약관 미동의시 가입 불가
    if(!document.getElementById('agree').checked) {
      alert('이용약관에 동의하지 않을 시 회원가입이 불가합니다');
      return false;
    }
    return true;
  }

  // 폼 제출 전 아이디 중복확인 버튼 검사
  document.getElementById('join').addEventListener('submit', function(e) {
    if(!id_check_done) {
      e.preventDefault(); //제출 막기
      alert('아이디 중복확인이 안 되었습니다.');
    }
  });

  // '취소' 버튼 클릭시 메인 화면으로 이동
  function joincancel() {
    if(confirm('가입을 취소하시겠습니까?')) {
      alert("정상적으로 회원가입이 취소되었습니다.\n메인 화면으로 이동합니다.");
      location.replace('../../index.php');
    }
  }
</script>