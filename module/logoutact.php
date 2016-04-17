<?php 
defined('_BDZ') or die;
$response['status']=0;
$response['message']="Logout Gagal";
$data_back = file_get_contents('php://input');
if (isset($data_back) ) {
	$obj = json_decode($data_back);
	$username=$obj->{'username'};

	$querylogout="SELECT id from user where email = '$username'";
	$dataLogout = resultData($querylogout);
	if (!empty($dataLogout)) {
		$userID = $dataLogout[0];

		$queryLog = "INSERT INTO activity_log (user_id,activity) VALUES ($userID,'LOGOUT')";
		$executeLog = queryData($queryLog);

		$response['status']=1;
		$response['message']="Logout Berhasil";
	}else{
		$response['status']=0;
		$response['message']="User Tidak Terdaftar";
	}	
}
echo json_encode($response);
