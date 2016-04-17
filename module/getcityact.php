<?php 
defined('_BDZ') or die;
	$response = array();
	$response['status']=0;
	$response['city']=array();
	$response['message']="Kota Tidak Tersedia";
	$queryMarket = "SELECT * FROM city ORDER BY city";
	$dataMarket = queryData($queryMarket);
	while ($row = mysqli_fetch_array($dataMarket)) {
		$city = array(
				'id' 			=> 			$row["id"],
				'city' 			=> 			$row["city"],
				'updated_date' 	=> 			$row["updated_date"]
				);
		array_push($response['city'], $city);
		$response['status']=1;
		$response['message']="Kota Tersedia";
	}

echo json_encode($response);
 ?>