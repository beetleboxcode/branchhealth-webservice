<?php 
defined('_BDZ') or die;
	$response = array();
	$response['status']=0;
	$response['point_history']=array();
	$response['message']="Riwayat Poin Tidak Tersedia";

$data_back = file_get_contents('php://input');
if (isset($data_back) ) {
		$obj = json_decode($data_back);
		$username = $obj->{'username'};

		$queryUser = "SELECT * FROM user where email = '$username'";
		$dataUser = resultData($queryUser);

		if (!empty($dataUser)) {
			$userID = $dataUser[0];
			$queryHistory = "SELECT * FROM point_history where id_user = $userID ORDER BY updated_date DESC";
			$dataHistory = queryData($queryHistory);
			while ($row = mysqli_fetch_array($dataHistory)) {	
			$message="";
			if($row["type"] =="+"){
				$message="Poin Anda Bertambah ".$row["point"]." Poin, Validasi Berhasil";
			}else if($row["type"] =="-"){
				$message="Poin Anda Berkurang ".$row["point"]." Poin, Penukaran Poin";
			}else{
				$message="".$row["type"]."";
			}	
			$historyPoint = array(
					'id' 					=> 			$row["id"],
					'id_user' 				=> 			$row["id_user"],
					'type' 					=> 			$row["type"],
					'point' 				=> 			$row["point"],
					'updated_date' 			=> 			$row["updated_date"],
					'message'				=>			$message
);
			array_push($response['point_history'], $historyPoint);
			$response['status']=1;
			$response['message']="Riwayat Poin Tersedia";
			}
		}		
	}else{
		$response['status']=0;
		$response['message']="Parameter Username Null";
	}
echo json_encode($response);
 ?>