<?php 
defined('_BDZ') or die;


	$response = array();
	$response['status']=0;

$data_back = file_get_contents('php://input');
if (isset($data_back) ) {
	$obj = json_decode($data_back);
	$username=$obj->{'username'};
	$news_id = $obj->{'id'};

		$queryCheckUserid = "SELECT id from user where email='$username'";
		$executeCheck = resultData($queryCheckUserid);

		$userID = $executeCheck['id'];

		if(empty($userID)){
			$response['status']=0;
			$response['message']="User Tidak Terdaftar";
		}else{

			$queryCheckParticipant = "SELECT id from event_participant where id_user = $userID and id_news = $news_id";
			$executeCheckParticipant = resultData($queryCheckParticipant);

			if(empty($executeCheckParticipant)){
				$queryInsertParticipant = "INSERT INTO event_participant(id_user,id_news,status) VALUES ($userID,$news_id,1)";
				$executeParticipant = queryData($queryInsertParticipant);

				$response['status']=1;
				$response['message']="Pendaftaran Berhasil";
			}else{
				$response['status']=1;
				$response['message']="Anda Sudah Terdaftar";
			}

			
		}
		
	}else{
		$response['status']=0;
		$response['message']="Parameter Tidak Lengkap";
	}

	echo json_encode($response);
 ?>