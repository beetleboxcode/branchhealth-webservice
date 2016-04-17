<?php 
defined('_BDZ') or die;
	$response = array();
	$response['status']=0;
	$response['product']=array();
	$response['message']="Product Tidak Tersedia";

$data_back = file_get_contents('php://input');
if (isset($data_back) ) {
		$obj = json_decode($data_back);
		$username = $obj->{'username'};


		$queryProduct = "SELECT * FROM product ORDER BY product_name";
		$dataProduct = queryData($queryProduct);
		while ($row = mysqli_fetch_array($dataProduct)) {

			$rowID = $row["id"];
			$arrayProdAsset = array();
			$queryAssets = "SELECT * FROM product_asset where product_id = $rowID";
			$executeAssets = queryData($queryAssets);
				while ($rowAssets = mysqli_fetch_array($executeAssets)) {
				$prodAssets = array(
							'id'				=>		$rowAssets["id"],
							'product_id'		=>		$rowAssets["product_id"],
							'type'				=>		$rowAssets["type"],
							'file_path'			=>		$rowAssets["file_path"],
							'updated_date'		=>		$rowAssets["updated_date"]
							);
					array_push($arrayProdAsset, $prodAssets);
				}


			$product = array(
					'id' 					=> 			$row["id"],
					'product_name' 			=> 			$row["product_name"],
					'product_description' 	=> 			$row["product_description"],
					'updated_date' 			=> 			$row["updated_date"],
					'product_asset' 		=> 			$arrayProdAsset
					);
			array_push($response['product'], $product);
			$response['status']=1;
			$response['message']="Product Tersedia";
		}
	}else{
		$response['status']=0;
		$response['message']="Parameter Username Null";
	}
echo json_encode($response);
 ?>