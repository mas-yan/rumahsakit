<?php 	

include '../include/koneksi.php';

if (isset($_GET['id_obat'])){
	$id_obat = $_GET['id_obat'];
	$sql = mysqli_query($conn,"DELETE FROM tb_obat WHERE id_obat = '$id_obat' ");
	if ($sql) {
		header("location: ../?page=obat");
	}
}
if (isset($_GET['id_dokter'])) {
	$id_dokter = $_GET['id_dokter'];
	$sql = mysqli_query($conn,"DELETE FROM tb_dokter WHERE id_dokter = '$id_dokter' ");
	if ($sql) {
		header("location: ../?page=dokter");
	}
}

if (isset($_GET['id_pasien'])) {
	$id_pasien = $_GET['id_pasien'];
	$sql = mysqli_query($conn,"DELETE FROM tb_pasien WHERE id_pasien = '$id_pasien' ");
	if ($sql) {
		header("location: ../?page=pasien");
	}
}

if (isset($_GET['id_rm'])) {
	$id_rm = $_GET['id_rm'];
	$sql = mysqli_query($conn,"DELETE FROM tb_rm WHERE id_rm = '$id_rm' ");
	if ($sql) {
		header("location: ../?page=medis");
	}
}

if (!isset($_POST['checked'])){
	header("location: ../?page=poli");
}else{
	if ($chk = $_POST['checked']) {
		foreach ($chk as $id) {
			$sql = mysqli_query($conn,"DELETE FROM tb_poli WHERE id_poli = '$id' ");
			if ($sql) {
			header("location: ../?page=poli");
			}
		}
	}	
}
?>