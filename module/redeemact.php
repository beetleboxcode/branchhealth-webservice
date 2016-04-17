<?php 
defined('_BDZ') or die;
$response['status']=0;
$response['message']="Redeem Gagal";
$data_back = file_get_contents('php://input');
if (isset($data_back) ) {
	$obj = json_decode($data_back);
	$username=$obj->{'username'};
	$rewardID=$obj->{'id'};

	$queryUser="SELECT id from user where email = '$username'";
	$dataUser = resultData($queryUser);
	if (!empty($dataUser)) {
		$userID = $dataUser[0];

		$queryRedeem = "INSERT INTO redeem (id_user,reward,status) VALUES ($userID,$rewardID,'REQUEST')";
		$executeRedeem = queryData($queryRedeem);

		$response['status']=1;
		$response['message']="Redeem Berhasil";
	}else{
		$response['status']=0;
		$response['message']="User Tidak Terdaftar";
	}	
}else{
	$response['status']=0;
	$response['message']="Paramter Username/Reward Null";

}
echo json_encode($response);
