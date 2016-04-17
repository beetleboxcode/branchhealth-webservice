<?php 
defined('_BDZ') or die;

	$response = array();
	$response['status']=0;
	$response['message']="Data Tidak Lengkap";

$data_back = file_get_contents('php://input');
if (isset($data_back) ) {
	$obj = json_decode($data_back);
	$username=$obj->{'username'};
		$dateReceiptString = (int) $obj->{'date'};
		$dateReceipt =$dateReceiptString/1000;
		$formatedDate = date("Y-m-d H:i:s",$dateReceipt);
		$image = $obj->{'image'};
		$items = $obj->{'items'};
			
		$querylogin="SELECT id from user where email = '$username'";
		$dataLogin = resultData($querylogin);
		$userID = $dataLogin[0];
	if (!empty($dataLogin)) {			
			$queryCekPointTable = "SELECT id FROM user_point where id_user = $userID";
			$executeCekPointTable = resultData($queryCekPointTable);

			if(empty($executeCekPointTable)){
				$queryInsertTablePoint = "INSERT INTO user_point (id_user,point) VALUES ($userID,0)";
				$executeInsertTblPoint = queryData($queryInsertTablePoint);
			}

			$queryRequest = "INSERT INTO request_point(id_user,receipt_date,receipt_image,status) VALUES ($userID,'$formatedDate','$image','REQUEST')";
			$executeRequest = queryData($queryRequest);

			$queryLastID = "SELECT id FROM request_point ORDER BY id DESC LIMIT 1";
			$dataLastID = resultData($queryLastID);
			$idReq= $dataLastID[0];
			foreach ($items as $item) {
				$idSKU = $item->id;
				$qty = $item->qty;

				$queryDetail = "INSERT INTO req_point_sku(id_req_point,sku_id,qty) VALUES ($idReq,$idSKU,$qty)";
				$executeRequest = queryData($queryDetail);
			}

			$response['status']=1;
			$response['message']="Request Point Berhasil";
		}else{
			$response['status']=0;
			$response['message']="User Tidak Terdaftar";
		}
	}else{
		$response['status']=0;
		$response['message']="Data Tidak Lengkap";
	}

	echo json_encode($response);
 ?>