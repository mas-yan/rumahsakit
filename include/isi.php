<?php 

$page = @$_GET['page'];

if ($page == 'pasien') {
	include 'page/pasien.php';
}elseif ($page =='obat') {
	include 'page/obat.php';
}elseif ($page =='poli') {
	include 'page/poli.php';
}elseif ($page =='dokter') {
	include 'page/dokter.php';
}elseif ($page =='medis') {
	include 'page/medis.php';
}elseif ($page =='') {
	include 'page/home.php';
}