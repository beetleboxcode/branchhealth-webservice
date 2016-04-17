<?php 
defined('_BDZ') or die;
	$response = array();
	$response['status']=0;
	$response['profile']=array();
	$response['message']="Profil Tidak Tersedia";

$data_back = file_get_contents('php://input');
if (isset($data_back) ) {
	$obj = json_decode($data_back);
	$username=$obj->{'username'};

		$queryProfile = "SELECT * from user where email = '$username'";
		$dataProfile = queryData($queryProfile);
		while ($row = mysqli_fetch_array($dataProfile)) {
			$profile = array(
					'id' 				=> 			$row["id"],
					'email' 			=> 			$row["email"],
					'first_name' 		=> 			$row["first_name"],
					'last_name' 		=> 			$row["last_name"],
					'home_address' 		=> 			$row["home_address"],
					'pharmacy_address' 	=> 			$row["pharmacy_address"],
					'phone1' 			=> 			$row["phone1"],
					'phone2' 			=> 			$row["phone2"],
					'apotek_group' 		=> 			$row["apotek_group"],
					'branch' 			=> 			$row["branch"],
					'city' 				=> 			$row["city"],
					'role' 				=> 			$row["role"],
					'is_active' 		=> 			$row["is_active"],
					'updated_date' 		=> 			$row["updated_date"],
					'profile_pict'		=>			$row["photo"]
					);
			array_push($response['profile'], $profile);
			$response['status']=1;
			$response['message']="Profil Tersedia";
		}
	}else{
		$response['status']=0;
		$response['message']="Parameter Username Null";
	}
echo json_encode($response);
 ?>