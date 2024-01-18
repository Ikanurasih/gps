<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCeCAhmBV1aJRpEyTpQzwZV-NS_zIfGdSE&sensor=false&language=id"></script>
		
		<title>GPS</title>
		
		<style>
			html { 
				height:100%;
			}
			body { 
				height:100%;
			}
			#canvas { 
				height:100%;
			}
		</style>
		
		<script type="text/javascript">
			function initialize(){
				var myLatLng = new google.maps.LatLng(-7.642050, 112.906211);
				var myOptions = {
					zoom : 14,
					center : myLatLng,
					mapTypeId : google.maps.MapTypeId.ROADMAP
				}
				map = new google.maps.Map(
					document.getElementById('canvas'), myOptions
				);
				var marker = new google.maps.Marker({
					position :  myLatLng,
					map : map,
					title : "Siniii .... :D"
				});
				var infowindow = new google.maps.InfoWindow({
					content : "<img src='images/apache_pb.png' /> <br> Hallo Dunia",
					size : new google.maps.Size(50, 50),
					position : myLatLng
				});
				infowindow.open(map);
				
				marker.setIcon({
					url : "images/pombensin.png", 
					scaledSize : new google.maps.Size(30,24),
					anchor : new google.maps.Point(15, 12)
				});
			}
		</script>
	</head>
	<body onLoad="initialize()">
		<div id="canvas"></div>
	</body>
</html>