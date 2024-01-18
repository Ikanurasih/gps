<?php
	include "ib/koneksi.php";
	
	$lat = $_POST['lat'];
	$lon = $_POST['lon'];
	
	$sql = "update armada set lat='$lat', lon='$lon' where id='$data[id]'";
	$query = mysql_query($sql) or die(mysql_error());
	$data = mysql_fetch_array($query);
		echo "sukses";
?>