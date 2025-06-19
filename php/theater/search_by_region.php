<?php
include('../header.php');
?>

<h2>지역검색</h2>
<div id="map" style="width:500px;height:400px;"></div>


<?php
include('../footer.php');
?>

<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=43b52070440e7c624ef1a9d82f15b95b"></script>
<script>
		var container = document.getElementById('map');
		var options = {
			center: new kakao.maps.LatLng(37.53286, 126.9604),
			level: 3
		};

		var map = new kakao.maps.Map(container, options);
	</script>
