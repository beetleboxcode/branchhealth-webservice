<?php 
defined('_BDZ') or die;

	$response = array();
	$response['status']=0;
	$response['message']="Parameter Username Null";

$data_back = file_get_contents('php://input');
if (isset($data_back) ) {
 	$obj = json_decode($data_back);
	$username=$obj->{'username'};	

	$queryCheckUsername="SELECT email,first_name from user where email = '$username' and is_active = 1";
	$dataUser = resultData($queryCheckUsername);
	if (!empty($dataUser)) {
		//kirim email pass
  		$newpass = randStrGen(6);
		$queryUpdatePassword = "UPDATE user SET password = '$newpass' where email = '$username'";
		$executeDCM = queryData($queryUpdatePassword);

		$email = $dataUser[0];
		$firstName = $dataUser[1];

		sendMail("webmaster@brandsadmin.com",$firstName,$email,$newpass);
		$response['status']=1;
		$response['message']="Password Baru Berhasil Dikirim Ke Alamat Email Anda";
	}else{
		$response['status']=0;
		$response['message']="User Tidak Terdaftar";
	}

	echo json_encode($response);
}


function randStrGen($len){
	
$str = "";
	$characters = array_merge(range('a','z'), range('0','9'));
	$max = count($characters) - 1;
	for ($i = 0; $i < $len; $i++) {
		$rand = mt_rand(0, $max);
		$str .= $characters[$rand];
	}
	return $str;
}


function sendMail($from,$firstName,$email,$password){
	
	$mTo = $email;
	$subject = "Pemulihan password";
	$txt = "Dear ".$firstName.",<br/><br/>Berikut adalah password pemulihan akun anda. Silahkan login menggunakan password username dan password berikut:<br/><br/>Username: ".$email."<br/>Password: ".$password."<br/><br/>Terima kasih.<br/>Salam,<br/>BHC Admin";

	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= 'From: '+$from . "\r\n";
	mail($mTo,$subject,$txt,$headers);
}


