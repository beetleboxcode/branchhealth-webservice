<?php 
defined('_BDZ') or die;

	$response = array();
	$response['status']=0;

$data_back = file_get_contents('php://input');
if (isset($data_back) ) {
		$obj = json_decode($data_back);	
		$firstName = $obj->{'firstName'};
		$lastName = $obj->{'lastName'};
		$position = $obj->{'position'};
		$email = $obj->{'email'};
		$phone1 = $obj->{'phone1'};
		$phone2 = $obj->{'phone2'};
		$homeAddress = $obj->{'homeAddress'};
		$apotekAddress = $obj->{'apotekAddress'};
		$city = $obj->{'city'};
		$branch = $obj->{'branch'};
		$apotekName = $obj->{'apotekName'};
		$profilePict = $obj->{'profilePict'};

		$dateTimeNow = date("Y-m-d H:i:s");
			
		$querylogin="SELECT id from user where email = '$email'";
		$dataLogin = resultData($querylogin);
	if (!empty($dataLogin)) {	
			$querySaveProfile = "UPDATE user set email='$email',first_name='$firstName',last_name ='$lastName',home_address = '$homeAddress',pharmacy_address='$apotekAddress',phone1='$phone1',phone2='$phone2',apotek_group='$apotekName',branch='$branch',city='$city',role = '$position',updated_date ='$dateTimeNow',photo='$profilePict' where email = '$email'";

			$executeSaveProfile = queryData($querySaveProfile);
			$response['status']=1;
			$response['message']="Simpan Profil Berhasil";
		}else{
			$response['status']=0;
			$response['message']="Username Tidak Terdaftar";
		}
	}else{
		$response['status']=0;
		$response['message']="Data Tidak Lengkap";
	}

	echo json_encode($response);
 ?>