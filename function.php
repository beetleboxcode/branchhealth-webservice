<?php 
defined('_BDZ') or die;

function bukaKoneksi() {
	global $dbhost;
	global $dbuser;
	global $dbpass;
	global $dbname;
	
	$link = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	if(mysqli_connect_errno()) {
		die('Gagal mengakses database! Periksa konfigurasi database!');
	}

	return $link;
}

function queryData($query) {
	$link = bukaKoneksi();
	$queryData = mysqli_query($link,$query);

	return $queryData;
}

function resultData($query) {
	$link = bukaKoneksi();
	$queryData = mysqli_query($link,$query);
	$resultData = mysqli_fetch_array($queryData);

	return $resultData;
}

 ?>