<?php 
defined('_BDZ') or die;
	$response['status']=0;
	$response['point']=array();
	$response['message']="Anda Tidak Memiliki Poin";

$data_back = file_get_contents('php://input');
if (isset($data_back) ) {
	$obj = json_decode($data_back);
	$username=$obj->{'username'};

		$queryPoint = "SELECT up.id,up.id_user,up.point,up.updated_date FROM user_point up left join user u on up.id_user = u.id where u.email = '$username'";
		$dataPoint = queryData($queryPoint);
		while ($row = mysqli_fetch_array($dataPoint)) {
			$product = array(
					'id' 				=> 			$row["id"],
					'id_user' 			=> 			$row["id_user"],
					'point' 			=> 			$row["point"],
					'updated_date' 		=> 			$row["updated_date"]
					);
			array_push($response['point'], $product);
			$response['status']=1;
			$response['message']="Poin Tersedia";
		}
	}else{
		$response['status']=0;
		$response['message']="Parameter Username Null";
	}
echo json_encode($response);
 ?>