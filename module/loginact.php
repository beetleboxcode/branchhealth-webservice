<?php 
defined('_BDZ') or die;
$response['status']=0;
$response['message']="Login Gagal";

$data_back = file_get_contents('php://input');
if (isset($data_back) ) {
	$obj = json_decode($data_back);
	$username=$obj->{'username'};
	$password=$obj->{'password'};
	$token=$obj->{'token'};

	$queryCekEmail="SELECT id from user where email = '$username' AND is_active = 1";
	$dataCekEmail = resultData($queryCekEmail);
	
	if(!empty($dataCekEmail)){
		$querylogin="SELECT id from user where email = '$username' and password = '$password' AND is_active = 1";
		$dataLogin = resultData($querylogin);
		if (!empty($dataLogin)) {
			$userID = $dataLogin[0];

			$queryCekGCM="SELECT id from dcm where id_user=$userID";
			$dataCekGCM = resultData($queryCekGCM);

			if (!empty($dataCekGCM)) {
				$queryDCM = "UPDATE dcm SET token = '$token' where id_user = $userID";
				$executeDCM = queryData($queryDCM);
			}else{
				$queryInsertGCM = "INSERT INTO dcm (id_user,token) VALUES ($userID,'$token')";
				$executeInsertGCM = queryData($queryInsertGCM);
			}

			$queryLog = "INSERT INTO activity_log (user_id,activity) VALUES ($userID,'LOGIN')";
			$executeLog = queryData($queryLog);

			$response['status']=1;
			$response['message']="Login Berhasil";
		}else{
			$response['status']=0;
			$response['message']="Email Atau Password Tidak Cocok";
		}
	}else{
			$response['status']=0;
			$response['message']="User Tidak Terdaftar";
	}	
}else{
	$response['status']=0;
	$response['message']="Paramter Username/Password/Token Null";

}
echo json_encode($response);

