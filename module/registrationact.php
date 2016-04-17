<?php 
defined('_BDZ') or die;

	$response = array();
	$response['status']=0;

$data_back = file_get_contents('php://input');
if (isset($data_back) ) {

 
//print $data_back->{'username'}; // 12345

		$obj = json_decode($data_back);		
		$firstName = $obj->{'firstName'};
		$lastName = $obj->{'lastName'};
		$position = $obj->{'position'};
		$email = $obj->{'email'};
		$password = $obj->{'password'};
		$phone1 = $obj->{'phone1'};
		$phone2 = $obj->{'phone2'};
		$homeAddress = $obj->{'homeAddress'};
		$apotekAddress = $obj->{'apotekAddress'};
		$city = $obj->{'city'};
		$branch = $obj->{'branch'};
		$apotekName = $obj->{'apotekName'};
			
		$querylogin="SELECT id from user where email = '$email'";
		$dataLogin = resultData($querylogin);
	if (empty($dataLogin)) {	
			$queryregistration = "INSERT INTO user(email,password,first_name,last_name,home_address,pharmacy_address,phone1,phone2,apotek_group,branch,city,role,is_active) VALUES ('$email','$password','$firstName','$lastName','$homeAddress','$apotekAddress','$phone1','$phone2','$apotekName',$branch,$city,$position,0)";
			$executeRegistration = queryData($queryregistration);


			$querylogin="SELECT id from user where email = '$email'";
			$dataLogin = resultData($querylogin);
			$userID = $dataLogin[0];

			if(!empty($userID)){
				$queryInsertTablePoint = "INSERT INTO user_point (id_user,point) VALUES ($userID,10)";
				$executeInsertTblPoint = queryData($queryInsertTablePoint);

				$queryInsertTablePointHistory = "INSERT INTO point_history (id_user,type,point) VALUES ($userID,'+',10)";
				$executeInsertTblPointHistory = queryData($queryInsertTablePointHistory);
			}


			$response['status']=1;
			$response['message']="Registrasi Berhasil";
		}else{
			$response['status']=0;
			$response['message']="User Sudah Terdaftar";
		}
	}else{
		$response['status']=0;
		$response['message']="Data Tidak Lengkap";
	}
			

	echo json_encode($response);
 ?>