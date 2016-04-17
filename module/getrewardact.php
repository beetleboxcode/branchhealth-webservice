<?php 
defined('_BDZ') or die;
	$response = array();
	$response['status']=0;
	$response['reward']=array();
	$response['message']="Product Tidak Tersedia";

$data_back = file_get_contents('php://input');
if (isset($data_back) ) {
	$obj = json_decode($data_back);
	$username=$obj->{'username'};

		$queryReward = "SELECT * FROM reward ORDER BY updated_date ASC";
		$dataReward = queryData($queryReward);
		while ($row = mysqli_fetch_array($dataReward)) {

			$rowID = $row["id"];
			$arrayRewardAsset = array();
			$queryAssets = "SELECT * FROM reward_asset where id_reward = $rowID";
			$executeAssets = queryData($queryAssets);
				while ($rowAssets = mysqli_fetch_array($executeAssets)) {
				$rewardAssets = array(
							'id'				=>		$rowAssets["id"],
							'id_reward'			=>		$rowAssets["id_reward"],
							'type'				=>		$rowAssets["type"],
							'file_path'			=>		$rowAssets["file_path"],
							'updated_date'		=>		$rowAssets["updated_date"]
							);
					array_push($arrayRewardAsset, $rewardAssets);
				}


			$product = array(
					'id' 					=> 			$row["id"],
					'point' 				=> 			$row["point"],
					'description' 			=> 			$row["description"],
					'reward' 				=> 			$row["reward"],
					'updated_date' 			=> 			$row["updated_date"],
					'product_asset' 		=> 			$rewardAssets
					);
			array_push($response['reward'], $product);
			$response['status']=1;
			$response['message']="Product Tersedia";
		}
	}else{
		$response['status']=1;
		$response['message']="Parameter Username Null";
	}
echo json_encode($response);
 ?>