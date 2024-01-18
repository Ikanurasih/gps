<?php
	session_start();
	include "lib/koneksi.php";
	
	$user = $_POST['username'];
	$pass = $_POST['password'];
	
	$sql = "select * from armada where username='$user' and password='$pass'";
	$query = mysql_query($sql) or die(mysql_error());
	$jumlah = mysql_num_rows($query);
	
	if($jumlah > 0){
		$data = mysql_fetch_array($query);
			$_SESSION['id'] = $data['id'] ;
		header("location: petadinamis.php");
	}else{
		header("location: login.php?error=Maaf, username atau password salah");
	}
?>