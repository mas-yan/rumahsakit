<?php 

date_default_timezone_set('Asia/Jakarta');

session_start();

$conn = mysqli_connect("localhost","root","","rumah_sakit");
if (!$conn) {
	echo mysqli_connect_error();
}

function base_url($url = null) {
	$base_url = "http://localhost/rumahsakit";
	if ($url != null) {
		return $base_url."/".$url;
	}else{
		return $base_url;
	}
}

 ?>