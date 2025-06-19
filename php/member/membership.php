<?php 
  //헤더영역 php 연결
  include('../header.php');
?>

<!-- 멤버십 CSS -->
<link rel="stylesheet" href="../../css/membership.css" type="text/css">

  <!-- 메인 영역 -->
  <main>
  <span id="breadcrumb">홈/멤버십</span>
  
    <section class="ms">
      <h2>멤버십</h2>
      <div class="ms_grade">
        <div class="grade gr_vip">
          <img src="../../images/membership/2020_vip.png" alt="vip">
          <span>vip</span>
        </div>
        <div class="grade gr_vvip">
          <img src="../../images/membership/2020_vvip.png" alt="vvip">
          <span>vvip</span>
        </div>
        <div class="grade gr_gold">
          <img src="../../images/membership/2020_gold.png" alt="gold">
          <span>gold</span>
        </div>
        <div class="grade gr_platinum">
          <img src="../../images/membership/2020_platinum.png" alt="platinum">
          <span>platinum</span>
        </div>
      </div>
      
      <!-- 멤버십 관련 정보, 여닫기 -->
      <ul>
        <!-- VIP 선정 및 유지 기준 -->
        <li class="ms_info">
          <a href="#" title="VIP 선정 및 유지기준" class="ms_info_title">VIP 선정 및 유지 기준<i class="fas fa-angle-down"></i></a>
          <div class="ms_info_content">
            <ul>
              <li>VIP : 일반회원 26만원 이상 선정, 연 26만원 이상 유지</li>
              <li>VVIP : VIP 1년 유지 선정, 연 26만원 이상 유지</li>
              <li>GOLD : VVIP 3년 유지 선정, 연 32만원 이상 유지</li>
              <li>PLATINUM : VIP GOLD 5년 유지 선정, 연 40만원 이상 유지</li>
            </ul>
          </div>
        </li>

        <!-- VIP 혜택 (테이블) -->
        <li class="ms_info">
          <a href="#" title="VIP 혜택" class="ms_info_title">VIP 혜택<i class="fas fa-angle-down"></i></a>
          <div class="ms_info_content">
            <table>
              <caption>VIP혜택</caption>
              <thead>
                <tr>
                  <th colspan="3" scope="col" class="vip_table">&nbsp;</th>
                  <th scope="col">VIP</th>
                  <th scope="col">VVIP</th>
                  <th scope="col">GOLD</th>
                  <th scope="col">PLATINUM</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td rowspan="6" class="coup_bo">영화 혜택 <br><small>(취향따라 선택하는 영화 쿠폰)</small></td>
                  <td rowspan="3" class="coup_opt">A형</td>
                  <td class="coup">주중스페셜관관람권</td>
                  <td colspan="2">1매</td>
                  <td colspan="2">2매</td>
                </tr>
                <tr>
                  <td class="coup">주중관람권</td>
                  <td colspan="2">1매</td>
                  <td colspan="2">2매</td>
                </tr>
                <tr>
                  <td class="coup">주중/주말관람권</td>
                  <td>3매</td>
                  <td>6매</td>
                  <td>8매</td>
                  <td>10매</td>
                </tr>
                <tr>
                  <td rowspan="3" class="coup_opt">B형</td>
                  <td class="coup">주중스페셜관관람권</td>
                  <td colspan="2">1매</td>
                  <td colspan="2">2매</td>
                </tr>
                <tr>
                  <td class="coup">주중관람권</td>
                  <td>3매</td>
                  <td>6매</td>
                  <td>10매</td>
                  <td>12매</td>
                </tr>
                <tr>
                  <td class="coup">주중/주말관람권</td>
                  <td colspan="4">2매</td>
                </tr>
                <tr>
                  <td rowspan="5" class="coup_bo">매점 혜택 <br><small>(맛있는 매점 쿠폰)</small></td>
                  <td colspan="2" class="coup">팝콘M 교환권</td>
                  <td>1매</td>
                  <td>2매</td>
                  <td>1매</td>
                  <td>2매</td>
                </tr>
                <tr>
                  <td colspan="2" class="coup">탄산음료 교환권</td>
                  <td>1매</td>
                  <td>2매</td>
                  <td colspan="2">-</td>
                </tr>
                <tr>
                  <td colspan="2" class="coup">스위트콤보 교환권</td>
                  <td colspan="2">-</td>
                  <td colspan="2">1매</td>
                </tr>
                <tr>
                  <td colspan="2" class="coup">에이드 교환권</td>
                  <td colspan="2">-</td>
                  <td>1매</td>
                  <td>2매</td>
                </tr>
                <tr>
                  <td colspan="2" class="coup">콤보4천원 할인권</td>
                  <td>-</td>
                  <td colspan="2">3매</td>
                  <td>5매</td>
                </tr>
                <tr>
                  <td class="coup_bo">기념일 <br><small>(내가 만드는 특별한 날 쿠폰)</small></td>
                  <td colspan="2" class="coup">스위트콤보 교환권</td>
                  <td colspan="4">1매</td>
                </tr>
              </tbody>
            </table>
          </div>
        </li>

        <!-- VIP 특별 제휴혜택 -->
        <li class="ms_info">
          <a href="#" title="VIP 특별 제휴혜택" class="ms_info_title">VIP 특별 제휴혜택<i class="fas fa-angle-down"></i></a>
          <div class="ms_info_content">
            <ul>
              <li>롯데마트 : 구매금액 최대 15% 할인</li>
              <li>롯데렌터카 : 연구독료 90% 할인 (24시간 무료이용)</li>
              <li>롯데홈쇼핑 : L.CLUB 즉시 무료가입 (최대 15% 할인)</li>
            </ul>
          </div>
        </li>

        <!-- VIP 승급안내 -->
        <li class="ms_info">
          <a href="#" title="VIP 승급안내" class="ms_info_title">VIP 승급안내<i class="fas fa-angle-down"></i></a>
          <div class="ms_info_content">
            <ul>
              <li>2025년 VIP 등급은 2025년 1월 3일 부 승급되며, 2025년 12월 31일까지 유지됩니다.</li>
              <li>VIP 각 등급별 최저 기준 달성 시, 차년도 다음 등급 또는 다음 연차로 순차적 승급됩니다. (등급 유지를 위한 기간 및 최소 구매금액 상이)</li>
              <li>등급별 기준 미달 시 구매금액에 상응하는 하위 등급의 1년차로 조정됩니다.</li>
              <li>정회원에 한하여 VIP 선정 가능하며, 온라인 간편가입 회원의 경우 정회원 전환 후 혜택 이용 가능합니다.</li>
              <li>VIP 승급 기준 및 혜택은 변경될 수 있습니다.</li>
            </ul>
          </div>
        </li>

        <!-- VIP 승급 금액 반영 안내 -->
        <li class="ms_info">
          <a href="#" title="VIP 승급 금액 반영안내" class="ms_info_title">VIP 승급 금액 반영 안내<i class="fas fa-angle-down"></i></a>
          <div class="ms_info_content">
            <ul>
              <li>승급금액이란 롯데시네마 티켓 구매를 통해 누적되는 결제 금액으로써 매점 결제 금액은 제외됩니다.</li>
              <li>승급금액은 영화 관람일로부터 2~3일 후 반영됩니다.</li>
              <li>가족 카드로 조회 및 적립을 하신 경우, 가족 카드 명의자에게 승급금액이 반영됩니다.</li>
              <li>법적 가족관계와 관계없이 VIP 승급금액 합산은 불가합니다.</li>
              <li>1일 영화예매 3건까지만 VIP 승급금액이 반영됩니다.</li>
            </ul>
          </div>
        </li>

        <!-- [VIP 승급금액 미반영]되는 경우 -->
        <li class="ms_info">
          <a href="#" title="VIP 승급금액 미반영 되는 경우" class="ms_info_title">&#91;VIP 승급금액 미반영&#93;되는 경우<i class="fas fa-angle-down"></i></a>
          <div class="ms_info_content">
            <ul>
              <li>현장 결제 시 L.POINT 카드를 제시하지 않아 회원 조회 및 포인트 적립이 이루어지지 않은 경우</li>
              <li>관람권을 사용하는 경우 (금액권 제외한 일반관람권, 초대관람권, VIP 관람권 등 모든 관람권)</li>
              <li>기타 제휴 포인트를 사용하여 할인받은 금액 (할인금액을 제외한 결제금액만 포함)</li>
              <li>동일 영화 6회 초과분에 대한 결제금액 (동일 영화 6회까지의 결제금액은 포함)</li>
              <li>상영일 기준 1일 영화예매 3건 초과분에 대한 결제금액(1일 3건까지의 결제금액은 포함)</li>
              <li>단체 영화관람을 통하여 가격 할인을 받은 경우</li>
              <li>SKT 및 KT를 제외한 예매대행사를 통해 예매하신 경우</li>
              <li>시사회, 초청 이벤트 등 실제 결제 금액이 없는 경우</li>
              <li>비회원 예매 시, L.POINT 번호를 입력하지 않으신 경우</li>
            </ul>
          </div>
        </li>

        <!-- VIP 쿠폰북 유의사항 -->
        <li class="ms_info">
          <a href="#" title="VIP 쿠폰북 유의사항" class="ms_info_title">VIP 쿠폰북 유의사항<i class="fas fa-angle-down"></i></a>
          <div class="ms_info_content">
            <ul class="ms_con">
              <li class="ms_con_subt">&#60;공통&#62;</li>
              <li>VIP 쿠폰은 승급 완료 시점부터 &#91;나의 혜택 확인하기&#93;에서 직접 선택형 쿠폰을 다운받아 사용하실 수 있습니다. (2025.01.03 승급이후 ~ 2025.12.31)</li>
              <li>VIP 쿠폰의 사용가능한 영화관은 쿠폰 다운로드 후 &#91;마이&#62;쿠폰함&#62;VIP/클럽&#62;쿠폰상세보기&#62;영화관&#62;전체보기&#93;에서 확인하실 수 있습니다.</li>
              <li>VIP 쿠폰 및 이용권은 유효기간 내에서만 사용 가능합니다. (영화 관람쿠폰의 경우 상영일 기준)</li>
              <li>주중은 월&sim;금요일(공휴일 제외) / 주말은 토, 일요일 및 공휴일을 뜻합니다.</li>
              <li>VIP 영화 관람권 및 매점 교환권 사용 시 L.POINT 적립이 되지 않습니다.</li>
              <li>4천원 할인권의 경우 결제금액에 대해서만 L.POINT 적립이 가능합니다.</li>
              <li>예매 및 구매 취소 후 쿠폰 재사용이 가능합니다.</li>
              <li>환불 시 현금 및 지류 관람권으로 교환이 불가합니다.</li>
              <li>영리 목적으로 대가를 받고 판매 및 양도하는 경우, VIP 승급제한 및 회원 자격이 정지 또는 상실 될 수 있습니다.</li>
            </ul>
            <ul class="ms_con">
              <li class="ms_con_subt">&#60;주중 스페셜관 관람권&#62;</li>
              <li>스페셜관 및 일반관에서 사용 가능합니다. (샤롯데, 씨네패밀리, 수퍼플렉스 일부 좌석 제외)</li>
              <li>수퍼플렉스의 경우 월드타워관은 빈백/소파 베드/스탠다드(리클라이너), 수원관은 스탠다드(리클라이너) 좌석만 사용 가능합니다.</li>
            </ul>
            <ul class="ms_con">
              <li class="ms_con_subt">&#60;주중 / 주중&middot;주말 영화관람권&#62;</li>
              <li>2D 일반영화에 한하며, 3D 영화 및 스페셜관, 스페셜 좌석에서는 사용되지 않습니다.</li>
            </ul>
            <ul class="ms_con">
              <li class="ms_con_subt">&#60;스위트샵(매점) 쿠폰&#62;</li>
              <li>영화관 스위트샵(매점)에서 오직 해당 상품으로만 이용 가능합니다.</li>
              <li>&#60;4천원 할인권&#62;의 경우 영화관 사정에 따라 사용 가능 콤보의 종류가 상이 할 수 있으며 이벤트 콤보에 대하여 사용이 제한됩니다.</li>
              <li>일부 영화관에서는 현장에서 쿠폰 수령 후 매점에서 해당 상품으로 교환 가능하며, VIP 혜택 외 다른 상품이 제공될 수 있습니다.</li>
            </ul>
            <ul class="ms_con">
              <li class="ms_con_subt">&#60;기념일 쿠폰&#62;</li>
              <li>기념일 쿠폰은 &#60;스위트콤보 교환권&#62;이며, 2025년 VIP 회원에게 제공됩니다.</li>
              <li>기념일은 오늘보다 미래의 날짜로만 지정이 가능합니다. (당일지정 불가)</li>
              <li>지정하신 일자에 쿠폰이 발급되며, 유효기간은 지급일로부터 30일입니다.</li>
              <li>유효기간 만료 시 재발행이 되지 않으니 유의하시기 바랍니다.</li>
              <li>기념일로 지정이 가능한 날짜는 1월4일부터 12월 2일까지입니다.</li>
              <li>반드시 12월 1일까지는 기념일을 등록하셔야 쿠폰 발행이 가능합니다. (12월 1일 기념일 등록 시 12월 2일로 기념일 지정 및 쿠폰 발행)</li>
              <li>12월 1일까지 기념일 등록하지 않을 경우, 일괄 12월 2일로 기념일 지정되어 쿠폰이 발행됩니다.</li>
              <li>기념일 일자는 쿠폰이 발행되기 전까지만 변경 가능합니다. (발행 후 일자 변경 불가)</li>
              <li>발행된 쿠폰은 쿠폰함 &#62; VIP쿠폰에서 확인 가능합니다.</li>
              <li>일부 영화관에서는 현장에서 쿠폰 수령 후 매점에서 해당 상품으로 교환이 가능하며, 스위트콤보 외 다른 상품이 제공될 수 있습니다.</li>
            </ul>
          </div>
        </li>
      </ul>
    </section>
  </main>

<?php 
  //푸터영역 php 연결
  include('../footer.php');
?>