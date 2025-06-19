<?php
    include('../header.php');
?>

<body>
    <!-- 카테고리 -->
    <div class="category">
        <a href="../../index.php" title="메인바로가기">홈</a> &#47; <a href="inquiry.php">고객문의</a>
    </div>
    
    <!-- 탭메뉴 -->
    <div class="i_tabmenu_con">
        <ul class="i_tab_menu">
            <li class="tab_btn" data-tab="faq">FAQ</li>
            <li class="tab_btn" data-tab="inquiry">1:1문의</li>
        </ul>
    </div>
    <section id="faq">
        <!-- 검색창 -->
        <form name="search" method="post" action="search_list.php"  onsubmit="return form_check()">
            <div class="search">
                <input type="search" id="search" name="search" placeholder="검색어를 입력해주세요">
                <input type="submit" value="검색" id="search_btn">
            </div>

            <div class="icon_menu">
                <div class="icons">
                    <a href="../ranking/rank.php" title="영화순위보기">
                        <img src="../../images/inquiry/rank.png" alt="영화순위">
                        <p>영화순위</p>
                    </a>
                </div>

                <div class="icons">
                    <a href="../movie/reservation.php" title="예매하기">
                        <img src="../../images/inquiry/reservation.png" alt="예매하기">
                        <p>예매하기</p>
                    </a>
                </div>

                <div class="icons">
                    <a href="https://www.lottecinema.co.kr/NLCHS/Ticketing/Schedule" title="상영시간">
                        <img src="../../images/inquiry/time.png" alt="상영시간">
                        <p>상영시간표</p>
                    </a>
                </div>

                <div class="icons">
                    <a href="../member/membership.php" title="멤버십">
                        <img src="../../images/inquiry/membership.png" alt="멤버십">
                        <p>멤버십</p>
                    </a>
                </div>
                <div class="icons">
                    <a href="../theater/special.php" title="스폐셜관">
                        <img src="../../images/inquiry/special.png" alt="스폐셜관">
                        <p>스폐셜관</p>
                    </a>
                </div>
                <div class="icons">
                    <a href="../event/event_view.php" title="이벤트">
                        <img src="../../images/inquiry/event.png" alt="이벤트">
                        <p>이벤트</p>
                    </a>
                </div>
            </div>

            <div class="faq_q"><p>자주 묻는 질문</p></div>

            <div class="faq">
                <ul class="faq_item">
                    <li class="question">
                    <div class="question_wrap">
                        <a href="#" title="관람등급">관람등급 안내</a>
                        <img src="../../images/inquiry/arrow.png" alt="화살표" class="faq_arrow">
                    </div>
                    <div class="answer">
                        롯데시네마는 영화 및 비디오 진흥에 관한 법률(이하 영비법)을 준수합니다.<br>
                        &#9632; 등급기준<br>
                        &middot;전체관람가 : 모든 연령의 관람객이 관람할 수 있는 영화<br>
                        &middot;12세 관람가 : 만 12세 미만의 관람객은 관람할 수 없는 영화(보호자 동반시 12세 미만 관람과)<br>
                        &middot;15세 관람가 : 만 15세 미만의 관람객은 관람할 수 없는 영화(보호자 동반 시 15세 미만 관람가)<br>
                        &middot;청소년 관람불가 : 만 19세 미만의 관람객은 관람할 수 없는 영화 <br>

                        <span class="answer_b">관람 시 보호자는 만 19세 이상의 성인만 가능합니다.
                        청소년 관람불가 영화는 보호자 동반과 관계없이 만 19세 미만은 관람이 불가합니다. <br>

                        영화관 현장에서 연령확인 불가 시 입장이 제한될 수 있으니 신분증을 반드시 지참해 주시기 바랍니다. (실물 주민등록증/운전면허증/여권/PASS 모바일 신분증 등)

                        또한 상영등급에 맞지 않는 영화를 관람하거나 무단입장을 하는 경우 형사처벌 및 손해 배상의 대상이 될 수 있습니다.</span>
                    </div>
                    </li>
                </ul>

                <ul class="faq_item">
                    <li class="question">
                    <div class="question_wrap">
                        <a href="#" title="환불">영화관람권을 환불하고 싶어요.</a>
                        <img src="../../images/inquiry/arrow.png" alt="화살표" class="faq_arrow">
                    </div>
                    <div class="answer">
                        &#9632; 롯데시네마 아이디에 등록된 영화관람권은 공정거래위원회 표준약관 및 권고사항에 따라 발행일로부터 5년 이내 유효기간 연장 및 환불 접수가 가능합니다.<br>
                        <span class="answer_b">다만, 영화관람권 환불은 최초 유효기간 경과 후 관람권 판매금액의 90%에 대해 신청 가능하며 무료 초대권 및 연간회원카드, 기업체를 통해 유통된 관람권은 환불이 제한됩니다.</span><br>
                        &#9632; 환불 희망 시 [마이] &rarr; [쿠폰함] &rarr; [기간만료] 를 선택하시어 신청가능합니다.<br>

                        <span class="answer_b">	&#8251; 환불이 제한되는 관람권은 환불불가 사유가 별도 표기됩니다.</span>
                    </div>
                    </li>
                </ul>

                <ul class="faq_item">
                    <li class="question">
                    <div class="question_wrap">
                        <a href="#" title="개명">이름을 바꿨어요. 롯데시네마에 등록된 이름을 변경하려면 어떻게 해야하나요? (개명 요청)</a>
                        <img src="../../images/inquiry/arrow.png" alt="화살표" class="faq_arrow">
                    </div>
                    <div class="answer">
                        이름 수정은 L.POINT 고객센터에서만 가능합니다. L.POINT 고객센터 &#9742; 1899-8900로 연락 주시면 본인 확인 후 변경 가능합니다.
                    </div>
                    </li>
                </ul>

                <ul class="faq_item">
                    <li class="question">
                    <div class="question_wrap">
                        <a href="#" title="VIP쿠폰">VIP 쿠폰은 어떻게 사용하나요?</a>
                        <img src="../../images/inquiry/arrow.png" alt="화살표" class="faq_arrow">
                    </div>
                    <div class="answer">
                        온라인(홈페이지, 모바일) : 최종결제단계 [관람권 ] &rarr; [VIP] 선택하여 쿠폰 적용 가능합니다.<br>
                        영화관 현장 : [마이] &rarr; [쿠폰함] &rarr; [VIP/클럽] &rarr; [VIP] 선택하여 원하는 쿠폰을 제시 및 키오스크 인식 후 사용 가능합니다.<br>
                        일부 콘텐츠에 대해서는 쿠폰 사용이 제한 될 수 있습니다. (공연, 강연, 팬미팅, 스포츠 및 게임 중계등)
                    </div>
                    </li>
                </ul>

                <ul class="faq_item">
                    <li class="question">
                    <div class="question_wrap">
                        <a href="#" title="통신사혜택">통신사별 멤버십 혜택은 어떻게 되나요?</a>
                        <img src="../../images/inquiry/arrow.png" alt="화살표" class="faq_arrow">
                    </div>
                    <div class="answer">
                        통신사 멤버십 혜택은 다음과 같습니다. <br>
                        &#9632; KT
                        &#12685; VIP 등급 : 연 6회 영화 혜택 제공 (월 1회)
                        - 혜택: 본인 무료관람 + 동반 3인 할인 <br>
                            ＊동반 1인 할인: 11,000원 이상 티켓에 한하여 1,000~5,000원 할인 <br>
                            &#12685; 전체 등급
                        - 혜택1: 본인 + 동반 3인 영화 할인 (월 3회, 연 36회) <br>
                        ＊11,000원 이상 티켓에 한하여 1,000~5,000원 할인 <br>
                        - 혜택2: 매점 콤보 1,500원 할인 (월 1회, 연 12회) <br>
                            <span class="answer_b">＊매점 할인 제외영화관: 가양, 강동, 거창, 경주, 경주황성, 광주광산, 남원주, 당진, 대구현풍, 라페스타, 마산, 부천역, 브로드웨이, 사천, 상주, 서귀포, 서산, 시화, 양주고읍, 엠비씨네, 영종하늘도시, 영주, 오산, 익산모현, 장안, 제주삼화지구, 제주아라, 주엽, 중랑, 춘천, 충장로, 충주, 통영, 평택비전, 포항, 프리미엄경남대, 프리미엄구미센트럴, 프리미엄만경, 프리미엄안동, 프리미엄진주, 프리미엄칠곡, 프리미엄해운대, 하남미사.</span> <br>
                        &#8251; KT멤버십 홈페이지/모바일앱에서 예매 시 혜택 이용 가능합니다. <br>
                        &#8251; 2D 일반 영화에 한하여 적용 가능합니다. (3D, 4D, 스페셜관, 스페셜좌석 제외) <br>
                        &#8251; KT멤버십에서 영화예매할 경우, L.POINT는 적립되지 않습니다. <br>
                        &#8251; KT멤버십 예매를 이용할 경우 포토티켓 결제 및 출력은 불가합니다.
                    </div>
                    </li>
                </ul>
                </div>

        </form>
    </section>

    <!-- 모바일 1:1문의 -->
    <section id="m_inquiry">
        <form action="" name="m_inquiry" method="post"  onsubmit="return form_check()">
            <div class="i_choice">
                <h2>문의선택</h2>
                <ul>
                    <li><a href="#" title="영화관" class="act">영화관</a></li>
                    <li><a href="#" title="멤버십/회원정보">멤버십/회원정보</a></li>
                    <li><a href="#" title="예매/결제">예매/결제</a></li>
                    <li><a href="#" title="이벤트">이벤트</a></li>
                </ul>
            </div>
            <div class="i_category">
                <h2>문의종류</h2>
                <ul>
                    <li><a href="#" title="문의" class="act">문의</a></li>
                    <li><a href="#" title="칭찬">칭찬</a></li>
                    <li><a href="#" title="불만">불만</a></li>
                    <li><a href="#" title="건의">건의</a></li>
                </ul>
            </div>

            <div class="input_wrap">
                <div class="m_i_title m_i_input">
                    <input name="m_i_title" type="text" placeholder="문의제목">
                </div>
                <div class="m_i_detail m_i_input">
                    <textarea name="m_i_detail" id="m_i_detail" placeholder="문의내용"></textarea>
                </div>
                <div class="m_i_c_info m_i_input">
                    <input name="m_i_c_info" type="text" placeholder="성함">
                </div>
                <div class="m_i_c_phone m_i_input">
                    <select name="m_i_c_phone" id="m_i_c_phone">
                        <option>010</option>
                        <option>011</option>
                        <option>02</option>
                        <option>031</option>
                        <option>032</option>
                    </select>
                    <input type="text" name="m_i_c_phone">
                    <input type="text" name="m_i_c_phone">
                </div>
                <div class="m_i_c_email m_i_input">
                    <input type="text" name="m_i_c_email">@
                    <select name="m_i_c_email" id="m_i_c_email">
                        <option>naver.com</option>
                        <option>daum.net</option>
                        <option>kakao.com</option>
                        <option>gmail.com</option>
                    </select>
                </div>
                <div class="m_i_c_check m_i_input">
                    <label id="privacy_toggle">
                        <input type="checkbox" name="m_i_c_check" id="m_i_c_check">
                        개인정보 수집 및 이용에 동의합니다
                        <span class="arrow">&#9660;</span>
                    </label>
                    <div class="privacy_content">
                        &#8251; 수집 항목: 이름, 연락처, 이메일 등<br>
                        &#8251; 수집 목적: 문의 응대 및 고객지원<br>
                        &#8251; 보관 기간: 1년 보관 후 파기
                    </div>
                </div>
                <div class="m_i_c_btn">
                    <input type="submit" value="문의하기">
                    <input type="reset" value="취소">
                </div>
            </div>
        </form>
    </section>


    <!-- pc, 태블릿 1:1 문의 -->
    <section id="inquiry">
        <form name="inquiry" method="post" action=""  onsubmit="return form_check()">
            <div>
                <label for="i_select">분류</label>
                <select name="i_select" id="i_select">
                    <option value="">분류 선택</option>
                    <option value="">영화관</option>
                    <option value="">멤버십/회원정보</option>
                    <option value="">예매/결제</option>
                    <option value="">이벤트</option>
                </select>
            </div>

            <div>
                <label for="i_name">이름</label>
                <input type="text" name="i_name" id="i_name" placeholder=" 이름을 입력하세요">
            </div>

            <div>
                <label for="i_title">제목</label>
                <input type="text" name="i_title" id="i_title" placeholder=" 제목을 입력하세요">
            </div>

            <div>
                <label for="detail">내용</label>
                <textarea name="detail" id="detail" rows="10" placeholder=" 내용을 입력하세요"></textarea>
            </div>
            <div class="inquiry_btn">
                <input type="submit" value="문의하기" id="i_btn">
                <input type="reset" value="취소">
            </div>
        </form>
    </section>

    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<?php
    include('../footer.php');
?>
</body>
</html>