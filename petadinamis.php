<?php
	include "lib/session.php";
	include "lib/koneksi.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Peta Dinamis</title>
		<script type="text/javascript" src="js/jquery-1.7.2.js"></script>
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
		<style>
			html { height:100%; }
			body { height:100%; }
			#canvas { height:100%; }
		</style>
		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCeCAhmBV1aJRpEyTpQzwZV-NS_zIfGdSE&sensor=false&language=id"></script>
		<script type="text/javascript">
			var markers = new Array();
			var infowindows = new Array();
			
			function initialize(){
				var myLatLng = new google.maps.LatLng(-7.642050, 112.906211);
				var myOptions = {
					zoom : 10,
					center : myLatLng,
					mapTypeId : google.maps.MapTypeId.ROADMAP
				}
				
				map = new google.maps.Map(document.getElementById('canvas'), myOptions);
				
				<?php
					$sql = mysql_query("select * from armada order by nama");
					while($data=mysql_fetch_array($sql)){
					?>
						var marker = new google.maps.Marker({
							position : new google.maps.LatLng(
								<?php echo $data['lat']; ?>,
								<?php echo $data['lon']; ?>
							),
							map : map,
							title : "saya disini .."
						});
						
						marker.setIcon({
							url : "images/taxi.png",
							scaledSize : new google.maps.Size(30, 24),
							anchor : new google.maps.Point(15, 12)
						});
						markers.push(marker);
						
						var infowindow = new google.maps.InfoWindow({
							content : "<img src='images/<?php echo $data['foto']; ?>' width='100' align='left' /> <?php echo $data['status']; ?>",
							size : new google.maps.Size(50, 50),
							position : new google.maps.LatLng(
							<?php echo $data['lat']; ?>,
							<?php echo $data['lon']; ?>
							)
						});
						
						infowindow.open(map);
						infowindows.push(infowindow);
					<?php
					}
				?>
				
				$('#cari').change(function(){
					var i=$('#cari').val();
					var koodinat=markers[i].getPosition();
					map.panTo(koodinat);
					updatedata();
				});
			}
			
			var refreshId = setInterval(function(){
				updatedata();
			}, 10000);
			
			function updatedata(){
				var lat=0;
				var lon=0;
				
				for(var i=0;i<markers.length;i++){
					var uri = "ambildata.php";
					$.ajax({
						type : 'POST',
						async : false,
						dataType : "html",
						url : uri,
						data : "id="+i,
						success : function(data) {
							lat=data;
						}
					});
					
					var uri = "ambildata2.php";
					$.ajax({
						type : 'POST',
						async : false,
						dataType : "html",
						url : uri,
						data : "id="+i,
						success : function(data){
							lon=data;
						}
					});
					
					var myLatLng = new google.maps.LatLng(lat, lon);
					markers[i].setPosition(myLatLng);
					infowindows[i].setPosition(myLatLng);
				}
			}
			
			var refreshId2 = setInterval(function(){
				navigator.geolocation.getCurrentPosition(
					foundLocation, noLocation
				);
			}, 10000);
			
			function noLocation(){
				alert("Sensor GPS tidak terdeteksi");
			}
			
			function foundLocation(position){
				var lat2 = position.coords.latitude;
				var lon2 = position.coords.longitude;
				
				var uri = "simpandata.php";
				$.ajax({
					type : 'POST',
					async : false,
					dataType : "html",
					url : uri,
					data : "lat="+lat2+"&lon="+lon2,
					success : function(data){
					}
				});
			}
			
		</script>
	</head>
	<body onLoad="initialize()">
		<div id="canvas"></div>
		<select id="cari" name="cari">
			<?php
				$sql = mysql_query("select * from armada order by nama") or die(mysql_error());
				$n = 0;
				
				while($data=mysql_fetch_array($sql)){
				?>
					<option value="<?php echo $n; ?>">
						<?php echo $data['nama']; ?>
					</option>
				<?php
					$n++;
				}
			?>
		</select>
		
		<a href="logout.php">Logout</a>
	</body>
</html>