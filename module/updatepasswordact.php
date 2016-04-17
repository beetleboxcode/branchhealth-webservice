<?php 
defined('_BDZ') or die;

	$response = array();
	$response['status']=0;
	$response['message']="Parameter Null";

$data_back = file_get_contents('php://input');
if (isset($data_back) ) {
	$obj = json_decode($data_back);
	$username=$obj->{'username'};
	$oldPassword=$obj->{'oldPassword'};
	$newPassword=$obj->{'newPassword'};

	

	$queryCheckUsername="SELECT id from user where email = '$username' and password = '$oldPassword'";
	$dataUser = resultData($queryCheckUsername);
	if (!empty($dataUser)) {
		$queryUpdatePassword = "UPDATE user SET password = '$newPassword' where email = '$username'";
		$executeUpdatePassword = queryData($queryUpdatePassword);

		$response['status']=1;
		$response['message']="Password Baru Berhasil Dirubah";
	}else{
		$response['status']=0;
		$response['message']="Password Lama Tidak Cocok";
	}

	echo json_encode($response);
}

