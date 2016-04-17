<?php 
defined('_BDZ') or die;

	$response['status']=0;
	$response['message']="Parameter Null";

$data_back = file_get_contents('php://input');
if (isset($data_back) ) {
	$obj = json_decode($data_back);
	$username=$obj->{'username'};
	$token = $obj->{'token'};

		//check apakah username terdaftar
		$queryCheckUserid = "SELECT id from user where email='$username'";
		$executeCheck = resultData($queryCheckUserid);
		$userID = $executeCheck[0];
		if (!empty($userID)) {
			//update token
			$queryCekGCM="SELECT id from dcm where id_user=$userID";
			$dataCekGCM = resultData($queryCekGCM);

			if (!empty($dataCekGCM)) {
				$queryDCM = "UPDATE dcm SET token = '$token' where id_user = $userID";
				$executeDCM = queryData($queryDCM);
			}else{
				$queryInsertGCM = "INSERT INTO dcm (id_user,token) VALUES ($userID,'$token')";
				$executeInsertGCM = queryData($queryInsertGCM);
			}
			$response['status']=1;
			$response['message']="Pembaruan Token Berhasil";
		}else{
		$response['status']=0;
		$response['message']="User Tidak Terdaftar";
		}	
		
	}else{
		$response['status']=0;
		$response['message']="User Tidak Terdaftar";
	}

	echo json_encode($response);
 ?>