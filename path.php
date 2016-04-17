<?php 

defined('_BDZ') or die;

// Konfigurasi PATH/ROOT ===================================================================================
$pjgBase = strlen(BDZ_BASE);
$pjgDocRoot = strlen($_SERVER['DOCUMENT_ROOT']);
$rootDomain = str_replace(DIRECTORY_SEPARATOR,'/',substr(BDZ_BASE,$pjgDocRoot,$pjgBase-$pjgDocRoot));

// URL ROOT ================================================================================================
if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
	define('BDZ_URL_ROOT', 'https://'.$_SERVER['HTTP_HOST'].$rootDomain);
} else {
	define('BDZ_URL_ROOT', 'http://'.$_SERVER['HTTP_HOST'].$rootDomain);
}

// DIRECTORY ROOT ==========================================================================================
define('BDZ_PATH_ROOT',BDZ_BASE);

//Konfigurasi Variabel URL==================================================================================
if(!empty($_GET['var'])) {
	$getURL = $_GET['var'];
	$varURL = explode('/',$getURL);
} else {
	$getURL = '';
	$varURL = array();
}

 ?>