<?php 
defined('_BDZ') or die;
	$response = array();
	$response['status']=0;
	$response['city']=array();
	$response['branch']=array();
	$response['apotek_group']=array();
	$response['position']=array();
	$response['message']="Data Register Tidak Tersedia";

	$queryCity = "SELECT * FROM city where city !='ALL' ORDER BY city";
	$dataCity = queryData($queryCity);
	while ($rowCity = mysqli_fetch_array($dataCity)) {
		$city = array(
				'id' 			=> 			$rowCity["id"],
				'city' 			=> 			$rowCity["city"],
				'updated_date' 	=> 			$rowCity["updated_date"]
				);
		array_push($response['city'], $city);
	}

	$queryBranch = "SELECT * FROM branch where branch != 'ALL' ORDER BY branch_name";
	$dataBranch = queryData($queryBranch);
	while ($rowBranch = mysqli_fetch_array($dataBranch)) {
		$branch = array(
				'id' 				=> 			$rowBranch["id"],
				'id_city' 			=> 			$rowBranch["id_city"],
				'branch' 			=> 			$rowBranch["branch"],
				'branch_name' 		=> 			$rowBranch["branch_name"],
				'updated_date' 		=> 			$rowBranch["updated_date"]
				);
		array_push($response['branch'], $branch);
	}

	$queryApotek = "SELECT * FROM apotek_group where apotek_name != 'ALL' ORDER BY apotek_name";
	$dataApotek = queryData($queryApotek);
	while ($rowApotek = mysqli_fetch_array($dataApotek)) {
		$apotek = array(
				'id' 				=> 			$rowApotek["id"],
				'apotek_name' 		=> 			$rowApotek["apotek_name"],
				'updated_date' 		=> 			$rowApotek["updated_date"]
				);
		array_push($response['apotek_group'], $apotek);		
	}

	$queryRole = "SELECT * FROM role ORDER BY role";
	$dataRole = queryData($queryRole);
	while ($rowRole = mysqli_fetch_array($dataRole)) {
		$role = array(
				'id' 				=> 			$rowRole["id"],
				'role' 				=> 			$rowRole["role"],
				'updated_date' 		=> 			$rowRole["updated_date"]
				);
		array_push($response['position'], $role);		
	}

		$response['status']=1;
		$response['message']="Data Register Tersedia";
echo json_encode($response);
 ?>