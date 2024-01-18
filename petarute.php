<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		 <title>Peta Rute Google</title>
		 <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCeCAhmBV1aJRpEyTpQzwZV-NS_zIfGdSE&sensor=false&language=id"></script>
		 <script type="text/javascript">
			var directionsDisplay;
			var directionsService = new google.maps.DirectionsService();
			var map;
			
			function initialize(){
				directionsDisplay = new google.maps.DirectionsRenderer();
				var chicago = new google.maps.LatLng(-7.642050, 112.906211);
				var myOptions = {
					zoom : 7,
					mapTypeId : google.maps.MapTypeId.ROADMAP,
					center : chicago
				}
				map = new google.maps.Map(document.getElementById('canvas'), myOptions);
				directionsDisplay.setMap(map);
			}
			
			var request = {
				origin : new google.maps.LatLng(-7.638052, 112.909740),
				destination : new google.maps.LatLng(-7.636521, 112.879528),
				travelMode : google.maps.TravelMode.DRIVING
			};
			
			directionsService.route(request, function(result, status){
				if(status == google.maps.DirectionsStatus.OK){
					directionsDisplay.setDirections(result);
				}
			});
		 </script>
		 <style>
			html {
				height : 100%
			}
			body {
				height:100%
			}
			#canvas {
				height : 100%
			}
		 </style>
	</head>
	<body onLoad='initialize()'>
		<div id="canvas"></div>
	</body>
</html>