<?php 

if (version_compare(PHP_VERSION, '5.3.1', '<')) {
	die('Hosting anda mesti menggunakan PHP 5.3.1 atau lebih tinggi untuk menjalankan aplikasi ini!');
}

ob_start();
error_reporting(E_ALL);
define('_BDZ', 1);
define('BDZ_BASE',__DIR__);

session_start();

require_once 'config.php';
require_once 'path.php';
require_once 'function.php';

define('BDZ_URL_IMG',BDZ_URL_ROOT.'/img');
define('BDZ_PATH_IMG',BDZ_PATH_ROOT.DIRECTORY_SEPARATOR.'images');

$dataVar = sizeof($varURL);
if($dataVar > 0) {
	switch($varURL[0]) {


		case 'termandcondition':
		$fileDisplay = 'termandconditionact';
		require_once BDZ_PATH_ROOT.DIRECTORY_SEPARATOR.'module'.DIRECTORY_SEPARATOR.$fileDisplay.'.php';
		break;

		case 'login':
		$fileDisplay = 'loginact';
		require_once BDZ_PATH_ROOT.DIRECTORY_SEPARATOR.'module'.DIRECTORY_SEPARATOR.$fileDisplay.'.php';
		break;

		case 'logout':
		$fileDisplay = 'logoutact';
		require_once BDZ_PATH_ROOT.DIRECTORY_SEPARATOR.'module'.DIRECTORY_SEPARATOR.$fileDisplay.'.php';
		break;

		case 'updatetoken':
		$fileDisplay = 'updatetokenact';
		require_once BDZ_PATH_ROOT.DIRECTORY_SEPARATOR.'module'.DIRECTORY_SEPARATOR.$fileDisplay.'.php';
		break;

		case 'registration':
		$fileDisplay = 'registrationact';
		require_once BDZ_PATH_ROOT.DIRECTORY_SEPARATOR.'module'.DIRECTORY_SEPARATOR.$fileDisplay.'.php';
		break;

		case 'forgotpassword':
		$fileDisplay = 'forgotpasswordact';
		require_once BDZ_PATH_ROOT.DIRECTORY_SEPARATOR.'module'.DIRECTORY_SEPARATOR.$fileDisplay.'.php';
		break;

		case 'news':
		$fileDisplay = 'getnewsact';
		require_once BDZ_PATH_ROOT.DIRECTORY_SEPARATOR.'module'.DIRECTORY_SEPARATOR.$fileDisplay.'.php';
		break;

		case 'getregisterdata':
		$fileDisplay = 'getregisterdataact';
		require_once BDZ_PATH_ROOT.DIRECTORY_SEPARATOR.'module'.DIRECTORY_SEPARATOR.$fileDisplay.'.php';
		break;

		case 'registevent':
		$fileDisplay = 'registeventact';
		require_once BDZ_PATH_ROOT.DIRECTORY_SEPARATOR.'module'.DIRECTORY_SEPARATOR.$fileDisplay.'.php';
		break;		

		case 'getproduct':
		$fileDisplay = 'getproductact';
		require_once BDZ_PATH_ROOT.DIRECTORY_SEPARATOR.'module'.DIRECTORY_SEPARATOR.$fileDisplay.'.php';
		break;

		case 'getsku':
		$fileDisplay = 'getskuact';
		require_once BDZ_PATH_ROOT.DIRECTORY_SEPARATOR.'module'.DIRECTORY_SEPARATOR.$fileDisplay.'.php';
		break;

		case 'getpoint':
		$fileDisplay = 'getpointact';
		require_once BDZ_PATH_ROOT.DIRECTORY_SEPARATOR.'module'.DIRECTORY_SEPARATOR.$fileDisplay.'.php';
		break;

		case 'getreward':
		$fileDisplay = 'getrewardact';
		require_once BDZ_PATH_ROOT.DIRECTORY_SEPARATOR.'module'.DIRECTORY_SEPARATOR.$fileDisplay.'.php';
		break;

		case 'getprofile':
		$fileDisplay = 'getprofileact';
		require_once BDZ_PATH_ROOT.DIRECTORY_SEPARATOR.'module'.DIRECTORY_SEPARATOR.$fileDisplay.'.php';
		break;

		case 'faq':
		$fileDisplay = 'faqact';
		require_once BDZ_PATH_ROOT.DIRECTORY_SEPARATOR.'module'.DIRECTORY_SEPARATOR.$fileDisplay.'.php';
		break;

		case 'contactus':
		$fileDisplay = 'contactusact';
		require_once BDZ_PATH_ROOT.DIRECTORY_SEPARATOR.'module'.DIRECTORY_SEPARATOR.$fileDisplay.'.php';
		break;

		case 'changepassword':
		$fileDisplay = 'updatepasswordact';
		require_once BDZ_PATH_ROOT.DIRECTORY_SEPARATOR.'module'.DIRECTORY_SEPARATOR.$fileDisplay.'.php';
		break;

		case 'redeem':
		$fileDisplay = 'redeemact';
		require_once BDZ_PATH_ROOT.DIRECTORY_SEPARATOR.'module'.DIRECTORY_SEPARATOR.$fileDisplay.'.php';
		break;

		case 'saveprofile':
		$fileDisplay = 'saveprofileact';
		require_once BDZ_PATH_ROOT.DIRECTORY_SEPARATOR.'module'.DIRECTORY_SEPARATOR.$fileDisplay.'.php';
		break;

		case 'uploadstruk':
		$fileDisplay = 'uploadstrukact';
		require_once BDZ_PATH_ROOT.DIRECTORY_SEPARATOR.'module'.DIRECTORY_SEPARATOR.$fileDisplay.'.php';
		break;

		case 'getpointhistory':
		$fileDisplay = 'getpointhistoryact';
		require_once BDZ_PATH_ROOT.DIRECTORY_SEPARATOR.'module'.DIRECTORY_SEPARATOR.$fileDisplay.'.php';
		break;

		case 'sendgcm':
		$fileDisplay = 'sendgcmact';
		require_once BDZ_PATH_ROOT.DIRECTORY_SEPARATOR.'module'.DIRECTORY_SEPARATOR.$fileDisplay.'.php';
		break;

		default:
		$response['status']=0;
		$response['message']="URL Tidak Terdaftar";
		echo json_encode($response);
		break;
	}
}else{
	$fileDisplay = 'loginact';
	require_once BDZ_PATH_ROOT.DIRECTORY_SEPARATOR.'module'.DIRECTORY_SEPARATOR.$fileDisplay.'.php';
		
}

ob_end_flush();
?>